<?php
include 'conexion.php';

$query = "SELECT * FROM cursos";
$stmt = $conn->prepare($query);
$stmt->execute();
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($cursos);
?>
