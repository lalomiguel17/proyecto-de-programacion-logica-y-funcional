<?
function AccessLogin($request){
    $login=new Login();
    return $login->AccessLogin($request);
}
class login{
    private $conexion;
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }
    function AccessLogin($request){
        $data=json_decode($request->getbody());
        $correo = $data->correo;
        $pass = $data->pass;
        $response;
        $sql = "SELECT * FROM inicio WHERE usuario = :usuario AND clave = :clave";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":usuario",$usuario);
            $statement->bindParam(":clave",$clave);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Datos correctos";
            }
            else
            {
                $response="Error usuario o contrasena incorrecta";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


    
}