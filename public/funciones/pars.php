<?php
    function AccessPars($request){
        $pars=new par();
        return $pars->AccessPars($request);
    }
    
    class par{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessPars($request){
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
                $response="Registro exitoso";
            }
            else
            {
                $response="no se registro";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}