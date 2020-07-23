<?php
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
        $Correo = $data->Correo;
        $Clave = $data->Clave;
        $response;
        $sql = "SELECT * FROM Registros WHERE Correo = :Correo AND Clave = :Clave";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":Correo",$nombre);
            $statement->bindParam(":Clave",$clave);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="has iniciado sesion =)";
            }
            else
            {
                $response="No has iniciado sesion checa tus valores =(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}