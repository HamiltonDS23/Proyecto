<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Define la codificación de caracteres del documento -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Hace que el sitio web sea compatible con dispositivos móviles -->
    <link rel="stylesheet" href="estilo.css"> <!-- Enlace a una hoja de estilos externa -->
    <title>Formulario de Login</title> <!-- Título de la página -->
    <style>
        /* Reinicia márgenes y paddings, y establece el modelo de caja */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos generales del cuerpo */
        body {
            font-family: Helvetica Neue, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url(fondo.jpg); /* Imagen de fondo */
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Estilos del formulario */
        form {
            padding: 50px;
            display: flex; 
            flex-direction: column;
            width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Sombra para el formulario */
            border-radius: 15px; /* Bordes redondeados */
            background-color: transparet ; /* Fondo semitransparente */
        }

        /* Estilos para el título del formulario */
        h2 {
            text-align: center;
            font-size: 30px;
            text-transform: uppercase; /* Convierte el texto a mayúsculas */
            color: #fff;
            margin-bottom: 25px;
        }

        /* Estilos para las etiquetas y el párrafo del error */
        label,
        p {
            font-size: 17px;
            color: #fff;
            margin-bottom: 10px;
        }

        /* Estilos para los campos de entrada */
        input {
            padding: 17px 11px;
            border: 1px solid #00adef; /* Borde azul claro */
            border-radius: 25px;
            margin-bottom: 25px;
            background-color: #fafafc;
            outline: none;
            color: #00adef; /* Color de texto azul claro */
            font-size: 17px;
        }

        /* Estilos para el botón de enviar */
        .btn-1 {
            background-color: #00adef;
            font-size: 15px;
            color: #ffffff;
            text-transform: uppercase;
            padding: 15px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Transición suave al pasar el ratón */
        }

        /* Cambio de color del botón al pasar el ratón */
        .btn-1:hover {
            background-color: #04b8ff;
        }

        /* Estilos responsivos para pantallas pequeñas */
        @media (max-width: 991px) {
            body {
                padding: 30px;
            }

            form {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<?php
$error = ""; // Variable que almacenará el mensaje de error, si lo hay

// Verifica si el formulario fue enviado usando el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Obtiene el valor del campo 'username'
    $password = $_POST['password']; // Obtiene el valor del campo 'password'

    // Verifica si el correo ingresado es el autorizado
    if ($username === 'briamortiz07@gmail.com') {
        // Verifica si la contraseña es correcta
        if ($password === 'JM070307') { 
            // Si la contraseña es correcta, redirige a la página de inicio
            header("Location: inicio.php");
            exit(); // Asegura que el script se detenga después de la redirección
        } else {
            $error = "Contraseña incorrecta."; // Asigna el mensaje de error si la contraseña es incorrecta
        }
    } else {
        $error = "Correo no autorizado."; // Asigna el mensaje de error si el correo no está autorizado
    }
}
?>

<!-- Formulario de inicio de sesión -->
<form action="" method="POST">
    <h2>Login</h2> <!-- Título del formulario -->

    <!-- Campo para ingresar el correo -->
    <label for="username">Correo</label>
    <input type="text" id="username" name="username" required> <!-- Campo de texto requerido -->

    <!-- Campo para ingresar la contraseña -->
    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password" required> <!-- Campo de contraseña requerido -->

    <!-- Botón para enviar el formulario -->
    <button type="submit" class="btn-1">Iniciar Sesión</button>

    <!-- Muestra el mensaje de error si existe -->
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</form>

</body>
</html>
