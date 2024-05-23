<?php
require_once '../Modelo/ClienteModelo.php';
$obj_cliente = new ClienteModelo();
$opcion = $_REQUEST["opc"];

if($opcion == 'CrearCliente'){
    $retorno = $obj_cliente->CrearCliente($_POST);
    echo $retorno;
}
if($opcion == 'VerClientes'){
    $retorno = $obj_cliente->VerClientes($_POST);
    echo $retorno;
}


?>
