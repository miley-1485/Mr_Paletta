<?php

require_once '../Modelo/SedeModelo.php';
$obj_sede = new SedeModelo();
$opcion = $_REQUEST["opc"];

if($opcion == 'VerSedes'){
    $retorno = $obj_sede->VerSedes($_REQUEST);
    echo $retorno;
}
if($opcion == 'CrearSede'){
    $retorno = $obj_sede->CrearSede($_REQUEST);
    echo $retorno;
}