<?
<?php
function AccessNombre_tratamiento($request){
    $nombretratamiento=new Nombre_tratamiento();
    return $tratamiento->AccessTratamiento($request);
}

class Nombre_Tratamiento{
    private $conexion;
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

   

    function getAlumno($request){
        $tratamiento;
        $response;
        $alumno=json_decode($request->getBody());
        $sql="SELECT * FROM alumnos WHERE matricula=:matricula";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":matricula",$alumno->matricula);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    


    

   

 

}