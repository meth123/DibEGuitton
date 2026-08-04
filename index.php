<?php
$pageTitle = 'Dib & Guitton | Inteligência Jurídica e Patrimonial';
$pageDescription = 'Advocacia estratégica para proteger patrimônio, negócios e pessoas com soluções preventivas, seguras e sustentáveis.';
$bodyClass = 'home-page';
require __DIR__ . '/partials/header.php';

function practiceIcon(string $name): string {
  $icons = [
    'succession' => '<circle cx="6" cy="5" r="2"/><circle cx="18" cy="5" r="2"/><circle cx="12" cy="19" r="2"/><path d="M6 7v3h12V7M12 10v7"/>',
    'agribusiness' => '<path d="M12 21v-9M7 8c3 0 5 2 5 5-3 0-5-2-5-5ZM17 4c-3 0-5 2-5 5 3 0 5-2 5-5Z"/>',
    'real-estate' => '<path d="m3 11 9-8 9 8v9a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1Z"/>',
    'contracts' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6M8 13h8M8 17h5"/>',
    'business' => '<path d="M4 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16M16 9h2a2 2 0 0 1 2 2v10M8 7h4M8 11h4M8 15h4M3 21h18"/>',
    'environmental' => '<path d="M20 4c-7 0-12 3-12 9 0 3 2 5 5 5 6 0 7-8 7-14Z"/><path d="M4 21c2-5 5-8 11-11"/>',
    'urban' => '<path d="m3 6 6-3 6 3 6-3v15l-6 3-6-3-6 3Z"/><path d="M9 3v15M15 6v15"/>',
    'consumer' => '<path d="m8 12 3 3 5-6"/><path d="M12 22C7 20 4 17 4 11V5l8-3 8 3v6c0 6-3 9-8 11Z"/>',
    'health' => '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.7-7.5 1.1-1.1a5.5 5.5 0 0 0 0-7.8Z"/><path d="M7 12h3l1-2 2 4 1-2h3"/>'
  ];
  return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">' . ($icons[$name] ?? '') . '</svg>';
}

