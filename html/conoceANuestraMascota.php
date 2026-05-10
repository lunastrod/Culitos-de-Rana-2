<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nuestra Mascota</title>
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

    <main class="main-content">
        <h1>Conoce a nuestra mascota</h1>
        <section class="pet-profile">
            <figure>
                <img src="../imagenes/rana.png" alt="Pepe la rana">
            </figure>
            <dl>
                <dt>Nombre:</dt>
                <dd>Pepe</dd>
                <dt>Edad:</dt>
                <dd>1 año</dd>
                <dt>Sexo:</dt>
                <dd>Masculino</dd>
            </dl>
        </section>
    </main>

    <?php 
    require_once '../php/footer.php';
    ?>
    <script src="../js/CulitoDeRana.js"></script>
</body>

</html>