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
        $Correo_Electronico = $data->Correo_Electronico;
        $Contraseña = $data->Contraseña;
        $response;
        $sql = "INSERT INTO Usuarios(idUsuario,Nombre,Correo_Electronico,Contraseña)VALUES(:idUsuario,:Nombre,:Correo_Electronico,:Contraseña)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idUsuario",$idUsuario);
            $statement->bindParam(":Nombre",$Nombre);
            $statement->bindParam(":Correo_Electronico",$Correo_Electronico);
            $statement->bindParam(":Contraseña",$Contraseña);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Usuario registrado";
            }
            else
            {
                $response="no se pudo registrar el usuario =(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}