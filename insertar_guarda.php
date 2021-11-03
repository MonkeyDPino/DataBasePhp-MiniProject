<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Guarda</title>
</head>
<body>
    <?php
    $error = false;    
    if(isset($_POST["submit"])){
        $cod_guarda = $_POST["cod_guarda"];
        $name_guarda = $_POST["name_guarda"];
        $age_guarda = $_POST["age_guarda"];

        $errores["cod_guarda"] = "";
        $errores["name_guarda"] = "";
        $errores["age_guarda"] = "";

        if(empty($cod_guarda) || !is_numeric($cod_guarda)){
            $error = true;
            $errores["cod_guarda"] = "Codigo invalido";
        }
        if(empty($name_guarda)){
            $error = true;
            $errores["name_guarda"] = "Nombre vacio";
        }
        if(empty($age_guarda) || !is_numeric($age_guarda)){
            $error = true;
            $errores["age_guarda"] = "Edad Invalida";
        }

        if (!$error){
            require("conexion.php");
            $query = "INSERT INTO guardas (NumGuard,Nombre,Edad,Empresa,Jornada,FechaIni,FechaFin) VALUES
             ('".$cod_guarda."','".$name_guarda."','".$age_guarda."',NULL,NULL,NULL,NULL)";
            mysqli_query($link,$query) or die("<label>NO SE PUDO INSERTAR</label><br/>
            <a href='insertar_guarda.php'>InsertarGuarda</a>");
          
        }

    }else{
        $cod_guarda ="";
        $name_guarda = "";
        $age_guarda = "";
    }
    

    if(isset($_POST["submit"]) && !$error){
        echo "<label>GUARDA INSERTADO</label><br/>
        <a href='insertar_guarda.php'>InsertarGuarda</a>";
    }else{
    ?>
    <form method="post" action="insertar_guarda.php">
        <label >Codigo:</label>
        <input type="text" name="cod_guarda" value=<?php print($cod_guarda); ?>></input>
        <?php
            if ($error) {
                print("<span>".$errores["cod_guarda"]."</span>");
            }
        ?>
        <br>

        <label >Nombre:</label>
        <input type="text" name="name_guarda" <?php echo("value='$name_guarda'"); ?>></input>
        <?php
            if ($error) {

                echo "<label name='error' class='error'>".$errores["name_guarda"]."</label>";
            }
        ?>
        <br>

        <label >Edad:</label>
        <input type="text" name="age_guarda" value=<?php print($age_guarda); ?>></input>
        <?php
            if ($error) {
                echo ("<label name='error' class='error'>".$errores["age_guarda"]."</label>");
            }
        ?>
        <br>
        <a href="consultar_guardas.php">Volver</a>
        <input type="submit" value="Insertar" name="submit"></input>
    </form>
    <?php
    }
    ?>
</body>
</html>