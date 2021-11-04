<?php
    print_r($_POST);
    if (empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtSigno"])) {
        header("Location: index.php?mensaje=falta");
    }
?>