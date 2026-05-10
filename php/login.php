<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['nombre']) && !empty($_POST['nombre']) &&
        isset($_POST['contrasenia']) && !empty($_POST['contrasenia'])
    ) {

        $nombreIn = $_POST['nombre'];
        $pwdIn = $_POST['contrasenia'];



        $stmt = $conn->prepare("SELECT * FROM users where  username = ?");
        $stmt->bind_param("s", $nombreIn);
        $stmt->execute();
        $reg = $stmt->get_result();

        $unRegistro = mysqli_fetch_assoc($reg);

        if ($unRegistro && password_verify($pwdIn, $unRegistro["pwd"])) {
            $_SESSION["usuario"] = $unRegistro["username"];
            $_SESSION["access"] = $unRegistro["access"];
            header("Location: ../html/CulitoDeRana.php");
            exit;
        } else {
            header("Location: ../html/formularioInicioSesion.html?error=credenciales");
            exit;
        }
    }
} else {
    include 'accesoNoAutorizado.html';
}
