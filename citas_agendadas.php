<!DOCTYPE html>
<html>

<head>
    <title>Citas Agendadas</title>
    <link rel="icon" href="img/logo.png" type="image/png">
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

    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
    }

    table,
    th,
    td {
        border: 1px solid #007bff;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #03AE85;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        display: block;
        text-align: center;
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        border-radius: 5px;
        margin: 20px auto;
        width: 150px;
    }
    </style>
</head>

<body>
    <h2>Citas Agendadas</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Mes</th>
            <th>Año</th>
            <th>Hora</th>
            <th>Correo del Cliente</th>
            <th>Acciones</th>
        </tr>
        <!-- Aquí debes agregar un código PHP para obtener y mostrar las citas desde tu base de datos -->
        <?php
        // Conexión a la base de datos (ajusta esto según tu configuración)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "perfect-skin";

        // Crea una conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica la conexión
        if ($conn->connect_error) {
            die("La conexión a la base de datos falló: " . $conn->connect_error);
        }

        // Consulta para obtener las citas agendadas
        $sql = "SELECT ID, Dia, Mes, Anio, Hora, CorreoCliente FROM citas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Dia"] . "</td>";
                echo "<td>" . $row["Mes"] . "</td>";
                echo "<td>" . $row["Anio"] . "</td>";
                echo "<td>" . $row["Hora"] . "</td>";
                echo "<td>" . $row["CorreoCliente"] . "</td>";
                echo "<td><button onclick='editarCita(" . $row["ID"] . ")'>Editar</button></td>"; // Agregar botón de Editar
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay citas agendadas.</td></tr>";
        }

        // Cierra la conexión a la base de datos
        $conn->close();
        ?>
        <!-- Fin del código PHP -->
    </table>
    <script>
    function editarCita(citaID) {
        // Redirige a la página de edición de la cita, pasando el ID como parámetro
        window.location.href = "editar_citas.php?id=" + citaID;
    }
    </script>

</body>

</html>