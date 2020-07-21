<?php
session_start();

 include_once 'conexion.php';

 $buscarUsuario = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$_POST[username]' ";
 $result = $conexion->query($buscarUsuario);
 $count = mysqli_num_rows($result);

 if ($count == 1) { 

 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";
 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
}

 else{
 
$form_pass = $_POST['password'];
$hash = password_hash($form_pass, PASSWORD_BCRYPT);
$query = "INSERT INTO Usuarios(nombre_usuario, password) VALUES ('$_POST[username]', '$hash')";

 if ($conexion->query($query) === TRUE) {
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
 echo "<h5>" . "Hacer Login: " . "<a href='login.php'>Login</a>" . "</h5>";
 }