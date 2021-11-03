<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/consultar_guardas.css"/>
    <title>consultar Guardas</title>
</head>
<body>
    <div class="container">
        <?php
            require("conexion.php");
            $query = "SELECT guardas.* , empresas.Nombre as NombreEmpr FROM guardas LEFT JOIN empresas ON empresas.NumEmpr = guardas.Empresa ORDER BY NumGuard";
            $result = mysqli_query($link,$query);

            
            echo "<div class='row'>Codigo</div>";
            echo "<div class='row'>Nombre</div>";
            echo "<div class='row'>Edad</div>";
            echo "<div class='row'>Empresa</div>";
            echo "<div class='row'>Jornada</div>";
            echo "<div class='row'>Fecha de inicio</div>";
            echo "<div class='row'>Fecha de fin</div>";
            echo "<div class='row'>Edit</div>";

            while($extraido=mysqli_fetch_array($result)){
                echo "<div class='row'>".$extraido['NumGuard']."</div>";
                echo "<div class='row'>".$extraido['Nombre']."</div>";
                echo "<div class='row'>".$extraido['Edad']."</div>";
                echo "<div class='row'>".$extraido['NombreEmpr']."</div>";
                echo "<div class='row'>".$extraido['Jornada']."</div>";
                echo "<div class='row'>".$extraido['FechaIni']."</div>";
                echo "<div class='row'>".$extraido['FechaFin']."</div>";
                echo "<div class='row'><a href='asignar_guarda.php?NumGuard=".$extraido['NumGuard']."'>Actualizar</a></div>";
            }
        ?>
    </div>
    <a href="insertar_guarda.php">InsertarGuarda</a>
    <a href="index.php">Volver</a>
    
</body>
</html>