<?php
    function Accessrespuesta($request){
        $respuestas=new Respuesta();
        return $respuestas->Accessrespuesta($request);
    }
    
    class Respuesta{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function Accessrespuesta($request){
        $data=json_decode($request->getbody());
        //$idRespuesta = $data->idRespuesta;
        $porcentaje = $data->porcentaje;
        $descripcion_Respuesta = $data->descripcion_Respuesta;
        $idPregunta = $data->idPregunta;
        $idPaciente = $data->idPaciente;
        

        $response;
        $sql = "INSERT INTO Respuestas(porcentaje,descripcion_Respuesta,idPregunta,idPaciente)
        VALUES(:porcentaje,:descripcion_Respuesta,:idPregunta,:idPaciente)";
        try{   
            $statement=$this->conexion->prepare($sql);
           // $statement->bindParam(":idRespuesta",$idRespuesta);
            $statement->bindParam(":porcentaje",$porcentaje);
            $statement->bindParam(":descripcion_Respuesta",$descripcion_Respuesta);
            $statement->bindParam(":idPregunta",$idPregunta);
            $statement->bindParam(":idPaciente",$idPaciente);
         
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Respuesta registrada";
            }
            else
            {
                $response="Respuesta no registrada";
            }


              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}