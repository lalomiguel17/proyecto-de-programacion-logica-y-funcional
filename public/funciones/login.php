<?
function getUsuPass($request){
    $usuarios;
    $response;
    $usuario=json_decode($request->getBody());
    $sql = "SELECT * FROM sesion WHERE usuario = :usuario AND clave = :clave";
    try{   
        $statement=$this->conexion->prepare($sql);
            $statement->bindParam("usuario",$usuario->correo);
            $statement->bindParam("clave",$usuario->pass);
        $statement->execute();
        $count=$statement->rowCount();
        if($count)
        {
            $response->mensaje="Datos insertados correctamente :)";
        }
        else
        {
            $response->mensaje="error revise sus datos";
        }

          
    }catch(Exception $e){
        $response=$e;
    }
    return json_encode($response);
}