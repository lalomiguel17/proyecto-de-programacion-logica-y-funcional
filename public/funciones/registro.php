<?php
    function AccessRegistro($request){
        $registro=new Registro();
        return $registro->AccessPaciente($request);
    }
    class Registro{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessRegistro($request){
        $data=json_decode($request->getbody());
        $idUsuario = $data->idUsuario;
        $Nombre = $data->Nombre;
        $Correo = $data->Correo;
        $Clave = $data->Clave;
        $response;
        $sql = "INSERT INTO Registros(idUsuario,Nombre,Correo,Clave)VALUES(:idUsuario,:Nombre,:Correo,:Clave)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idUsuario",$idUsuario);
            $statement->bindParam(":Nombre",$Nombre);
            $statement->bindParam(":Correo",$Correo);
            $statement->bindParam(":Clave",$Clave);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Paciente registrado =)";
            }
            else
            {
                $response="no se registro el paciente=(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}