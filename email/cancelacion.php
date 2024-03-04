<?php

require ('PHPMailer/src/PHPMailer.php');
require ('PHPMailer/src/SMTP.php');
require ('PHPMailer/src/Exception.php');
require ('PHPMailer/language/phpmailer.lang-es.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function correoCancelacion ($email, $nombre, $apellidos, $fecha_actual) {
// Crea una nueva instancia de PHPMailer
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('es', 'PHPMailer/language/phpmailer.lang-es.php');

// Configura el servidor SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';

// Configura las credenciales de Gmail
$mail->SMTPAuth = true;
$mail->Username = // Tu correo electrónico ;
$mail->Password = // Tu contraseña ;

// Configura el remitente y el destinatario
$mail->addAddress(// Tu correo electrónico, seguido del nombre que quieras poner);
$mail->addAddress( $email , $nombre);

// Configura el asunto y el cuerpo del correo 
$mail->Subject = 'Cancelación de Reserva';

// Codigo HTML para el cuerpo del correo
$htmlBody = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva</title>
    <style>
        /* Estilos CSS para la plantilla */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
        }
        p {
            color: #666666;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cancelación de Reserva</h1>
        <p>Tu reserva ha sido cancelada. Aquí tienes los detalles:</p>
        <ul>
            <li>Email: '. $email .' </li>
            <li>Nombre: '. $nombre .' </li>
            <li>Apellidos: '. $apellidos .' </li>
            <li>Fecha de Cancelación: '. $fecha_actual .' </li>
        </ul>
        <p>Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.</p>
        <p>Si cambias de opcinión o quieres reservar otro tour por Europa, puedes hacerlo desde nuestro sitio web.</p>
        <a href="http://cyantours.great-site.net/" class="button">Visitar nuestro sitio web</a>
    </div>
</body>
</html>
';

$mail->isHTML(true);
$mail->Body = $htmlBody;

// Envia el correo electronico
if ($mail->send()) {
    echo 'Correo enviado correctamente';
} else {
    echo 'Error al enviar el correo electronico: ' . $mail->ErrorInfo;
}

}