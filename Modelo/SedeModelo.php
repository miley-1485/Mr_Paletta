<?php

require_once 'bd.php';

class SedeModelo extends BD{

    public function VerSedes($datos){

        $arreglo_retorno = array();

        $sql = BD::Conectar()->prepare("SELECT sed.id_sede,sed.nombre,sed.direccion,sed.indicaciones,
        mun.nombre as nombre_municipio,dep.nombre as nombre_departamento,sed.estado
        FROM sede sed
        INNER JOIN municipio mun ON mun.id_municipio = sed.id_municipio
        INNER JOIN departamento dep ON dep.id_departamento = mun.id_departamento");

        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as $key => $value) {

            $arreglo_interior = array($value['nombre'],
            $value['nombre_departamento'],
            $value['nombre_municipio'],
            $value['direccion'],
            $value['indicaciones'],
            $value['estado'],
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

    public function CrearSede($datos){

        try {
  
            $sql = BD::Conectar()->prepare("INSERT INTO sede (nombre,direccion,id_municipio,estado,indicaciones) 
                                            VALUES (:nombre,:direccion,:id_municipio,:estado,:indicaciones)");
            $sql->bindParam(':nombre', $datos['nombre']);
            $sql->bindParam(':direccion', $datos['direccion']);
            $sql->bindParam(':id_municipio', $datos['id_municipio']);
            $sql->bindParam(':estado', $datos['estado']);
            $sql->bindParam(':indicaciones', $datos['indicaciones']);
            $sql->execute();
  
            return "ok";
  
        } catch (PDOException $e) {
            return "error";
        }
  
  
    }


}