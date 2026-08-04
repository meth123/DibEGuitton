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
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a9.84 9.84 0 0 0-8.36 15.04L2.05 22l5.08-1.49A9.9 9.9 0 1 0 12 2Zm5.78 13.9c-.24.67-1.4 1.28-1.93 1.35-.5.07-1.13.1-1.82-.11-.42-.13-.96-.31-1.65-.61-2.9-1.25-4.79-4.18-4.94-4.37-.14-.19-1.18-1.57-1.18-3 0-1.43.75-2.13 1.02-2.42.24-.26.52-.33.7-.33h.5c.16 0 .38-.06.59.45.22.53.75 1.83.82 1.96.07.14.11.3.02.48-.09.19-.14.3-.27.46-.14.16-.29.36-.41.48-.14.14-.28.29-.12.56.16.27.71 1.17 1.52 1.9 1.04.93 1.92 1.22 2.19 1.36.27.14.43.12.59-.07.16-.18.68-.79.86-1.06.18-.27.36-.23.61-.14.25.09 1.59.75 1.86.89.27.14.45.2.52.32.07.11.07.66-.17 1.33Z"/></svg>
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
