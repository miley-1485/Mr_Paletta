<?php

require_once 'config.php';


class BD{

    public function Conectar(){

        $conexion = new PDO('mysql:host='.HOST.';dbname='.BD,USUARIO,PASSWORD);
        return $conexion;
        
    }

    public function EjectuarConsulta($consulta){
        
        $sql = self::Conectar()->prepare($consulta);
        $sql->execute();
        return $sql;
    }

    public function LastInsertId($tabla,$ultimo_id){

        $sql_ul = "SELECT MAX(".$ultimo_id.") AS ultimo_id FROM ".$tabla."";
        $sql_ul = self::Conectar()->prepare($sql_ul);
        $sql_ul->execute();

        $resul_ul = $sql_ul->fetchAll(PDO::FETCH_ASSOC);
        return $resul_ul[0]['ultimo_id'];

    }



}

?>