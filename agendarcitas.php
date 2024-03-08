<?php
// Cargar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Conexión a la base de datos (ajusta esto según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfect-skin";

$correo_admin = 'skingperfect@gmail.com'; // Reemplaza con tu dirección de correo

// Crea una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $correo_cliente = $_POST['correo'];

    // Convierte la fecha en un objeto DateTime
    $fechaObj = new DateTime($fecha);

    // Obtiene el día, mes y año
    $dia = $fechaObj->format('d');
    $mes = $fechaObj->format('m');
    $anio = $fechaObj->format('Y');

    // Obtiene la hora en formato AM/PM
    $horaObj = new DateTime($hora);
    $hora_am_pm = $horaObj->format('h:i A');

    // Verifica si la cita ya está agendada para la misma fecha y hora
    $verificar_disponibilidad = "SELECT * FROM citas WHERE Dia = '$dia' AND Mes = '$mes' AND Anio = '$anio' AND Hora = '$hora_am_pm'";
    $resultado = $conn->query($verificar_disponibilidad);

    if ($resultado->num_rows > 0) {
        echo "<div style='color: red; text-align: center;'>La cita ya está agendada en la misma fecha y hora. Por favor, elige otra.</div>";
    } else {
        // Inserta los datos en la tabla de citas, incluyendo los nuevos campos
        $sql = "INSERT INTO citas (Dia, Mes, Anio, Hora, CorreoCliente) 
                VALUES ('$dia', '$mes', '$anio', '$hora_am_pm', '$correo_cliente')";

        if ($conn->query($sql) === TRUE) {
            echo "<div style='color: #04CF9E; text-align: center;'>Su cita ha sido agendada con éxito</div>";

           
            $mail = new PHPMailer(true);

            try {
                // Configura el servidor de correo (para Gmail)
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'skingperfect@gmail.com'; 
                $mail->Password = 'wzbu htbp hgpu ziko';  // Reemplaza con tu contraseña de aplicación generada
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

               
                $mail->setFrom('skingperfect@gmail.com'); 
                $mail->addAddress($correo_cliente);  // Cambiado para enviar al cliente
                $mail->isHTML(true);

                // Configuración de la codificación
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';

                $asunto = 'Confirmación de cita - Perfect Skin';
                $cuerpo = "
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: 'Arial', sans-serif;
                                color: #333;
                                margin: 0;
                                padding: 0;
                            }
                            .container {
                                max-width: 600px;
                                margin: 20px auto;
                                padding: 20px;
                                background-color: #fff;
                                border-radius: 8px;
                                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                                text-align: center;
                            }
                            h2 {
                                color: #04CF9E; /* Verde */
                            }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <h2>Su cita ha sido agendada con éxito</h2>
                            <p>Gracias por confiar en nosotros. Aquí están los detalles de su cita:</p>
                            <ul style='list-style: none; padding: 0;'>
                                <li><strong>Fecha:</strong> $dia/$mes/$anio</li>
                                <li><strong>Hora:</strong> $hora_am_pm</li>
                            </ul>
                            <p>Estamos ansiosos por recibirte. ¡Hasta pronto!</p>
                        </div>
                    </body>
                    </html>
                ";

                $mail->Subject = $asunto;
                $mail->Body = $cuerpo;

                $mail->send();
                echo "<div style='color: #04CF9E; text-align: center;'>Se ha enviado un correo de confirmación al cliente.</div>";
            } catch (Exception $e) {
                echo 'Error al enviar el correo de confirmación: ' . $mail->ErrorInfo;
            }

            echo '<a href="index.php" style="display: block; text-align: center; margin-top: 20px;">Volver a la página principal</a>';
        } else {
            echo "Error al agendar la cita: " . $conn->error;
        }
    }
}

$conn->close();
?>