<?php
require_once '../Modelo/VentaModelo.php';
$obj_venta = new VentaModelo();
$opcion = $_REQUEST["opc"];

if($opcion == 'AlmacenarVenta'){
    $retorno = $obj_venta->AlmacenarVenta($_POST);
    echo $retorno;
}
if($opcion == 'VerVentas'){
    $retorno = $obj_venta->VerVentas($_POST);
    echo $retorno;
}



?>
