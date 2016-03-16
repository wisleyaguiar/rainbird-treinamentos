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

            $resposta['erro'] = false;
            $resposta['msg'] = "Cadastro realizado com sucesso!";

        }
    }
    echo json_encode($resposta);
    wp_die();
}