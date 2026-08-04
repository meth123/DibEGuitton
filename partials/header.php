<?php
$pageTitle = $pageTitle ?? 'Dib & Guitton | Inteligência Jurídica';
$pageDescription = $pageDescription ?? 'Atuação jurídica estratégica, preventiva e integrada para proteger patrimônio, negócios e pessoas.';
$bodyClass = $bodyClass ?? '';
$currentPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$canonicalUrl = $canonicalUrl ?? 'https://dibeguitton.com.br/' . ($currentPage === 'index.php' ? '' : $currentPage);
$socialImage = $socialImage ?? 'https://dibeguitton.com.br/assets/images/social-share-v2.jpg';
$ogType = $ogType ?? (strpos($bodyClass, 'area-page') !== false ? 'article' : 'website');
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="theme-color" content="#0d513d">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:locale" content="pt_BR">
  <meta property="og:type" content="<?= htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:site_name" content="Dib &amp; Guitton">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:image" content="<?= htmlspecialchars($socialImage, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:image:secure_url" content="<?= htmlspecialchars($socialImage, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="Dib &amp; Guitton — Inteligência Jurídica e Gestão Patrimonial. Conheça nossas soluções.">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($socialImage, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="twitter:image:alt" content="Dib &amp; Guitton — Inteligência Jurídica e Gestão Patrimonial. Conheça nossas soluções.">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <link rel="icon" type="image/png" href="assets/images/favicon-white.png">
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="assets/js/site.js" defer></script>
</head>
<body class="<?= htmlspecialchars($bodyClass, ENT_QUOTES, 'UTF-8') ?>">
  <a class="skip-link" href="#conteudo">Pular para o conteúdo</a>
  <header class="site-header" data-header>
    <div class="container header-inner">
      <a class="brand" href="index.php" aria-label="Dib & Guitton — Início">
        <img src="assets/images/logo-dg.png" alt="Dib & Guitton" width="82" height="82">
      </a>

      <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Abrir menu">
        <span></span><span></span><span></span>
      </button>

      <nav class="main-nav" id="main-nav" aria-label="Navegação principal">
        <a href="index.php"<?= $currentPage === 'index.php' ? ' class="active"' : '' ?>>Home</a>
        <a href="https://standforest.com/blog.php" target="_blank" rel="noopener">Blog <span class="external-mark" aria-hidden="true">↗</span></a>

        <div class="nav-dropdown">
          <button type="button" aria-expanded="false">Gestão Patrimonial <span class="chevron" aria-hidden="true"></span></button>
          <div class="submenu">
            <a href="planejamento-sucessorio.php">Planejamento Sucessório</a>
            <a href="agronegocio.php">Agronegócio</a>
            <a href="imobiliario.php">Imobiliário</a>
            <a href="contratos-com-inteligencia-juridica.php">Contratos com Inteligência Jurídica</a>
            <a href="empresarial.php">Empresarial</a>
            <a href="ambiental.php">Ambiental</a>
            <a href="urbanistico.php">Urbanístico</a>
            <a href="relacoes-de-consumo.php">Relações de Consumo</a>
            <a href="direito-a-saude.php">Direito à Saúde</a>
          </div>
        </div>

        <div class="nav-dropdown partner-dropdown">
          <button type="button" aria-expanded="false">Soluções Parceiras <span class="chevron" aria-hidden="true"></span></button>
          <div class="submenu submenu-compact">
            <a href="https://guitton.com.br/" target="_blank" rel="noopener">Pós-locação <span aria-hidden="true">↗</span></a>
            <a href="https://www.florestaempe.online/" target="_blank" rel="noopener">Floresta em Pé <span aria-hidden="true">↗</span></a>
          </div>
        </div>

        <a href="index.php#sobre">Sobre Nós</a>
        <a href="index.php#contato">Contato</a>
      </nav>
    </div>
  </header>
