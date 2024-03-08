<!DOCTYPE html>
<html>

<head>
    <title>Administrador-Perfect-Skin</title>
    <link rel="stylesheet" href="Administrador-style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/logo.png" type="image/png">
    <style>
    /* Estilo para ocultar las opciones por defecto */
    .options {
        display: none;
        position: absolute;
        top: 40px;
        /* Ajusta la posición vertical según tu diseño */
        left: 10px;
        /* Ajusta la posición horizontal según tu diseño */
        background: #fff;
        border: 1px solid #04CF9E;
        padding: 10px;
        z-index: 1;
    }

    .options a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #04CF9E;
        /* Corregido el color aquí */
    }

    .options a:hover {
        background-color: #007bff;
        color: #fff;
    }

    /* Estilo para el botón de opciones */
    #show-options-button {
        position: fixed;
        top: 10px;
        left: 10px;
        background: #007bff;
        color: #fff;
        padding: 10px 15px;
        cursor: pointer;
        border: none;
        border-radius: 50%;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-content">
            <!-- Opciones ocultas por defecto -->
            <div class="options" id="options">
                <a href="citas_agendadas.php">Ver Citas Agendadas</a>
                <a href="Crearusuario.php">Crear Usuario</a>
            </div>

            <!-- Botón o ícono para mostrar opciones -->
            <button id="show-options-button" onclick="toggleOptions()"><i class='bx bx-down-arrow'></i></button>
        </div>
    </div>

    <script>
    // Función para alternar la visibilidad de las opciones
    function toggleOptions() {
        var options = document.getElementById('options');
        if (options.style.display === 'block') {
            options.style.display = 'none';
        } else {
            options.style.display = 'block';
        }
    }
    </script>
</body>

</html>