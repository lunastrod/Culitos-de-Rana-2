<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../html/formularioInicioSesion.html");
    exit;
}

require_once '../php/conexion.php';
$username = $_SESSION["usuario"];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$error = $_GET['error'] ?? '';
$ok    = $_GET['ok'] ?? '';
$mensajes_error = [
    'campos_vacios'     => 'Rellena todos los campos obligatorios.',
    'pwd_incorrecta'    => 'La contraseña actual no es correcta.',
    'usuario_existente' => 'Ese nombre de usuario ya está en uso.',
    'pwd_no_coinciden'  => 'Las contraseñas nuevas no coinciden.',
    'error_bd'          => 'Error al actualizar. Inténtalo de nuevo.',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="../css/principal.css">
</head>
<body class="body-formulario">
    <?php require_once '../php/nav.php'; ?>

    <div class="envoltorio-formulario">
        <div class="formulario">
            <h2>Perfil de <?php echo htmlspecialchars($username); ?></h2>

            <div class="input-name">
                <label><em>Usuario:</em></label>
                <input class="input" type="text" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
            </div>
            <div class="input-name">
                <label><em>Nivel de Acceso:</em></label>
                <input class="input" type="text" value="<?php echo $user['access'] == 1 ? 'Administrador' : 'Usuario Normal'; ?>" readonly>
            </div>

            <div class="input-submit" style="margin-top: 10px;">
                <a href="CulitoDeRana.php" style="text-decoration: none;">
                    <input class="input" type="button" value="Volver">
                </a>
            </div>

            <!-- Mensajes de feedback -->
            <?php if ($error && isset($mensajes_error[$error])): ?>
                <p style="color:red; text-align:center; margin: 10px 0;"><?php echo $mensajes_error[$error]; ?></p>
            <?php elseif ($ok === 'credenciales'): ?>
                <p style="color:green; text-align:center; margin: 10px 0;">Credenciales actualizadas correctamente.</p>
            <?php endif; ?>

            <!-- Modificar credenciales -->
            <hr style="margin: 25px 0; border-top: 1px solid rgba(0,0,0,0.1);">
            <h3 style="margin-bottom: 20px;">Modificar usuario / contraseña</h3>

            <form action="../php/cambiarCredenciales.php" method="post" style="width:100%;">
                <div class="input-name">
                    <label><em>Nuevo usuario:</em></label>
                    <input class="input" type="text" name="nuevo_username"
                           value="<?php echo htmlspecialchars($username); ?>" required>
                </div>
                <div class="input-name">
                    <label><em>Contraseña actual:</em></label>
                    <input class="input" type="password" name="pwd_actual"
                           placeholder="Obligatorio para guardar" required>
                </div>
                <div class="input-name">
                    <label><em>Nueva contraseña:</em></label>
                    <input class="input" type="password" name="nueva_pwd"
                           placeholder="Déjalo vacío para no cambiarla">
                </div>
                <div class="input-name">
                    <label><em>Confirmar contraseña:</em></label>
                    <input class="input" type="password" name="confirmar_pwd"
                           placeholder="Repite la nueva contraseña">
                </div>
                <br>
                <div class="input-submit">
                    <input class="input" type="submit" value="Guardar">
                </div>
            </form>

            <!-- Zona de peligro -->
            <hr style="margin: 30px 0; border-top: 1px solid rgba(200,0,0,0.2);">
            <h3 style="color:#c00; margin-bottom: 10px;">Zona de peligro</h3>
            <p style="color:#666; font-size:0.9em; margin-bottom: 15px;">
                Al eliminar tu cuenta se borrarán todos tus datos de forma permanente.
            </p>
            <form action="../php/eliminarCuenta.php" method="post" id="formEliminar">
                <div style="display:flex; justify-content:center;">
                    <button type="button" onclick="confirmarEliminar()"
                        style="background-color:#c00; color:white; border:none; border-radius:20px;
                               padding:10px 24px; font-size:1em; cursor:pointer; font-weight:bold;">
                        Eliminar cuenta
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function confirmarEliminar() {
        if (confirm('¿Estás seguro de que quieres eliminar tu cuenta?\nEsta acción no se puede deshacer.')) {
            document.getElementById('formEliminar').submit();
        }
    }
    </script>
</body>
</html>
