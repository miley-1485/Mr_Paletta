<?php

require_once 'bd.php';


class PerfilModelo extends BD{

    public function AlmacenarPerfil($datos){

    }

    public function VerPerfiles($datos){

        $arreglo_retorno = array();

        $sql = BD::Conectar()->prepare("SELECT * FROM perfil");
        $sql->execute();
        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);



        foreach ($resul as $key => $value) {

            $arreglo_interior = array($value['nombre'],
            'accion');
            array_push($arreglo_retorno, $arreglo_interior);

        }
        $json = json_encode($arreglo_retorno);

        return $json;
    }

    public function ActualizarPerfil($datos){

    }
    

}


?>