<?php
    function Accesspregunta($request){
        $preguntas=new Pregunta();
        return $preguntas->Accesspregunta($request);
    }
    
    class Pregunta{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function Accesspregunta($request){
        $data=json_decode($request->getbody());
        $idPregunta = $data->idPregunta;
        $descripcion_Pregunta = $data->descripcion_Pregunta;
        $response;
        $sql = "INSERT INTO Preguntas(idPregunta,descripcion_Pregunta)VALUES(:idPregunta,:descripcion_Pregunta)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idPregunta",$idPregunta);
            $statement->bindParam(":descripcion_Pregunta",$descripcion_Pregunta);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Pregunta registrada";
            }
            else
            {
                $response="pregunta no registrada";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}