<?php
/**
 * Created by PhpStorm.
 * User: wisleyaguiar
 * Date: 16/03/16
 * Time: 07:31
 */

add_action( 'wp_ajax_cad_new_user', 'cad_new_user_callback' );
add_action( 'wp_ajax_nopriv_cad_new_user', 'cad_new_user_callback' );

function cad_new_user_callback() {
    // Recebendo variáveis
    $nomeCompleto = trim(strip_tags($_POST["nomeCompleto"]));
    $endereco = trim(strip_tags($_POST["endereco"]));
    $bairro = trim(strip_tags($_POST["bairro"]));
    $cidade = trim(strip_tags($_POST["cidade"]));
    $estado = trim(strip_tags($_POST["estado"]));
    $cep = trim(strip_tags($_POST["cep"]));
    $email = trim(strip_tags($_POST["email"]));
    $telfixo = trim(strip_tags($_POST["telfixo"]));
    $cel = trim(strip_tags($_POST["cel"]));
    $sexo = trim(strip_tags($_POST["sexo"]));
    $cpf = trim(strip_tags($_POST["cpf"]));
    $rg = trim(strip_tags($_POST["rg"]));
    $nome_user = trim(strip_tags($_POST["nome_user"]));
    $senha_user = trim(strip_tags($_POST["senha_user"]));

    $resposta['msg'] = "Erros encontrados:";
    $erros = 0;

    if(empty($nomeCompleto) || empty($endereco) || empty($bairro) || empty($cidade) || empty($estado) || empty($cep) || empty($email) || empty($telfixo) || empty($cel) || empty($sexo) || empty($cpf) || empty($rg) || empty($nome_user) || empty($senha_user)){
        $erros++;
        $resposta['msg'] .= "Campos obrigatórios não preenchidos.";
    }

    if($erros>0) {
        $resposta['erro'] = true;
    } else {
        // Inserindo um usuário a partir dos valores recebidos
        $user_id = wp_insert_user( array(
            'user_login' => $nome_user,
            'user_pass' => $senha_user,
            'user_email' => $email,
            'first_name' => $nomeCompleto,
            'role' => 'author'
        ));
        // verifica se o nome de usuário ou email já foram usados
        if(is_wp_error($user_id)){
            $resposta['msg'] = "Não foi possível finalizar o cadastro. Usuário e/ou Email já cadastrados.";
        } else {
            // Salvando os outros dados
            add_user_meta($user_id, 'endereco', $endereco);
            add_user_meta($user_id, 'bairro', $bairro);
            add_user_meta($user_id, 'cidade', $cidade);
            add_user_meta($user_id, 'estado', $estado);
            add_user_meta($user_id, 'cep', $cep);
            add_user_meta($user_id, 'telfixo', $telfixo);
            add_user_meta($user_id, 'cel', $cel);
            add_user_meta($user_id, 'sexo', $sexo);
            add_user_meta($user_id, 'cpf', $cpf);
            add_user_meta($user_id, 'rg', $rg);

            // Autenticar
            custom_login($nome_user,$senha_user);

            $resposta['erro'] = false;
            $resposta['msg'] = "Cadastro realizado com sucesso!";

        }
    }
    echo json_encode($resposta);
    wp_die();
}

// Salvando Dados de Faturamento

add_action( 'wp_ajax_cad_fatura_user', 'cad_fatura_user_callback' );
add_action( 'wp_ajax_nopriv_cad_fatura_user', 'cad_fatura_user_callback' );

function cad_fatura_user_callback() {
    global $wpdb;
    global $post;
    
    $nomeNota = trim(strip_tags($_POST['nomeNota']));
    $enderecoFatura = trim(strip_tags($_POST['enderecoFatura']));
    $bairroFatura = trim(strip_tags($_POST['bairroFatura']));
    $cidadeFatura = trim(strip_tags($_POST['cidadeFatura']));
    $estadoFatura = trim(strip_tags($_POST['estadoFatura']));
    $cepFatura = trim(strip_tags($_POST['cepFatura']));
    $cnpjFatura = trim(strip_tags($_POST['cnpjFatura']));
    $ieFatura = trim(strip_tags($_POST['ieFatura']));
    $user_id = trim(strip_tags($_POST['user_id']));

    $resposta['msg'] = "Erros encontrados:";
    $erros = 0;

    if(empty($user_id)){
        $erros++;
        $resposta['msg'] .= "ID do usuário faltando.";
    }

    if($erros>0) {
        $resposta['erro'] = true;
    } else {
        // Insere os dados no custom post faturamento


        // verifica se a inserção aconteceu com sucesso.
        if(is_wp_error($user_id)){
            $resposta['msg'] = "Não foi possível finalizar o cadastro. Usuário e/ou Email já cadastrados.";
        } else {


            $resposta['erro'] = false;
            $resposta['msg'] = "Cadastro realizado com sucesso!";

        }
    }
    echo json_encode($resposta);
    wp_die();

}


