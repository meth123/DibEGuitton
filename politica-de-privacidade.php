<?php
$pageTitle = 'Política de Privacidade | Dib & Guitton';
$pageDescription = 'Saiba como o Dib & Guitton trata dados pessoais, utiliza recursos externos e protege suas escolhas de privacidade.';
$bodyClass = 'privacy-page';
$canonicalUrl = 'https://dibeguitton.com.br/politica-de-privacidade.php';
require __DIR__ . '/partials/header.php';
?>
<main id="conteudo">
  <section class="legal-hero">
    <div class="container legal-hero-content">
      <p class="eyebrow">Privacidade e transparência</p>
      <h1>Política de <span class="accent">Privacidade</span></h1>
      <p>Esta página explica, de forma simples, quais dados podem ser tratados durante sua navegação e como você controla os recursos externos do site.</p>
      <p class="legal-updated">Última atualização: 3 de agosto de 2026.</p>
    </div>
  </section>

  <section class="area-content">
    <article class="container article-shell legal-content" data-reveal>
      <h2>1. Quem é responsável pelos dados</h2>
      <p>O Dib &amp; Guitton é responsável pelas decisões sobre o tratamento de dados pessoais realizado diretamente neste site. Para dúvidas ou solicitações, entre em contato por <a href="mailto:fabio.dib@aasp.org.br">fabio.dib@aasp.org.br</a> ou <a href="mailto:crisguitton@aasp.org.br">crisguitton@aasp.org.br</a>.</p>

      <h2>2. Quais dados podem ser tratados</h2>
      <p>O site não possui formulário próprio nem cria perfil de usuário. Quando você escolhe agendar uma consulta, o Calendly poderá solicitar os dados necessários ao agendamento. Quando você carrega o mapa, o Google Maps poderá receber informações técnicas da navegação, como endereço IP e dados do navegador, conforme as políticas do próprio fornecedor.</p>

      <h2>3. Finalidades</h2>
      <ul>
        <li>viabilizar o agendamento solicitado pelo visitante;</li>
        <li>exibir a localização do escritório quando o visitante pedir;</li>
        <li>lembrar a preferência de privacidade escolhida;</li>
        <li>responder contatos enviados pelos canais informados no site;</li>
        <li>cumprir obrigações legais e proteger direitos, quando necessário.</li>
      </ul>

      <h2>4. Cookies, armazenamento e recursos externos</h2>
      <p>O site usa o armazenamento local do navegador para guardar sua escolha entre recursos opcionais e somente essenciais. Antes da autorização, fontes do Google, Google Maps e o componente do Calendly permanecem bloqueados. Se você clicar diretamente em “Agendar” ou “Carregar mapa”, o recurso solicitado será carregado para atender à sua ação, mesmo que tenha escolhido somente os essenciais.</p>
      <p>Os fornecedores externos poderão usar cookies ou tecnologias semelhantes segundo suas próprias políticas. Você pode rever sua escolha a qualquer momento pelo botão “Gerenciar cookies”, no rodapé.</p>

      <h2>5. Compartilhamento e armazenamento</h2>
      <p>Dados são compartilhados apenas quando necessário à prestação do serviço solicitado, ao cumprimento de obrigação legal ou à proteção de direitos. O prazo de conservação depende da finalidade e das obrigações aplicáveis. Os botões de compartilhamento apenas abrem a rede escolhida; o site não recebe suas credenciais sociais.</p>

      <h2>6. Seus direitos</h2>
      <p>Nos termos da LGPD, você pode solicitar, quando aplicável, confirmação do tratamento, acesso, correção, anonimização, bloqueio ou eliminação, informação sobre compartilhamento, portabilidade e revisão ou revogação do consentimento. A solicitação será analisada de acordo com a legislação.</p>

      <h2>7. Segurança e atualizações</h2>
      <p>Adotamos medidas proporcionais para reduzir riscos de acesso não autorizado, perda ou uso indevido. Esta política poderá ser atualizada para refletir mudanças no site, nos serviços utilizados ou na legislação; a data da versão mais recente ficará indicada no início da página.</p>

      <?php
      $shareEyebrow = 'Transparência também se compartilha';
      $shareTitle = 'Envie nossa política';
      $shareDescription = 'Compartilhe esta página com quem quiser conhecer nossos cuidados com privacidade.';
      require __DIR__ . '/partials/share-card.php';
      ?>
    </article>
  </section>
</main>
<?php require __DIR__ . '/partials/footer.php'; ?>
