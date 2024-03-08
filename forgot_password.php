<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css"> <!-- Agrega aquí tu hoja de estilo personalizada -->
    <link rel="icon" href="img/logo.png" type="image/png">
    <style>
    /* Estilos CSS adicionales para esta página */
    body {
        background-image: url(img/LOGO.jpeg);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* Establece la altura al 100% del viewport para centrar verticalmente */
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 0;
        padding: 0;
        background-color: #f3f3f3;
    }


    h2 {
        color: #333;
    }

    p {
        color: #666;
    }

    form {
        background-color: #fff;
        max-width: 300px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        text-align: left;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .message {
        margin-top: 20px;
        color: #007BFF;
        display: none;
    }
    </style>
</head>

<body>
    <h2>Has olvidado tu contraseña</h2>
    <p>Ingrese su dirección de correo electrónico para restablecer su contraseña</p>
    <form action="procesar_recuperacion.php" method="POST">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <div class="message" id="successMessage">
        ¡Correo electrónico enviado con éxito! Revise su bandeja de entrada.
    </div>
    <div class="message" id="errorMessage">
        Se produjo un error al enviar el correo electrónico. Inténtelo de nuevo más tarde.
    </div>
    <script>
    // Aquí puedes agregar JavaScript para mostrar u ocultar mensajes de éxito o error después de enviar el formulario.
    // Por ejemplo, si estás utilizando AJAX para enviar el formulario y recibir una respuesta del servidor.
    </script>
</body>

</html>