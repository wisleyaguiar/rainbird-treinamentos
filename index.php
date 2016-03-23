<?php get_header(); ?>

<div class="preloading">
    <p><img src="<?php echo get_template_directory_uri(); ?>/images/preloading.gif" alt="Preloading" /><br>Processando...</p>
</div>
<div class="content" style="overflow:hidden;">
  <div class="sidebar">
  <div id="navWrapper">
          <div id="p7TMM_1" class="p7TMM05">
            <ul class="p7TMM level_1" id="p7TMM_1u1">
              <li><a href="<?php echo get_option('urlsite2'); ?>/servicos.php?page=projetos">Projetos</a></li>
              <li><a href="<?php echo get_option('urlsite2'); ?>/servicos.php?page=treinamentos" class="trig_open">Treinamentos</a></li>
              <li><a href="<?php echo get_option('urlsite2'); ?>/servicos.php?page=auditoria-sistemas">Auditoria de Sistemas</a></li>
              <li><a href="<?php echo get_option('urlsite2'); ?>/servicos.php?page=supervisao-partida-assistida">Supervisão e Partida Assistida</a></li>
            </ul>
            <!--[if lte IE 6]>
<style>.p7TMM05 .p7TMM, .p7TMM05 a, .p7TMM05 li {height:1%;}</style>
<![endif]-->
            <!--[if IE 5]>
<style>.p7TMM05 a, .p7TMM05 a {overflow: visible !important;}</style>
<![endif]-->
            <script type="text/javascript">
