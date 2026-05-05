<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'conexion.php';

    if (
        isset($_POST['nombre']) && !empty($_POST['nombre']) &&
        isset($_POST['id']) && !empty($_POST['id']) &&
        isset($_POST['edad']) && !empty($_POST['edad']) &&
        isset($_POST['provincia']) && !empty($_POST['provincia']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['telefono']) && !empty($_POST['telefono']) &&
        isset($_POST['mensaje']) && !empty($_POST['mensaje']) &&
        isset($_POST['colorFav']) && !empty($_POST['colorFav']) &&
        isset($_POST['genero']) && !empty($_POST['genero']) &&
        isset($_POST['valoracion']) && !empty($_POST['valoracion']) &&
        isset($_POST['fecha']) && !empty($_POST['fecha'])
    ) {

    $nombre = $_POST['nombre'];
    $dni = $_POST['id'];
    $edad = $_POST['edad'];
    $provincia = $_POST['provincia'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensajeInfo = $_POST['mensaje'];
    $colorFavorito = $_POST['colorFav'];
    $genero = $_POST['genero'];
    $valoracion = $_POST['valoracion'];
    $fechaNacimiento = $_POST['fecha'];
    $nominaFichero = '';

    if (isset($_FILES['nomina']) && $_FILES['nomina']['name'] != '') {
        $nombreArchivo = time() . '_' . $_FILES['nomina']['name'];
        $rutaTemporal = $_FILES['nomina']['tmp_name'];
        $rutaDestino = '../uploads/nominas/' . $nombreArchivo;

        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            $nominaFichero = $rutaDestino;
        }
    }

    $edad = (int) $edad;
    $valoracion = $valoracion === '' ? 0 : (int) $valoracion;

    $stmt = $conn->prepare(
        'INSERT INTO usuario (
            nombre,
            dni,
            edad,
            provincia,
            email,
            telefono,
            mensaje_info,
            nomina_fichero,
            color_favorito,
            genero,
            valoracion,
            fecha_nacimiento
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
    );

    if (!$stmt) {
        die('Error preparando la consulta: ' . $conn->error);
    }

    $stmt->bind_param(
        'ssisssssssis',
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
        $fechaNacimiento
    );

    if ($stmt->execute()) {
        include 'baseDatosActualizada.html';
        exit;
    }

    die('Error insertando usuario: ' . $stmt->error);
    } else {
        include 'datosIncompletos.html';
    }
} else {
    include 'accesoNoAutorizado.html';
}
?>
