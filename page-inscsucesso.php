<?php
/*
 * Template Name: Página Sucesso Inscrição
 */
get_header(); ?>

<?php include "status-logado.php"; ?>

<div class="content" style="overflow:hidden; background:url('<?php echo get_template_directory_uri(); ?>/images/treinamentos/bg-tela-conclusao.jpg') no-repeat 0 0; height: 552px;">
  <div style="width:690px; float:left; margin-left: 338px; padding-top: 30px;">

    <h1 style="color: #FFF; font-size: 20px; text-shadow: 2px 2px 2px #000; font-family: 'Trebuchet MS', sans-serif; margin-top: 175px">Conclusão de Inscrição - Treinamentos Rain Bird</h1>
      <p class="mensagem">Sua inscrição foi<br>concluída com sucesso!</p>
      <p class="linkmsg">
        Seu número de inscrito é <strong style="color: #FFF; text-shadow: 2px 2px 2px #000;">8109833</strong><br><br>
        Status do Pagamento é <strong style="color: #FFF; text-shadow: 2px 2px 2px #000;">Pendente</strong><br><br>
        Forma de Pagamento escolhida: <strong style="color: #FFF; text-shadow: 2px 2px 2px #000;">Boleto Bancário</strong><br><br>
        <a href="page-minhaconta.php"  style="color: #FFF!important; text-shadow: 2px 2px 2px #000;">Clique aqui</a> para visualizar as informações sobre seus cursos.</p>
  </div>
</div>
<?php get_footer(); ?>