

//Codigo PHP que trabaja el login de usuarios

<?php

    $alert = '';
    session_start();
    if(!empty($_SESSION['active'])){
        header('location: index/');
    }else{

     
   

    $alert($_POST)){
        if(empty($POST['usuario']) || empty($_POST['clave'])){
                $alert = 'Ingrese un usuario y su clave';
            }else{
                require_once "conexion.php";

                $users = $_POST['usuario'];
                $pass = $POST['clave'];

                $query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$pass'");
                $result = mysqli_nums_rows($query);

                if($result)>0{
                    $data = mysqli_fetch_array($query);
                    
                    $_SESSION['active']=true;
                    $_SESSION['idUser'] = $data['idusuario'];        
                    $_SESSION['nombre'] = $data['nombre']; 
                    $_SESSION['email'] = $data['email']; 
                    $_SESSION['user'] = $data['usuario'];        
                    $_SESSION['rol'] = $data['rol'];  

                    header('location: index/');    
                }else{
                    $alert = 'El usuario o la clave son incorrectos';
                   session_destroy();
                }
            }
    }
}
?>

//Codigo html que representa la vista de nuestro login

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>LOGIN | Sistema Experto </title>
        <link rel ="stylesheet" type="text/css" href="css/style.css">
    </head>
        <body>
            <section  id ="container">

                <form action ="" method="post">
                    <h3>Iniciar Sesion</h3>
                    <img src="img/login.png" alt="Login">

                    <input type = "text" name = "usuario" placeholder = "Usuario">
                    <input type = "password" name = "clave" placeholder = "Contraseña">

                    <div class="alert"><?php echo (isset($alert)? $alert : '';) ?> </P> </div>

                    <input type="submit" value="INGRESAR">

                </form>

            </section>
        </body>
</html>        

 
