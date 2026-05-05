<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'conexion.php';

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

    if (isset($_FILES['nomina']) && $_FILES['nomina']['name'] != '') {
        $nombreArchivo = time() . '_' . $_FILES['nomina']['name'];
        $rutaTemporal = $_FILES['nomina']['tmp_name'];
        $rutaDestino = '../uploads/nominas/' . $nombreArchivo;

        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            $nominaFichero = $rutaDestino;
        }
    }

    $stmt = $conn->prepare(
        'UPDATE usuario SET
            nombre = ?,
            dni = ?,
            edad = ?,
            provincia = ?,
            email = ?,
            telefono = ?,
            mensaje_info = ?,
            nomina_fichero = ?,
            color_favorito = ?,
            genero = ?,
            valoracion = ?,
            fecha_nacimiento = ?
            WHERE id = ?'
    );

    $stmt->bind_param(
        'ssisssssssisi',
        $nombre,
        $dni,
        $edad,
        $provincia,
        $email,
        $telefono,
        $mensajeInfo,
        $nominaFichero,
        $colorFavorito,
        $genero,
        $valoracion,
        $fechaNacimiento,
        $id
    );

    $stmt->execute();

        include 'baseDatosActualizada.html';
    } else {
        include 'datosIncompletos.html';
    }
?>
<?php
} else {
    include 'accesoNoAutorizado.html';
}
?>
