<?php
    function AccessSintomas($request){
        $sintomas=new Sintoma();
        return $sintomas->AccessSintomas($request);
    }
    
    class Sintoma{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessSintomas($request){
        $data=json_decode($request->getbody());
        $idSintoma = $data->idSintoma;
        $Descripcion_Sintoma = $data->Descripcion_Sintoma;
        $Tiempo = $data->Tiempo;
        $Puntaje = $data->Puntaje;
        $idPaciente = $data->idPaciente;
        $idTratamiento= $data->idTratamiento;
        $idPregunta= $data->idPregunta;
        $response;
        $sql = "INSERT INTO Sintomas(idSintoma,Descripcion_Sintoma,Tiempo,Puntaje,idPaciente,idTratamiento,idPregunta)
        VALUES(:idSintoma,:Descripcion_Sintoma,:Tiempo,:Puntaje,:idPaciente,:idTratamiento,idPregunta)";

        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idSintoma",$idSintoma);
            $statement->bindParam(":Descripcion_Sintoma",$Descripcion_Sintoma);
            $statement->bindParam(":Tiempo",$Tiempo);
            $statement->bindParam(":Puntaje",$Puntaje);
            $statement->bindParam(":idPaciente",$idPaciente);
            $statement->bindParam(":idTratamiento",$idTratamiento);
            $statement->bindParam(":idPregunta",$idPregunta);
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