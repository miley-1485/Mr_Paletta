<?php
require_once 'bd.php';


class UsuarioModelo extends BD{

    /*public function VerUsuario($datos){

        $sql = BD::Conectar()->prepare("SELECT * FROM usuario");
        $sql->execute();
        $arreglo_retorno = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $arreglo_retorno;
    }*/

    public function Login($datos){

        $clave = hash('sha512', $datos["clave"]);
        $parametros = array(":correo_electronico" => $datos["correo"],
        ":clave"=>$clave);

        $sql = BD::Conectar()->prepare("SELECT * FROM usuario WHERE correo_electronico=:correo_electronico AND clave=:clave");
        $sql->execute($parametros);

        $resul = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resul;

    }
    

}

?>