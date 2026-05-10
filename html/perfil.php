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
    <script src="../js/CulitoDeRana.js"></script>
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

            <div class="input-submit perfil-volver">
                <a href="CulitoDeRana.php">
                    <input class="input" type="button" value="Volver">
                </a>
            </div>

            <!-- Mensajes de feedback -->
            <?php if ($error && isset($mensajes_error[$error])): ?>
                <p class="perfil-mensaje-error"><?php echo $mensajes_error[$error]; ?></p>
            <?php elseif ($ok === 'credenciales'): ?>
                <p class="perfil-mensaje-ok">Credenciales actualizadas correctamente.</p>
            <?php endif; ?>

            <!-- Modificar credenciales -->
            <hr class="perfil-separador">
            <h3 class="perfil-h3">Modificar usuario / contraseña</h3>

            <form action="../php/cambiarCredenciales.php" method="post" style="width:100%;">
                <div class="input-name">
                    <label for="nombre"><em>Nuevo usuario:</em></label>
                    <input class="input" type="text" name="nuevo_username"
                           value="<?php echo htmlspecialchars($username); ?>" required>
                </div>
                <div class="input-name">
                    <label><em>Contraseña actual:</em></label>
                    <input class="input" type="password" name="pwd_actual"
                           placeholder="Obligatorio para guardar" required>
                </div>
                <div class="input-name">
                    <label for="contrasenia"><em>Nueva contraseña:</em></label>
                    <input class="input" type="password" name="nueva_pwd"
                           placeholder="Déjalo vacío para no cambiarla">
                </div>
                <div class="input-name">
                    <label for="contrasenia"><em>Confirmar contraseña:</em></label>
                    <input class="input" type="password" name="confirmar_pwd"
                           placeholder="Repite la nueva contraseña">
                </div>
                <br>
                <div class="input-submit">
                    <input class="input" type="submit" value="Guardar">
                </div>
            </form>

            <!-- Zona de peligro -->
            <hr class="perfil-separador-peligro">
            <h3 class="perfil-h3-peligro">Zona de peligro</h3>
            <p class="perfil-aviso-peligro">
                Al eliminar tu cuenta se borrarán todos tus datos de forma permanente.
            </p>
            <form action="../php/eliminarCuenta.php" method="post" id="formEliminar">
                <div class="perfil-btn-eliminar-wrapper">
                    <button type="button" class="perfil-btn-eliminar" onclick="confirmarEliminar()">
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
