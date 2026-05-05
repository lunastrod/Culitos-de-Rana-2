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
    <title>Lista de usuarios</title>
</head>
<body>
    <?php
        require 'conexion.php';

        $consultar = "SELECT * FROM usuario";
        $registros = mysqli_query($conn, $consultar);
    ?>

    <h1>Gestion de usuarios</h1>

    <a href="../html/formulario.php">Nuevo usuario</a>

    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Edad</th>
                <th>Provincia</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Mensaje</th>
                <th>Nomina</th>
                <th>Color favorito</th>
                <th>Genero</th>
                <th>Valoracion</th>
                <th>Fecha nacimiento</th>
                <th>Acciones</th>
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
                <td><?php echo $unRegistro[4]; ?></td>
                <td><?php echo $unRegistro[5]; ?></td>
                <td><?php echo $unRegistro[6]; ?></td>
                <td><?php echo $unRegistro[7]; ?></td>
                <td><?php echo $unRegistro[8]; ?></td>
                <td><?php echo $unRegistro[9]; ?></td>
                <td><?php echo $unRegistro[10]; ?></td>
                <td><?php echo $unRegistro[11]; ?></td>
                <td><?php echo $unRegistro[12]; ?></td>
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
                        <input type="hidden" name="provincia" value="<?php echo $unRegistro[4]; ?>">
                        <input type="hidden" name="email" value="<?php echo $unRegistro[5]; ?>">
                        <input type="hidden" name="telefono" value="<?php echo $unRegistro[6]; ?>">
                        <input type="hidden" name="mensaje_info" value="<?php echo $unRegistro[7]; ?>">
                        <input type="hidden" name="nomina_fichero" value="<?php echo $unRegistro[8]; ?>">
                        <input type="hidden" name="color_favorito" value="<?php echo $unRegistro[9]; ?>">
                        <input type="hidden" name="genero" value="<?php echo $unRegistro[10]; ?>">
                        <input type="hidden" name="valoracion" value="<?php echo $unRegistro[11]; ?>">
                        <input type="hidden" name="fecha_nacimiento" value="<?php echo $unRegistro[12]; ?>">
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
