<?php

require_once 'bd.php';

class MunicipioModelo extends BD{

    public function VerMunicipios($datos){

        $arreglo_retorno = array();
        $sql = BD::Conectar()->prepare("SELECT * FROM municipio WHERE id_departamento = :id_departamento");
        $sql->bindParam(':id_departamento', $datos['id_departamento']);
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

}


?>