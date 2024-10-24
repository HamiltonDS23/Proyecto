<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link rel="stylesheet" href="estiloInicio.css">
    <style>
        body{
            background-image: url('ini.jpg');
    background-size: cover; /* Hace que la imagen cubra toda la pantalla */
    background-position: center; /* Centra la imagen */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    background-attachment: fixed; /* Hace que la imagen de fondo permanezca fija cuando se desplaza la página */
}
        /* Estilo de la barra de navegación */
        .navbar {
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
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

        /* Contenedor del mensaje de bienvenida */
        .container {
    width: 50%;
    margin: 0 auto;
    background: transparent; /* Fondo transparente */
    padding: 40px; /* Espacio interior */
    margin-top: 150px; /* Separación del menú */
    text-align: center;
    border: 2px solid rgba(225, 225, 225, 0.2); /* Borde con opacidad */
    backdrop-filter: blur(20px);
    border-radius: 15px; /* Bordes redondeados */

}

.container h1 {
    font-size: 2.5em;
    color: white; /* Color de las letras en blanco */
}

.container p {
    font-size: 1.2em;
    color: white; /* Color de las letras en blanco */
    line-height: 1.5;
}


        /* Estilos para el formulario */
        .form-container {
            width: 25%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            display: none; /* Inicialmente oculto */
        }

        .b_t_1 {
            border-radius: 5px;
            height: 10%;
            cursor: pointer;
            padding: 8px;
            border: none;
            transition: 1.5s;
        }

        .b_t_1:hover {
            transition: 1s;
            background-color: #4cae4c;
            border: 1px solid #333;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <div class="navbar">
        <a href="Inicio.php">Inicio</a>
        <a href="#" onclick="mostrarFormulario()">Registrar Nuevo Estudiante</a>
        <a href="lista_estudiantes.php">Ver Estudiantes Registrados</a>
    </div>

    <!-- Contenedor del mensaje de bienvenida -->
    <div class="container" id="bienvenida">
        <h1>Bienvenido al registro de estudiantes 2025</h1>
        <p>Use el menú de navegación para registrar nuevos estudiantes o ver la lista de estudiantes registrados.</p>
    </div>

    <!-- Contenedor del formulario de registro (oculto inicialmente) -->
    <div class="form-container" id="formularioRegistro">
        <h1>Registro de Estudiantes</h1>
        <form action="php/registro_usuario_be.php" method="POST" class="formulario_register">
            <label for="correo">NIE</label>
            <input type="text" id="correo" name="NIE" required placeholder="4698991">
            <label for="nombre">Nombre</label>
            <input type="text" name="Nombres" required placeholder="Roberto Carlos">
            <label for="apellido">Apellido:</label>
            <input type="text" name="Apellidos" required placeholder="Ortiz Vargas">
            <label for="codigo_seccion">Codigo de Sección:</label>
            <input type="text" name="Codigo" maxlength="50" required placeholder="DS2A">
            <label for="activo">Activo:</label>
            <input class="Activo" type="text" name="Activo" required placeholder="Sí/NO">
            <button class="b_t_1">Registrarse</button>
        </form>
    </div>

    <!-- Script para mostrar el formulario de registro -->
    <script>
        function mostrarFormulario() {
            document.getElementById('bienvenida').style.display = 'none';
            document.getElementById('formularioRegistro').style.display = 'block';
        }
    </script>

</body>
</html>
