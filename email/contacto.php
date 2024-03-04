<?php

require ('PHPMailer/src/PHPMailer.php');
require ('PHPMailer/src/SMTP.php');
require ('PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Función para enviar el correo electrónico
function recibirCorreo($nombre, $email, $mensaje) {
    // Crea una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

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
    $mail->setFrom($email, $nombre);
    $mail->addAddress(// Tu correo electrónico, seguido del nombre que quieras poner);

    // Configura el asunto y el cuerpo del correo electrónico
    $mail->Subject = 'Mensaje de ' . $nombre . ' desde el formulario de contacto';
    $mail->Body = 'Correo enviado desde : '.  $email .' - Mensaje: '.$mensaje;

    // Envía el correo electrónico
    if ($mail->send()) {
        echo '<h1>Correo enviado correctamente</h1>';
    } else {
        echo '<h1>Error al enviar el correo electrónico: ' . $mail->ErrorInfo . '</h1>';
    }
}


?>