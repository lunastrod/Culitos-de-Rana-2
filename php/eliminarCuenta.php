<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../html/formularioInicioSesion.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../html/perfil.php");
    exit;
}

require_once 'conexion.php';

$username = $_SESSION["usuario"];

$stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

session_destroy();
header("Location: ../html/formularioInicioSesion.html?cuenta=eliminada");
exit;