<!--
P7_TMMop('p7TMM_1',1,0,0,3,1,0,1,0,-1,150);
//-->
            </script>
          </div>
          <img src="http://www.rainbird.com/p7tmm/img/navBottom.jpg" width="200" height="27"> </div>
    <div class="clear"></div>
  </div>

  <div style="width:690px; float:left;">
    
    <div class="sidebar-login">
          <p>Se você já possui cadastro em
            nosso site, faça o login abaixo.</p>
      <div class="caixa-login">
        <p>Já tenho Cadastro</p>
          <form action="<?php echo home_url(); ?>" method="post" id="caixa-login">
              <p>login<br>
              <input type="text" name="login" id="login" required> </p>
              <p>senha<br>
              <input type="password" name="senha" id="senha" required></p>
              <p class="texto-right"><a href="<?php echo wp_lostpassword_url( get_bloginfo('url') ); ?>">Esqueceu sua senha?</a> <button type="submit" name="logar" class="bt-verde">Entrar</button> </p>
          </form>
      </div>
        <p>Caso ainda não tenha seu cadastro,
            basta preencher seu e-mail, e seguir
            os passos.</p>
        <div class="caixa-cadastro">
            <p>Não tenho cadastro<br><span>Criar cadastro</span></p>
            <form action="<?php echo home_url('/cadastro'); ?>" method="post" id="caixa-cadastro">
                <p>e-mail<br>
                <input type="email" name="email" id="email" required></p>
                <p class="texto-right"><button type="submit" name="cadastrar" class="bt-verde">Criar Cadastro</button> </p>
            </form>
        </div>
    </div>
        
    <h1>Treinamentos</h1>
    <p><strong>A Academia Rain Bird oferece:</strong></p>
    <p>Uma diferenciada seleção de cursos profissionalizantes de irrigação para praticantes do Uso Inteligente da Água 
      tais como projetistas, instaladores, administradores de áreas verdes (jardins, campos de golfe e gramados esportivos), paisagistas, técnicos, engenheiros, arquitetos, distribuidores e proprietários de empresa.</p>
      <p style="text-align:center;"><img src="<?php echo get_template_directory_uri(); ?>/images/capa-treinamentos.jpg" width="341" height="203" alt=""/></p>
    <div class="clear"></div>
    <h2>Descrição dos treinamentos:</h2>
    <p><strong>Qualificações Básicas</strong></p>
    <div class="accordion">
      <h3>A1 – Hidráulica Básica</h3>
      <div>
        <p>Curso destinado a profissionais que estão se iniciando em
          projetos de irrigação para jardins e gramados, ou para aqueles
          que buscam a reciclagem e a atualização de conhecimentos.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-hidraulicabasica.jpg" width="685" height="213" alt=""/></p>
      </div>
      <h3>A2 – Produtos de Irrigação para Jardins e Gramados</h3>
      <div>
        <p>Neste curso você irá aprender o que é um sistema de irrigação e estará capacitado para especificar produtos, instalar, operar, manter e solucionar problemas de funcionamento. Experimente e teste os produtos em aulas práticas de operação e instalação de um sistema de irrigação.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-produtos-irrigacao.jpg" width="687" height="213" alt=""/></p>
      </div>
      <h3>A3 – Projetos de Irrigação para Jardins e Gramados</h3>
      <div>
        <p>O curso foi desenvolvido para você que é, ou deseja ser, um projetista, vendedor técnico, consultor ou deseja aprender técnicas profissionais utilizadas na elaboração de projetos de irrigação para jardins e gramados.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-projeto-irrigacao-jardins.jpg" width="689" height="218" alt=""/></p>
      </div>
      <h3>A4 – Irrigação Localizada de Jardins, Paredes e Telhados Verdes</h3>
      <div>
        <p>Este curso é destinado a qualquer profissional de irrigação que deseja aprender sobre os princípios da irrigação de baixo volume em jardins.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-irrigacao-localizada.jpg" width="687" height="220" alt=""/></p>
      </div>
      <h3>A5 – Elétrica Básica</h3>
      <div>
        <p>Para o completo domínio de um sistema de irrigação é necessário conhecer os princípios da eletricidade aplicada instalação destes sistemas.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-eletrica-basica.jpg" width="685" height="223" alt=""/></p>
      </div>
    </div>
    <p><strong>Qualificações Avançadas</strong></p>
    <div class="accordion">
      <h3>B2 – Instalação, Manutenção e Solução de Problemas Elétricos</h3>
      <div>
        <p>Curso destinado a projetistas, instaladores e aos profissionais que se dedicam à manutenção de sistemas de irrigação.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-instalacao-manutencao-problemas.jpg" width="687" height="223" alt=""/></p>
      </div>
      <h3>B3 – Orçamentos de Sistemas de Irrigação</h3>
      <div>
        <p>Curso projetado para os profissionais que trabalham com orçamentos, ou aqueles que desejam criar o 
          seu próprio negócio.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-orcamento-sistemas.jpg" width="691" height="223" alt=""/></p>
      </div>
    </div>
    <p><strong>Qualificações Complementares</strong></p>
    <div class="accordion">
      <h3>C1 – Curso de Vendas em Irrigação</h3>
      <div>
        <p>Este curso irá estimular a sua habilidade em desenvolver as principais estratégias e ações em vendas, a partir de uma compreensão clara dos seus objetivos comerciais.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-curso-vendas-irrigacao.jpg" width="692" height="228" alt=""/></p>
      </div>
      <h3>C2 – Sistemas de Bombeamento</h3>
      <div>
        <p>Este curso fornecerá as noções básicas de sistemas de bombeamento utilizados em irrigação.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-sistemas-bombeamento.jpg" width="690" height="228" alt=""/></p>
      </div>
      <h3>C3 – Aspersor LF – “Low Flow”</h3>
      <div>
        <p>Para quem deseja aprender tudo sobre o mais inovador aspersor do mercado.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-aspersor-lf-low-flow.jpg" width="693" height="227" alt=""/></p>
      </div>
      <h3>C4 – Coleta, Armazenamento e Uso de Água de Chuva para Irrigação</h3>
      <div>
        <p>Este curso apresentará os métodos de coleta, armazenamento e utilização da água de chuva em sistemas de irrigação para jardins e gramados.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-coleta-armazenamento.jpg" width="693" height="227" alt=""/></p>
      </div>
      <h3>C5 – Curso Prático de Montagem e Manutenção de Irrigação para Jardins e Gramados</h3>
      <div>
        <p>Destinado a profissionais que buscam bons conhecimentos do funcionamento da irrigação para melhorar suas habilidades, padronizar os processos de instalação e manutenção de sistemas.</p>
        <p><img src="<?php echo get_template_directory_uri(); ?>/images/capa-curso-pratico-montagem.jpg" width="691" height="224" alt=""/></p>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
