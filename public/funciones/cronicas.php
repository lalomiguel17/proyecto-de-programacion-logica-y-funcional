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
        $Nombre = $data->Nombre;
        $Pacientes_idPaciente = $data->Pacientes_idPaciente;
        $response;
        $sql = "INSERT INTO E_Cronicas(id_Cronicas,Nombre,Pacientes_idPaciente)VALUES(:id_Cronicas,:Nombre,:Pacientes_idPaciente)";
        try{   
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":id_Cronicas",$id_Cronicas);
            $statement->bindParam(":Nombre",$Nombre);
            $statement->bindParam(":Pacientes_idPaciente",$Pacientes_idPaciente);
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