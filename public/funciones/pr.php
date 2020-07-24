<?php
    function AccessPR($request){
        $pr=new PR();
        return $pr->AccessPR($request);
    }
    class PR{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessPR($request){
        $data=json_decode($request->getbody());
        $idRespuesta = $data->idRespuesta;
        $idPregunta = $data->idPregunta;
    
        $response;
        $sql = "INSERT INTO PR(idRespuesta,idPregunta)VALUES(:idRespuesta,:idPregunta)";
        try{   
            $statement=$this->conexion->prepare($sql);
           
            $statement->bindParam(":idRespuesta",$idRespuesta);
            $statement->bindParam(":idPregunta",$idPregunta);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="PR registrado =)";
            }
            else
            {
                $response="no se registro el PR =(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}