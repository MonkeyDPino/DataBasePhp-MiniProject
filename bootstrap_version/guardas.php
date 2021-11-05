<?php include("./header.php") ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Inicio alert-->
            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "insertado") {
            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Insertado!</strong>
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
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "trasladado") {
            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Trasladado!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>

            <!-- Fin alert-->
            <div class="card">
                <div class="card-header">Lista de Guardas</div>
                <div class="p-4 overflow-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Jornada</th>
                                <th scope="col">Inicio de Contrato</th>
                                <th scope="col">Fin de Contrato</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require("conexion.php");
                            $query = "SELECT guardas.* , empresas.Nombre as NombreEmpresa FROM guardas LEFT JOIN empresas ON empresas.NumEmpr = guardas.Empresa ORDER BY NumGuard";
                            $result = mysqli_query($link, $query);

                            while ($extraido = mysqli_fetch_array($result)) {

                            ?>
                                <tr>
                                    <td scope="row"><?php echo $extraido["NumGuard"] ?></td>
                                    <td><?php echo $extraido["Nombre"] ?></td>
                                    <td><?php echo $extraido["Edad"] ?></td>
                                    <td><?php echo $extraido["NombreEmpresa"] ?></td>
                                    <td><?php echo $extraido["Jornada"] ?></td>
                                    <td><?php echo $extraido["FechaIni"] ?></td>
                                    <td><?php echo $extraido["FechaFin"] ?></td>
                                    <td><a class="text-blue" href="./guardas_func/trasladar_guarda.php?codigo=<?php echo $extraido["NumGuard"]?>"><i class="bi bi-arrow-repeat"></i><i class="bi bi-building"></i></a></td>
                                    <td><a onclick="return confirm('Seguro que quieres eliminar el guarda?')"  class="text-danger" href="./guardas_func/eliminar_guarda.php?codigo=<?php echo $extraido["NumGuard"]?>"><i class="bi bi-trash-fill"></i></a></td>
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
                <div class="card-header" >Ingresar Guarda</div>
                <form class="form-horizontal p-4" method="post" action="./guardas_func/insertar_guarda.php">
                    <div class="mb-3">
                        <label class="form-label">Codigo:</label>
                        <input type="number" class="form-control" placeholder="Codigo" name="codigo" autofocus required></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" autofocus required></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input type="number" class="form-control" placeholder="Edad" name="edad" autofocus required></input>
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