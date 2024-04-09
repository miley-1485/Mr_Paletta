<?php

require_once '../Modelo/DepartamentoModelo.php';
$obj_departamento = new DepartamentoModelo();
$opcion = $_REQUEST["opc"];

if($opcion == 'VerDepartamentos'){
    $retorno = $obj_departamento->VerDepartamentos($_REQUEST);
    echo $retorno;
}
if($opcion == 'CrearDepartamento'){
    $retorno = $obj_departamento->CrearDepartamento($_REQUEST);
    echo $retorno;
}