<?

require_once 'config.php';


class BD{

    public function Conectar(){

        $conexion = new PDO('mysql:host='.HOST.';dbname='.BD,USUARIO,PASSWORD);
        $conexion->exec("SET CHARSET SET utf8");
        return $conexion;
        
    }

    public function EjectuarConsulta($consulta){
        
        $sql = self::Conectar()->prepare($consulta);
        $sql->execute();
        return $sql;
    }



}

?>