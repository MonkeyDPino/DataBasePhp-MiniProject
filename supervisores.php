<?php include("./header.php") ?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Lista de Supervisores</div>
                <div class="p-4 overflow-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Codigo Empresa</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Codigo Supervisor</th>
                                <th scope="col">Supervisor</th>
                                <th scope="col">Jornada</th>
                                <th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require("conexion.php");
                            $query = "SELECT guardas.Nombre Guarda ,guardas.NumGuard, guardas.Jornada,guardas.FechaIni,guardas.FechaFin, empresas.Nombre EmpresaNombre, empresas.NumEmpr FROM empresas INNER JOIN guardas ON empresas.Supervisor = guardas.NumGuard ORDER BY NumEmpr";
                            $result = mysqli_query($link,$query);

                            while ($extraido = mysqli_fetch_array($result)) {

                            ?>
                                <tr>
                                    <td scope="row"><?php echo $extraido["NumEmpr"] ?></td>
                                    <td><?php echo $extraido["EmpresaNombre"] ?></td>
                                    <td><?php echo $extraido["NumGuard"] ?></td>
                                    <td><?php echo $extraido["Guarda"] ?></td>
                                    <td><?php echo $extraido["Jornada"] ?></td>
                                    <td><?php echo $extraido["FechaIni"] ?></td>
                                    <td><?php echo $extraido["FechaFin"] ?></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>



<?php include("./footer.php") ?>