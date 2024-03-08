<!DOCTYPE html>
<html>

<head>
    <title>Cliente - Perfect Skin</title>
    <link rel="stylesheet" href="cliente.style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png" type="image/png">
</head>

<body>
    <header>
        <h1>Bienvenido A Perfect Skin</h1>
        <?php
        // Recuperar el nombre del cliente de la URL o de la sesión (dependiendo de cómo lo estés manejando)
        $nombre_cliente = "";

        if (isset($_GET['nombre'])) {
            $nombre_cliente = $_GET['nombre'];
        } elseif (isset($_SESSION['nombre_cliente'])) {
            $nombre_cliente = $_SESSION['nombre_cliente'];
        }

        if (!empty($nombre_cliente)) {
            echo "<p>Bienvenido, $nombre_cliente</p>";
        }
        ?>
    </header>

    <section class="informacion">
        <h2>Información</h2>
        <p>¡Descubre la excelencia en el cuidado de tu piel con Perfect Skin! Explora nuestra gama de servicios y
            productos diseñados para transformar y resaltar tu belleza natural. Somos líderes en el país en el
            tratamiento de barros, eliminación de imperfecciones y revitalización de la piel. ¡Confía en nosotros para
            revelar la mejor versión de ti!</p>
    </section>

    <section class="fotografias">
        <h2>Fotografías De nuestros clientes</h2>
        <div class="galeria">
            <img src="img/Fotos - Cliente.jpg" alt="Imagen 1">
            <img src="img/Fotos - Cliente2.jpg" alt="Imagen 2">
            <img src="img/Fotos - Cliente3.jpg" alt="Imagen 3">
            <a href="testimonios.php" class="boton-testimonios">Testimonios de nuestros clientes</a>
        </div>
    </section>

    <section class="citas">
        <h2>Reservar Cita</h2>
        <p>Selecciona una fecha y horario para tu cita:</p>
        <form action="agendarcitas.php" method="POST">
            <!-- Agregamos un campo oculto para pasar el nombre del cliente -->
            <input type="hidden" name="nombre_cliente" value="<?php echo htmlspecialchars($nombre_cliente); ?>">

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>

            <input type="submit" value="Reservar">
        </form>
    </section>

    <footer>
        <p>&copy; 2023 Perfect Skin</p>
    </footer>
</body>

</html>