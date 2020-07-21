<?php

function setpaciente($request){
  $pacientes=new Alumno();
return $pacientes->setAlumno($request);
}

function setpaciente($request){
  $pacientes;
  $response;
  $paciente=json_decode($request->getBody());
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