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
        $correo = $data->correo;
        $pass = $data->pass;
        $response;
        $sql = "SELECT * FROM usuario WHERE correo = :correo AND pass = :pass";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":correo",$correo);
            $statement->bindParam(":pass",$pass);
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