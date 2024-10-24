<?php

$conexion = mysqli_connect('localhost', 'root', '', 'estudiantes');

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['NIE'])) {
    $nie = $_POST['NIE'];
    $nombres = $_POST['Nombres'];
    $apellidos = $_POST['Apellidos'];
    $codigo = $_POST['Codigo'];
    $activo = $_POST['Activo'];


    $sql = "UPDATE estudianntes_iti SET Nombres='$nombres', Apellidos='$apellidos', Codigo='$codigo', Activo='$activo' WHERE NIE = '$nie'";

    if (mysqli_query($conexion, $sql)) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
