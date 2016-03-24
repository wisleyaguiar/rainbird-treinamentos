<?php
/**
 * Created by PhpStorm.
 * User: wisleyaguiar
 * Date: 24/03/16
 * Time: 16:34
 */

// Register Custom Post Type Certificados
function custom_post_type_certificados() {

    $labels = array(
        'name'                  => _x( 'Certificados', 'Post Type General Name', 'rainbird-treinamentos' ),
        'singular_name'         => _x( 'Certificado', 'Post Type Singular Name', 'rainbird-treinamentos' ),
        'menu_name'             => __( 'Certificados', 'rainbird-treinamentos' ),
        'name_admin_bar'        => __( 'Certificados', 'rainbird-treinamentos' ),
        'archives'              => __( 'Arquivo de Certificados', 'rainbird-treinamentos' ),
        'parent_item_colon'     => __( 'Certificado Pai:', 'rainbird-treinamentos' ),
        'all_items'             => __( 'Todos os Certificados', 'rainbird-treinamentos' ),
        'add_new_item'          => __( 'Criar Novo Certificado', 'rainbird-treinamentos' ),
        'add_new'               => __( 'Criar Certificado', 'rainbird-treinamentos' ),
        'new_item'              => __( 'Novo Certificado', 'rainbird-treinamentos' ),
        'edit_item'             => __( 'Editar Certificado', 'rainbird-treinamentos' ),
        'update_item'           => __( 'Atualizar Certificado', 'rainbird-treinamentos' ),
        'view_item'             => __( 'Ver Certificado', 'rainbird-treinamentos' ),
        'search_items'          => __( 'Buscar Certificado', 'rainbird-treinamentos' ),
        'not_found'             => __( 'Nenhum Certificado', 'rainbird-treinamentos' ),
        'not_found_in_trash'    => __( 'Nenhum certificado na lixeira', 'rainbird-treinamentos' ),
        'featured_image'        => __( 'Featured Image', 'rainbird-treinamentos' ),
        'set_featured_image'    => __( 'Set featured image', 'rainbird-treinamentos' ),
        'remove_featured_image' => __( 'Remove featured image', 'rainbird-treinamentos' ),
        'use_featured_image'    => __( 'Use as featured image', 'rainbird-treinamentos' ),
        'insert_into_item'      => __( 'Insert into item', 'rainbird-treinamentos' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'rainbird-treinamentos' ),
        'items_list'            => __( 'Items list', 'rainbird-treinamentos' ),
        'items_list_navigation' => __( 'Items list navigation', 'rainbird-treinamentos' ),
        'filter_items_list'     => __( 'Filter items list', 'rainbird-treinamentos' ),
    );
    $args = array(
        'label'                 => __( 'Certificado', 'rainbird-treinamentos' ),
        'description'           => __( 'Certificados de Eventos e Cursos', 'rainbird-treinamentos' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'author', 'page-attributes', ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-awards',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'rewrite'               => false,
        'capability_type'       => 'post',
    );
    register_post_type( 'certificado', $args );

}
add_action( 'init', 'custom_post_type_certificados', 0 );