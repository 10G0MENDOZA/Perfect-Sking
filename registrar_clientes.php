<?php

// Conexión a la base de datos (ajusta esto según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfect-skin";
// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$method = $_POST['method'];

$nombre = $_POST['usernanme'];
if ($method == 'crear') {
    // Verifica si se recibieron los datos del formulario POST

  
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $CC = $_POST['CC'];

    // Prepara una declaración SQL para insertar los datos en la tabla "clientes"
    $sql = "INSERT INTO clientes (nombre, apellido, edad, CC) VALUES (?, ?, ?, ?)";

    // Prepara la declaración SQL
    $stmt = $conn->prepare($sql);

    // Vincula los parámetros y ejecuta la declaración
    $stmt->bind_param("ssis", $nombre, $apellido, $edad, $CC);

    if ($stmt->execute()) {
        // La inserción fue exitosa, muestra un mensaje de éxito
        $mensaje = "Registro exitoso como cliente.";
        echo ($mensaje);

    } else {
        // Error en la consulta SQL, muestra un mensaje de error
        $mensaje = "Error en la consulta SQL: " . mysqli_error($conn);
        echo ($mensaje);
    }
    // Cierra la declaración
    $stmt->close();

}
 if($method == 'consular'){

    $password = $_POST['password'];

     // Prepara una declaración SQL para insertar los datos en la tabla "clientes"
     $sql = "SELECT * FROM DATOS WHERE usuario = "+$nombre +" AND contrasena = "+$password;

     $resultado = $mysqli->query($sql);

     $fila = $resultado->fetch_assoc();
  
 }

// Cierra la conexión a la base de datos


?>