//add columns to User panel list page
function add_user_columns($column) {
    $column['endereco'] = 'Endereço';
    $column['bairro'] = 'Bairro';
    $column['cidade'] = 'Cidade';
    $column['estado'] = 'Estado';
    $column['cep'] = 'CEP';
    $column['telfixo'] = 'Telefone Fixo';
    $column['cel'] = 'Celular';
    $column['sexo'] = 'Sexo';
    $column['cpf'] = 'CPF';
    $column['rg'] = 'RG';

    return $column;
}
add_filter( 'manage_users_columns', 'add_user_columns' );

//add the data
function add_user_column_data( $val, $column_name, $user_id ) {
    $user = get_userdata($user_id);

    switch ($column_name) {
        case 'endereco' :
            return $user->endereco;
            break;
        case 'bairro' :
            return $user->bairro;
            break;
        case 'cidade' :
            return $user->cidade;
            break;
        case 'estado' :
            return $user->estado;
            break;
        case 'cep' :
            return $user->cep;
            break;
        case 'telfixo' :
            return $user->telfixo;
            break;
        case 'cel' :
            return $user->cel;
            break;
        case 'sexo' :
            return $user->sexo;
            break;
        case 'cpf' :
            return $user->cpf;
            break;
        case 'rg' :
            return $user->rg;
            break;
        default:
    }
    return;
}
add_filter( 'manage_users_custom_column', 'add_user_column_data', 10, 3 );

