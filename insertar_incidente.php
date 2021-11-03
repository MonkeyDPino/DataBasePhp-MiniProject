<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Incidente</title>
</head>
<body>
    <?php
    $error = false;    
    if(isset($_POST["submit"])){
        $cod_inci = $_POST["cod_inci"];
        list($cod_guarda,$cod_empr) = explode(" ", $_POST["cods"]);
        $comentarios = $_POST["comentarios"];
        $fecha = $_POST["fecha"];

        $errores["cod_inci"] = "";
        $errores["cod_guarda"] = "";
        $errores["cod_empr"] = "";
        $errores["comentarios"] = "";
        $errores["fecha"] = "";

        if(empty($cod_inci) || !is_numeric($cod_inci)){
            $error = true;
            $errores["cod_inci"] = "Codigo invalido";
        }
        if(empty($fecha)){
            $error = true;
            $errores["fecha"] = "Fecha vacia";
        }
        if(empty($comentarios)){
            $error = true;
            $errores["comentarios"] = "Comentarios vacios";
        }
        
        if (!$error){
            require("conexion.php");
            $query = "INSERT INTO incidentes (NumInci,NumEmpr,NumGuard,Comentarios,Fecha) VALUES
             ('".$cod_inci."','".$cod_empr."','".$cod_guarda."','".$comentarios."','".$fecha."')";
            mysqli_query($link,$query) or die("<label>NO SE PUDO INSERTAR</label><br/>
            <a href='consultar_incidentes.php'>Volver</a>");
          
        }

    }else{
        $cod_inci ="";
        $cod_guarda ="";
        $cod_empr ="";
        $comentarios = "";
        $fecha = "";
    }
    

    if(isset($_POST["submit"]) && !$error ){
        echo "<label>INCIDENTE INSERTADO</label><br/>
        <a href='insertar_incidente.php'>Insertar Incidente</a>";
    }else{
    ?>
    <form method="post" action="insertar_incidente.php">
        <label >Codigo:</label>
        <input type="text" name="cod_inci" value=<?php print($cod_inci); ?>></input>
        <?php
            if ($error) {
                print("<span>".$errores["cod_inci"]."</span>");
            }
        ?>
        <br>

        <label >Guarda:</label>
        <select name="cods">
        <?php
            require("conexion.php");
            # Poner los guardas y guardar sus empresas
            $query = "SELECT NumGuard,guardas.Nombre Guarda,NumEmpr,empresas.Nombre Empresa FROM guardas INNER JOIN  empresas ON guardas.Empresa = empresas.NumEmpr";
            $result = mysqli_query($link,$query);
            while($extraido=mysqli_fetch_array($result)){
                if($cod_guarda == $extraido["NumGuard"]){
                    echo "<option selected value='".$extraido['NumGuard']." ".$extraido["NumEmpr"]."'>".$extraido['Guarda']." -> ".$extraido["Empresa"]."</option>";
                }else{
                    echo "<option value='".$extraido['NumGuard']." ".$extraido["NumEmpr"]."'>".$extraido['Guarda']." -> ".$extraido["Empresa"]."</option>";
                }
            }
        ?>
        </select>
        <label >Comentarios:</label>
        <textarea name="comentarios" rows="4" cols="50" ><?php print($comentarios);?></textarea>
        <?php
            if ($error) {
                print("<span>".$errores["comentarios"]."</span>");
            }
        ?>
        <br>
        <label >Fecha:</label>
        <input type="date" name="fecha" value=<?php echo date($fecha); ?>/>
        <?php
            if ($error) {
                print("<span>".$errores["fecha"]."</span>");
            }
        ?>
        <input type="submit" value="Insertar" name="submit"></input>
    </form>
    <?php
    }
    ?>
    <a href="consultar_incidentes.php">Volver</a>
</body>
</html>