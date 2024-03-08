<!DOCTYPE html>
<html lang="es">
<head>
    <title>Perfect - Skin</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="icon" href="img/logo.png" type="image/png">
    <style>
    /* Estilos para el elemento de fecha y hora */
    .date-time {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 16px;
        color: #fff;
    }

    /* Estilo para la alerta de campos vacíos */
    .alert {
        color: red;
        margin-top: 5px;
    }

    /* Estilo para ocultar campos adicionales cuando el rol no es cliente */
    .hidden {
        display: none;
    }

    /* Estilo para los campos de entrada con efecto de enfoque */
    .input-effect {
        border: 2px solid #a55c55;
    }

    /* Estilo para el campo de entrada enfocado */
    .input-effect.focus {
        border-color: #45a049;
    }

    /* Estilo para el campo de entrada con alerta */
    .input-alert {
        border-color: red;
    }

    /* Estilo para el mensaje de registro exitoso */
    #registroExitoso {
        text-align: center;
        display: none;
    }

    /* Estilo para el mensaje de error */
    #mensajeError {
        color: red;
        text-align: center;
        margin-top: 10px;
    }

    /* Estilo para el mensaje de bienvenida del administrador */
    #bienvenidaAdmin {
        color: #04CF9E;
        text-align: center;
        display: none;
    }
    </style>

    <script>
    function registrar() {
        var name = document.getElementById("username").value;
        var apellido = document.querySelector('#login-form #additional-fields input[name="apellido"]').value;
        var edad = document.querySelector('#login-form #additional-fields input[name="edad"]').value;
        var CC = document.querySelector('#login-form #additional-fields input[name="CC"]').value;

        $.ajax({
            type: "POST",
            url: "registrar_clientes.php",
            data: {
                method: 'crear',
                usernanme: name,
                apellido: apellido,
                edad: edad,
                CC: CC
            },
            success: function(res) {
                // Cambia el contenido y estilo del elemento de registro exitoso
                document.getElementById('registroExitoso').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('registroExitoso').style.display = 'none';
                }, 3000); // Después de 3 segundos, oculta el mensaje de registro exitoso
            }
        });
    }
    </script>
</head>

