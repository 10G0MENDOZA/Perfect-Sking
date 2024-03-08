<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo_cliente = $_POST["correo"];
    $nombre_cliente = $_GET["nombre"]; // Obtén el nombre del cliente de la URL

    // Procesa y envía el correo de confirmación
    $asunto = "Cita Agendada con Éxito";
    $mensaje = "Hola $nombre_cliente, tu cita ha sido agendada con éxito.";

    // Envía el correo
    if (mail($correo_cliente, $asunto, $mensaje)) {
        echo '<div class="success-message">Cita agendada con éxito. Un correo de confirmación ha sido enviado a ' . $correo_cliente . '.</div>';
    } else {
        echo '<div class="error-message">Error al enviar el correo de confirmación.</div>';
    }
}
?>