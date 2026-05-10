<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'conexion.php';

    if (
        isset($_POST['nombre']) && !empty($_POST['nombre']) &&
        isset($_POST['contrasenia']) && !empty($_POST['contrasenia']) &&
        isset($_POST['acceso']) && !empty($_POST['acceso'])
    ) {

        $nombre = $_POST['nombre'];
        $pwd = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
        $access = $_POST['acceso'];

        $stmt = $conn->prepare(
            'INSERT INTO users (
            username,
            pwd,
            access
        ) VALUES (?, ?, ?)'
        );

        if (!$stmt) {
            die('Error preparando la consulta: ' . $conn->error);
        }

        $stmt->bind_param(
            'ssi',
            $nombre,
            $pwd,
            $access
        );

        try {
            if ($stmt->execute()) {
                header("Location: ../html/formularioInicioSesion.html");
                exit;
            }
        } catch (mysqli_sql_exception $e) {
            if ($conn->errno == 1062) {
                ?>
                <script>
                    alert("El usuario ya existe");
                </script>
                <?php
                header("Location: ../html/formularioInicioSesion.html");
                exit;
            }
            die('Error insertando usuario: ' . $e->getMessage());
        }
    } else {
        include 'datosIncompletos.html';
    }
} else {
    include 'accesoNoAutorizado.html';
}
