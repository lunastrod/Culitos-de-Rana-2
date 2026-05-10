<!DOCTYPE html>
<html>

<head>
    <title>En proceso</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/principal.css">
</head>

<body>
    <?php 
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    require_once '../php/nav.php';
    require_once '../php/conexion.php';
    ?>

    <div class="vidEnPros">
        <video src="../imagenes/animacionEnProceso.mp4" autoplay loop muted></video>
    </div>

    <?php 
    require_once '../php/footer.php';
    ?>

    <script src="../js/CulitoDeRana.js"></script>
</body>

</html>