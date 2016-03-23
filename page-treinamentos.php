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
<?php // WP_Query arguments
$args = array (
    'post_type'              => array( 'treinamento' ),
    'post_status'            => array( 'publish' ),
    'posts_per_page'         => '-1',
    'order'                  => 'ASC',
    'orderby'                => 'menu_order',
);

// The Query
$query_lista_treinamentos = new WP_Query( $args );

// The Loop
if ( $query_lista_treinamentos->have_posts() ) {
while ( $query_lista_treinamentos->have_posts() ) {
$query_lista_treinamentos->the_post(); ?>
      <li>
        <a href="<?php echo home_url('/modulos/'); ?>?treinamento=<?php echo $post->ID; ?>" class="box-capa"><?php the_post_thumbnail('capa-treinamento'); ?></a>
        <h2 class="tituloEvento"><?php the_title(); ?></h2>
        <a href="<?php echo home_url('/modulos/'); ?>?treinamento=<?php echo $post->ID; ?>" class="bt-entrar">Entrar</a>
      </li>
<?php }
} else {
    // no posts found ?>
    <li>Nenhum Treinamento/Curso cadastrado no momento.</li>
<?php }

// Restore original Post Data
wp_reset_postdata(); ?>
    </ul>
  </div>

</div>
<?php get_footer(); ?>
