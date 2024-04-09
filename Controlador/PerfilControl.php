<?php 

require_once '../Modelo/PerfilModelo.php';
$obj_perfil = new PerfilModelo();
$opcion = $_REQUEST["opc"];



if($opcion == 'VerPerfiles'){
    $retorno = $obj_perfil->VerPerfiles($_REQUEST);
    echo $retorno;
}
if($opcion == 'CrearPerfil'){
    $retorno = $obj_perfil->CrearPerfil($_POST);
    echo $retorno;
}
if($opcion == "Perfil"){
    $retorno = $obj_perfil->Perfil($_POST);
    echo $retorno;

}if($opcion == "EditarPerfil"){
    $retorno = $obj_perfil->EditarPerfil($_POST);
    echo $retorno;
}