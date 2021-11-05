<?php
    function func_error()
    {
        header("location: ../empresas.php?mensaje=error");
        exit();
    }   
    
    require("../conexion.php");
    $supervisor= $_POST["supervisor"];
    $empresa = $_POST["empresa"];
    $query = "UPDATE `empresas` SET `Supervisor` = '".$supervisor."' WHERE `empresas`.`NumEmpr` = '".$empresa."'";
    $result = mysqli_query($link, $query) or die(func_error());

    header("location: ../empresas.php?mensaje=asignado");
    exit();


?>