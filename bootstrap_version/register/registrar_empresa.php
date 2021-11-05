<?php
    function func_error()
    {
        header("location: ../empresas.php?mensaje=error");
            exit();
    }
    
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $fin_contrato = $_POST["fin_contrato"];

    require("../conexion.php");
    $query = "INSERT INTO empresas (NumEmpr,Nombre,Supervisor,IniContrato,finContrato) VALUES
     ('".$codigo."','".$nombre."',NULL,curdate(),'".$fin_contrato."')";
    mysqli_query($link,$query) or die(func_error());

    header("location: ../empresas.php?mensaje=insertada");
    exit();

 

?>