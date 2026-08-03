const menuButton = document.querySelector('.menu-toggle');
const navigation = document.querySelector('.main-nav');
const dropdowns = document.querySelectorAll('.nav-dropdown');

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
