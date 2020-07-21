<?php
    function Accesstratamiento($request){
        $tratamiento=new Tratamiento();
        return $paciente->AccessTratamiento($request);
    }
    
    class Tratamiento{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessTratamiento($request){
        $data=json_decode($request->getbody());
        

        `idTratamiento` INT ,
        `Nombre` VARCHAR(45) ,
        `Descripcion` VARCHAR(45) 

        $idTratamiento = $data->idTratamiento;
        $Nombre = $data->Nombre;
        $Descripcion = $data->Descripcion;
        $response;
        $sql = "INSERT INTO Tratamiento(idTratamiento,Nombre,Descripcion)VALUES(:idTratamiento,:Nombre,:Descripcion)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idTratamiento",$idTratamiento);
            $statement->bindParam(":Nombre",$Nombre);
            $statement->bindParam(":Descripcion",$Descripcion);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Tratamiento insertado correctamente =)";
            }
            else
            {
                $response="no se logro insertar el tratamiento=(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}