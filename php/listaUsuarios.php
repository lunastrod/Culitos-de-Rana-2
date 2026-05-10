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

    $consultar = "SELECT * FROM users";
    $registros = mysqli_query($conn, $consultar);
    ?>

    <h1>Gestion de usuarios</h1>

    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>contraseña</th>
                <th>access</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($unRegistro = mysqli_fetch_row($registros)) {
            ?>
                <tr>
                    <td><?php echo $unRegistro[0]; ?></td>
                    <td><?php echo $unRegistro[1]; ?></td>
                    <td><?php echo $unRegistro[2]; ?></td>
                    <td><?php echo $unRegistro[3]; ?></td>
                    <td>
                        <form action="eliminarUsuario.php" method="POST" onsubmit="return confirm('Seguro que quieres eliminar este usuario?');">
                            <input type="hidden" name="id" value="<?php echo $unRegistro[0]; ?>">
                            <input type="submit" value="eliminar">
                        </form>
                        <form action="editarFormulario.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $unRegistro[0]; ?>">
                            <input type="hidden" name="nombre" value="<?php echo $unRegistro[1]; ?>">
                            <input type="hidden" name="dni" value="<?php echo $unRegistro[2]; ?>">
                            <input type="hidden" name="edad" value="<?php echo $unRegistro[3]; ?>">
                            <input type="submit" value="editar">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>