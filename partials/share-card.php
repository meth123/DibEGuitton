<?php
$shareEyebrow = $shareEyebrow ?? 'Compartilhe conhecimento';
$shareTitle = $shareTitle ?? 'Este conteúdo pode ajudar alguém?';
$shareDescription = $shareDescription ?? 'Envie esta página para quem também busca decisões mais seguras.';
?>
<aside class="share-card" aria-labelledby="share-title" data-share-card>
  <div>
    <p class="eyebrow"><?= htmlspecialchars($shareEyebrow, ENT_QUOTES, 'UTF-8') ?></p>
    <h3 id="share-title"><?= htmlspecialchars($shareTitle, ENT_QUOTES, 'UTF-8') ?></h3>
    <p><?= htmlspecialchars($shareDescription, ENT_QUOTES, 'UTF-8') ?></p>
  </div>
  <div class="share-actions" aria-label="Opções de compartilhamento">
    <a href="#" data-share="whatsapp" target="_blank" rel="noopener" aria-label="Compartilhar no WhatsApp" title="WhatsApp">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 11.8a8.5 8.5 0 0 1-12.6 7.5L3 20.6l1.3-4.8a8.5 8.5 0 1 1 16.2-4Z"/><path d="M8.2 7.7c.3-.4.8-.4 1.1 0l1.2 1.9c.2.3.1.7-.1 1l-.8.8c.9 1.8 2.2 3.1 4 4l.8-.8c.3-.3.7-.3 1-.1l1.9 1.2c.4.3.4.8 0 1.1-.7.6-1.5.9-2.4.8-4.5-.5-8-4-8.5-8.5-.1-.9.2-1.7.8-2.4Z"/></svg>
      <span class="visually-hidden">WhatsApp</span>
    </a>
    <a href="#" data-share="facebook" target="_blank" rel="noopener" aria-label="Compartilhar no Facebook" title="Facebook">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 8h3V4h-3c-3.3 0-5 2-5 5v2H6v4h3v7h4v-7h3.4l.6-4h-4V9c0-.7.3-1 1-1Z"/></svg>
      <span class="visually-hidden">Facebook</span>
    </a>
    <a href="#" data-share="x" target="_blank" rel="noopener" aria-label="Compartilhar no X" title="X">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 4 14 16M19 4 5 20"/></svg>
      <span class="visually-hidden">X</span>
    </a>
    <a href="#" data-share="linkedin" target="_blank" rel="noopener" aria-label="Compartilhar no LinkedIn" title="LinkedIn">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 9v10M5 5.5v.1M10 19v-6c0-2.2 1.3-4 3.6-4 2.2 0 3.4 1.5 3.4 4v6M10 9v10"/></svg>
      <span class="visually-hidden">LinkedIn</span>
    </a>
    <button type="button" data-share="native" aria-label="Abrir opções de compartilhamento" title="Compartilhar">
      <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="18" cy="5" r="2.5"/><circle cx="6" cy="12" r="2.5"/><circle cx="18" cy="19" r="2.5"/><path d="m8.2 10.8 7.5-4.5M8.2 13.2l7.5 4.5"/></svg>
      <span class="visually-hidden">Compartilhar</span>
    </button>
    <button type="button" data-share="copy" aria-label="Copiar link desta página" title="Copiar link">
      <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="8" y="8" width="11" height="11" rx="2"/><path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2"/></svg>
      <span class="visually-hidden">Copiar link</span>
    </button>
  </div>
  <p class="share-status" data-share-status aria-live="polite"></p>
</aside>
