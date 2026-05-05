<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST['id']) && !empty($_POST['id']) &&
        isset($_POST['nombre']) && !empty($_POST['nombre']) &&
        isset($_POST['dni']) && !empty($_POST['dni']) &&
        isset($_POST['edad']) && !empty($_POST['edad']) &&
        isset($_POST['provincia']) && !empty($_POST['provincia']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['telefono']) && !empty($_POST['telefono']) &&
        isset($_POST['mensaje_info']) && !empty($_POST['mensaje_info']) &&
        isset($_POST['color_favorito']) && !empty($_POST['color_favorito']) &&
        isset($_POST['genero']) && !empty($_POST['genero']) &&
        isset($_POST['valoracion']) && !empty($_POST['valoracion']) &&
        isset($_POST['fecha_nacimiento']) && !empty($_POST['fecha_nacimiento'])
    ) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $edad = $_POST['edad'];
    $provincia = $_POST['provincia'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensajeInfo = $_POST['mensaje_info'];
    $nominaFichero = isset($_POST['nomina_fichero']) ? $_POST['nomina_fichero'] : '';
    $colorFavorito = $_POST['color_favorito'];
    $genero = $_POST['genero'];
    $valoracion = $_POST['valoracion'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar usuario</title>
</head>
<body>
    <h1>Editar usuario</h1>

    <form action="editarUsuario.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="nomina_fichero" value="<?php echo $nominaFichero; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
        <br><br>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" value="<?php echo $dni; ?>">
        <br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?php echo $edad; ?>">
        <br><br>

        <label for="provincia">Provincia:</label>
        <input type="text" id="provincia" name="provincia" value="<?php echo $provincia; ?>">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
        <br><br>

        <label for="telefono">Telefono:</label>
        <input type="tel" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
        <br><br>

        <label for="mensaje_info">Mensaje:</label>
        <textarea id="mensaje_info" name="mensaje_info"><?php echo $mensajeInfo; ?></textarea>
        <br><br>

        <label for="nomina">Nomina:</label>
        <input type="file" id="nomina" name="nomina">
        <p>Archivo actual: <?php echo $nominaFichero; ?></p>

        <label for="color_favorito">Color favorito:</label>
        <input type="color" id="color_favorito" name="color_favorito" value="<?php echo $colorFavorito; ?>">
        <br><br>

        <label for="genero">Genero:</label>
        <input type="text" id="genero" name="genero" value="<?php echo $genero; ?>">
        <br><br>

        <label for="valoracion">Valoracion:</label>
        <input type="number" id="valoracion" name="valoracion" value="<?php echo $valoracion; ?>">
        <br><br>

        <label for="fecha_nacimiento">Fecha nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fechaNacimiento; ?>">
        <br><br>

        <input type="submit" value="guardar">
    </form>

    <br>
    <a href="listaUsuarios.php">Volver</a>
</body>
</html>
<?php
    } else {
        include 'datosIncompletos.html';
    }
?>
<?php
} else {
    include 'accesoNoAutorizado.html';
}
?>
