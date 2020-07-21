<?php
    function AccessUsuario($request){
        $usuario=new Usuario();
        return $usuario->AccessUsuario($request);
    }
    
    class Usuario{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessUsuario($request){
        $data=json_decode($request->getbody());
        $idUsuario = $data->idUsuario;
        $Nombre = $data->Nombre;
        $Correo_Electronico=$data->Correo_Electronico;
        $Clave=$data->Clave;
        $response;
        $sql = "INSERT INTO Usuarios(idUsuario,Nombre,Correo_Electronico,Clave)VALUES(:idUsuario,:Nombre,:Correo_Electronico,:Clave)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idUsuario",$idUsuario);
            $statement->bindParam(":Nombre",$Nombre);
            $statement->bindParam(":Correo_Electronico",$Correo_Electronico);
            $statement->bindParam(":Clave",$Clave);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Tratamiento registrado";
            }
            else
            {
                $response="no se registro el tratamiento =(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}