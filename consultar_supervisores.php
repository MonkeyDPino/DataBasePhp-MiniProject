<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/consultar_supervisores.css"></link>
    <title>Consultar Supervisores</title>
</head>
<body>
    <div class="container">
        <?php
            require("conexion.php");
            $query = "SELECT guardas.Nombre Guarda ,guardas.NumGuard, guardas.Jornada,guardas.FechaIni,guardas.FechaFin, empresas.Nombre EmpresaNombre, empresas.NumEmpr FROM empresas INNER JOIN guardas ON empresas.Supervisor = guardas.NumGuard ORDER BY NumEmpr";
            $result = mysqli_query($link,$query);

            
            echo "<div class='row'>Codigo Empresa</div>";
            echo "<div class='row'>Empresa</div>";
            echo "<div class='row'>Codigo Supervisor</div>";
            echo "<div class='row'>Supervisor</div>";
            echo "<div class='row'>Jornada</div>";
            echo "<div class='row'>FechaIni</div>";
            echo "<div class='row'>FechaFin</div>";

            while($extraido=mysqli_fetch_array($result)){
                echo "<div class='row'>".$extraido['NumEmpr']."</div>";
                echo "<div class='row'>".$extraido['EmpresaNombre']."</div>";
                echo "<div class='row'>".$extraido['NumGuard']."</div>";
                echo "<div class='row'>".$extraido['Guarda']."</div>";
                echo "<div class='row'>".$extraido['Jornada']."</div>";
                echo "<div class='row'>".$extraido['FechaIni']."</div>";
                echo "<div class='row'>".$extraido['FechaFin']."</div>";
            }
        ?>
    </div>
    <a href="index.php">Volver</a>
    
</body>
</html>