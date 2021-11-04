<?php
    include("./header.php");
?>

<?php 
    include_once("./conexion.php");
    $sentencia = $bd -> query("SELECT * FROM persona");
    $persona = $sentencia ->fetchAll(PDO::FETCH_OBJ);
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Inicio alert-->

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <strong>Hola</strong> 
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script>
            

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
                                foreach ($persona as $dato){
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->codigo; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->edad; ?></td>
                                <td><?php echo $dato->signo; ?></td>
                                <td>Editar</td>
                                <td>Eliminar</td>
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
                        <input type="text" class="form-control" placeholder="Nombre" name="txtNombre" autofocus></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input type="text" class="form-control" placeholder="Edad" name="txtEdad" autofocus></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo:</label>
                        <input type="text" class="form-control" placeholder="Signo" name="txtSigno" autofocus></input>
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