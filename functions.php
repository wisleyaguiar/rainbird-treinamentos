<?php
/**
 * Created by PhpStorm.
 * User: wisleyaguiar
 * Date: 12/03/16
 * Time: 10:34
 */

// Carregando estilos e scripts javascript do tema
function treinamentosrb_enqueue_style() {
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css', false );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', false );
    wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', false );
    wp_enqueue_style( 'treinamentos', get_template_directory_uri() . '/css/treinamentos.css', false );
}

function treinamentosrb_enqueue_script() {
    wp_enqueue_script( 'prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), false, true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery','jquery-ui-accordion', 'jquery-ui-tabs'), false, true );
    wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/jqueryvalidate/jquery.validate.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'validate-msg', get_template_directory_uri() . '/js/jqueryvalidate/localization/messages_pt_BR.js', array(), false, true );
    wp_enqueue_script( 'formularios', get_template_directory_uri() . '/js/formularios.js', array('jquery'), false, true );

}

add_action( 'wp_enqueue_scripts', 'treinamentosrb_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'treinamentosrb_enqueue_script' );

// Miniatura de posts
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    //set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    //add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}

// Barra de Títulos das páginas
add_theme_support( 'title-tag' );

// Editor de Estilos
add_editor_style(get_template_directory_uri() . '/css/treinamentos.css');

// Logo do Tema
add_image_size( 'treinamentosrb-logo-size', 300, 150 );
add_theme_support( 'custom-logo', array( 'size' => 'treinamentosrb-logo-size' ) );

// Temas Opções
require_once "theme-options.php";