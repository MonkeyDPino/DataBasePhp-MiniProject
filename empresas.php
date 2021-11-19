<?php include("./header.php") ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Inicio alert-->
            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "insertada") {
            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Insertada!</strong>
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
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "sin_empleados") {
            ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Sin Empleados!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>

            <!-- Inicio alert-->
            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "asignado") {
            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Supervisor Asignado!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>

            <!-- Inicio alert-->
            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "eliminada") {
            ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Empresa Eliminada!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>

            <!-- Fin alert-->
            <div class="card">
                <div class="card-header">Lista de Empresas</div>
                <div class="p-4 overflow-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Supervisor</th>
                                <th scope="col">Inicio de Contrato</th>
                                <th scope="col">Fin de Contrato</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require("conexion.php");
                            $query = "SELECT empresas.* , guardas.Nombre as NombreGuard FROM guardas RIGHT JOIN empresas ON empresas.Supervisor = guardas.NumGuard ORDER BY NumEmpr";
                            $result = mysqli_query($link, $query);

                            while ($extraido = mysqli_fetch_array($result)) {

                            ?>
                                <tr>
                                    <td scope="row"><?php echo $extraido["NumEmpr"] ?></td>
                                    <td><?php echo $extraido["Nombre"] ?></td>
                                    <td><?php echo $extraido["NombreGuard"] ?></td>
                                    <td><?php echo $extraido["IniContrato"] ?></td>
                                    <td><?php echo $extraido["finContrato"] ?></td>
                                    <td><a class="text-blue" href="./empresas_func/asign_sup.php?codigo=<?php echo $extraido["NumEmpr"]?>"><i class="bi bi-pencil-fill"></i><i class="bi bi-person-square"></i></a></td>
                                    <td><a onclick="return confirm('Seguro que quieres eliminar la empresa?')"  class="text-danger" href="./empresas_func/borrar_empr.php?codigo=<?php echo $extraido["NumEmpr"]?>"><i class="bi bi-trash-fill"></i></a></td>
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
                <div class="card-header" >Ingresar Empresa</div>
                <form class="form-horizontal p-4" method="post" action="./empresas_func/registrar_empresa.php">
                    <div class="mb-3">
                        <label class="form-label">Codigo:</label>
                        <input type="number" class="form-control" placeholder="Codigo" name="codigo" autofocus required></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" autofocus required></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fin de Contrato:</label>
                        <input type="date" class="form-control" name="fin_contrato" autofocus required></input>
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