<?php
$pageTitle = $pageTitle ?? 'Dib & Guitton | Inteligência Jurídica';
$pageDescription = $pageDescription ?? 'Atuação jurídica estratégica, preventiva e integrada para proteger patrimônio, negócios e pessoas.';
$bodyClass = $bodyClass ?? '';
$currentPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="theme-color" content="#0d513d">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <link rel="icon" type="image/png" href="assets/images/logo-dg.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
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
