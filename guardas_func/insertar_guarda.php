<?php
    function func_error()
    {
        header("location: ../guardas.php?mensaje=error");
        exit();
    }
    
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];

    require("../conexion.php");
    $query = "INSERT INTO guardas (NumGuard,Nombre,Edad,Empresa,Jornada,FechaIni,FechaFin) VALUES
    ('".$codigo."','".$nombre."','".$edad."',NULL,NULL,NULL,NULL)";
    mysqli_query($link,$query) or die(func_error());

    header("location: ../guardas.php?mensaje=insertado");
    exit();

 

?>