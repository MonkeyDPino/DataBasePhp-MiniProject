<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/consultar_empresas.css"/>
    <title>Consultar Empresas</title>
</head>
<body>
    <div class="container">
        <?php
            require("conexion.php");
            $query = "SELECT empresas.* , guardas.Nombre as NombreGuard FROM guardas RIGHT JOIN empresas ON empresas.Supervisor = guardas.NumGuard ORDER BY NumEmpr";
            $result = mysqli_query($link,$query);

            
            echo "<div class='row'>Codigo</div>";
            echo "<div class='row'>Nombre</div>";
            echo "<div class='row'>Supervisor</div>";
            echo "<div class='row'>Fecha de inicio</div>";
            echo "<div class='row'>Fecha de fin</div>";
            echo "<div class='row'>Edit</div>";

            while($extraido=mysqli_fetch_array($result)){
                echo "<div class='row'>".$extraido['NumEmpr']."</div>";
                echo "<div class='row'>".$extraido['Nombre']."</div>";
                echo "<div class='row'>".$extraido['NombreGuard']."</div>";
                echo "<div class='row'>".$extraido['IniContrato']."</div>";
                echo "<div class='row'>".$extraido['finContrato']."</div>";
                echo "<div class='row'><a href='asignar_empresa.php?NumEmpr=".$extraido['NumEmpr']."'>Actualizar</a></div>";
            }
        ?>
    </div>
    <a href="insertar_empresa.php">InsertarEmpresa</a>
    <a href="index.php">Volver</a>
    
</body>
</html>