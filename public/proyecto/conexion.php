<?php

    $host = '192.168.99.101';
    $user = 'root';
    $password= '';
    $db = 'db';

    $conection = @mysli_connect($host,$user,$password,$db);

    if(!$conection){
        echo "Error en la conexion";
    }
    ?>