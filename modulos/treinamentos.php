<?php
/**
 * Created by PhpStorm.
 * User: wisleyaguiar
 * Date: 23/03/16
 * Time: 05:42
 */

// Register Custom Post Type Treinamentos
function custom_treinamentos() {

    $labels = array(
        'name'                  => _x( 'Treinamentos', 'Post Type General Name', 'rainbird-treinamentos' ),
        'singular_name'         => _x( 'Treinamento', 'Post Type Singular Name', 'rainbird-treinamentos' ),
        'menu_name'             => __( 'Treinamentos', 'rainbird-treinamentos' ),
        'name_admin_bar'        => __( 'Treinamento', 'rainbird-treinamentos' ),
        'archives'              => __( 'Treinamentos Arquivados', 'rainbird-treinamentos' ),
        'parent_item_colon'     => __( 'Treinamento Pai:', 'rainbird-treinamentos' ),
        'all_items'             => __( 'Todos os Treinamentos', 'rainbird-treinamentos' ),
        'add_new_item'          => __( 'Criar Novo Treinamento', 'rainbird-treinamentos' ),
        'add_new'               => __( 'Criar Treinamento', 'rainbird-treinamentos' ),
        'new_item'              => __( 'Novo Treinamento', 'rainbird-treinamentos' ),
        'edit_item'             => __( 'Editar Treinamento', 'rainbird-treinamentos' ),
        'update_item'           => __( 'Atualizar Treinamento', 'rainbird-treinamentos' ),
        'view_item'             => __( 'Ver Treinamento', 'rainbird-treinamentos' ),
        'search_items'          => __( 'Buscar Treinamento', 'rainbird-treinamentos' ),
        'not_found'             => __( 'Nenhum treinamento encontrado', 'rainbird-treinamentos' ),
        'not_found_in_trash'    => __( 'Nenhum treinamento na lixeira', 'rainbird-treinamentos' ),
        'featured_image'        => __( 'Capa do Treinamento', 'rainbird-treinamentos' ),
        'set_featured_image'    => __( 'Escolher capa de Treinamento', 'rainbird-treinamentos' ),
        'remove_featured_image' => __( 'Remover capa de Treinamento', 'rainbird-treinamentos' ),
        'use_featured_image'    => __( 'Usar como capa de Treinamento', 'rainbird-treinamentos' ),
        'insert_into_item'      => __( 'Insert into item', 'rainbird-treinamentos' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'rainbird-treinamentos' ),
        'items_list'            => __( 'Items list', 'rainbird-treinamentos' ),
        'items_list_navigation' => __( 'Items list navigation', 'rainbird-treinamentos' ),
        'filter_items_list'     => __( 'Filter items list', 'rainbird-treinamentos' ),
    );
    $args = array(
        'label'                 => __( 'Treinamento', 'rainbird-treinamentos' ),
        'description'           => __( 'Treinamentos Cadastrados', 'rainbird-treinamentos' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'page-attributes', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-hammer',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'treinamento', $args );

}
add_action( 'init', 'custom_treinamentos', 0 );

// Variáveis customizadas dos treinamentos
add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
function your_prefix_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Dados do Treinamento/Curso', 'textdomain' ),
        'post_types' => 'treinamento',
        'fields'     => array(
            array(
                'id'      => 'tipo_treinamento',
                'name'    => __( 'Tipo do Treinamento/Curso', 'textdomain' ),
                'type'    => 'radio',
                'options' => array(
                    'tipo_modulo' => __( 'Com Módulos', 'textdomain' ),
                    'tipo_simples' => __( 'Simples', 'textdomain' ),
                ),
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Local', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "local_treinamento",
                'type'  => 'text'
            ),
            array(
                'name'       => __( 'Data de Início', 'your-prefix' ),
                'id'         => "data_inicio_treinamento",
                'type'       => 'date',
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText'      => __( '(dd-mm-yyyy)', 'your-prefix' ),
                    'dateFormat'      => __( 'dd-mm-yy', 'your-prefix' ),
                    'changeMonth'     => true,
                    'changeYear'      => true,
                    'showButtonPanel' => true,
                ),
            ),
            array(
                'name'       => __( 'Data de Termino', 'your-prefix' ),
                'id'         => "data_termino_treinamento",
                'type'       => 'date',
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText'      => __( '(dd-mm-yyyy)', 'your-prefix' ),
                    'dateFormat'      => __( 'dd-mm-yy', 'your-prefix' ),
                    'changeMonth'     => true,
                    'changeYear'      => true,
                    'showButtonPanel' => true,
                ),
            ),
        ),
    );

    $meta_boxes[] = array(
        'title'      => __( 'Caso o curso seja SIMPLES, preencher:', 'textdomain' ),
        'post_types' => 'treinamento',
        'fields'     => array(
            array(
                'name'       => __( 'Horário de Início', 'your-prefix' ),
                'id'         => 'horario_inicio',
                'type'       => 'time',
                // jQuery datetime picker options.
                // For date options, see here http://api.jqueryui.com/datepicker
                // For time options, see here http://trentrichardson.com/examples/timepicker/
                'js_options' => array(
                    'stepHour' => 8,
                    'stepMinute' => 0,
                ),
            ),
            array(
                'name'       => __( 'Horário de Término', 'your-prefix' ),
                'id'         => 'horario_termino',
                'type'       => 'time',
                // jQuery datetime picker options.
                // For date options, see here http://api.jqueryui.com/datepicker
                // For time options, see here http://trentrichardson.com/examples/timepicker/
                'js_options' => array(
                    'stepHour' => 8,
                    'stepMinute' => 0,
                ),
            ),
            // HEADING
            array(
                'type' => 'heading',
                'name' => __( 'Valores', 'your-prefix' ),
                'desc' => __( 'Valores do curso de acordo com opção de hospedagem ou não', 'your-prefix' ),
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Apto. solteiro', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "valor_apto_solteiro",
                // Field description (optional)
                'desc'  => __( 'Inserir valores absolutos sem virgula. Separar moedas com ponto (.): Ex: 1200.50', 'your-prefix' ),
                'type'  => 'text'
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Apto. duplo', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "valor_apto_duplo",
                // Field description (optional)
                'desc'  => __( 'Inserir valores absolutos sem virgula. Separar moedas com ponto (.): Ex: 1200.50', 'your-prefix' ),
                'type'  => 'text'
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Sem hospedagem', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "valor_sem_hospedagem",
                // Field description (optional)
                'desc'  => __( 'Inserir valores absolutos sem virgula. Separar moedas com ponto (.): Ex: 1200.50', 'your-prefix' ),
                'type'  => 'text'
            ),
        ),
    );

    return $meta_boxes;
}