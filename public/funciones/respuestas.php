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
        $idRespuesta = $data->idRespuesta;
        $descripcion_Respuesta = $data->descripcion_Respuesta;
        $response;
        $sql = "INSERT INTO Respuestas(idRespuesta,,porcentaje,descripcion_Respuesta)VALUES(:idRespuesta,:descripcion_Respuesta)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idRespuesta",$idRespuesta);
            $statement->bindParam(":descripcion_Respuesta",$descripcion_Respuesta);
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