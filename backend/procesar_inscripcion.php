<?php
include 'conexion.php';

$nombre_usuario = trim($_POST['nombre_usuario']);
$email_usuario = trim($_POST['email_usuario']);
$curso_id = intval($_POST['curso_id']);

if (empty($nombre_usuario) || empty($email_usuario) || !filter_var($email_usuario, FILTER_VALIDATE_EMAIL)) {
    echo "Datos inválidos. Por favor, revisa tu información.";
    exit();
}

$query = "INSERT INTO inscripciones (nombre_usuario, email_usuario, curso_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);

if ($stmt->execute([$nombre_usuario, $email_usuario, $curso_id])) {
    // Mensaje de confirmación del css
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Inscripción Exitosa</title>
        <link rel='stylesheet' href='../style.css'>
    </head>
    <body>
        <div class='container'>
            <h1>Inscripción Exitosa</h1>
            <p>¡Gracias por inscribirte, <strong>$nombre_usuario</strong>!</p>
            <p>Hemos registrado tu inscripción en el curso. Te hemos enviado un correo de confirmación a <strong>$email_usuario</strong>.</p>
            <a href='../index.html'>Volver al Inicio</a>
        </div>
    </body>
    </html>
    ";
} else {
    echo "Hubo un error al procesar tu inscripción. Por favor, intenta nuevamente.";
}
?>
