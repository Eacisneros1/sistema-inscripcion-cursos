<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción al Curso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Formulario de Inscripción</h1>
    <div class="container">
    <form action="backend/procesar_inscripcion.php" method="POST" onsubmit="return validarFormulario()">

            <input type="hidden" name="curso_id" value="<?php echo $_GET['curso_id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre_usuario" placeholder="Ingresa tu nombre completo" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email_usuario" placeholder="Ingresa tu correo electrónico" required>
            <button type="submit">Inscribirse</button>
     </form>
    </div>
    <script>
    function validarFormulario() {
        const nombre = document.getElementById('nombre').value.trim();
        const email = document.getElementById('email').value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (nombre === '') {
            alert('Por favor, ingresa tu nombre.');
            return false;
        }
        if (email === '' || !emailRegex.test(email)) {
            alert('Por favor, ingresa un correo electrónico válido.');
            return false;
        }
        return true;
    }
</script>
</body>
</html>
