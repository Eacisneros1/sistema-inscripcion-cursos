<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Configuración de usuario simple
    $usuario_valido = "admin";
    $password_valida = "12345";

    if ($usuario === $usuario_valido && $password === $password_valida) {
        $_SESSION['usuario'] = $usuario;
        header('Location: admin.php');
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <div class="container">
        <form action="login.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
