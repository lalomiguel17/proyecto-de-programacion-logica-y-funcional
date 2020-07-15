

<?
require 'conexion.php';
session_start();
$usuario=$_POST('usuario');
$clave=$_POST('clave');

$q="SELECT COUNT(*)from usuarios where usuario='$usuario' and clave='$clave'";


$consulta=mysqli_query($conexion,$q);
$array=mysqli_fetch_array;


?>