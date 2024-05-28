<?php

require_once 'bd.php';

class ReporteModelo extends BD{

    public function Vendedores($datos){

        $arreglo_retorno = array();

        $sql = BD::Conectar()->prepare("SELECT us.id_usuario,us.nombre_completo as vendedor,count(ve.id_vendedor) AS numero_ventas
        FROM venta ve
        INNER JOIN usuario us ON us.id_usuario = ve.id_vendedor 
        WHERE ve.estado = 'FINALIZADA'
        AND fecha_venta BETWEEN '".$datos['fecha_inicial']."' AND '".$datos['fecha_final']."'
        GROUP BY us.id_usuario
        ORDER BY numero_ventas DESC");
        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as &$valor) {
            
            $sql2 = BD::Conectar()->prepare("SELECT SUM(vp.valor_producto) AS total
            FROM venta ve
            INNER JOIN usuario us ON us.id_usuario = ve.id_vendedor 
            INNER JOIN venta_producto vp ON vp.id_venta = ve.id_venta
            WHERE ve.estado = 'FINALIZADA'
            AND fecha_venta BETWEEN '".$datos['fecha_inicial']."' AND '".$datos['fecha_final']."'
            AND us.id_usuario = '".$valor['id_usuario']."'
            GROUP BY us.id_usuario ");
            $sql2->execute();
            $resul2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
            $total = $resul2[0];

            
          $arreglo_interior = array("vendedor"=>$valor["vendedor"],
                                    "numero_ventas"=>$valor["numero_ventas"],
                                    "total"=>number_format($total["total"]));

          array_push($arreglo_retorno, $arreglo_interior);

            
        }

        $json = json_encode($arreglo_retorno);

        return $json;

    
    }

}