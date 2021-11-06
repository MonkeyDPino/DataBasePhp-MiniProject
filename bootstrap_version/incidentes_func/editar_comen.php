<?php include("./header_on_carpet.php") ?>

<?php

require("../conexion.php");
$query = "SELECT guardas.Nombre Guarda , empresas.Nombre Empresa, incidentes.* FROM ( incidentes LEFT JOIN empresas ON empresas.NumEmpr = incidentes.NumEmpr ) LEFT JOIN guardas ON guardas.NumGuard = incidentes.NumGuard  WHERE NumInci = '" . $_GET["codigo"] . "'";
$result = mysqli_query($link, $query);

while ($extraido = mysqli_fetch_array($result)) {
    $codigo = $extraido['NumInci'];
    $guarda = $extraido['Guarda'];
    $empresa = $extraido['Empresa'];
    $comentarios = $extraido['Comentarios'];
    $fecha = $extraido['Fecha'];
}

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Editar Comentarios</div>
                <div class="p-4">
                    <form class="form-horizontal" method="post" action="./editar_comen_op.php">
                        <div class="mb-3"><label for="" class="form-label">Codigo: <?php echo $codigo; ?></label></div>
                        <div class="mb-3"><label for="" class="form-label">Guarda: <?php echo $guarda; ?></label></div>
                        <div class="mb-3"><label for="" class="form-label">Empresa: <?php echo $empresa; ?></label></div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comentarios" required><?php echo $comentarios; ?></textarea>
                                <label for="floatingTextarea2">Comments</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha:</label>
                            <input type="date" class="form-control" name="fecha" value = "<?php echo $fecha; ?>" autofocus required></input>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="incidente" value="<?php echo $_GET["codigo"]; ?>">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>










<?php include("../footer.php") ?>