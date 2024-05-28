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

    public function VerProductos($datos){

        $arreglo_retorno = array();

        $sql = BD::Conectar()->prepare("SELECT * FROM producto");
        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as $key => $value) {

            $arreglo_interior = array($value['nombre_producto'],
            $value['cantidad'],
            $value['valor_unitario'],
            $value['descripcion'],
            $value['receta'],
            $value['estado'],
            '<div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              ACCIONES
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" onclick="VistaEditarProducto('.$value['id_producto'].')">Editar</a></li>
              <li><a class="dropdown-item" href="#" onclick="VistaDetalleProducto('.$value['id_producto'].')">Ver detalle</a></li>
            </ul>
          </div>');

          array_push($arreglo_retorno, $arreglo_interior);

        }

        $json = json_encode($arreglo_retorno);

        return $json;
    }

    public function ConsultaGeneralProductos(){

        $arreglo_retorno = array();

        $sql = BD::Conectar()->prepare("SELECT * FROM producto WHERE estado = 'AC' AND cantidad >= 1");

        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as $key => $value) {
            $arreglo_interior = array(
              "id_producto"=>$value['id_producto'],
              "nombre_producto" =>$value['nombre_producto'],
              "cantidad" =>$value['cantidad']
            );
            array_push($arreglo_retorno, $arreglo_interior);
    
        }
        $json = json_encode($arreglo_retorno);
    
        return $json;

    }

    public function AddProducto($datos){

        $sql = BD::Conectar()->prepare("SELECT * FROM producto WHERE id_producto=:id_producto");
        $sql->bindParam(':id_producto', $datos['id_producto']);
        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        $json = json_encode($resul[0]);
    
        return $json;
    }

    public function EditarProducto($datos,$files_data){

        date_default_timezone_set('America/Bogota');
        session_start();
        $arreglo_sesion = $_SESSION['usr'];


        if(@$datos["foto"] != "no"){

            if ($files_data['foto']['error'] == 0) {

                $extension = pathinfo($files_data["foto"]["name"], PATHINFO_EXTENSION);
                $name = date('Ymdhis') . "_producto.".$extension;
                $move = move_uploaded_file($files_data['foto']['tmp_name'], '../documentos/' . $name);
                
                if(!$move){
                   return "error"; 
                }

            }else{

                return "error";
            }

        }

        try {

            $sql_update = "";

            if(@$datos['foto'] == 'no'){
                $sql_update = "UPDATE producto SET nombre_producto = :nombre_producto,
                                                   descripcion =:descripcion,
                                                   receta =:receta,
                                                   valor_unitario=:valor_unitario,
                                                   usr_creo=:usr_creo,
                                                   cantidad=:cantidad,
                                                   estado=:estado
                                WHERE id_producto =:id_producto";
            }else{
            
                $sql_update = "UPDATE producto SET nombre_producto = :nombre_producto,
                                                   descripcion =:descripcion,
                                                   receta =:receta,
                                                   valor_unitario=:valor_unitario,
                                                   usr_creo=:usr_creo,
                                                   cantidad=:cantidad,
                                                   estado=:estado,
                                                   foto='".$name."'
                                WHERE id_producto =:id_producto";
            }
  
            $sql = BD::Conectar()->prepare($sql_update);

           
            $id_usuario = $arreglo_sesion[0]["id_usuario"];

            $sql->bindParam(':nombre_producto', $datos['nombre_producto']);
            $sql->bindParam(':descripcion', $datos['descripcion']);
            $sql->bindParam(':receta', $datos['receta']);
            $sql->bindParam(':valor_unitario', $datos['valor_unitario']);
            $sql->bindParam(':usr_creo', $id_usuario);
            $sql->bindParam(':cantidad', $datos['cantidad']);
            $sql->bindParam(':estado', $datos['estado']);
            $sql->bindParam(':id_producto', $datos['id_producto']);

            $sql->execute();
  
            return "ok";
  
        } catch (PDOException $e) {
            return $e;
        }

    }

}