<?php
require 'conexion.php';

$nombre = $_GET['nombre'];

$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param('s', $nombre);
$stmt->execute();
$stmt->store_result();

echo json_encode(['existe' => $stmt->num_rows > 0]);
?>