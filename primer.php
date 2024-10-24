<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a la base de datos
$servidor = 'localhost';  // Cambiar si usas un servidor externo
$usuario = 'root';        // Cambiar según el hosting
$contrasena = '';         // Cambiar según el hosting
$basedatos = 'estudiantes';  // Nombre de la base de datos

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);

if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Verificar si se ha recibido el NIE a través del parámetro GET
if (isset($_GET['nie'])) {
    $nie = mysqli_real_escape_string($conexion, $_GET['nie']);

    // Consulta para obtener los datos del estudiante basado en el NIE
    $sql = "SELECT * FROM estudianntes_iti WHERE NIE = '$nie'";
    $result = mysqli_query($conexion, $sql);

    // Verificar si la consulta se ejecutó correctamente
    if (!$result) {
        die("Error en la consulta SQL: " . mysqli_error($conexion));
    }

    // Verificar si se encontró un estudiante con el NIE proporcionado
    if (mysqli_num_rows($result) > 0) {
        $estudiante = mysqli_fetch_assoc($result);
        ?>
        
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Información del Estudiante</title>
        </head>
        <body>
            <h1>Información del Estudiante</h1>
            <p><strong>NIE:</strong> <?php echo htmlspecialchars($estudiante['NIE']); ?></p>
            <p><strong>Nombres:</strong> <?php echo htmlspecialchars($estudiante['Nombres']); ?></p>
            <p><strong>Apellidos:</strong> <?php echo htmlspecialchars($estudiante['Apellidos']); ?></p>
            <p><strong>Código:</strong> <?php echo htmlspecialchars($estudiante['Codigo']); ?></p>
            <p><strong>Activo:</strong> <?php echo htmlspecialchars($estudiante['Activo']); ?></p>
            <p><strong>Hora de Entrada:</strong> <?php echo htmlspecialchars($estudiante['hora_entrada']); ?></p>
            <p><strong>Hora de Salida:</strong> <?php echo htmlspecialchars($estudiante['hora_salida']); ?></p>
        </body>
        </html>

        <?php
    } else {
        echo "<p>No se encontró ningún estudiante con el NIE: " . htmlspecialchars($nie) . "</p>";
    }
} else {
    echo "<p>No se ha proporcionado ningún NIE.</p>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>


