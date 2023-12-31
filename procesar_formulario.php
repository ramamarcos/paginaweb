<?php

use Resend\Resend;

// Configurar el cliente de Resend con tu clave de API
$resend = Resend::client('re_ExowFWZf_KUxMBrKeeodehMZ2VLBMu1PV');

// Datos del formulario
$nombre = $_GET['usuario'];
$correo = $_GET['correo'];
$mensaje = $_GET['mensaje'];

try {
    // Enviar el correo a través de Resend
    $resend->emails->send([
        'from' => 'onboarding@resend.dev',
        'to' => 'ramiro.marcos.ck@gmail.com',
        'subject' => 'Nuevo mensaje de contacto',
        'html' => "<p>Nombre: $nombre</p><p>Correo Electrónico: $correo</p><p>Mensaje: $mensaje</p>"
    ]);

    echo "Mensaje enviado correctamente";

    // Redirigir o mostrar un mensaje de éxito
    header("Location: gracias.html");
    exit();
} catch (Exception $e) {
    echo "Error al enviar el correo: {$e->getMessage()}";
}
?>
