<?php 
$conexion = mysqli_connect('localhost', 'root', '', 'estudiantes');

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos</title>
    <link rel="stylesheet" href="estiloInicio.css">
</head>
<body>

<br>

<table border="1">
    <tr>
        <td>NIE</td>
        <td>Nombres</td>
        <td>Apellidos</td>
        <td>Especialidad</td>
        <td>Código</td>
        <td>Activo</td>
        <td>Hora de Entrada</td>
        <td>Hora de Salida</td>
    </tr>

    <?php 
    $sql = "SELECT * FROM estudianntes_iti";
    $result = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_array($result)) {
    ?>

    <tr>
        <td><?php echo $mostrar['NIE'] ?></td>
        <td><?php echo $mostrar['Nombres'] ?></td>
        <td><?php echo $mostrar['Apellidos'] ?></td>
        <td><?php echo $mostrar['Especialidad'] ?></td>
        <td><?php echo $mostrar['Código'] ?></td>
        <td><?php echo $mostrar['Activo'] ?></td>
        <td><?php echo $mostrar['hora_entrada'] ?></td>
        <td><?php echo $mostrar['hora_salida'] ?></td>
    </tr>
    <?php 
    }
    ?>
</table>

</body>
</html>

<?php
mysqli_close($conexion);
?>
