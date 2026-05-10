<?php
if ($_SERVER["REQUEST_METHOD"] != "GET") {
    include 'accesoNoAutorizado.html';
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/principal.css">
    <title>Lista de usuarios</title>
</head>
<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once '../php/nav.php';
    require 'conexion.php';
    $consultar = "SELECT id, username, access FROM users";
    $registros = mysqli_query($conn, $consultar);
    ?>

    <div class="lista-usuarios-wrapper">
        <h1>Gestión de usuarios</h1>
        <table class="tabla-usuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acceso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($unRegistro = mysqli_fetch_assoc($registros)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($unRegistro['id']); ?></td>
                    <td><?php echo htmlspecialchars($unRegistro['username']); ?></td>
                    <td><?php echo $unRegistro['access'] == 1 ? 'Administrador' : 'Usuario'; ?></td>
                    <td>
                        <form action="eliminarUsuario.php" method="POST" onsubmit="return confirm('Seguro que quieres banear este usuario?');">
                            <input type="hidden" name="id" value="<?php echo $unRegistro['id']; ?>">
                            <input type="submit" class="btn-banear" value="Banear usuario">
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="../js/CulitoDeRana.js"></script>
</body>
</html>