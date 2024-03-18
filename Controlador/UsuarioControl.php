<?php 

require_once '../Modelo/UsuarioModelo.php';
$obj_usuario = new UsuarioModelo();
$opcion = $_REQUEST["opc"];



if($opcion == 'Login'){
    $retorno = $obj_usuario->Login($_REQUEST);
    

    if(empty($retorno)){
        header('Location: ../index.php?valida=1');
        die();
    }else{
        session_start();
        $_SESSION['usr'] = $retorno;
        header('Location: ../menu.php');

    }
}

/*$retorno_usuario = $obj_usuario->VerUsuario(["camilo" => 'dsadsad']);

var_dump($retorno_usuario);*/


?>