$practices = [
  ['succession', 'Planejamento Sucessório', 'Sucessão inteligente com menos imposto e mais harmonia, preservando patrimônio, histórias e vínculos.', 'planejamento-sucessorio.php'],
  ['agribusiness', 'Agronegócio', 'Advocacia estratégica para o agronegócio, com foco em segurança jurídica, prevenção de conflitos e soluções eficientes.', 'agronegocio.php'],
  ['real-estate', 'Imobiliário', 'Consultoria, acompanhamento de negociações e contratos para proteger e administrar o patrimônio imobiliário.', 'imobiliario.php'],
  ['contracts', 'Contratos com Inteligência Jurídica', 'Planejamento contratual estratégico para reduzir riscos, evitar litígios e gerar economia.', 'contratos-com-inteligencia-juridica.php'],
  ['business', 'Empresarial', 'Assessoria para decisões empresariais, verificação de parceiros, pareceres e recuperação de créditos.', 'empresarial.php'],
  ['environmental', 'Ambiental', 'Consultorias, auditorias de conformidade, licenciamentos e defesa de interesses no setor público e privado.', 'ambiental.php'],
  ['urban', 'Urbanístico', 'Regularização fundiária e assessoria em loteamentos, assentamentos e passivos urbanísticos.', 'urbanistico.php'],
  ['consumer', 'Relações de Consumo', 'Prevenção e solução de conflitos, com defesa administrativa e judicial nas relações de consumo.', 'relacoes-de-consumo.php'],
  ['health', 'Direito à Saúde', 'Resposta jurídica rápida contra negativas abusivas, assegurando tratamentos indispensáveis quando o tempo é decisivo.', 'direito-a-saude.php']
];
?>
<main id="conteudo">
  <section class="home-hero" id="inicio">
    <div class="container hero-content">
      <p class="eyebrow">Advocacia estratégica e preventiva</p>
      <h1>Inteligência Jurídica para Converter Obstáculos em <span class="accent">Ativos Estratégicos</span></h1>
      <p>Atuação jurídica integrada em planejamento sucessório, direito imobiliário, empresarial, público, ambiental e urbanístico, com foco em prevenção de riscos, segurança jurídica e resultados concretos.</p>
      <a class="button" href="https://calendly.com/fabio-dib/30min" data-calendly-popup>Agende uma Conversa Estratégica</a>
    </div>
  </section>

  <section class="post-rental" aria-labelledby="pos-locacao-title">
    <div class="container post-rental-grid">
      <div class="post-image" role="img" aria-label="Chaves e miniatura de uma casa"></div>
      <div class="post-copy" data-reveal>
        <p class="eyebrow">Pós-locação</p>
        <h2 id="pos-locacao-title">Administração de Imóveis com <span class="accent">Segurança Jurídica</span></h2>
        <p>Cuidamos da gestão do seu imóvel no pós-locação, com controle contratual, proteção jurídica, conformidade fiscal e valorização patrimonial.</p>
        <a class="button" href="https://calendly.com/agendaguitton/meet" data-calendly-popup>Agendar Consultoria Imobiliária</a>
      </div>
    </div>
  </section>

  <section class="section partner-section" aria-labelledby="parceiros-title">
    <div class="container">
      <div class="section-heading" data-reveal>
        <p class="eyebrow">Soluções parceiras</p>
        <h2 id="parceiros-title">Cuidado completo para o <span class="accent">patrimônio e o futuro</span></h2>
        <p>Projetos especializados que ampliam nossa atuação com confiança, responsabilidade e visão de longo prazo.</p>
      </div>
      <div class="partner-grid">
        <article class="partner-card" data-reveal>
          <div class="partner-media">
            <img src="assets/images/parceiro-floresta-bg.png" alt="Vista aérea de uma floresta preservada cortada por um rio" loading="lazy">
            <div class="partner-brand"><img class="partner-logo partner-logo-forest" src="assets/images/logo-floresta-oficial.png" alt="Floresta em Pé"></div>
          </div>
          <div class="partner-content">
            <h3 class="visually-hidden">Floresta em Pé</h3>
            <p>Unindo forças para um futuro melhor. Para o clima, as pessoas e a natureza.</p>
            <a class="button" href="https://www.florestaempe.online/" target="_blank" rel="noopener">Saiba mais</a>
          </div>
        </article>
        <article class="partner-card" data-reveal>
          <div class="partner-media">
            <img src="assets/images/parceiro-guitton-bg.png" alt="Interior claro de um apartamento contemporâneo" loading="lazy">
            <div class="partner-brand"><img class="partner-logo partner-logo-guitton" src="assets/images/logo-guitton-oficial.png" alt="Cristina Guitton"></div>
          </div>
          <div class="partner-content">
            <h3 class="visually-hidden">Guitton</h3>
            <p>Especializado em pós-locação. Administração imobiliária feita com excelência e confiança.</p>
            <a class="button" href="https://guitton.com.br/" target="_blank" rel="noopener">Saiba mais</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="section practice-section" id="atuacao" aria-labelledby="atuacao-title">
    <div class="container">
      <div class="section-heading" data-reveal>
        <p class="eyebrow">Advocacia para um mundo sustentável</p>
        <h2 id="atuacao-title">Gestão Patrimonial com <span class="accent">visão integrada</span></h2>
      </div>
      <div class="practice-grid">
        <?php foreach ($practices as $practice): ?>
          <article class="practice-card" data-reveal>
            <span class="practice-icon"><?= practiceIcon($practice[0]) ?></span>
            <h3><?= htmlspecialchars($practice[1], ENT_QUOTES, 'UTF-8') ?></h3>
            <p><?= htmlspecialchars($practice[2], ENT_QUOTES, 'UTF-8') ?></p>
            <a class="text-link" href="<?= htmlspecialchars($practice[3], ENT_QUOTES, 'UTF-8') ?>">Leia mais <span aria-hidden="true">→</span></a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="about" id="sobre" aria-labelledby="sobre-title">
    <div class="container about-grid">
      <div class="about-visual" data-reveal>
        <div class="about-photo" role="img" aria-label="Vista aérea de uma floresta preservada"></div>
        <span class="about-years" aria-label="Mais de 25 anos de atuação">25+<small>anos</small></span>
      </div>
      <div class="about-copy" data-reveal>
        <p class="eyebrow">Sobre nós</p>
        <h2 id="sobre-title">Atuação Jurídica com <span class="accent">Segurança, Estratégia e Sustentabilidade</span></h2>
        <p>Há mais de 25 anos oferecendo soluções jurídicas inteligentes, preventivas e contenciosas, com transparência, técnica e compromisso com o interesse dos clientes e da sociedade.</p>
      </div>
    </div>
  </section>

  <section class="contact" id="contato" aria-labelledby="contato-title">
    <div class="container">
      <div class="section-heading">
        <p class="eyebrow">Contato</p>
        <h2 id="contato-title">Vamos conversar sobre o que você precisa proteger?</h2>
      </div>
      <div class="contact-grid">
        <div class="contact-brand">
          <img src="assets/images/logo-dg.png" alt="Dib & Guitton" width="100" height="100">
          <p>Atendimento jurídico estratégico, humano e orientado a resultados.</p>
        </div>
        <div>
          <h2>Fale Conosco</h2>
          <ul class="contact-list">
            <li><a href="https://www.google.com/maps/search/?api=1&amp;query=Alameda+Arm%C3%AAnio+Mendes%2C+66%2C+Santos%2C+SP" target="_blank" rel="noopener">Alameda Armênio Mendes, 66 — Aparecida, Santos/SP</a></li>
            <li>Direito Ambiental: <a href="tel:+551340404354">(13) 4040-4354</a></li>
            <li><a href="mailto:fabio.dib@aasp.org.br">fabio.dib@aasp.org.br</a></li>
            <li>Pós-locação: <a href="tel:+551340404663">(13) 4040-4663</a></li>
            <li><a href="mailto:crisguitton@aasp.org.br">crisguitton@aasp.org.br</a></li>
          </ul>
        </div>
        <div class="contact-map" data-map-container>
          <div class="map-placeholder" data-map-placeholder>
            <span aria-hidden="true">⌖</span>
            <strong>Alameda Armênio Mendes, 66 — Santos/SP</strong>
            <p>O mapa do Google só será carregado quando você permitir.</p>
            <button class="button button-outline" type="button" data-map-load>Carregar mapa</button>
          </div>
          <iframe title="Localização do escritório Dib & Guitton em Santos" loading="lazy" referrerpolicy="no-referrer-when-downgrade" data-src="https://www.google.com/maps?q=Alameda%20Arm%C3%AAnio%20Mendes%2066%20Santos%20SP&output=embed"></iframe>
        </div>
      </div>
    </div>
  </section>
</main>
<?php require __DIR__ . '/partials/footer.php'; ?>
