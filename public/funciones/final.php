<?
function getporcentaje($request){
$finals=new Final();
return $finals->getPorcentaje($request);
}
function getterminado($request){
    $finals=new Final();
return $finals->getTerminado($request);
}
function gettratamiento($request){
    $finals=new Final();
return $finals->getTratamiento($request);
}




class Final{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

 


    
    function getTratamiento($request){
        $finals;
        $response;
        $final=json_decode($request->getBody());
        $sql="SELECT Nombre_Tratamiento
        FROM Pacientes P, Respuestas R, Tratamientos T 
        WHERE (T.idTratamiento = R.idTratamiento) AND (R.idPaciente = P.idPaciente)  AND  P.Nombre_Paciente = 'Tomas'";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":Nombre_Tratamiento",$final->Nombre_Tratamiento);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }




    function getPorcentaje($request){
        $finals;
        $response;
        $final=json_decode($request->getBody());
        $sql="SELECT R.porcentaje
        FROM Pacientes P, Respuestas R, Tratamientos T 
        WHERE (T.idTratamiento = R.idTratamiento) AND (R.idPaciente = P.idPaciente)
        AND  P.Nombre_Paciente = 'Tomas'";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":R.porcentaje",$final->R.porcentaje);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }




    function getTerminado($request){
        $finals;
        $response;
        $final=json_decode($request->getBody());
        $sql="SELECT R.porcentaje, sum(R.porcentaje)
        FROM Pacientes P, Respuestas R, Tratamientos T 
       WHERE (T.idTratamiento = R.idTratamiento) AND (R.idPaciente = P.idPaciente)
        AND  P.Nombre_Paciente = 'Tomas'";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":R.porcentaje",$final->R.porcentaje);
            $statement->bindParam(":sum(R.porcentaje)",$final->sum(R.porcentaje));
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }










   

}