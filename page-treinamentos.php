<?php
/*
 * Template Name: Treinamentos
 */
get_header(); ?>

<?php include "status-logado.php"; ?>

<div class="preloading">
    <p><img src="<?php echo get_template_directory_uri(); ?>/images/preloading.gif" alt="Preloading" /><br>Processando...</p>
</div>
<div class="content" style="overflow:hidden; background:url('<?php echo get_template_directory_uri(); ?>/images/treinamentos/bg-tela-cadastro.jpg') no-repeat 0 0; height: 552px;">

  <?php include "sidebar-user.php"; ?>

  <div style="width:532px; float:left; margin-left: 254px; padding-top: 30px;">
    <h1 style="color: #10724c; font-size: 20px;">Escolha abaixo o evento/curso que deseja se inscrever.</h1>

    <ul class="lista-eventos">

      <li>
        <a href="page-modulos.php" class="box-capa"><img src="images/treinamentos/capa-treinamento.jpg" alt="Treinamentos"></a>
        <h2 class="tituloEvento">Academia Rain Bird<br>Salvador/BA<br>29/fev a 04/mar</h2>
        <a href="page-modulos.php" class="bt-entrar">Entrar</a>
      </li>

    </ul>
  </div>

</div>
<?php get_footer(); ?>
