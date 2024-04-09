<?php

require_once 'bd.php';

class DepartamentoModelo extends BD{

    public function VerDepartamentos($datos){

        $arreglo_retorno = array();

        $sql = BD::Conectar()->prepare("SELECT * FROM departamento");
        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as $key => $value) {

            $arreglo_interior = array($value['nombre'],
            '<div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              ACCIONES
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#")">Editar</a></li>
            </ul>
          </div>');
            array_push($arreglo_retorno, $arreglo_interior);

        }
        $json = json_encode($arreglo_retorno);

        return $json;
    }

    public function CrearDepartamento($datos){

      try {

          $sql = BD::Conectar()->prepare("INSERT INTO departamento (nombre) VALUES (:nombre)");
          $sql->bindParam(':nombre', $datos['nombre']);
          $sql->execute();

          return "ok";

      } catch (PDOException $e) {
          return "error";
      }


  }

}

?>