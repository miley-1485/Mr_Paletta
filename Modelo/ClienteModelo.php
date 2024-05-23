<?php

require_once 'bd.php';

class ClienteModelo extends BD{

    public function CrearCliente($datos){

        date_default_timezone_set('America/Bogota');
        session_start();
        $arreglo_sesion = $_SESSION['usr'];

        try {
  
            $sql = BD::Conectar()->prepare("INSERT INTO cliente (identificacion_cliente,correo,sexo,id_municipio,direccion,id_usr_creo,telefono,nombre_completo,fecha_nacimiento) 
                                            VALUES (:identificacion_cliente,:correo,:sexo,:id_municipio,:direccion,:id_usr_creo,:telefono,:nombre_completo,:fecha_nacimiento)");

           
            $id_usuario = $arreglo_sesion[0]["id_usuario"];

            $sql->bindParam(':identificacion_cliente', $datos['identificacion_cliente']);
            $sql->bindParam(':correo', $datos['correo']);
            $sql->bindParam(':sexo', $datos['sexo']);
            $sql->bindParam(':id_municipio', $datos['id_municipio']);
            $sql->bindParam(':direccion', $datos['direccion']);
            $sql->bindParam(':id_usr_creo', $id_usuario);
            $sql->bindParam(':telefono', $datos['telefono']);
            $sql->bindParam(':nombre_completo', $datos['nombre_completo']);
            $sql->bindParam(':fecha_nacimiento', $datos['fecha_nacimiento']); 
            
            $sql->execute();
  
            return "ok";
  
        } catch (PDOException $e) {
            return $e;
        }

    }

    public function VerClientes($datos){

        $arreglo_retorno = array();

        $sql = BD::Conectar()->prepare("SELECT cli.*,mun.nombre AS municipio,dep.nombre AS departamento
        FROM cliente cli
        LEFT JOIN municipio mun ON mun.id_municipio = cli.id_municipio
        LEFT JOIN departamento dep ON dep.id_departamento = mun.id_departamento");

        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as $key => $value) {

            $arreglo_interior = array($value['nombre_completo'],
            $value['correo'],
            $value['telefono'],
            $value['identificacion_cliente'],
            $value['sexo'],
            $value['municipio']." - ".$value['departamento'],    
            '<div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              ACCIONES
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Editar</a></li>
            </ul>
          </div>');

          array_push($arreglo_retorno, $arreglo_interior);

        }

        $json = json_encode($arreglo_retorno);

        return $json;


    }


}