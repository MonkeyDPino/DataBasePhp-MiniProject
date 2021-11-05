<?php
    function func_error()
    {
        header("location: ../guardas.php?mensaje=error");
        exit();
    }   
    
    require("../conexion.php");
    $codigo = $_GET["codigo"];
    $query = "DELETE FROM guardas WHERE NumGuard = '".$codigo."'";
    $result = mysqli_query($link, $query) or die(func_error());

    header("location: ../guardas.php?mensaje=eliminado");
    exit();


?>