<?php
include("./header.php");
?>

<?php
include_once("./conexion.php");
$sentencia = $bd->query("SELECT * FROM persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Inicio alert-->

            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "falta") {
            ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Llena todos los campos
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>
            <!-- Inicio alert-->
            <?php
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == "registrado") {
            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong>
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
                    <strong>Editado!</strong>
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
                <div class="card-header">Lista</div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Signo</th>
                                <th scope="col" colspan="2">opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($persona as $dato) {
                            ?>

                                <tr>
                                    <td scope="row"><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->edad; ?></td>
                                    <td><?php echo $dato->signo; ?></td>
                                    <td class="text-success"><a href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pen"></i></a></td>
                                    <td class="text-danger"><a onclick="return confirm('Are you sure you want to delete this?')" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
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
                <div class="card-header">
                    Ingresar Datos:
                </div>
                <form class="form-horizontal p-4" method="post" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="txtNombre" autofocus required></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input type="number" class="form-control" placeholder="Edad" name="txtEdad" autofocus required></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo:</label>
                        <input type="text" class="form-control" placeholder="Signo" name="txtSigno" autofocus required></input>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include("./footer.php");
?>