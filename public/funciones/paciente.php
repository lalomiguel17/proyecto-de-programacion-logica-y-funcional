<?php
function AccessPaciente($request){
    $paciente=new Paciente();
    return $paciente->AccessPaciente($request);
}

class Paciente{
    private $conexion;
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

function AccessPaciente($request){
   //$id=$_POST["idpaciente"];
   $pacientes;
   $response;
   $paciente=json_decode($request->getBody());
   $sql="INSERT INTO Pacientes(idPaciente,Nombre,Edad,Sexo,Direccion) VALUES(:idPaciente,:Nombre,:Edad,:Sexo,:Direccion)";    
   try{            
       $statement=$this->conexion->prepare($sql);
       $statement->bindParam("idPaciente",$paciente->idPaciente);
       $statement->bindParam("Nombre",$paciente->Nombre);
       $statement->bindParam("Edad",$paciente->Edad);
       $statement->bindParam("Sexo",$paciente->Sexo);
       $statement->bindParam("Direccion",$paciente->Direccion);
       $statement->execute();
       $response->mensaje="El paciente se inserto correctamente";
   }catch(Exception $e){
       $response=$e;
   }
   return json_encode($response);
} 
}   