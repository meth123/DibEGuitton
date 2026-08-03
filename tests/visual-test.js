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
  ['home', '/index.php', 'Dib & Guitton | Inteligência Jurídica e Gestão Patrimonial', false, true],
  ['planejamento-sucessorio', '/planejamento-sucessorio.php', 'Planejamento Sucessório | Dib & Guitton', true, true],
  ['agronegocio', '/agronegocio.php', 'Agronegócio | Dib & Guitton', true, true],
  ['imobiliario', '/imobiliario.php', 'Imobiliário | Dib & Guitton', true, true],
  ['contratos', '/contratos-com-inteligencia-juridica.php', 'Contratos com Inteligência Jurídica | Dib & Guitton', true, true],
  ['empresarial', '/empresarial.php', 'Empresarial | Dib & Guitton', true, true],
  ['ambiental', '/ambiental.php', 'Ambiental | Dib & Guitton', true, true],
  ['urbanistico', '/urbanistico.php', 'Urbanístico | Dib & Guitton', true, true],
  ['relacoes-consumo', '/relacoes-de-consumo.php', 'Relações de Consumo | Dib & Guitton', true, true],
  ['direito-saude', '/direito-a-saude.php', 'Direito à Saúde | Dib & Guitton', true, true],
  ['privacidade', '/politica-de-privacidade.php', 'Política de Privacidade | Dib & Guitton', true, false]
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
      for (const [pageName, url, expectedTitle, expectsShareCard, expectsCalendly] of selectedPages) {
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
        const result = await page.evaluate(({ title, share, calendly }) => ({
          overflow: document.documentElement.scrollWidth > document.documentElement.clientWidth,
          overflowElements: document.documentElement.scrollWidth > document.documentElement.clientWidth
            ? [...document.querySelectorAll('body *')].filter((element) => {
                const rect = element.getBoundingClientRect();
                return rect.left < -1 || rect.right > document.documentElement.clientWidth + 1;
              }).slice(0, 8).map((element) => ({
                element: `${element.tagName.toLowerCase()}.${element.className || ''}`,
                left: Math.round(element.getBoundingClientRect().left),
                right: Math.round(element.getBoundingClientRect().right)
              }))
            : [],
          brokenImages: [...document.images].filter((image) => !image.naturalWidth).length,
          missingAlt: [...document.images].filter((image) => !image.hasAttribute('alt')).length,
          missingH1: document.querySelectorAll('h1').length !== 1,
          calendlyFabio: [...document.querySelectorAll('a')].some((link) => link.href === 'https://calendly.com/fabio-dib/30min'),
          calendlyPopup: [...document.querySelectorAll('a[href^="https://calendly.com/"]')].every((link) => link.hasAttribute('data-calendly-popup')),
          expectsCalendly: calendly,
          shareCard: Boolean(document.querySelector('[data-share-card]')) === share,
          shareActions: !share || ['whatsapp', 'facebook', 'x', 'linkedin', 'native', 'copy']
            .every((name) => document.querySelector(`[data-share="${name}"]`)),
          cookieBanner: Boolean(document.querySelector('[data-cookie-banner]')),
          privacyLink: Boolean(document.querySelector('a[href="politica-de-privacidade.php"]')),
          socialMeta: document.querySelector('meta[property="og:image"]')?.content.endsWith('/assets/images/social-share.png') &&
            document.querySelector('meta[name="twitter:card"]')?.content === 'summary_large_image' &&
            Boolean(document.querySelector('link[rel="canonical"]')?.href),
          optionalResourcesBlocked: !document.querySelector('#dg-google-fonts') &&
            !document.querySelector('script[src*="assets.calendly.com"]') &&
            !document.querySelector('[data-map-container] iframe[src]'),
          menuItems: document.querySelectorAll('.main-nav a').length,
          title: document.title,
          titleMatches: document.title === title
        }), { title: expectedTitle, share: expectsShareCard, calendly: expectsCalendly });
        const essentialButton = page.locator('[data-cookie-essential]');
        if (pageName === 'home' && viewportName === 'desktop' && await essentialButton.isVisible().catch(() => false)) {
          await page.screenshot({ path: 'tests/screenshots/home-cookie-desktop.png' });
          await page.locator('[data-cookie-accept]').click();
          await page.waitForFunction(() => localStorage.getItem('dg_privacy_choice') === 'all' &&
            document.querySelector('#dg-google-fonts') && document.querySelector('[data-map-container] iframe[src]'));
          result.consentAccepts = true;
          await page.evaluate(() => localStorage.setItem('dg_privacy_choice', 'essential'));
        } else if (await essentialButton.isVisible().catch(() => false)) {
          await essentialButton.click();
        }
        await page.evaluate(() => window.scrollTo(0, 30));
        await page.waitForFunction(() => document.querySelector('[data-header]')?.classList.contains('is-scrolled'));
        result.headerScrolled = await page.locator('[data-header]').evaluate((element) => element.classList.contains('is-scrolled'));
        await page.evaluate(() => window.scrollTo(0, 0));
        if (expectsCalendly && process.env.TEST_LIVE_CALENDLY === '1') {
          await page.locator('[data-calendly-popup]').first().click();
          await page.locator('.calendly-overlay').waitFor({ state: 'visible', timeout: 15000 });
          result.calendlyPopupOpens = await page.locator('.calendly-overlay').isVisible();
          await page.locator('.calendly-popup-close').click();
        } else if (expectsCalendly) {
          await page.evaluate(() => {
            window.__calendlyTestUrl = '';
            window.Calendly = { initPopupWidget: ({ url }) => { window.__calendlyTestUrl = url; } };
          });
          await page.locator('[data-calendly-popup]').first().click();
          result.calendlyPopupOpens = await page.evaluate(() => window.__calendlyTestUrl.startsWith('https://calendly.com/'));
        } else {
          result.calendlyPopupOpens = true;
        }
        if (viewportName === 'mobile') {
          await page.locator('.menu-toggle').click();
          await page.waitForFunction(() => getComputedStyle(document.querySelector('.main-nav')).visibility === 'visible');
          result.mobileMenuVisible = await page.locator('.main-nav').evaluate((element) => getComputedStyle(element).visibility === 'visible');
          await page.keyboard.press('Escape');
          result.mobileMenuCloses = await page.locator('.menu-toggle').getAttribute('aria-expanded') === 'false';
        }
        if ((pageName === 'home' && (viewportName === 'desktop' || viewportName === 'mobile')) ||
            (pageName === 'direito-saude' && viewportName === 'desktop') ||
            (pageName === 'privacidade' && (viewportName === 'desktop' || viewportName === 'mobile'))) {
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
        (item.expectsCalendly && (!item.calendlyFabio || !item.calendlyPopup)) || !item.calendlyPopupOpens || !item.shareCard || !item.shareActions || !item.cookieBanner ||
        !item.privacyLink || !item.socialMeta || !item.optionalResourcesBlocked || !item.headerScrolled || item.menuItems < 15 || item.mobileMenuVisible === false ||
        item.mobileMenuCloses === false || item.consentAccepts === false
    )) process.exitCode = 1;
  } finally {
    await browser.close();
    server?.kill();
  }
})().catch((error) => { console.error(error); process.exit(1); });
