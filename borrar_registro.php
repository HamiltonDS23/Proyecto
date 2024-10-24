<?php

$conexion = mysqli_connect('localhost', 'root', '', 'estudiantes');

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['NIE'])) {
    $nie = $_POST['NIE'];

   
    $sql = "DELETE FROM estudianntes_iti WHERE NIE = '$nie'";

    if (mysqli_query($conexion, $sql)) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
