<?php
    function AccessRegistro($request){
        $registro=new Registro();
        return $registro->AccessRegistro($request);
    }
    class Registro{
        private $conexion;
        function __construct(){            
            $database=new DbConnect();
            $this->conexion=$database->connect();
        }
    function AccessRegistro($request){
        $data=json_decode($request->getbody());
        $Nombre_Registro = $data->Nombre_Registro;
        $Correo = $data->Correo;
        $Clave = $data->Clave;
        $idPaciente = $data->idPaciente;
        $response;
        $sql = "INSERT INTO Registros(Nombre_Registro,Correo,Clave,idPaciente)VALUES(:Nombre_Registro,:Correo,:Clave,:idPaciente)";
        try{   
            $statement=$this->conexion->prepare($sql);
           
            $statement->bindParam(":Nombre_Registro",$Nombre_Registro);
            $statement->bindParam(":Correo",$Correo);
            $statement->bindParam(":Clave",$Clave);
            $statement->bindParam(":idPaciente",$idPaciente);
            $statement->execute();
            $count=$statement->rowCount();
            if($count)
            {
                $response="Usuario registrado =)";
            }
            else
            {
                $response="no se registro el usuario=(";
            }

              
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }    
}