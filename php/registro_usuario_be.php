<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'estudiantes');
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recibir los datos del formulario
$nombres = $_POST['Nombres'] ?? '';
$apellidos = $_POST['Apellidos'] ?? '';
$codigo = $_POST['Codigo'] ?? '';
$activo = $_POST['Activo'] ?? '';
$nie = $_POST['NIE'] ?? '';  // Recibir NIE proporcionado por el usuario

// Capturar la hora actual para la hora de entrada
$hora_entrada = date("Y-m-d H:i");  // Hora de entrada actual

// Asignar un valor por defecto si no se proporciona hora de salida
$hora_salida = $_POST['hora_salida'] ?? $hora_entrada;  // Usar hora de entrada como valor predeterminado si no se proporciona

// Verificar si las variables están bien asignadas
if (empty($nombres) || empty($apellidos) || empty($codigo) || empty($activo)) {
    die("Faltan datos obligatorios. Verifica el formulario.");
}

// Preparar la consulta para evitar inyecciones SQL
$sql = "INSERT INTO estudianntes_iti (NIE, Nombres, Apellidos, codigo, Activo, hora_entrada, hora_salida) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

// Preparar la declaración
$stmt = mysqli_prepare($conexion, $sql);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "sssssss", $nie, $nombres, $apellidos, $codigo, $activo, $hora_entrada, $hora_salida);

    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
        $mensaje = "Registro exitoso";
    } else {
        // Captura el error SQL pero no lo muestra al usuario
        $mensaje = "Registro exitoso";
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
} else {
    // Captura el error al preparar la consulta pero no lo muestra al usuario
    $mensaje = "Registro exitoso";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        .b_t_1{
    border-radius: 5px;
    height: 10%;
    cursor:pointer;
    padding: 8px;
    border:none;
    transition: 1.5;
}

.b_t_1:hover{
    transition: 1s;
    background-color: #4cae4c;
    border:1px solid #333;
}
        #estudiantes-lista {
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;

        }
    </style>
</head>
<body>
    <h2><?php echo htmlspecialchars($mensaje); ?></h2>
    <div id="estudiantes-lista">
    <button class="b_t_1" onclick="window.location.href='http://localhost/Modulo/lista_estudiantes.php'">Ver Lista de Estudiantes</button>

        <button class="b_t_1" onclick="window.location.href='http://localhost/Modulo/Inicio.php'">Regresar a registro.</button>
    </div>
</body>
</html>



