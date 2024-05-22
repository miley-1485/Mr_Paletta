<?php

require_once 'bd.php';

class ProductoModelo extends BD{

    public function CrearProducto($datos,$files_data){

        date_default_timezone_set('America/Bogota');
        session_start();
        $arreglo_sesion = $_SESSION['usr'];

        if ($files_data['foto']['error'] == 0) {

            $extension = pathinfo($files_data["foto"]["name"], PATHINFO_EXTENSION);
            $name = date('Ymdhis') . "_producto.".$extension;

            $move = move_uploaded_file($files_data['foto']['tmp_name'], '../documentos/' . $name);

            if ($move) {

                try {
  
                    $sql = BD::Conectar()->prepare("INSERT INTO producto (nombre_producto,descripcion,receta,foto,valor_unitario,usr_creo,cantidad,estado) 
                                                    VALUES (:nombre_producto,:descripcion,:receta,:foto,:valor_unitario,:usr_creo,:cantidad,:estado)");

                   
                    $id_usuario = $arreglo_sesion[0]["id_usuario"];

                    $sql->bindParam(':nombre_producto', $datos['nombre_producto']);
                    $sql->bindParam(':descripcion', $datos['descripcion']);
                    $sql->bindParam(':receta', $datos['receta']);
                    $sql->bindParam(':foto', $name);
                    $sql->bindParam(':valor_unitario', $datos['valor_unitario']);
                    $sql->bindParam(':usr_creo', $id_usuario);
                    $sql->bindParam(':cantidad', $datos['cantidad']);
                    $sql->bindParam(':estado', $datos['estado']);

                    $sql->execute();
          
                    return "ok";
          
                } catch (PDOException $e) {
                    return $e;
                }


            }else{
                return "error";
            }

        }else{

            return "error";
        }



    }

}