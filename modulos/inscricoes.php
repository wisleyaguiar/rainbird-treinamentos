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
    global $post;
    global $wpdb;

    // Recebendo variáveis
    $tipo_curso = trim(strip_tags($_POST['tipo_curso']));
    $curso_id = trim(strip_tags($_POST['curso_id']));
    $user_cad = trim(strip_tags($_POST['user_cad']));

    $resposta['msg'] = "Erros encontrados:";
    $erros = 0;

    if(empty($tipo_curso) || empty($curso_id) || empty($user_cad)){
        $erros++;
        $resposta['msg'] .= "Campos obrigatórios não preenchidos.";
    }

    if($erros>0) {
        $resposta['erro'] = true;
    } else {

        $dados_inscricao = array(
            'post_content'  => '',
            'post_title'    => '',
            'post_status'   => 'pending',
            'post_author'   => $user_cad,
            'post_type'     => 'inscricao'
        );

        $id_inscricao = wp_insert_post( $dados_inscricao, true );

        if(!is_wp_error($id_inscricao)) {
            // Verifica o tipo de curso
            if ($tipo_curso == 'tipo_modulo') {
                // Variáveis deste tipo de curso
                $salas = trim(strip_tags($_POST['salas']));
                $modulos = $_POST['modulo'];
                $modulo_todos = $_POST['modulo_todos'];

                if (!isset($modulo_todos) && $modulo_todos == "") {
                    $total_valores = 0;
                    for ($i=1;$i<=$salas;$i++) {
                        for($j=0;$j<count($modulos[$i]);$j++) {
                            update_post_meta($id_inscricao, 'ins_modulos_curso', get_post($modulos[$i][$j])->post_title, false);
                            update_post_meta($id_inscricao, 'ins_id_modulos_curso', $modulos[$i][$j], false);
                            update_post_meta($id_inscricao, 'ins_valores_curso', $_POST['modulo-' . $modulos[$i][$j] . '-valor'], false);

                            $total_valores = $total_valores + $_POST['modulo-' . $modulos[$i][$j] . '-valor'];
                        }
                    }
                    add_post_meta($id_inscricao,'ins_total_pagamento',$total_valores,true);
                } else {

                    update_post_meta($id_inscricao, 'ins_modulos_curso', 'Todos', false);
                    update_post_meta($id_inscricao, 'ins_id_modulos_curso', 0, false);

                    add_post_meta($id_inscricao,'ins_valores_curso', $_POST['modulo-todos-' . $modulo_todos . '-valor'], false);
                    add_post_meta($id_inscricao,'ins_total_pagamento',$_POST['modulo-todos-' . $modulo_todos . '-valor'],true);
                }
                // Salvando outros dados
                add_post_meta($id_inscricao,'ins_num',(1000 + $id_inscricao),true);
                add_post_meta($id_inscricao,'ins_nome_curso',get_post($curso_id)->post_title,true);
                add_post_meta($id_inscricao,'ins_id_curso',$curso_id,true);
                add_post_meta($id_inscricao,'ins_tipo_curso',$tipo_curso,true);
                add_post_meta($id_inscricao,'ins_salas_curso',$salas,true);

                $resposta['erro'] = false;
                $resposta['msg'] = "Processando inscrição.";

            }
        } else {
            $resposta['erro'] = true;
            $resposta['msg'] = "Não foi possível finalizar a inscrição. Erro: " . $id_inscricao->get_error_message();
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
        'supports'              => array( 'author', 'page-attributes', ),
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

// Campos de inscrições
add_filter( 'rwmb_meta_boxes', 'inscricoes_meta_boxes' );
function inscricoes_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Dados da Inscrição', 'rainbird-treinamentos' ),
        'post_types' => 'inscricao',
        'fields'     => array(
            array(
                'id'   => 'ins_num',
                'name' => __( 'Numero de Inscrição', 'textdomain' ),
                'type' => 'number',
            ),
            array(
                'id'   => 'ins_nome_curso',
                'name' => __( 'Nome do Curso/Treinamento', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'ins_id_curso',
                'name' => __( 'ID Curso/Treinamento', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'ins_tipo_curso',
                'name' => __( 'Tipo do Curso/Treinamento', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'ins_salas_curso',
                'name' => __( 'Salas', 'textdomain' ),
                'type' => 'number',
            ),
            array(
                'id'   => 'ins_modulos_curso',
                'name' => __( 'Nome dos Módulos', 'textdomain' ),
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'id'   => 'ins_id_modulos_curso',
                'name' => __( 'IDs dos Módulos', 'textdomain' ),
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'id'   => 'ins_valores_curso',
                'name' => __( 'Valores', 'textdomain' ),
                'type' => 'text',
                'clone' => false,
            ),
            array(
                'id'   => 'ins_total_pagamento',
                'name' => __( 'Total de Pagamento', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'name'        => __( 'Forma de Pagamento', 'your-prefix' ),
                'id'          => "ins_forma_pagamento",
                'type'        => 'select',
                // Array of 'value' => 'Label' pairs for select box
                'options'     => array(
                    '00' => __( 'Pagamento não escolhido', 'your-prefix' ),
                    '01' => __( 'À vista (TEF e CDC)', 'your-prefix' ),
                    '02' => __( 'Boleto', 'your-prefix' ),
                    '03' => __( 'Cartão de Crédito', 'your-prefix' ),
                ),
                // Select multiple values, optional. Default is false.
                'multiple'    => false,
                'placeholder' => __( 'Select an Item', 'your-prefix' ),
            ),
            array(
                'name'        => __( 'Status Pagamento', 'your-prefix' ),
                'id'          => "ins_status_pagamento",
                'type'        => 'select',
                // Array of 'value' => 'Label' pairs for select box
                'options'     => array(
                    '00' => __( 'Pagamento efetuado', 'your-prefix' ),
                    '01' => __( 'Pagamento não finalizado', 'your-prefix' ),
                    '02' => __( 'Erro no processo de consulta', 'your-prefix' ),
                    '03' => __( 'Pagamento não localizado', 'your-prefix' ),
                    '04' => __( 'Boleto emitido com sucesso', 'your-prefix' ),
                    '05' => __( 'Pagamento efetuado, aguardando compensação', 'your-prefix' ),
                    '06' => __( 'Pagamento não compensado', 'your-prefix' ),
                ),
                // Select multiple values, optional. Default is false.
                'multiple'    => false,
                'placeholder' => __( 'Select an Item', 'your-prefix' ),
            ),
            array(
                'name'       => __( 'Data de Pagamento', 'your-prefix' ),
                'id'         => "ins_data_pagamento",
                'type'       => 'date',
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText'      => __( 'Formato do banco (ddmmyyyy)', 'your-prefix' ),
                    'dateFormat'      => __( 'ddmmyyyy', 'your-prefix' ),
                    'changeMonth'     => true,
                    'changeYear'      => true,
                    'showButtonPanel' => true,
                ),
            ),
            array(
                'name'        => __( 'Status da Inscrição', 'your-prefix' ),
                'id'          => "ins_status_inscricao",
                'type'        => 'select',
                // Array of 'value' => 'Label' pairs for select box
                'options'     => array(
                    '00' => __( 'Confirmada', 'your-prefix' ),
                    '01' => __( 'Suspensa', 'your-prefix' ),
                    '02' => __( 'Cancelada', 'your-prefix' ),
                    '03' => __( 'Pendente', 'your-prefix' ),
                ),
                // Select multiple values, optional. Default is false.
                'multiple'    => false,
                'placeholder' => __( 'Select an Item', 'your-prefix' ),
            ),
        ),
    );
    return $meta_boxes;
}