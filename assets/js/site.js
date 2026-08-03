const menuButton = document.querySelector('.menu-toggle');
const navigation = document.querySelector('.main-nav');
const dropdowns = document.querySelectorAll('.nav-dropdown');
const header = document.querySelector('[data-header]');

function updateHeader() {
  header?.classList.toggle('is-scrolled', window.scrollY > 20);
}

updateHeader();
window.addEventListener('scroll', updateHeader, { passive: true });

function closeMenu() {
  if (!menuButton || !navigation) return;
  menuButton.setAttribute('aria-expanded', 'false');
  menuButton.setAttribute('aria-label', 'Abrir menu');
  navigation.classList.remove('is-open');
  document.body.classList.remove('menu-open');
  dropdowns.forEach((dropdown) => {
    dropdown.classList.remove('is-open');
    dropdown.querySelector('button')?.setAttribute('aria-expanded', 'false');
  });
}

menuButton?.addEventListener('click', () => {
  const open = menuButton.getAttribute('aria-expanded') !== 'true';
  menuButton.setAttribute('aria-expanded', String(open));
  menuButton.setAttribute('aria-label', open ? 'Fechar menu' : 'Abrir menu');
  navigation?.classList.toggle('is-open', open);
  document.body.classList.toggle('menu-open', open);
});

dropdowns.forEach((dropdown) => {
  const button = dropdown.querySelector('button');
  button?.addEventListener('click', (event) => {
    event.stopPropagation();
    const willOpen = !dropdown.classList.contains('is-open');
    dropdowns.forEach((item) => {
      item.classList.remove('is-open');
      item.querySelector('button')?.setAttribute('aria-expanded', 'false');
    });
    dropdown.classList.toggle('is-open', willOpen);
    button.setAttribute('aria-expanded', String(willOpen));
  });
});

document.addEventListener('click', (event) => {
  if (!event.target.closest('.nav-dropdown')) {
    dropdowns.forEach((dropdown) => {
      dropdown.classList.remove('is-open');
      dropdown.querySelector('button')?.setAttribute('aria-expanded', 'false');
    });
  }
});

document.addEventListener('keydown', (event) => {
  if (event.key === 'Escape') closeMenu();
});

navigation?.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));

const CONSENT_KEY = 'dg_privacy_choice';

function loadStylesheet(href, id) {
  if (document.getElementById(id)) return;
  const link = document.createElement('link');
  link.id = id;
  link.rel = 'stylesheet';
  link.href = href;
  document.head.append(link);
}

function loadMap() {
  const frame = document.querySelector('[data-map-container] iframe[data-src]');
  if (!frame || frame.src) return;
  frame.src = frame.dataset.src;
  document.querySelector('[data-map-placeholder]')?.setAttribute('hidden', '');
}

function loadOptionalResources() {
  loadStylesheet('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Montserrat:wght@500;600;700&display=swap', 'dg-google-fonts');
  loadMap();
}

let calendlyPromise;
function ensureCalendly() {
  if (window.Calendly?.initPopupWidget) return Promise.resolve();
  if (calendlyPromise) return calendlyPromise;
  loadStylesheet('https://assets.calendly.com/assets/external/widget.css', 'dg-calendly-css');
  calendlyPromise = new Promise((resolve, reject) => {
    const script = document.createElement('script');
    script.src = 'https://assets.calendly.com/assets/external/widget.js';
    script.async = true;
    script.onload = resolve;
    script.onerror = reject;
    document.head.append(script);
  });
  return calendlyPromise;
}

document.querySelectorAll('[data-calendly-popup]').forEach((link) => {
  link.addEventListener('click', async (event) => {
    event.preventDefault();
    try {
      await ensureCalendly();
      if (!window.Calendly?.initPopupWidget) throw new Error('Calendly indisponível');
      window.Calendly.initPopupWidget({ url: link.href });
    } catch {
      window.location.href = link.href;
    }
  });
});

const cookieBanner = document.querySelector('[data-cookie-banner]');
let privacyChoice = null;
try {
  privacyChoice = localStorage.getItem(CONSENT_KEY);
} catch {}

if (privacyChoice === 'all') loadOptionalResources();
if (!privacyChoice && cookieBanner) cookieBanner.hidden = false;

function savePrivacyChoice(choice) {
  try { localStorage.setItem(CONSENT_KEY, choice); } catch {}
  privacyChoice = choice;
  if (cookieBanner) cookieBanner.hidden = true;
  if (choice === 'all') loadOptionalResources();
}

document.querySelector('[data-cookie-accept]')?.addEventListener('click', () => savePrivacyChoice('all'));
document.querySelector('[data-cookie-essential]')?.addEventListener('click', () => savePrivacyChoice('essential'));
document.querySelectorAll('[data-cookie-manage]').forEach((button) => button.addEventListener('click', () => {
  if (cookieBanner) cookieBanner.hidden = false;
}));
document.querySelector('[data-map-load]')?.addEventListener('click', loadMap);

const shareCard = document.querySelector('[data-share-card]');
if (shareCard) {
  const url = window.location.href;
  const title = document.title.replace(' | Dib & Guitton', '');
  const encodedUrl = encodeURIComponent(url);
  const encodedText = encodeURIComponent(`${title} — Dib & Guitton`);
  const shareUrls = {
    whatsapp: `https://wa.me/?text=${encodedText}%20${encodedUrl}`,
    facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`,
    x: `https://twitter.com/intent/tweet?url=${encodedUrl}&text=${encodedText}`,
    linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${encodedUrl}`
  };
  Object.entries(shareUrls).forEach(([network, href]) => {
    const link = shareCard.querySelector(`[data-share="${network}"]`);
    if (link) link.href = href;
  });

  const status = shareCard.querySelector('[data-share-status]');
  const setStatus = (message) => { if (status) status.textContent = message; };
  shareCard.querySelector('[data-share="native"]')?.addEventListener('click', async () => {
    if (navigator.share) {
      try { await navigator.share({ title, text: `Conheça este conteúdo do Dib & Guitton: ${title}`, url }); } catch {}
    } else {
      try { await navigator.clipboard.writeText(url); setStatus('Link copiado para compartilhar.'); } catch { setStatus('Copie o endereço exibido no navegador.'); }
    }
  });
  shareCard.querySelector('[data-share="copy"]')?.addEventListener('click', async () => {
    try { await navigator.clipboard.writeText(url); setStatus('Link copiado!'); } catch { setStatus('Não foi possível copiar automaticamente.'); }
  });
}

const observed = document.querySelectorAll('[data-reveal]');
if ('IntersectionObserver' in window) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });
  observed.forEach((element) => observer.observe(element));
} else {
  observed.forEach((element) => element.classList.add('is-visible'));
}
