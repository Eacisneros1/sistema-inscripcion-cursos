<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

include 'backend/conexion.php';
$query = "SELECT i.id, i.nombre_usuario, i.email_usuario, c.nombre AS curso, i.fecha_inscripcion 
          FROM inscripciones i
          JOIN cursos c ON i.curso_id = c.id";
$stmt = $conn->prepare($query);
$stmt->execute();
$inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Panel de Administración</h1>
    <div class="container">
        <h2>Inscripciones</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inscripciones as $inscripcion): ?>
                    <tr>
                        <td><?= $inscripcion['id'] ?></td>
                        <td><?= $inscripcion['nombre_usuario'] ?></td>
                        <td><?= $inscripcion['email_usuario'] ?></td>
                        <td><?= $inscripcion['curso'] ?></td>
                        <td><?= $inscripcion['fecha_inscripcion'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>
