<?php
/**
 * Created by PhpStorm.
 * User: wisleyaguiar
 * Date: 24/03/16
 * Time: 13:53
 */

add_action( 'wp_ajax_processar_inscricao', 'processar_inscricao_callback' );
add_action( 'wp_ajax_nopriv_processar_inscricao', 'processar_inscricao_callback' );

function processar_inscricao_callback() {
    // Recebendo variáveis
    

    $resposta['msg'] = "Erros encontrados:";
    $erros = 0;

    if(empty($nomeCompleto)){
        $erros++;
        $resposta['msg'] .= "Campos obrigatórios não preenchidos.";
    }

    if($erros>0) {
        $resposta['erro'] = true;
    } else {
        
        // verifica se o nome de usuário ou email já foram usados
        if(is_wp_error()){
            $resposta['erro'] = true;
            $resposta['msg'] = "";// . $user_id->get_error_message();
        } else {
            // Salvando os outros dados
            

            $resposta['erro'] = false;
            $resposta['msg'] = "Cadastro realizado com sucesso!";

        }
    }
    echo json_encode($resposta);
    wp_die();
}

// Register Custom Post Type Inscrições
function custom_post_type_inscricoes() {

    $labels = array(
        'name'                  => _x( 'Inscrições', 'Post Type General Name', 'rainbird-treinamentos' ),
        'singular_name'         => _x( 'Inscrição', 'Post Type Singular Name', 'rainbird-treinamentos' ),
        'menu_name'             => __( 'Inscrições', 'rainbird-treinamentos' ),
        'name_admin_bar'        => __( 'Inscrições', 'rainbird-treinamentos' ),
        'archives'              => __( 'Arquivo de Inscrições', 'rainbird-treinamentos' ),
        'parent_item_colon'     => __( 'Inscrição Pai:', 'rainbird-treinamentos' ),
        'all_items'             => __( 'Todas as inscrições', 'rainbird-treinamentos' ),
        'add_new_item'          => __( 'Criar Nova Inscrição', 'rainbird-treinamentos' ),
        'add_new'               => __( 'Criar Inscrição', 'rainbird-treinamentos' ),
        'new_item'              => __( 'Nova Inscrição', 'rainbird-treinamentos' ),
        'edit_item'             => __( 'Editar Inscrição', 'rainbird-treinamentos' ),
        'update_item'           => __( 'Atualizar Inscrição', 'rainbird-treinamentos' ),
        'view_item'             => __( 'Ver Inscrição', 'rainbird-treinamentos' ),
        'search_items'          => __( 'Buscar Inscrição', 'rainbird-treinamentos' ),
        'not_found'             => __( 'Nenhuma Inscrição', 'rainbird-treinamentos' ),
        'not_found_in_trash'    => __( 'Nenhuma inscrição na lixeira', 'rainbird-treinamentos' ),
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
        'label'                 => __( 'Inscrição', 'rainbird-treinamentos' ),
        'description'           => __( 'Inscrições de Eventos e Cursos', 'rainbird-treinamentos' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'author', 'page-attributes', ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-tickets-alt',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'rewrite'               => false,
        'capability_type'       => 'post',
    );
    register_post_type( 'inscricao', $args );

}
add_action( 'init', 'custom_post_type_inscricoes', 0 );