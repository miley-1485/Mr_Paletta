<?php

require_once '../Modelo/MunicipioModelo.php';
$obj_municipio = new MunicipioModelo();
$opcion = $_REQUEST["opc"];

if($opcion == 'VerMunicipios'){
    $retorno = $obj_municipio->VerMunicipios($_REQUEST);
    echo $retorno;
}