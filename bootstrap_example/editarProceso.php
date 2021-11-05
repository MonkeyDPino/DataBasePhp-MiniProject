<?php

if(!isset($_POST["codigo"])){
    header("location: ./index.php?mensaje=error");
    exit();
}


include_once("./conexion.php");

$codigo = $_POST["codigo"];
$nombre = $_POST["txtNombre"];
$edad = $_POST["txtEdad"];
$signo = $_POST["txtSigno"];
$sentencia = $bd->prepare("UPDATE persona SET nombre = ?, edad = ?, signo = ? WHERE codigo = ?");
$resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

if($resultado == true) {

    header("location: ./index.php?mensaje=editado");
    exit();    

}else{

    header("location: ./index.php?mensaje=error");
    exit();

}


?>