<?php
    function func_error()
    {
        header("location: ../empresas.php?mensaje=error");
        exit();
    }   
    
    require("../conexion.php");
    $empresa = $_GET["codigo"];
    $query = "DELETE FROM empresas WHERE NumEmpr = '".$empresa."'";
    $result = mysqli_query($link, $query) or die(func_error());

    header("location: ../empresas.php?mensaje=eliminada");
    exit();


?>