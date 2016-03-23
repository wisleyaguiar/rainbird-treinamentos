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
    wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', false );
}

function treinamentosrb_enqueue_script() {
    wp_enqueue_script( 'prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), false, true );
    wp_enqueue_script( 'mask', get_template_directory_uri() . '/js/jquery.mask.js', array('jquery'), false, true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery','jquery-ui-accordion', 'jquery-ui-tabs'), false, true );
    wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/jqueryvalidate/jquery.validate.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'validate-msg', get_template_directory_uri() . '/js/jqueryvalidate/localization/messages_pt_BR.js', array(), false, true );
    wp_enqueue_script( 'formularios', get_template_directory_uri() . '/js/formularios.js', array('jquery-ui-dialog','jquery'), false, true );
    wp_localize_script( 'formularios', 'ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' )));

}

add_action( 'wp_enqueue_scripts', 'treinamentosrb_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'treinamentosrb_enqueue_script' );

// Miniatura de posts
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    //set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'capa-treinamento', 142, 187, true ); //300 pixels wide (and unlimited height)
}

// Custom Admin Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/RainBirdLogo.gif);
            padding-bottom: 0px;
            background-size:contain;
            width:220px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

//Link na tela de login para a página inicial
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Rain Bird';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// Barra de Títulos das páginas
add_theme_support( 'title-tag' );

// Editor de Estilos
add_editor_style(get_template_directory_uri() . '/css/treinamentos.css');

// Logo do Tema
add_image_size( 'treinamentosrb-logo-size', 300, 150 );
add_theme_support( 'custom-logo', array( 'size' => 'treinamentosrb-logo-size' ) );

// Autenticação função
function custom_login($username,$password) {
    $creds = array();
    $creds['user_login'] = $username;
    $creds['user_password'] = $password;
    $creds['remember'] = true;
    $user = wp_signon( $creds, false );
    if ( is_wp_error($user) )
        return $resposta['msg'] = $user->get_error_message();
}

// Ajax de login
add_action( 'wp_ajax_user_login', 'user_login_callback' );
add_action( 'wp_ajax_nopriv_user_login', 'user_login_callback' );

function user_login_callback() {
    // Recebendo variáveis
    $login = trim(strip_tags($_POST["login"]));
    $senha = trim(strip_tags($_POST["senha"]));

    $resposta['msg'] = "Erros encontrados:";
    $erros = 0;

    if(empty($login) || empty($senha)){
        $erros++;
        $resposta['msg'] .= "Campos obrigatórios não preenchidos.";
    }

    if($erros>0) {
        $resposta['erro'] = true;
    } else {
        $creds = array();
        $creds['user_login'] = $login;
        $creds['user_password'] = $senha;
        $creds['remember'] = true;
        $user = wp_signon( $creds, false );

        // verifica se o nome de usuário ou email já foram usados
        if(is_wp_error($user)){
            $resposta['erro'] = true;
            $resposta['msg'] = $user->get_error_message();
        } else {
            $resposta['erro'] = false;
            $resposta['msg'] = "Login realizado com sucesso!";
        }
    }
    echo json_encode($resposta);
    wp_die();
}


// Temas Opções
require_once "theme-options.php";

// Usuários
require_once "modulos/usuarios.php";
require_once "modulos/treinamentos.php";
require_once "modulos/modulos.php";