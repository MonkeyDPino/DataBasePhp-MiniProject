<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Empresa</title>
</head>
<body>
    <?php
    $error = false;    
    if(isset($_POST["submit"])){
        $cod_empr = $_POST["cod_empr"];
        $name_empr = $_POST["name_empr"];
        $finContrato = $_POST["finContrato"];

        $errores["cod_empr"] = "";
        $errores["name_empr"] = "";
        $errores["finContrato"] = "";

        if(empty($cod_empr) || !is_numeric($cod_empr)){
            $error = true;
            $errores["cod_empr"] = "Codigo invalido";
        }
        if(empty($name_empr)){
            $error = true;
            $errores["name_empr"] = "Nombre vacio";
        }
        if(empty($finContrato)){
            $error = true;
            $errores["finContrato"] = "Fecha vacia";
        }

        if (!$error){
            require("conexion.php");
            $query = "INSERT INTO empresas (NumEmpr,Nombre,Supervisor,IniContrato,finContrato) VALUES
             ('".$cod_empr."','".$name_empr."',NULL,curdate(),'".$finContrato."')";
            mysqli_query($link,$query) or die("<label>NO SE PUDO INSERTAR</label><br/>
            <a href='insertar_empresa.php'>InsertarEmpresa</a>");
          
        }

    }else{
        $cod_empr ="";
        $name_empr = "";
        $finContrato = "";
    }
    

    if(isset($_POST["submit"]) && !$error){
        echo "<label>Empresa Insertada</label><br/>
        <a href='insertar_empresa.php'>InsertarEmpresa</a>";
    }else{
    ?>
    <form method="post" action="insertar_empresa.php">
        <label >Codigo:</label>
        <input type="text" name="cod_empr" value=<?php print($cod_empr); ?>></input>
        <?php
            if ($error) {
                print("<span>".$errores["cod_empr"]."</span>");
            }
        ?>
        <br>

        <label >Nombre:</label>
        <input type="text" name="name_empr" <?php echo("value='$name_empr'"); ?>></input>
        <?php
            if ($error) {

                echo "<label name='error' class='error'>".$errores["name_empr"]."</label>";
            }
        ?>
        <br>

        <label >Fin de Contrato:</label>
        <input type="date" name="finContrato" value=<?php echo date($finContrato); ?>></input>
        <?php
            if ($error) {
                echo ("<label name='error' class='error'>".$errores["finContrato"]."</label>");
            }
        ?>
        <br>
        <input type="submit" value="Insertar" name="submit"></input>
    </form>
    <?php
    }
    ?>
    <a href="consultar_empresas.php">Volver</a>
</body>
</html>