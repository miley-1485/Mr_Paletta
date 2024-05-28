<?php

require_once 'bd.php';

class VentaModelo extends BD{

    public function AlmacenarVenta($datos){

        date_default_timezone_set('America/Bogota');
        session_start();
        $arreglo_sesion = $_SESSION['usr'];

        try {
  
            $sql = BD::Conectar()->prepare("INSERT INTO venta (id_cliente,id_vendedor,fecha_venta,estado,forma_pago) 
                                            VALUES (:id_cliente,:id_vendedor,:fecha_venta,:estado,:forma_pago)");

           
            $id_usuario = $arreglo_sesion[0]["id_usuario"];

            $sql->bindParam(':id_cliente', $datos['id_cliente']);
            $sql->bindParam(':id_vendedor', $id_usuario);
            $sql->bindParam(':fecha_venta', $datos['fecha_venta']);
            $sql->bindParam(':estado', $datos['estado']);
            $sql->bindParam(':forma_pago', $datos['forma_pago']);
            
            $sql->execute();
            
            $ultimo_id = BD::LastInsertId("venta","id_venta");
            
            for($i = 0; $i < count($datos['productos']); $i++) {
                
                $sql_pro = BD::Conectar()->prepare("SELECT * FROM producto WHERE id_producto = '".$datos['productos'][$i]."'");
                $sql_pro->execute();
                $resul = $sql_pro->fetchAll(PDO::FETCH_ASSOC);
                $valor_unitario = $resul[0]['valor_unitario'];

                

                $id_producto = $datos['productos'][$i];
                
                for ($x = 1; $x <= $datos['cantidades'][$i]; $x++) {

                    $sql_ventp = BD::Conectar()->prepare("INSERT INTO venta_producto (id_venta,id_producto,valor_producto) 
                    VALUES (:id_venta,:id_producto,:valor_producto)");

                    $sql_ventp->bindParam(':id_venta', $ultimo_id);
                    $sql_ventp->bindParam(':id_producto', $id_producto);
                    $sql_ventp->bindParam(':valor_producto', $valor_unitario);

                    $sql_ventp->execute();
                }

                $stock_actual = $resul[0]['cantidad'] - $datos['cantidades'][$i];
                $sql_edt_stock = BD::Conectar()->prepare("UPDATE producto SET cantidad=:cantidad WHERE id_producto=:id_producto");
                $sql_edt_stock->bindParam(':cantidad', $stock_actual);
                $sql_edt_stock->bindParam(':id_producto', $id_producto);

                $sql_edt_stock->execute();

            }


            return "ok";
  
        } catch (PDOException $e) {
            return $e;
        }
        

    }

    public function VerVentas(){

        $arreglo_retorno = array();

        $sql = BD::Conectar()->prepare("SELECT ven.id_venta,cli.nombre_completo AS cliente,us.nombre_completo AS vendedor,ven.fecha_venta,ven.forma_pago,
        SUM(venp.valor_producto) AS total_venta,COUNT(venp.id_venta) AS total_productos,ven.estado
        FROM venta ven
        INNER JOIN cliente cli ON cli.id_cliente = ven.id_cliente
        INNER JOIN usuario us ON us.id_usuario = ven.id_vendedor
        INNER JOIN venta_producto venp ON venp.id_venta = ven.id_venta
        WHERE ven.estado <> 'ELIMINADA'
        GROUP BY ven.id_venta");

        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as $key => $value) {

            $arreglo_interior = array($value['id_venta'],
            $value['fecha_venta'],
            $value['total_productos'],
            number_format($value['total_venta']),
            $value['forma_pago'],
            $value['cliente'],
            $value['vendedor'],
            $value['estado'],      
            '<div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              ACCIONES
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Ver venta</a></li>
            </ul>
          </div>');

          array_push($arreglo_retorno, $arreglo_interior);

        }

        $json = json_encode($arreglo_retorno);

        return $json;

    }
}


?>