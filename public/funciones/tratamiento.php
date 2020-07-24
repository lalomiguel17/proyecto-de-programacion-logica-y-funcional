<?php
    function AccessTratamiento($request){
        $tratamiento=new Tratamiento();
        return $tratamiento->AccessTratamiento($request);
    }
    
    class Tratamiento{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessTratamiento($request){
        $data=json_decode($request->getbody());
        $idTratamiento = $data->idTratamiento;
        $Nombre_Tratamiento = $data->Nombre_Tratamiento;
        $Descripcion = $data->Descripcion;
        $response;
        $sql = "INSERT INTO Tratamientos(idTratamiento,Nombre_Tratamiento,Descripcion)VALUES(:idTratamiento,:Nombre_Tratamiento,:Descripcion)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":idTratamiento",$idTratamiento);
            $statement->bindParam(":Nombre_Tratamiento",$Nombre_Tratamiento);
            $statement->bindParam(":Descripcion",$Descripcion);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Tratamiento registrado";
            }
            else
            {
                $response="no se registro el tratamiento =(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}