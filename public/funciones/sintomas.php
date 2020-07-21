<?php
    function AccessSintomas($request){
        $sintomas=new Cronicas();
        return $sintomas->AccessSintomas($request);
    }
    
    class Sintomas{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessSintomas($request){
        $data=json_decode($request->getbody());
        $idSintoma = $data->idSintoma;
        $Descripcion = $data->Descripcion;
        $Tiempo = $data->Tiempo;
        $Puntaje = $data->Puntaje;
        $Pacientes_idPaciente = $data->Pacientes_idPaciente;
        $Tratamientos_idTratamiento= $data->Tratamientos_idTratamiento;
        $response;
        $sql = "INSERT INTO Sintomas(idSintoma,Descripcion,Tiempo,Puntaje,Pacientes_idPaciente,Tratamientos_idTratamiento)
        VALUES(:idSintoma,:Descripcion,:Tiempo,:Puntaje,:Pacientes_idPaciente,:Tratamientos_idTratamiento)";

        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idSintoma",$idSintoma);
            $statement->bindParam(":Descripcion",$Descripcion);
            $statement->bindParam(":Tiempo",$Tiempo);
            $statement->bindParam(":Puntaje",$Puntaje);
            $statement->bindParam(":Pacientes_idPaciente",$Pacientes_idPaciente);
            $statement->bindParam(":Tratamientos_idTratamiento",$Tratamientos_idTratamiento);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Sintoma registrado exitosamente";
            }
            else
            {
                $response="no se registro el sintoma";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}