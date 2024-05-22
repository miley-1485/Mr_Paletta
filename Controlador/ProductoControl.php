<?php
require_once '../Modelo/ProductoModelo.php';
$obj_producto = new ProductoModelo();
$opcion = $_REQUEST["opc"];

if($opcion == 'CrearProducto'){

    $retorno = $obj_producto->CrearProducto($_POST,$_FILES);
    echo $retorno;
}

?>