<?php
    function func_error()
    {
        header("location: ../incidentes.php?mensaje=error");
        exit();
    }   

    require("../conexion.php");
    $query = "UPDATE `incidentes` SET `Comentarios` = '".$_POST["comentarios"]."', `Fecha` = '".$_POST["fecha"]."' WHERE `incidentes`.`NumInci` = '".$_POST["incidente"]."'";
    mysqli_query($link,$query) or die(func_error());
    
     
    
    header("location: ../incidentes.php?mensaje=editado");
    exit();
        
    
?>