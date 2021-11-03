<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Supervisor</title>
</head>
<body>
    <?php
        #--------- On Post---------------
        require("conexion.php");
        if (isset($_POST["submit"])){
            $query = "UPDATE `empresas` SET `Supervisor` = '".$_POST["supervisor"]."' WHERE `empresas`.`NumEmpr` = '".$_POST["NumEmpr"]."'";
            mysqli_query($link,$query) or die("Error Updating");
            echo "<script> location.href=\"consultar_empresas.php\" </script>";
        }
    
    ?>
    <?php
    #--------- On Get---------------
    print '<h1>Asignar Supervisor</h1>';


    $Supervisor ="";
    

    $query = "SELECT * FROM empresas WHERE empresas.NumEmpr = '".$_GET["NumEmpr"]."'";
    $result = mysqli_query($link,$query);

    while($extraido=mysqli_fetch_array($result)){
        echo "<label>\tCodigo:\t".$extraido['NumEmpr']."</label>";
        echo "<label>\tNombre:\t".$extraido['Nombre']."</labelclass=>";
        echo "<label>\Inicio de contrato:\t".$extraido['IniContrato']."</label>";
        echo "<label>\Fin de contrato:\t".$extraido['finContrato']."</label>";
        $Supervisor =$extraido['Supervisor'];
    }

    

    ?>
    <form method="post" action=<?php print "./asignar_empresa.php"?>>
        <input type="hidden" name="NumEmpr" value=<?php print "'".$_GET["NumEmpr"]."'"?>/>
        <label>Supervisor:</label>
        <select name="supervisor">
            <?php
            $queryGuard = "SELECT NumGuard,Nombre FROM guardas WHERE Empresa = '".$_GET["NumEmpr"]."'";
            $resultGuard = mysqli_query($link,$queryGuard);
        
            while($extraido=mysqli_fetch_array($resultGuard)){
                if($extraido['NumGuard'] == $Supervisor){
                    echo "<option selected value='".$extraido['NumGuard']."'>".$extraido['Nombre']."</option>";
                }else{
                    echo "<option value='".$extraido['NumGuard']."'>".$extraido['Nombre']."</option>";
                }
            }
            
            ?>
        </select>
        <input type="submit" name="submit"></input>
    </form>

    <a href="consultar_empresas.php">Volver</a>
</body>
</html>