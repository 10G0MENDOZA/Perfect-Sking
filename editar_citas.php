<?php
if (isset($_GET['id'])) {
    $citaID = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "perfect-skin";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Aquí obtén los valores editados del formulario y actualiza la cita en la base de datos
        $fecha = $_POST['fecha'];
        $mes = $_POST['mes'];
        $anio = $_POST['anio'];
        $hora = $_POST['hora'];
        $correo = $_POST['correo'];

        $sql = "UPDATE citas SET Dia = '$fecha', Mes = '$mes', Anio = '$anio', Hora = '$hora', CorreoCliente = '$correo' WHERE ID = $citaID";

        if ($conn->query($sql) === TRUE) {
            header("Location: citas_agendadas.php");
            exit;
        } else {
            echo "Error al actualizar la cita: " . $conn->error;
        }
    } else {
        if (isset($_GET['delete'])) {
            // Eliminar la cita
            $sql = "DELETE FROM citas WHERE ID = $citaID";
            if ($conn->query($sql) === TRUE) {
                header("Location: citas_agendadas.php");
                exit;
            } else {
                echo "Error al eliminar la cita: " . $conn->error;
            }
        } else {
            $sql = "SELECT * FROM citas WHERE ID = $citaID";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $cita = $result->fetch_assoc();
            } else {
                echo "No se encontró la cita.";
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar Cita</title>
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    background-color: #03AE85;
    color: #fff;
    padding: 10px;
}
</style>

<body>
    <h2>Editar Cita</h2>

    <form action="" method="POST">
        <input type="hidden" name="citaID" value="<?php echo $citaID; ?>">
        <label for="fecha">Fecha:</label>
        <input type="text" name="fecha" value="<?php echo $cita['Dia']; ?>">
        <label for="mes">Mes:</label>
        <input type="text" name="mes" value="<?php echo $cita['Mes']; ?>">
        <label for="anio">Año:</label>
        <input type="text" name="anio" value="<?php echo $cita['Anio']; ?>">
        <label for="hora">Hora:</label>
        <input type="text" name="hora" value="<?php echo $cita['Hora']; ?>">
        <label for="correo">Correo del Cliente:</label>
        <input type="text" name="correo" value="<?php echo $cita['CorreoCliente']; ?>">
        <input type="submit" value="Guardar Cambios">
    </form>

    <form action="" method="POST">
        <input type="hidden" name="citaID" value="<?php echo $citaID; ?>">
        <input type="submit" name="delete" value="Eliminar Cita">
    </form>

</body>

</html>