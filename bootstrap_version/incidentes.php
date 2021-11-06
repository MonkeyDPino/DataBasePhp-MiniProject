<?php include("./header.php") ?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Inicio alert-->
            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "insertado") {
            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Incidente Insertado!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>
            <!-- Inicio alert-->
            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "error") {
            ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>
            <!-- Inicio alert-->
            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "editado") {
            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Incidente Editado!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>
            <!-- Inicio alert-->
            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "eliminado") {
            ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>

            <!-- Fin alert-->
            <div class="card">
                <div class="card-header">Lista de Incidentes</div>
                <div class="p-4 overflow-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Guarda</th>
                                <th scope="col">Comentarios</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require("conexion.php");
                            $query = "SELECT guardas.Nombre Guarda , empresas.Nombre Empresa, incidentes.* FROM ( incidentes LEFT JOIN empresas ON empresas.NumEmpr = incidentes.NumEmpr ) LEFT JOIN guardas ON guardas.NumGuard = incidentes.NumGuard ORDER BY NumEmpr";
                            $result = mysqli_query($link, $query);

                            while ($extraido = mysqli_fetch_array($result)) {

                            ?>
                                <tr>
                                    <td scope="row"><?php echo $extraido["NumInci"] ?></td>
                                    <td><?php echo $extraido["Empresa"] ?></td>
                                    <td><?php echo $extraido["Guarda"] ?></td>
                                    <td><?php echo $extraido["Comentarios"] ?></td>
                                    <td><?php echo $extraido["Fecha"] ?></td>
                                    <td><a class="text-blue" href="./incidentes_func/editar_comen.php?codigo=<?php echo $extraido["NumInci"] ?>"><i class="bi bi-pencil-fill"></i><i class="bi bi-receipt-cutoff"></i></a></td>
                                    <td><a onclick="return confirm('Seguro que quieres eliminar la empresa?')" class="text-danger" href="./incidentes_func/eliminar_inci.php?codigo=<?php echo $extraido["NumInci"] ?>"><i class="bi bi-trash-fill"></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Ingresar Incidente</div>
                <form class="form-horizontal p-4" method="post" action="./incidentes_func/insertar_inci.php">
                    <div class="mb-3">
                        <label class="form-label">Codigo:</label>
                        <input type="number" class="form-control" placeholder="Codigo" name="codigo" autofocus required></input>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Empleado:</label>
                        <select class="form-control" name="cods" required>
                            <?php
                            require("conexion.php");
                            # Poner los guardas y guardar sus empresas
                            $query = "SELECT NumGuard,guardas.Nombre Guarda,NumEmpr,empresas.Nombre Empresa FROM guardas INNER JOIN  empresas ON guardas.Empresa = empresas.NumEmpr ORDER BY NumEmpr";
                            $result = mysqli_query($link, $query);
                            while ($extraido = mysqli_fetch_array($result)) {
                                echo "<option value='" . $extraido['NumGuard'] . " " . $extraido["NumEmpr"] . "'>" . $extraido['Guarda'] . " -> " . $extraido["Empresa"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comentarios" required></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha:</label>
                        <input type="date" class="form-control" name="fecha" autofocus required></input>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<?php include("./footer.php") ?>