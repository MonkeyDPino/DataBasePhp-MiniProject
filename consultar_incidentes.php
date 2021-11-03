<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/consultar_incidentes.css">
    <title>Consultar Incidentes</title>
</head>
<body>
    <div class="container">
        <?php
            require("conexion.php");
            $query = "SELECT guardas.Nombre Guarda , empresas.Nombre Empresa, incidentes.* FROM ( incidentes LEFT JOIN empresas ON empresas.NumEmpr = incidentes.NumEmpr ) LEFT JOIN guardas ON guardas.NumGuard = incidentes.NumGuard ORDER BY NumEmpr";
            $result = mysqli_query($link,$query);

            
            echo "<div class='row'>Guarda</div>";
            echo "<div class='row'>Empresa</div>";
            echo "<div class='row'>Comentarios</div>";
            echo "<div class='row'>Fecha</div>";

            while($extraido=mysqli_fetch_array($result)){
                echo "<div class='row'>".$extraido['Guarda']."</div>";
                echo "<div class='row'>".$extraido['Empresa']."</div>";
                echo "<div class='row'>".$extraido['Comentarios']."</div>";
                echo "<div class='row'>".$extraido['Fecha']."</div>";
            }
        ?>
    </div>
    <a href="insertar_incidente.php">InsertarIncidente</a>
    <a href="index.php">Volver</a>
    
</body>
</html>