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

$username_actual = $_SESSION["usuario"];
$nuevo_username  = trim($_POST['nuevo_username'] ?? ''); // usa el campo nuevo_username del formulario si no existe usa " " que loco no? xd
$pwd_actual      = $_POST['pwd_actual'] ?? '';
$nueva_pwd       = $_POST['nueva_pwd'] ?? '';
$confirmar_pwd   = $_POST['confirmar_pwd'] ?? '';

if (empty($nuevo_username) || empty($pwd_actual)) {
    header("Location: ../html/perfil.php?error=campos_vacios");
    exit;
}

// Verificar contraseña actual
$stmt = $conn->prepare("SELECT pwd FROM users WHERE username = ?");
$stmt->bind_param("s", $username_actual);
$stmt->execute();
$resultado = $stmt->get_result()->fetch_assoc();

if (!$resultado || !password_verify($pwd_actual, $resultado['pwd'])) {
    header("Location: ../html/perfil.php?error=pwd_incorrecta");
    exit;
}

// Si cambia username, verificar que no exista ya
if ($nuevo_username !== $username_actual) {
    $stmt2 = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt2->bind_param("s", $nuevo_username);
    $stmt2->execute();
    if ($stmt2->get_result()->num_rows > 0) {
        header("Location: ../html/perfil.php?error=usuario_existente");
        exit;
    }
}

// Construir la consulta según si cambia contraseña o no
if (!empty($nueva_pwd)) {
    if ($nueva_pwd !== $confirmar_pwd) {
        header("Location: ../html/perfil.php?error=pwd_no_coinciden");
        exit;
    }
    $nuevo_hash = password_hash($nueva_pwd, PASSWORD_DEFAULT);
    $stmt3 = $conn->prepare("UPDATE users SET username = ?, pwd = ? WHERE username = ?");
    $stmt3->bind_param("sss", $nuevo_username, $nuevo_hash, $username_actual);
} else {
    $stmt3 = $conn->prepare("UPDATE users SET username = ? WHERE username = ?");
    $stmt3->bind_param("ss", $nuevo_username, $username_actual);
}

if ($stmt3->execute()) {
    $_SESSION["usuario"] = $nuevo_username;
    header("Location: ../html/perfil.php?ok=credenciales");
} else {
    header("Location: ../html/perfil.php?error=error_bd");
}
exit;
