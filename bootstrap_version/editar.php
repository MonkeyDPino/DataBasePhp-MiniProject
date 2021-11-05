<?php
include("./header.php");
?>

<?php
    if(!isset($_GET["codigo"])){
        header("location: ./index.php?mensaje=error");
        exit();
    }

    include_once("./conexion.php");
    $codigo = $_GET["codigo"];
    $sentencia = $bd->prepare("SELECT * FROM persona WHERE codigo = ?");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Datos:
                </div>
                <form class="form-horizontal p-4" method="post" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="txtNombre" autofocus required value="<?php echo $persona->nombre; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input type="number" class="form-control" placeholder="Edad" name="txtEdad" autofocus required value="<?php echo $persona->edad; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo:</label>
                        <input type="text" class="form-control" placeholder="Signo" name="txtSigno" autofocus required value="<?php echo $persona->signo; ?>"></input>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
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