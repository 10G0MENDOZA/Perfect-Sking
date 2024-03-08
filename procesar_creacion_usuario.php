<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena']; // No ciframos la contraseña
    $rol = $_POST['rol'];

    // Realiza la validación de roles (verifica si el usuario actual tiene permiso para crear un usuario con un rol específico)

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "perfect-skin";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuarioscreados (rol, usuario, contrasena) VALUES ('$rol', '$usuario', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario creado con éxito.";
        echo '<a href="index.php">Volver a la página principal</a>';
    } else {
        echo "Error al crear el usuario: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Acceso denegado.";
}
?>