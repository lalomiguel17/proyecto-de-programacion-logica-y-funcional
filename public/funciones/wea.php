<?

function getWea($request){
    $wea= new Wea();
return $wea->getWea($request);
}

class Wea{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    //buscar
    function getWea(){
        $registro;
        $response;
       // $sql="SELECT * FROM Respuestas;";    

       $sql="SELECT  R.porcentaje
       from Pacientes P, Respuestas R
       where (P.idPaciente = R.idPaciente) 
       AND  P.idPaciente= '2'
       ;";  

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