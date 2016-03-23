<?php
/*
 * Template Name: Tela de Sucesso de Cadastro de Usuário
 */
get_header(); ?>

<div class="content" style="overflow:hidden; background:url('<?php echo get_template_directory_uri(); ?>/images/treinamentos/bg-tela-conclusao.jpg') no-repeat 0 0; height: 552px;">
  <div style="width:690px; float:left; margin-left: 338px; padding-top: 30px;">

    <h1 style="color: #FFF; font-size: 20px; text-shadow: 2px 2px 2px #000; font-family: 'Trebuchet MS', sans-serif; margin-top: 175px">Cadastro de pessoa física - Treinamentos Rain Bird</h1>
      <p class="mensagem">Seu cadastro foi<br>concluído com sucesso!</p>
      <p class="linkmsg"><a href="<?php echo home_url('/cursos'); ?>">Clique aqui</a> para entrar e fazer sua inscrição<br>nos Treinamentos da Rain Bird.</p>
  </div>
</div>
<?php get_footer(); ?>