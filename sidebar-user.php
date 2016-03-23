<div class="sidebar-usuario">
    <p>Seja bem vindo, <br><strong><?php echo $user_dados->first_name; ?></strong></p>
    <ul class="op-user">
        <li><a href="<?php echo home_url('/minha-conta'); ?>">Minha Conta</a></li>
        <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Sair</a></li>
    </ul>

    <?php if(isset($_GET['curso_id'])&&$_GET['curso_id']!="") { ?>
    <ul class="lista-eventos" style="margin-top: 30px;">
        <?php // WP_Query arguments
        $args = array (
            'p'                      => $_GET['curso_id'],
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
            <a href="<?php echo home_url('/modulos/'); ?>?curso_id=<?php echo $post->ID; ?>" class="box-capa"><?php the_post_thumbnail('capa-treinamento'); ?></a>
            <h2 class="tituloEvento"><?php the_title(); ?></h2>
        </li>
        <?php }
        }
        // Restore original Post Data
        wp_reset_postdata(); ?>
    </ul>
    <?php } ?>
</div>