<body>
    <!-- Imagen de fondo -->
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/Perfect-Skin.jpg">
        </div>
        <div class="login-content2">
            <!-- Redes sociales -->
            <div class="social-icons">
                <a href="https://www.facebook.com/PerefectsSkin?locale=es_LA" class="social-icon facebook"
                    target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/perfectskin_ctg/?igshid=MzRlODBiNWFlZA%3D%3D"
                    class="social-icon instagram" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>

            <div class "date-time" id="date-time"></div> <!-- Elemento para mostrar la fecha y hora -->

            <div class="login-content">
                <form method="post" id="login-form">
                    <h2 class="title">
                        Bienvenido
                    </h2>

                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>nombre</h5>
                            <input type="text" class="input input-effect" id="username" name="username">
                            <div class="alert" id="nombreAlert"></div>
                        </div>
                    </div>

                    <div class="div">
                        <h5>Rol</h5>
                        <select class="input input-effect" id="rol" name="rol">
                            <option value="administrador">administrador</option>
                            <option value="cliente">cliente</option>
                        </select>
                    </div>

                    <!-- Campos de contraseña -->
                    <div class="div" id="password-fields" class="hidden">
                        <div class="input-div focus">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Contraseña</h5>
                                <input type="password" class="input input-effect" id="password">
                                <div class="alert" id="passwordAlert"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Campos adicionales ocultos -->
                    <div id="additional-fields" class="hidden">
                        <div class="input-div focus">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <h5>apellido</h5>
                                <input type="text" name="apellido" class="input input-effect">
                                <div class="alert" id="apellidoAlert"></div>
                            </div>
                        </div>

                        <div class="input-div focus">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <h5>edad</h5>
                                <input type="text" name="edad" class="input input-effect">
                                <div class="alert" id="edadAlert"></div>
                            </div>
                        </div>

                        <div class="input-div focus">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <h5>CC</h5>
                                <input type="text" name="CC" class="input input-effect">
                                <div class="alert" id="ccAlert"></div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn" value="Ingresar">
                </form>

                <!-- Elemento para mostrar el mensaje de registro exitoso -->
                <div id="registroExitoso">
                    <p style="color: #04CF9E;">Registro exitoso. Continuar...</p>
                </div>

                <!-- Elemento para mostrar el mensaje de bienvenida al administrador -->
                <div id="bienvenidaAdmin">
                    Bienvenido, administrador. Redirigiendo...
                </div>

                <!-- Elemento para mostrar el mensaje de error -->
                <div id="mensajeError"></div>
            </div>
        </div>
    </div>
    <script>
    function updateDateTime() {
        const dateTimeElement = document.getElementById("date-time");
        const now = new Date();
        const formattedDateTime = now.toLocaleString('en-US', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: true,
        });
        dateTimeElement.textContent = formattedDateTime;
    }

    // Actualiza la fecha y hora cada segundo
    setInterval(updateDateTime, 1000);

    document.addEventListener('DOMContentLoaded', function() {
        updateDateTime(); // Actualiza la fecha y hora al cargar la página
    });

    var roleSelect = document.getElementById('rol');
    var additionalFields = document.getElementById('additional-fields');
    var passwordFields = document.getElementById('password-fields');
    var inputFields = document.querySelectorAll('.input-effect');

    // Aplica el efecto de enfoque a todos los campos
    inputFields.forEach(function(field) {
        field.addEventListener('focus', function() {
            field.parentElement.parentElement.classList.add('focus');
        });

        field.addEventListener('blur', function() {
            if (field.value === '') {
                field.parentElement.parentElement.classList.remove('focus');
                // Muestra la alerta de campo vacío

            }
        });
    });

    roleSelect.addEventListener('change', function() {
        // Limpiar todas las alertas al cambiar de rol
        document.getElementById('nombreAlert').textContent = '';
        document.getElementById('passwordAlert').textContent = '';
        document.getElementById('apellidoAlert').textContent = '';
        document.getElementById('edadAlert').textContent = '';
        document.getElementById('ccAlert').textContent = '';

        var selectedOption = roleSelect.options[roleSelect.selectedIndex];
        if (selectedOption.value === 'cliente') {
            additionalFields.classList.remove('hidden');
            passwordFields.classList.add('hidden');

            // Limpiar el mensaje de error al cambiar a rol cliente
            document.getElementById('mensajeError').textContent = '';
        } else {
            additionalFields.classList.add('hidden');
            passwordFields.classList.remove('hidden');
        }
    });

    // Maneja el evento de envío del formulario
    var loginForm = document.getElementById('login-form');
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var rol = roleSelect.value;

        // Limpiar el mensaje de error al intentar enviar el formulario nuevamente
        document.getElementById('mensajeError').textContent = '';

        if (rol === 'cliente') {
            var apellido = document.querySelector('#login-form #additional-fields input[name="apellido"]')
            .value;
            var edad = document.querySelector('#login-form #additional-fields input[name="edad"]').value;
            var CC = document.querySelector('#login-form #additional-fields input[name="CC"]').value;

            if (username.trim() === '' || apellido.trim() === '' || edad.trim() === '' || CC.trim() === '') {
                // Mostrar el mensaje de error si algún campo está vacío
                document.getElementById('mensajeError').textContent = 'Todos los campos son obligatorios.';
            } else {
                // Aquí puedes enviar los datos del cliente a través de AJAX o realizar una redirección
                registrar();
                // Oculta el formulario después del registro exitoso
                loginForm.style.display = 'none';
                // Muestra el mensaje de registro exitoso
                document.getElementById('registroExitoso').style.display = 'block';
                // Redirige a la página del cliente después del registro
                setTimeout(function() {
                    window.location.href = 'Cliente.php';
                }, 2000); // Después de 5 segundos
            }
        } else if (rol === 'administrador') {
            if (username.trim() === '' && password.trim() === '') {
                // Mostrar el mensaje de error si ambos campos están vacíos
                document.getElementById('mensajeError').textContent = 'Todos los campos son obligatorios.';
            } else if (username === 'Almighty' && password === 'Guyharvey') {
                // Muestra el mensaje de bienvenida al administrador
                document.getElementById('bienvenidaAdmin').style.display = 'block';
                // Oculta el formulario después de la redirección
                loginForm.style.display = 'none';
                // Redirigir al administrador después de 3 segundos
                setTimeout(function() {
                    window.location.href = 'Administrador.php';
                }, 3000);
            } else {
                // Mostrar el mensaje de error si las credenciales son incorrectas
                document.getElementById('mensajeError').textContent =
                    'Credenciales incorrectas. Por favor, inténtalo de nuevo.';
            }
        } else {
            // Otros roles (si los hubiera)
            document.getElementById('mensajeError').textContent = 'Rol no reconocido.';
        }
    });
    </script>
</body>

</html>