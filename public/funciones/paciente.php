<?php
function AccessPaciente($request){
    $login=new Login();
    return $login->AccessPaciente($request);
}

class Login{
    private $conexion;
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }



function AccessPaciente($request){
  $paciente;
  $response;
  $pacientes=json_decode($request->getBody());
  $sql="INSERT INTO Pacientes(idPaciente,Nombre,Edad,Sexo,Direccion) VALUES(:idPaciente,:Nombre,:Edad,:Sexo,:Direccion)";    
  try{            
      $statement=$this->conexion->prepare($sql);
      $statement->bindParam("idPaciente",$paciente->Nombre);
      $statement->bindParam("Nombre",$paciente->Nombre);
      $statement->bindParam("Edad",$paciente->edad);
      $statement->bindParam("Sexo",$paciente->sexo;
      $statement->bindParam("Direccion",$paciente->direccion);
      $statement->execute();
      $response->mensaje="El paciente se inserto correctamente";
  }catch(Exception $e){
      $response=$e;
  }
  return json_encode($response);
}