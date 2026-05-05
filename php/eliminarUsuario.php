<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'conexion.php';

    if (isset($_POST['id']) && !empty($_POST['id'])) {

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM usuario WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

        include 'baseDatosActualizada.html';
    } else {
        include 'datosIncompletos.html';
    }
} else {
    include 'accesoNoAutorizado.html';
}
?>
