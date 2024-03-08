<!DOCTYPE html>
<html lang="es">

<head>
    <title>Testimonios - Perfect Skin</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <style>
    body {
        background-size: cover;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        color: #fff;
    }

    header {
        background-color: #38d39f;
        padding: 20px;
        text-align: center;
    }

    section {
        padding: 20px;
    }

    .testimonios {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    blockquote {
        font-size: 1.2em;
        margin: 20px 0;
    }

    h2 {
        margin-bottom: 10px;
    }

    .media-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        /* Centra verticalmente los elementos */
        flex-wrap: wrap;
        /* Permite que los elementos se envuelvan si no caben en una fila */
        margin-top: 20px;
        /* Ajusta este valor para aumentar el margen superior */
    }

    video,
    img {
        width: 100%;
        /* Ocupa el 100% del contenedor */
        max-width: 250px;
        /* Ajusta el ancho máximo según tus preferencias */
        height: auto;
        /* Se ajusta automáticamente al ancho */
        margin: -100px 0;
        /* Agrega un pequeño margen arriba y abajo */
    }

    .testimonios p {
        color: #000;
        /* Cambia el color del texto a negro */
    }

    footer {
        background-color: #38d39f;
        padding: 10px;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>
    <header>
        <h1>Testimonios de Nuestros Clientes</h1>
    </header>

    <section class="testimonios">
        <p>¡Descubre lo que nuestros clientes tienen que decir sobre Perfect Skin!</p>
        <blockquote>
            "Increíble servicio y resultados. Mi piel nunca ha lucido mejor. ¡Gracias, Perfect Skin!"
            <cite> - Cliente Satisfecho</cite>
        </blockquote>

        <!-- Puedes agregar más testimonios según sea necesario -->

        <!-- Área para videos e imágenes -->
        <h2>Testimonios Multimedia</h2>
        <div class="media-container">
            <!-- Reemplaza 'img/Videotestimonio1.mp4' con la ruta correcta a tus videos locales -->
            <video controls>
                <source src="img/Videotestimonio1.mp4" type="video/mp4">
                Tu navegador no soporta el elemento de video.
            </video>

            <!-- Reemplaza 'ruta/a/tu/imagen1.jpg' con la ruta correcta a tus imágenes locales -->
            <img src="img/testimonio2.jpg" alt="Imagen 1">

            <!-- Reemplaza 'ruta/a/tu/imagen2.jpg' con la ruta correcta a tus imágenes locales -->
            <img src="img/testimonio3.jpg" alt="Imagen 2">
        </div>

    </section>


</html>