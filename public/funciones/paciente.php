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
        $data=json_decode($request->getbody());
        $idPaciente = $data->idPaciente;
        $Nombre = $data->Nombre;
        $Edad = $data->Edad;
        $Sexo = $data->Sexo;
        $Direccion = $data->Direccion;
        $response;
        $sql = "INSERT INTO Pacientes(idPaciente,Nombre,Edad,Sexo,Direccion)VALUES(:idPaciente,:Nombre,:Edad,:Sexo,:Direccion)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idPaciente",$idPaciente);
            $statement->bindParam(":Nombre",$Nombre);
            $statement->bindParam(":Edad",$Edad);
            $statement->bindParam(":Sexo",$Sexo);
            $statement->bindParam(":Direccion",$Direccion);
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