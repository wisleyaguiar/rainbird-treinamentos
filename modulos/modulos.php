<?php
/**
 * Created by PhpStorm.
 * User: wisleyaguiar
 * Date: 23/03/16
 * Time: 07:08
 */

// Register Custom Post Type Módulos
function custom_post_type_modulos() {

    $labels = array(
        'name'                  => _x( 'Módulos', 'Post Type General Name', 'rainbird-treinamentos' ),
        'singular_name'         => _x( 'Módulo', 'Post Type Singular Name', 'rainbird-treinamentos' ),
        'menu_name'             => __( 'Módulos', 'rainbird-treinamentos' ),
        'name_admin_bar'        => __( 'Módulos', 'rainbird-treinamentos' ),
        'archives'              => __( 'Arquivo de Módulos', 'rainbird-treinamentos' ),
        'parent_item_colon'     => __( 'Módulo Pai:', 'rainbird-treinamentos' ),
        'all_items'             => __( 'Todos os Módulos', 'rainbird-treinamentos' ),
        'add_new_item'          => __( 'Criar Novo Módulo', 'rainbird-treinamentos' ),
        'add_new'               => __( 'Criar Módulo', 'rainbird-treinamentos' ),
        'new_item'              => __( 'Novo Módulo', 'rainbird-treinamentos' ),
        'edit_item'             => __( 'Editar Módulo', 'rainbird-treinamentos' ),
        'update_item'           => __( 'Atualizar Módulo', 'rainbird-treinamentos' ),
        'view_item'             => __( 'Ver Módulo', 'rainbird-treinamentos' ),
        'search_items'          => __( 'Buscar Módulo', 'rainbird-treinamentos' ),
        'not_found'             => __( 'Nenhum módulo encontrado', 'rainbird-treinamentos' ),
        'not_found_in_trash'    => __( 'Nenhum módulo na lixeira', 'rainbird-treinamentos' ),
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
        'label'                 => __( 'Módulo', 'rainbird-treinamentos' ),
        'description'           => __( 'Módulos dos Treinamentos', 'rainbird-treinamentos' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'page-attributes', ),
        'taxonomies'            => array( 'sala' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-networking',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'rewrite'               => false,
        'capability_type'       => 'page',
    );
    register_post_type( 'modulo', $args );

}
add_action( 'init', 'custom_post_type_modulos', 0 );

// Register Custom Taxonomy Salas
function custom_taxonomy_salas() {

    $labels = array(
        'name'                       => _x( 'Salas', 'Taxonomy General Name', 'treinamentos-rainbird' ),
        'singular_name'              => _x( 'Sala', 'Taxonomy Singular Name', 'treinamentos-rainbird' ),
        'menu_name'                  => __( 'Sala', 'treinamentos-rainbird' ),
        'all_items'                  => __( 'Todas as Salas', 'treinamentos-rainbird' ),
        'parent_item'                => __( 'Sala Pai', 'treinamentos-rainbird' ),
        'parent_item_colon'          => __( 'Sala Pai:', 'treinamentos-rainbird' ),
        'new_item_name'              => __( 'Nova Sala', 'treinamentos-rainbird' ),
        'add_new_item'               => __( 'Criar Nova Sala', 'treinamentos-rainbird' ),
        'edit_item'                  => __( 'Editar Sala', 'treinamentos-rainbird' ),
        'update_item'                => __( 'Atualizar Sala', 'treinamentos-rainbird' ),
        'view_item'                  => __( 'Ver Sala', 'treinamentos-rainbird' ),
        'separate_items_with_commas' => __( 'Separar salas por vírgula', 'treinamentos-rainbird' ),
        'add_or_remove_items'        => __( 'Criar ou Remover Salas', 'treinamentos-rainbird' ),
        'choose_from_most_used'      => __( 'Escolher Salas Mais Usadas', 'treinamentos-rainbird' ),
        'popular_items'              => __( 'Salas Populares', 'treinamentos-rainbird' ),
        'search_items'               => __( 'Buscar Salas', 'treinamentos-rainbird' ),
        'not_found'                  => __( 'Nenhuma Sala', 'treinamentos-rainbird' ),
        'no_terms'                   => __( 'Sem Salas', 'treinamentos-rainbird' ),
        'items_list'                 => __( 'Lista de Salas', 'treinamentos-rainbird' ),
        'items_list_navigation'      => __( 'Navegar Lista de Salas', 'treinamentos-rainbird' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => false,
    );
    register_taxonomy( 'sala', array( 'modulo' ), $args );

}
add_action( 'init', 'custom_taxonomy_salas', 0 );

// Variáveis customizadas dos modulos
add_filter( 'rwmb_meta_boxes', 'modulos_meta_boxes' );
function modulos_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'title'      => __( 'Dados do Módulo', 'textdomain' ),
        'post_types' => 'modulo',
        'fields'     => array(
            array(
                'name'        => __( 'Treinamento/Curso Associado', 'your-prefix' ),
                'id'          => "curso_associado",
                'type'        => 'post',
                // Post type
                'post_type'   => 'treinamento',
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type'  => 'select_advanced',
                'placeholder' => __( 'Select an Item', 'your-prefix' ),
                // Query arguments (optional). No settings means get all published posts
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => - 1,
                ),
            ),
            array(
                // Field name - Will be used as label
                'name'  => __( 'Código do Módulo', 'your-prefix' ),
                // Field ID, i.e. the meta key
                'id'    => "cod_modulo",
                'type'  => 'text'
            ),
            // HEADING
            array(
                'type' => 'heading',
                'name' => __( 'Data e Horário', 'your-prefix' ),
                'desc' => __( 'Data e Horário do Módulo', 'your-prefix' ),
            ),
            array(
                'name'       => __( 'Data de Início', 'your-prefix' ),
                'id'         => "data_inicio_modulo_1",
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
                'name'       => __( 'Horário de Início', 'your-prefix' ),
                'id'         => 'horario_inicio_modulo_1',
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
                'id'         => 'horario_termino_modulo_1',
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
                'name' => __( 'Data e Horário (opcional)', 'your-prefix' ),
                'desc' => __( 'Data e Horário do Módulo', 'your-prefix' ),
            ),
            array(
                'name'       => __( 'Data de Início', 'your-prefix' ),
                'id'         => "data_inicio_modulo_2",
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
                'name'       => __( 'Horário de Início', 'your-prefix' ),
                'id'         => 'horario_inicio_modulo_2',
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
                'id'         => 'horario_termino_modulo_2',
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
            // NUMBER
            array(
                'name' => __( '% do Desconto à Vista', 'your-prefix' ),
                'id'   => "num_desc_vista",
                'type' => 'number',
                'min'  => 0,
                'step' => 5,
            ),
        ),
    );

    return $meta_boxes;
}

// Colunas