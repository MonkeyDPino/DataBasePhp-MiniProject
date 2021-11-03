<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar a Empresa</title>
</head>
<body>
    <?php
        #--------- On Post---------------
        require("conexion.php");
        if (isset($_POST["submit"])){
            #ACTUALIZAR EMPRESA EN EL GUARDA
            $query = "UPDATE `guardas` SET `Empresa` = '".$_POST["empresa"]."', `Jornada` = '".$_POST["jorn_guarda"]."', `FechaIni` = '".$_POST["dateIni"]."', `FechaFin` = '".$_POST["dateFin"]."' WHERE `guardas`.`NumGuard` = '".$_POST["NumGuard"]."'";
            mysqli_query($link,$query) or die("Error Updating");
            
            

            #ACTUALIZAR EL SUPERVISOR DE SU ANTIGUA EMPRESA EN CASO DE QUE EL SEA EL SUPERVISOR
            $query = "SELECT NumEmpr FROM empresas WHERE empresas.Supervisor = '".$_POST["NumGuard"]."'";
            $result = mysqli_query($link,$query);
            while($extraido=mysqli_fetch_array($result)){
                if($extraido["NumEmpr"] != $_POST["empresa"]){
                    $query = "UPDATE `empresas` SET `Supervisor` = NULL WHERE `empresas`.`NumEmpr` = '".$extraido["NumEmpr"]."'";
                    mysqli_query($link,$query) or die("Error Setting Null On empresas.Supervisor");
                }
            }
            echo "<script> location.href=\"consultar_guardas.php\" </script>";
        }
    
    ?>
    <?php
    #--------- On Get---------------
    print '<h1>Asignar a Empresa</h1>';


    $empresa ="";
    $Jornada = "";
    $FechaIni="";
    $FechaFin="";
    

    $query = "SELECT * FROM guardas WHERE guardas.NumGuard = '".$_GET["NumGuard"]."'";
    $result = mysqli_query($link,$query);

    while($extraido=mysqli_fetch_array($result)){
        echo "<label>\tCodigo:\t".$extraido['NumGuard']."</label>";
        echo "<label>\tNombre:\t".$extraido['Nombre']."</labelclass=>";
        echo "<label>\tEdad:\t".$extraido['Edad']."</label>";
        $empresa =$extraido['Empresa'];
        $Jornada = $extraido['Jornada'];
        $FechaIni=$extraido['FechaIni'];
        $FechaFin=$extraido['FechaFin'];
    }

    

    ?>
    <form method="post" action=<?php print "./asignar_guarda.php"?>>
    <input type="hidden" name="NumGuard" value=<?php print "'".$_GET["NumGuard"]."'"?>/>
    <label>Empresa:</label>
    <select name="empresa">
        <?php
        $queryEmpr = "SELECT * FROM empresas ";
        $resultEmpr = mysqli_query($link,$queryEmpr);
    
        while($extraido=mysqli_fetch_array($resultEmpr)){
            if($extraido['NumEmpr'] == $empresa){
                echo "<option selected value='".$extraido['NumEmpr']."'>".$extraido['Nombre']."</option>";
            }else{
                echo "<option value='".$extraido['NumEmpr']."'>".$extraido['Nombre']."</option>";
            }
        }
        
        ?>
    </select>
    <label >Jornada:</label>
    <select name="jorn_guarda">
        <?php 
        if($Jornada == "NOCTURNA"){
            echo "<option selected value='NOCTURNA'>NOCTURNA</option>
                    <option value='DIURNA'>DIURNA</option>";
        }else{
            echo "<option selected value='DIURNA'>DIURNA</option>
                    <option value='NOCTURNA'>NOCTURNA</option>";
        }
        
        ?>
    </select>
    <label>Fecha de Inicio</label>
    <input type="date" name="dateIni" value="<?php echo date($FechaIni); ?>"></input>
    <label>Fecha de finalizacion</label>
    <input type="date" name="dateFin" value="<?php echo date($FechaFin); ?>"></input>
    <input type="submit" name="submit"></input>
    </form>

    <a href="consultar_guardas.php">Volver</a>
</body>
</html>