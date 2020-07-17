<?
function AccessLogin($request){
    $login=new Login();
    return $login->AccessLogin($request);
}
class Login{
    private $conexion;
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }
    function AccessLogin($request){
        $data=json_decode($request->getbody());
        $nombre = $data->nombre;
        $clave = $data->clave;
        $response;
        $sql = "SELECT * FROM usuario WHERE nombre = :nombre AND clave = :clave";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":nombre",$nombre);
            $statement->bindParam(":clave",$clave);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Datos insertado de manera correcta =)";
            }
            else
            {
                $response="Uduario incorrecto =(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}