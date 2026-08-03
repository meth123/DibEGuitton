<?php
$pageTitle = 'Dib & Guitton | Inteligência Jurídica e Gestão Patrimonial';
$pageDescription = 'Advocacia estratégica e preventiva em planejamento sucessório, agronegócio, imobiliário, empresarial, ambiental, urbanístico, consumo e saúde.';
$bodyClass = 'home-page';
require __DIR__ . '/partials/header.php';

$practices = [
  ['∿', 'Planejamento Sucessório', 'Sucessão inteligente com menos imposto e mais harmonia, preservando patrimônio, histórias e vínculos.', 'planejamento-sucessorio.php'],
  ['◈', 'Agronegócio', 'Segurança jurídica para o produtor rural, com regularização, contratos, gestão de riscos e sucessão.', 'agronegocio.php'],
  ['⌂', 'Imobiliário', 'Consultoria, negociações e contratos para aquisição, proteção e administração de patrimônio imobiliário.', 'imobiliario.php'],
  ['≣', 'Contratos com Inteligência Jurídica', 'Planejamento contratual estratégico para organizar expectativas, antecipar riscos e prevenir conflitos.', 'contratos-com-inteligencia-juridica.php'],
  ['▤', 'Empresarial', 'Assessoria para decisões empresariais, verificação de parceiros, pareceres e recuperação de créditos.', 'empresarial.php'],
  ['◉', 'Ambiental', 'Consultorias, auditorias de conformidade, licenciamentos e defesa de interesses no setor público e privado.', 'ambiental.php'],
  ['▦', 'Urbanístico', 'Regularização fundiária e assessoria em loteamentos, assentamentos e passivos urbanísticos.', 'urbanistico.php'],
  ['◎', 'Relações de Consumo', 'Prevenção e solução de conflitos, com defesa administrativa e judicial nas relações de consumo.', 'relacoes-de-consumo.php'],
  ['+', 'Direito à Saúde', 'Resposta jurídica rápida contra negativas abusivas e para assegurar tratamentos indispensáveis.', 'direito-a-saude.php']
];
?>
<main id="conteudo">
  <section class="home-hero" id="inicio">
    <div class="container hero-content">
      <p class="eyebrow">Advocacia estratégica e preventiva</p>
      <h1>Inteligência Jurídica para Converter Obstáculos em <span class="accent">Ativos Estratégicos</span></h1>
      <p>Atuação jurídica integrada em planejamento sucessório, direito imobiliário, empresarial, público, ambiental e urbanístico, com foco em prevenção de riscos, segurança jurídica e resultados concretos.</p>
      <a class="button" href="https://calendly.com/fabio-dib/30min" target="_blank" rel="noopener">Agende uma Conversa Estratégica</a>
    </div>
  </section>

  <section class="post-rental" aria-labelledby="pos-locacao-title">
    <div class="container post-rental-grid">
      <div class="post-image" role="img" aria-label="Chaves e miniatura de uma casa"></div>
      <div class="post-copy" data-reveal>
        <p class="eyebrow">Pós-locação</p>
        <h2 id="pos-locacao-title">Administração de Imóveis com <span class="accent">Segurança Jurídica</span></h2>
        <p>Cuidamos da gestão do seu imóvel no pós-locação, com controle contratual, proteção jurídica, conformidade fiscal e valorização patrimonial.</p>
        <a class="button" href="https://calendly.com/agendaguitton/meet" target="_blank" rel="noopener">Agendar Consultoria Imobiliária</a>
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
          <img src="assets/images/floresta-em-pe.png" alt="Floresta em Pé" loading="lazy">
          <div class="partner-content">
            <h3>Floresta em Pé</h3>
            <p>Unindo forças para um futuro melhor. Para o clima, as pessoas e a natureza.</p>
            <a class="button" href="https://www.florestaempe.online/" target="_blank" rel="noopener">Saiba mais</a>
          </div>
        </article>
        <article class="partner-card" data-reveal>
          <img src="assets/images/guitton.png" alt="Cristina Guitton" loading="lazy">
          <div class="partner-content">
            <h3>Guitton</h3>
            <p>Especializada em pós-locação. Administração imobiliária feita com excelência e confiança.</p>
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
            <span class="practice-icon" aria-hidden="true"><?= htmlspecialchars($practice[0], ENT_QUOTES, 'UTF-8') ?></span>
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
      <div class="about-visual" role="img" aria-label="Vista aérea de uma floresta preservada" data-reveal></div>
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
        <div class="contact-map">
          <iframe title="Localização do escritório Dib & Guitton em Santos" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=Alameda%20Arm%C3%AAnio%20Mendes%2066%20Santos%20SP&output=embed"></iframe>
        </div>
      </div>
    </div>
  </section>
</main>
<?php require __DIR__ . '/partials/footer.php'; ?>
