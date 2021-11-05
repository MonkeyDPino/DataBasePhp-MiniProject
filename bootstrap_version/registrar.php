<?php
    //print_r($_POST);
    if (empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtSigno"])) {
        header("Location: index.php?mensaje=falta");
        exit();
    }

    include_once("./conexion.php");

    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $signo = $_POST["txtSigno"];

    $sentencia = $bd->prepare("INSERT INTO persona(nombre,edad,signo) VALUES(?,?,?)");
    $resultado = $sentencia->execute([$nombre,$edad,$signo]);

    if ($resultado == true) {
        header("Location: index.php?mensaje=registrado");
        exit();
    } else {
        header("Location: index.php?mensaje=error");
        exit();
    }
    

?>