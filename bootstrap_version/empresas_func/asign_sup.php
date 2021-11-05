<?php include("../header.php") ?>

<?php

require("../conexion.php");
#Si no hay empleados
$query = "SELECT COUNT(*) as cuenta FROM guardas WHERE Empresa ='" . $_GET["codigo"] . "'";
$result = mysqli_query($link, $query);

while ($extraido = mysqli_fetch_array($result)) {
    if($extraido["cuenta"]  == 0){
        header("location: ../empresas.php?mensaje=sin_empleados");
        exit();
    }
}


$query = "SELECT * FROM empresas WHERE NumEmpr='" . $_GET["codigo"] . "'";
$result = mysqli_query($link, $query);

while ($extraido = mysqli_fetch_array($result)) {
    $codigo = $extraido['NumEmpr'];
    $Nombre = $extraido['Nombre'];
    $supervisor = $extraido['Supervisor'];
}

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Asignar Supervisor</div>
                <div class="p-4">
                    <form class="form-horizontal" method="post" action="./asign_sup_op.php">
                        <div class="mb-3"><label for="" class="form-label">Codigo: <?php echo $codigo; ?></label></div>
                        <div class="mb-3"><label for="" class="form-label">Nombre: <?php echo $Nombre; ?></label></div>
                        <div class="mb-3">
                            <label for="" class="form-label">Supervisor:</label>
                            <select class="form-control" name="supervisor" required>
                                <?php
                                require("../conexion.php");
                                $query = "SELECT NumGuard,Nombre FROM guardas WHERE Empresa='" . $_GET["codigo"] . "'";
                                $result = mysqli_query($link, $query);


                                while ($extraido = mysqli_fetch_array($result)) {
                                    $cod_guard = $extraido["NumGuard"];
                                    $nombre_guard = $extraido["Nombre"];

                                    if ($supervisor == $cod_guard) {
                                        echo "<option selected value='" . $cod_guard . "'>" . $nombre_guard . "</option>";
                                    } else {
                                        echo "<option value='" . $cod_guard . "'>" . $nombre_guard . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="empresa" value="<?php echo $_GET["codigo"]; ?>">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>










<?php include("../footer.php") ?>