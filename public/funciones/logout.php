<?php
function Accesslogout($request){
    $logout=new Logout();
    return $login->AccessLogin($request);
}

class Logout{
    private $conexion;
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }


function Accesslogout($request){

session_start();
unset($_SESSION["s_usuario"]);
session_destroy();
header("Location:../index.php");
?>