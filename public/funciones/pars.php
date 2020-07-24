<?php
    function Accesspars($request){
        $pars=new Par();
        return $pars->Accesspars($request);
    }
    
    class Par{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function Accesspars($request){
        $data=json_decode($request->getbody());
        $idRespuesta = $data->idRespuesta;
        $idPregunta = $data->idPregunta);
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
                $response="id registrados";
            }
            else
            {
                $response="id no registrados";
            }


              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}