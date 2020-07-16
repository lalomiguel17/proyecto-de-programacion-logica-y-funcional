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
        $sql = "SELECT * FROM usuario WHERE nombre = :nombre AND clave = :clave";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":nombre",$correo);
            $statement->bindParam(":clave",$pass);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Insersion de datos de manera exitosa =)";
            }
            else
            {
                $response="Error =(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


    
}