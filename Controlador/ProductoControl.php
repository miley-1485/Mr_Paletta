<?php
require_once '../Modelo/ProductoModelo.php';
$obj_producto = new ProductoModelo();
$opcion = $_REQUEST["opc"];

if($opcion == 'CrearProducto'){

    $retorno = $obj_producto->CrearProducto($_POST,$_FILES);
    echo $retorno;
}
if($opcion == 'VerProductos'){

    $retorno = $obj_producto->VerProductos($_REQUEST);
    echo $retorno;
}
if($opcion == 'ConsultaGeneralProductos'){

    $retorno = $obj_producto->ConsultaGeneralProductos($_REQUEST);
    echo $retorno;
}
if($opcion == 'AddProducto'){

    $retorno = $obj_producto->AddProducto($_REQUEST);
    echo $retorno;
}
if($opcion == 'EditarProducto'){

    $retorno = $obj_producto->EditarProducto($_POST,$_FILES);
    echo $retorno;
}


?>