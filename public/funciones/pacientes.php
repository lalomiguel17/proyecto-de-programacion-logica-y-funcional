<?php

function setpaciente($request){
  $pacientes=new Alumno();
return $pacientes->setAlumno($request);
}

function setpaciente($request){
  $pacientes;
  $response;
  $paciente=json_decode($request->getBody());
  $sql="INSERT INTO paciente(nombre,edad,sexo,direccion) VALUES(:nombre,:edad,:sexo,:direccion)";    
  try{            
      $statement=$this->conexion->prepare($sql);
      $statement->bindParam("nombre",$paciente->nombre);
      $statement->bindParam("edad",$paciente->edad);
      $statement->bindParam("sexo",$paciente->sexo;
      $statement->bindParam("direccion",$paciente->direccion);
      $statement->execute();
      $response->mensaje="El paciente se inserto correctamente";
  }catch(Exception $e){
      $response=$e;
  }
  return json_encode($response);
}