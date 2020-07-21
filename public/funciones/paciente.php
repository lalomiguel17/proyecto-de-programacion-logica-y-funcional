<?php
function AccessPaciente($request){
    $login=new Login();
    return $login->AccessPaciente($request);
}class Login{
    private $conexion;
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

function AccessPaciente($request){
   //$id=$_POST["idpaciente"];
$Nombre=$_POST["Nombre"];
$Edad=$_POST["Edad"];
$Sexo=$_POST["Sexo"];
$Direccion=$_POST["Direccion"];
$insertar="INSERT INTO Pacientes(Nombre,Edad,Sexo,Direccion)VALUES('$nombre',"
        . "'$edad','$sexo','$direccion')";
$verificar_usuario= mysqli_query($conexion,"SELECT*FROM Pacientes WHERE Pacientes='$Pacientes'");

if(mysqli_num_rows($verificar_usuario)>0){
    
   echo'El paciente ya esta registrado'; 
   exit;
}
$resultado = mysqli_query($conexion, $insertar);
if(!$resultado){
    
  echo 'error al registrarse';  
}else{
    
    echo 'usuario registrado';    
    
}

mysqli_close($conexion);