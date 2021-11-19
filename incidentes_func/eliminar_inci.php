<?php
    function func_error()
    {
        header("location: ../incidentes.php?mensaje=error");
        exit();
    }   
    
    require("../conexion.php");
    $codigo = $_GET["codigo"];
    $query = "DELETE FROM incidentes WHERE NumInci = '".$codigo."'";
    $result = mysqli_query($link, $query) or die(func_error());

    header("location: ../incidentes.php?mensaje=eliminado");
    exit();


?>