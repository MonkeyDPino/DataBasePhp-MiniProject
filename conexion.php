<?php
    $host ="localhost";
    $username ="root";
    $password ="";
    $database ="SecureDB";

    if(! $link = mysqli_connect($host,$username,$password)){
        echo "<h1> No se conecto al servidor </h1>";
        exit;
    }

    if(!mysqli_select_db($link,$database)){
        echo "<h1> No se conecto a la base de datos</h1>";
        exit;
    }
?>