// Register Custom Post Type
function custom_faturamento() {

    $labels = array(
        'name'                  => _x( 'Faturamentos', 'Post Type General Name', 'rainbird-treinamentos' ),
        'singular_name'         => _x( 'Faturamento', 'Post Type Singular Name', 'rainbird-treinamentos' ),
        'menu_name'             => __( 'Faturamentos', 'rainbird-treinamentos' ),
        'name_admin_bar'        => __( 'Faturamento', 'rainbird-treinamentos' ),
        'archives'              => __( 'Arquivo de Faturas', 'rainbird-treinamentos' ),
        'parent_item_colon'     => __( 'Fatura Pai:', 'rainbird-treinamentos' ),
        'all_items'             => __( 'Todas as Faturas', 'rainbird-treinamentos' ),
        'add_new_item'          => __( 'Novo Dado de Fatura', 'rainbird-treinamentos' ),
        'add_new'               => __( 'Novo dado de Fatura', 'rainbird-treinamentos' ),
        'new_item'              => __( 'Novo dado de Fatura', 'rainbird-treinamentos' ),
        'edit_item'             => __( 'Editar Info. Fatura', 'rainbird-treinamentos' ),
        'update_item'           => __( 'Atualizar Dados Fatura', 'rainbird-treinamentos' ),
        'view_item'             => __( 'Ver dados Fatura', 'rainbird-treinamentos' ),
        'search_items'          => __( 'Buscar dados fatura', 'rainbird-treinamentos' ),
        'not_found'             => __( 'Nenhum dado cadastrado', 'rainbird-treinamentos' ),
        'not_found_in_trash'    => __( 'Nenhum dado na lixeira', 'rainbird-treinamentos' ),
        'featured_image'        => __( 'Imagem Destacada', 'rainbird-treinamentos' ),
        'set_featured_image'    => __( 'Escolher Imagem Destacada', 'rainbird-treinamentos' ),
        'remove_featured_image' => __( 'Remover Imagem Destacada', 'rainbird-treinamentos' ),
        'use_featured_image'    => __( 'Usar como imagem destacada', 'rainbird-treinamentos' ),
        'insert_into_item'      => __( 'Insert into item', 'rainbird-treinamentos' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'rainbird-treinamentos' ),
        'items_list'            => __( 'Items list', 'rainbird-treinamentos' ),
        'items_list_navigation' => __( 'Items list navigation', 'rainbird-treinamentos' ),
        'filter_items_list'     => __( 'Filtrar Dados de Fatura', 'rainbird-treinamentos' ),
    );
    $args = array(
        'label'                 => __( 'Faturamento', 'rainbird-treinamentos' ),
        'description'           => __( 'Informações de Faturamento', 'rainbird-treinamentos' ),
        'labels'                => $labels,
        'supports'              => array( 'author', ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-clipboard',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'rewrite'               => false,
        'capability_type'       => 'page',
    );
    register_post_type( 'faturamento', $args );

}
add_action( 'init', 'custom_faturamento', 0 );

add_filter( 'rwmb_meta_boxes', 'faturamento_meta_boxes' );
function faturamento_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Dados de Faturamento', 'textdomain' ),
        'post_types' => 'faturamento',
        'fields'     => array(
            array(
                'id'   => 'nome_nota',
                'name' => __( 'Nome na Nota', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'endereco_faturamento',
                'name' => __( 'Endereço Completo', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'bairro_fatura',
                'name' => __( 'Bairro', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'cidade_fatura',
                'name' => __( 'Cidade', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'name'        => __( 'Estado', 'your-prefix' ),
                'id'          => "estado_fatura",
                'type'        => 'select',
                // Array of 'value' => 'Label' pairs for select box
                'options'     => array(
                    'AC' => __( 'Acre', 'your-prefix' ),
                    'AL' => __( 'Alagoas', 'your-prefix' ),
                    'AP' => __( 'Amapá', 'your-prefix' ),
                    'AM' => __( 'Amazonas', 'your-prefix' ),
                    'BA' => __( 'Bahia', 'your-prefix' ),
                    'CE' => __( 'Ceará', 'your-prefix' ),
                    'DF' => __( 'Distrito Federal', 'your-prefix' ),
                    'ES' => __( 'Espírito Santo', 'your-prefix' ),
                    'GO' => __( 'Goiás', 'your-prefix' ),
                    'MA' => __( 'Maranhã', 'your-prefix' ),
                    'MS' => __( 'Mato Grosso do Sul', 'your-prefix' ),
                    'MT' => __( 'Mato Grosso', 'your-prefix' ),
                    'MG' => __( 'Minas Gerais', 'your-prefix' ),
                    'PA' => __( 'Pará', 'your-prefix' ),
                    'PB' => __( 'Paraíba', 'your-prefix' ),
                    'PR' => __( 'Paraná', 'your-prefix' ),
                    'PE' => __( 'Pernambuco', 'your-prefix' ),
                    'PI' => __( 'Piauí', 'your-prefix' ),
                    'RJ' => __( 'Rio de Janeiro', 'your-prefix' ),
                    'RN' => __( 'Rio Grande do Norte', 'your-prefix' ),
                    'RS' => __( 'Rio Grande do Sul', 'your-prefix' ),
                    'RO' => __( 'Rondônia', 'your-prefix' ),
                    'RR' => __( 'Roraima', 'your-prefix' ),
                    'SC' => __( 'Santa Catarina', 'your-prefix' ),
                    'SP' => __( 'São Paulo', 'your-prefix' ),
                    'SE' => __( 'Sergipe', 'your-prefix' ),
                    'TO' => __( 'Tocantins', 'your-prefix' ),
                ),
                // Select multiple values, optional. Default is false.
                'multiple'    => false,
                'placeholder' => __( 'Selecione um Estado', 'your-prefix' ),
            ),
            array(
                'id'   => 'cep_fatura',
                'name' => __( 'CEP', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'cnpj_fatura',
                'name' => __( 'CNPJ', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'ie_fatura',
                'name' => __( 'Inscrição Estadual', 'textdomain' ),
                'type' => 'text',
            ),
        ),
    );
    return $meta_boxes;
}

// Colunas de faturamento
add_filter( 'manage_faturamento_posts_columns', 'set_custom_edit_faturamento_columns' );
add_action( 'manage_faturamento_posts_custom_column' , 'custom_faturamento_column', 10, 2 );

function set_custom_edit_compra_columns($columns) {
    unset($columns['title']);
    $columns['author'] = __('Usuário', 'treinamentos-rainbird');
    $columns['nome_nota'] = __('Nome na Nota', 'treinamentos-rainbird');
    $columns['cnpj_fatura'] = __('CNPJ', 'treinamentos-rainbird');
    $columns['date'] = __( 'Data de Cadastro', 'treinamentos-rainbird' );

    return $columns;
}

function custom_compra_column( $column, $post_id ) {
    switch ( $column ) {
        case 'nome_nota' :
            echo rwmb_meta( 'nome_nota' );
            break;

        case 'cnpj_fatura' :
            echo rwmb_meta( 'cnpj_fatura' );
            break;
    }
}