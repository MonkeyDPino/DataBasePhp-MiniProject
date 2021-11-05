<?php
    function func_error()
    {
        header("location: ../guardas.php?mensaje=error");
        exit();
    }   

    require("../conexion.php");
    $query = "UPDATE `guardas` SET `Empresa` = '".$_POST["empresa"]."', `Jornada` = '".$_POST["jornada"]."', `FechaIni` = '".$_POST["inicio_contrato"]."', `FechaFin` = '".$_POST["fin_contrato"]."' WHERE `guardas`.`NumGuard` = '".$_POST["guarda"]."'";
    mysqli_query($link,$query) or die(func_error());
    
    

    
    $query = "SELECT NumEmpr FROM empresas WHERE empresas.Supervisor = '".$_POST["guarda"]."'";
    $result = mysqli_query($link,$query);
    while($extraido=mysqli_fetch_array($result)){
        if($extraido["NumEmpr"] != $_POST["empresa"]){
            $query = "UPDATE `empresas` SET `Supervisor` = NULL WHERE `empresas`.`NumEmpr` = '".$extraido["NumEmpr"]."'";
            mysqli_query($link,$query) or die(func_error());
        }
    }
    header("location: ../guardas.php?mensaje=trasladado");
    exit();
        
    
?>