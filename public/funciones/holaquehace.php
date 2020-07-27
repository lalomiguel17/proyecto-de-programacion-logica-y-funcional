<?

function getHolaquehace($request){
    $holaquehace= new Holaquehace();
return $holaquehace->getHolaquehace($request);
}

class Holaquehace{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    //buscar
    function getHolaquehace(){
        $registro;
        $response;
       // $sql="SELECT * FROM Respuestas;";    

       $sql="SELECT   R.porcentaje, sum(R.porcentaje)
       from Pacientes P, Respuestas R, Tratamientos T 
       where (T.idTratamiento = R.idTratamiento) AND (R.idPaciente = P.idPaciente)
       AND  P.Nombre_Paciente = 'Tomas';";  

        try{            
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
 //fin de buscar
}