<?php include("./header_on_carpet.php") ?>

<?php

require("../conexion.php");


$query = "SELECT * FROM guardas WHERE NumGuard='" . $_GET["codigo"] . "'";
$result = mysqli_query($link, $query);

while ($extraido = mysqli_fetch_array($result)) {
    $codigo = $extraido['NumGuard'];
    $nombre = $extraido['Nombre'];
    $edad = $extraido['Edad'];
    $cod_empr = $extraido['Empresa'];
    $jornada = $extraido['Jornada'];
    $FechaIni = $extraido['FechaIni'];
    $FechaFin = $extraido['FechaFin'];
}

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Asignar Supervisor</div>
                <div class="p-4">
                    <form class="form-horizontal" method="post" action="./trasladar_guarda_op.php">
                        <div class="mb-3"><label for="" class="form-label">Codigo: <?php echo $codigo; ?></label></div>
                        <div class="mb-3"><label for="" class="form-label">Nombre: <?php echo $nombre; ?></label></div>
                        <div class="mb-3"><label for="" class="form-label">Edad: <?php echo $edad; ?></label></div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jornada:</label>
                            <select class="form-control" name="jornada" required>
                                <?php
                                if ($jornada == "NOCTURNA") {
                                    echo "<option selected value='NOCTURNA'>NOCTURNA</option>
                                          <option value='DIURNA'>DIURNA</option>";
                                } else {
                                    echo "<option selected value='DIURNA'>DIURNA</option>
                                          <option value='NOCTURNA'>NOCTURNA</option>";
                                }

                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Empresa:</label>
                            <select class="form-control" name="empresa" required>
                                <?php
                                $queryEmpr = "SELECT NumEmpr,Nombre FROM empresas ";
                                $resultEmpr = mysqli_query($link, $queryEmpr);

                                while ($extraido = mysqli_fetch_array($resultEmpr)) {
                                    if ($extraido['NumEmpr'] == $cod_empr) {
                                        echo "<option selected value='" . $extraido['NumEmpr'] . "'>" . $extraido['Nombre'] . "</option>";
                                    } else {
                                        echo "<option value='" . $extraido['NumEmpr'] . "'>" . $extraido['Nombre'] . "</option>";
                                    }
                                }

                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Inicio de Contrato:</label>
                            <input type="date" class="form-control" name="inicio_contrato" value="<?php echo date($FechaIni); ?>" autofocus required></input>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fin de Contrato:</label>
                            <input type="date" class="form-control" name="fin_contrato" value="<?php echo date($FechaFin); ?>" autofocus required></input>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="guarda" value="<?php echo $_GET["codigo"]; ?>">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>










<?php include("../footer.php") ?>