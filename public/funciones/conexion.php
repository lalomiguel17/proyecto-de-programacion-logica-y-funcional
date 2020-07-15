<?php
$host ="192.168.99.101";
$usuario="root";
$clave="123456789";
$bd="usuarios";

$conexion=mysqli_connect($host,$usuario,$clave,$bd);


if($conexion){

echo "conectado correctamente";
}else{
   echo "no se pudo conectar"; 
}

?>
