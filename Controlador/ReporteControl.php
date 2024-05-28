<?php
require_once '../Modelo/Reportes.php';
$obj_reporte = new ReporteModelo();
$opcion = $_REQUEST["opc"];

if($opcion == 'Vendedores'){

    $retorno = $obj_reporte->Vendedores($_POST);
    echo $retorno;
}
?>

