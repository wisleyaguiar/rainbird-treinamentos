<?php
/**
 * Created by PhpStorm.
 * User: wisleyaguiar
 * Date: 22/03/16
 * Time: 21:16
 */

if(get_current_user_id()==0){
    echo '<script>alert("Usuário não autenticado!");</script>';
    echo '<script>window.open("' . get_option("urlsite2") . '/treinamentos","_self");</script>';
    exit;
} else {
    $user_dados = get_user_by('id', get_current_user_id());
}