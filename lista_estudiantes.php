<?php 

$conexion = mysqli_connect('localhost', 'root', '', 'estudiantes');

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['borrar'])) {
    $nie = $_POST['NIE'];

    $sql_borrar = "DELETE FROM estudianntes_iti WHERE NIE = '$nie'";
    mysqli_query($conexion, $sql_borrar);
}

if (isset($_POST['editar'])) {
    $nie_original = $_POST['NIE_original']; 
    $nie = $_POST['NIE']; 
    $nombres = $_POST['Nombres'];
    $apellidos = $_POST['Apellidos'];
    $codigo = $_POST['Codigo'];
    $activo = $_POST['Activo'];

    $sql_actualizar = "UPDATE estudianntes_iti SET NIE='$nie', Nombres='$nombres', Apellidos='$apellidos', Codigo='$codigo', Activo='$activo' WHERE NIE = '$nie_original'";
    mysqli_query($conexion, $sql_actualizar);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos</title>
    <link rel="stylesheet" href="Tablas.css">

    <style>

        /* Estilo de la barra de navegación con ocultamiento */
        .navbar {
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: top 0.3s; /* Transición suave para el desplazamiento */
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Ajuste del contenedor */
        table {
            margin-top: 570px; /* Ajuste para la barra de navegación */
            width: 90%;
            margin: 0 auto;

        }
    </style>

    <script>
        // JavaScript para ocultar la barra de navegación al hacer scroll hacia abajo
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.querySelector(".navbar").style.top = "0"; // Mostrar barra
            } else {
                document.querySelector(".navbar").style.top = "-60px"; // Ocultar barra
            }
            prevScrollpos = currentScrollPos;
        }
    </script>

</head>
<body>

    <!-- Barra de navegación -->
    <div class="navbar">
        <a href="Inicio.php">Inicio</a>
        <a href="lista_estudiantes.php">Ver Estudiantes Registrados</a>
    </div>

<br>
<style>
    /* Estilo para todo el encabezado */
    thead tr {
        background-color: #87CEEB; /* Celeste más oscuro */
    }

    /* Estilo para las filas impares (a partir de la segunda fila) con el tono celeste más claro */
    tbody tr:nth-child(odd) {
        background-color: #b2e0f7; /* Celeste más claro */
    }
</style>

<table border="1">
    <thead>
        <tr>
            <td>NIE</td>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Codigo</td>
            <td>Activo</td>
            <td>Hora de Entrada</td>
            <td>Hora de Salida</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        <?php 
        // Consultar la lista de estudiantes
        $sql = "SELECT * FROM estudianntes_iti";
        $result = mysqli_query($conexion, $sql);

        while ($mostrar = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $mostrar['NIE'] ?></td>
            <td><?php echo $mostrar['Nombres'] ?></td>
            <td><?php echo $mostrar['Apellidos'] ?></td>
            <td><?php echo $mostrar['Codigo'] ?></td>
            <td><?php echo $mostrar['Activo'] ?></td>
            <td><?php echo $mostrar['hora_entrada'] ?></td>
            <td><?php echo $mostrar['hora_salida'] ?></td>
            <td>
                <!-- Botón para editar el registro: despliega el formulario de edición -->
                <button onclick="document.getElementById('editar-<?php echo $mostrar['NIE'] ?>').style.display='block'">Editar</button>

                <!-- Botón para borrar el registro -->
                <form action="" method="POST" style="display:inline;">
                    <input type="hidden" name="NIE" value="<?php echo $mostrar['NIE'] ?>">
                    <button type="submit" name="borrar" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Borrar</button>
                </form>

                <!-- Formulario oculto para editar el registro -->
                <div id="editar-<?php echo $mostrar['NIE'] ?>" style="display:none; margin-top: 20px;">
                    <form action="" method="POST">
                        <!-- Campo oculto para el NIE original -->
                        <input type="hidden" name="NIE_original" value="<?php echo $mostrar['NIE'] ?>">
                        
                        <label>NIE:</label>
                        <input type="text" name="NIE" value="<?php echo $mostrar['NIE'] ?>" required>
                        
                        <label>Nombres:</label>
                        <input type="text" name="Nombres" value="<?php echo $mostrar['Nombres'] ?>">
                        
                        <label>Apellidos:</label>
                        <input type="text" name="Apellidos" value="<?php echo $mostrar['Apellidos'] ?>">
                        
                        <label>Codigo:</label>
                        <input type="text" name="Codigo" value="<?php echo $mostrar['Codigo'] ?>">
                        
                        <label>Activo:</label>
                        <input type="text" name="Activo" value="<?php echo $mostrar['Activo'] ?>">
                        
                        <button type="submit" name="editar">Actualizar</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php 
        }
        ?>
    </tbody>
</table>


<!-- Botón para descargar el PDF -->
<br>
<form action="genera_pdf.php" method="post">
    <button type="submit">Descargar Tabla en PDF</button>
</form>

</body>
</html>

<?php
mysqli_close($conexion);
?>
