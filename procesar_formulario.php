<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'ruta/a/PHPMailer/src/Exception.php';
require 'ruta/a/PHPMailer/src/PHPMailer.php';
require 'ruta/a/PHPMailer/src/SMTP.php';

// Recibir datos del formulario
$nombre = $_POST['usuario'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

// Configurar PHPMailer
$mail = new PHPMailer(true);

error_reporting(E_ALL);
ini_set('display_errors', '1');

try {
    // Configurar el servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ramiro.marcos.ck@gmail.com'; // Cambia esto por tu dirección de Gmail
    $mail->Password = 'Vafcob-sacji2-subkac'; // Cambia esto por tu contraseña o token de aplicación
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 587;

    // Configurar remitente y destinatario
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('ramiro.marcos.ck@gmail.com'); // Cambia esto por la dirección de correo a la que quieres enviar los mensajes

    // Configurar contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje de contacto';
    $mail->Body = "<p>Nombre: $nombre</p><p>Correo Electrónico: $correo</p><p>Mensaje: $mensaje</p>";

    // Enviar el correo
    $mail->send();
    echo "Mensaje enviado correctamente";

    // Redirigir o mostrar un mensaje de éxito
    header("Location: index.html");
    exit();
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>
