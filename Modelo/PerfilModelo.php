<?php

require_once 'bd.php';


class PerfilModelo extends BD{

    public function VerPerfiles($datos){

        $arreglo_retorno = array();

        $sql = BD::Conectar()->prepare("SELECT * FROM perfil");
        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as $key => $value) {

            $arreglo_interior = array($value['nombre'],
            $value['estado'],
            '<div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              ACCIONES
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" onclick="VistaEditarPerfil('.$value['id_perfil'].')">Editar</a></li>
              <li><a class="dropdown-item" href="#">Asignar permisos</a></li>
            </ul>
          </div>');
            array_push($arreglo_retorno, $arreglo_interior);

        }
        $json = json_encode($arreglo_retorno);

        return $json;
    }

    public function CrearPerfil($datos){

        try {

            $sql = BD::Conectar()->prepare("INSERT INTO perfil (nombre,estado) VALUES (:nombre,:estado)");
            $sql->bindParam(':nombre', $datos['nombre']);
            $sql->bindParam(':estado', $datos['estado']);
            $sql->execute();

            return "ok";

        } catch (PDOException $e) {
            return "error";
        }


    }


    public function Perfil($datos){

        $sql = BD::Conectar()->prepare("SELECT * FROM perfil WHERE id_perfil = :id_perfil");
        $sql->bindParam(':id_perfil', $datos['id_perfil']);
        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        $json = json_encode($resul);

        return $json;
    }


    public function EditarPerfil($datos){

        try {

            $sql = BD::Conectar()->prepare("UPDATE perfil SET nombre=:nombre,estado=:estado WHERE id_perfil=:id_perfil");
            $sql->bindParam(':nombre', $datos['nombre']);
            $sql->bindParam(':estado', $datos['estado']);
            $sql->bindParam(':id_perfil', $datos['id_perfil']);
            $sql->execute();

            return "ok";

        } catch (PDOException $e) {
            return "error";
        }
    }
    

}


?>