<?php 

require_once '../Modelo/PerfilModelo.php';
$obj_perfil = new PerfilModelo();
$opcion = $_REQUEST["opc"];



if($opcion == 'VerPerfiles'){
    $retorno = $obj_perfil->VerPerfiles($_REQUEST);
    echo $retorno;
}