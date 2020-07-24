<?php
    function AccessCronicas($request){
        $cronicas=new Cronicas();
        return $cronicas->AccessCronicas($request);
    }
    
    class Cronicas{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessCronicas($request){
        $data=json_decode($request->getbody());
        $id_Cronicas = $data->id_Cronicas;
        $Nombre_cronicas = $data->Nombre_cronicas;
        $idPaciente = $data->idPaciente;
        $response;
        $sql = "INSERT INTO E_Cronicas(id_Cronicas,Nombre_cronicas,idPaciente)VALUES(:id_Cronicas,:Nombre_cronicas,:idPaciente)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":id_Cronicas",$id_Cronicas);
            $statement->bindParam(":Nombre_cronicas",$Nombre_cronicas);
            $statement->bindParam(":idPaciente",$idPaciente);
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