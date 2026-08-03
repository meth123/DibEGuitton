const fs = require('node:fs');
const path = require('node:path');
const { spawn } = require('node:child_process');

function loadPlaywright() {
  const candidates = [
    'playwright',
    process.env.NODE_PATH && path.join(process.env.NODE_PATH, 'playwright')
  ].filter(Boolean);

  for (const candidate of candidates) {
    try {
      return require(candidate);
    } catch (error) {
      if (error.code !== 'MODULE_NOT_FOUND') throw error;
    }
  }

  throw new Error('Playwright não encontrado. Defina NODE_PATH para o diretório que contém o pacote playwright.');
}

const { chromium } = loadPlaywright();

const pages = [
  ['home', '/index.php', 'Dib & Guitton | Inteligência Jurídica e Gestão Patrimonial'],
  ['planejamento-sucessorio', '/planejamento-sucessorio.php', 'Planejamento Sucessório | Dib & Guitton'],
  ['agronegocio', '/agronegocio.php', 'Agronegócio | Dib & Guitton'],
  ['imobiliario', '/imobiliario.php', 'Imobiliário | Dib & Guitton'],
  ['contratos', '/contratos-com-inteligencia-juridica.php', 'Contratos com Inteligência Jurídica | Dib & Guitton'],
  ['empresarial', '/empresarial.php', 'Empresarial | Dib & Guitton'],
  ['ambiental', '/ambiental.php', 'Ambiental | Dib & Guitton'],
  ['urbanistico', '/urbanistico.php', 'Urbanístico | Dib & Guitton'],
  ['relacoes-consumo', '/relacoes-de-consumo.php', 'Relações de Consumo | Dib & Guitton'],
  ['direito-saude', '/direito-a-saude.php', 'Direito à Saúde | Dib & Guitton']
];

const viewports = [
  ['desktop', 1440, 1000],
  ['mobile', 390, 844]
];

async function waitForServer(base, timeout = 10000) {
  const deadline = Date.now() + timeout;
  while (Date.now() < deadline) {
    try {
      const response = await fetch(base + '/index.php');
      if (response.ok) return;
    } catch {}
    await new Promise((resolve) => setTimeout(resolve, 100));
  }
  throw new Error(`Servidor não respondeu em ${base}`);
}

async function loadLazyImages(page) {
  await page.evaluate(async () => {
    for (let y = 0; y < document.documentElement.scrollHeight; y += window.innerHeight) {
      window.scrollTo(0, y);
      await new Promise((resolve) => setTimeout(resolve, 40));
    }
    window.scrollTo({ top: 0, behavior: 'instant' });
  });
  await page.waitForFunction(() => window.scrollY === 0);
  await page.waitForFunction(() => [...document.images].every((image) => image.complete));
}

(async () => {
  const externalBase = process.argv[2];
  const base = externalBase || 'http://127.0.0.1:8098';
  const php = process.env.PHP_BIN || 'php';
  const server = externalBase ? null : spawn(php, ['-S', '127.0.0.1:8098'], {
    cwd: path.resolve(__dirname, '..'),
    stdio: 'ignore',
    windowsHide: true
  });

  if (server) await waitForServer(base);

  const browser = await chromium.launch({
    headless: true,
    executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe',
    args: ['--disable-gpu', '--use-angle=swiftshader', '--enable-unsafe-swiftshader']
  });
  fs.mkdirSync('tests/screenshots', { recursive: true });
  const results = [];

  const selectedViewports = process.env.TEST_VIEWPORT
    ? viewports.filter(([name]) => name === process.env.TEST_VIEWPORT)
    : viewports;
  const selectedPages = process.env.TEST_PAGE
    ? pages.filter(([name]) => name === process.env.TEST_PAGE)
    : pages;

  try {
    for (const [viewportName, width, height] of selectedViewports) {
      for (const [pageName, url, expectedTitle] of selectedPages) {
        const page = await browser.newPage({ viewport: { width, height } });
        const consoleErrors = [];
        page.on('console', (message) => {
          if (message.type() === 'error' && !message.text().startsWith('Failed to load resource')) {
            consoleErrors.push(message.text());
          }
        });
        page.on('pageerror', (error) => consoleErrors.push(error.message));
        page.on('response', (resourceResponse) => {
          const resourceUrl = new URL(resourceResponse.url());
          if (resourceUrl.origin === new URL(base).origin && resourceResponse.status() >= 400) {
            consoleErrors.push(`${resourceResponse.status()} ${resourceUrl.pathname}`);
          }
        });
        page.on('requestfailed', (request) => {
          const resourceUrl = new URL(request.url());
          if (resourceUrl.origin === new URL(base).origin) {
            consoleErrors.push(`${request.failure()?.errorText || 'request failed'} ${resourceUrl.pathname}`);
          }
        });
        await page.emulateMedia({ reducedMotion: 'reduce' });
        const response = await page.goto(base + url, { waitUntil: 'networkidle' });
        await loadLazyImages(page);
        const result = await page.evaluate((title) => ({
          overflow: document.documentElement.scrollWidth > document.documentElement.clientWidth,
          brokenImages: [...document.images].filter((image) => !image.naturalWidth).length,
          missingAlt: [...document.images].filter((image) => !image.hasAttribute('alt')).length,
          missingH1: document.querySelectorAll('h1').length !== 1,
          calendlyFabio: [...document.querySelectorAll('a')].some((link) => link.href === 'https://calendly.com/fabio-dib/30min'),
          menuItems: document.querySelectorAll('.main-nav a').length,
          title: document.title,
          titleMatches: document.title === title
        }), expectedTitle);
        if (viewportName === 'mobile') {
          await page.locator('.menu-toggle').click();
          await page.waitForFunction(() => getComputedStyle(document.querySelector('.main-nav')).visibility === 'visible');
          result.mobileMenuVisible = await page.locator('.main-nav').evaluate((element) => getComputedStyle(element).visibility === 'visible');
          await page.keyboard.press('Escape');
          result.mobileMenuCloses = await page.locator('.menu-toggle').getAttribute('aria-expanded') === 'false';
        }
        if ((pageName === 'home' || pageName === 'direito-saude') && viewportName === 'desktop') {
          await page.screenshot({ path: `tests/screenshots/${pageName}-${viewportName}.png`, fullPage: true });
        }
        results.push({ name: `${pageName}-${viewportName}`, status: response.status(), consoleErrors, ...result });
        await page.close();
      }
    }

    const notFound = await browser.newPage();
    const notFoundResponse = await notFound.goto(base + '/area.php?area=inexistente');
    results.push({ name: '404', status: notFoundResponse.status(), title: await notFound.title() });
    await notFound.close();

    fs.writeFileSync('tests/results.json', JSON.stringify(results, null, 2));
    console.log(JSON.stringify(results, null, 2));
    if (results.some((item) => item.name === '404'
      ? item.status !== 404
      : item.status !== 200 || item.overflow || item.brokenImages || item.missingAlt ||
        item.missingH1 || item.consoleErrors?.length || item.titleMatches === false ||
        !item.calendlyFabio || item.menuItems < 15 || item.mobileMenuVisible === false ||
        item.mobileMenuCloses === false
    )) process.exitCode = 1;
  } finally {
    await browser.close();
    server?.kill();
  }
})().catch((error) => { console.error(error); process.exit(1); });
