<?php
    function func_error()
    {
        header("location: ../incidentes.php?mensaje=error");
        exit();
    }
    
    $codigo = $_POST["codigo"];
    list($cod_guarda,$cod_empr) = explode(" ", $_POST["cods"]);
    $comentarios = $_POST["comentarios"];
    $fecha = $_POST["fecha"];

    require("../conexion.php");
    $query = "INSERT INTO incidentes (NumInci,NumEmpr,NumGuard,Comentarios,Fecha) VALUES
             ('".$codigo."','".$cod_empr."','".$cod_guarda."','".$comentarios."','".$fecha."')";
    mysqli_query($link,$query) or die(func_error());

    header("location: ../incidentes.php?mensaje=insertado");
    exit();

 

?>