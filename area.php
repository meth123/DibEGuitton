<?php
$areas = require __DIR__ . '/data/areas.php';
$areaSlug = $areaSlug ?? (string)($_GET['area'] ?? '');

if (!isset($areas[$areaSlug])) {
  http_response_code(404);
  $pageTitle = 'Página não encontrada | Dib & Guitton';
  require __DIR__ . '/partials/header.php';
  echo '<main id="conteudo" class="area-content"><div class="container article-shell"><p class="eyebrow">Erro 404</p><h1>Página não encontrada</h1><p>O endereço informado não existe ou foi alterado.</p><a class="button" href="index.php">Voltar ao início</a></div></main>';
  require __DIR__ . '/partials/footer.php';
  exit;
}

$area = $areas[$areaSlug];
$pageTitle = $area['title'] . ' | Dib & Guitton';
$pageDescription = $area['headline'] . '. Atuação jurídica estratégica do Dib & Guitton.';
$bodyClass = 'area-page area-' . $areaSlug;
require __DIR__ . '/partials/header.php';
?>
<main id="conteudo">
  <section class="area-hero" style="background-image: url('assets/images/<?= htmlspecialchars($area['image'], ENT_QUOTES, 'UTF-8') ?>')">
    <div class="container hero-content">
      <p class="eyebrow">Dib &amp; Guitton</p>
      <h1>Inteligência Jurídica para Converter Obstáculos em <span class="accent">Ativos Estratégicos</span></h1>
      <p>Atuação jurídica integrada em planejamento sucessório, direito imobiliário, empresarial, público, ambiental e urbanístico, com foco em prevenção de riscos, segurança jurídica e resultados concretos.</p>
      <a class="button" href="https://calendly.com/fabio-dib/30min" target="_blank" rel="noopener">Agendar Consulta</a>
    </div>
  </section>

  <section class="area-content">
    <article class="container article-shell" data-reveal>
      <p class="eyebrow"><?= htmlspecialchars($area['title'], ENT_QUOTES, 'UTF-8') ?></p>
      <h2><?= htmlspecialchars($area['headline'], ENT_QUOTES, 'UTF-8') ?></h2>
      <?= $area['content'] ?>
      <a class="button button-outline" href="https://calendly.com/fabio-dib/30min" target="_blank" rel="noopener">Agendar uma conversa</a>
    </article>
  </section>
</main>
<?php require __DIR__ . '/partials/footer.php'; ?>
