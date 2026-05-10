<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuestro Equipo</title>
    <link rel="stylesheet" href="../css/principal.css">
    <link rel="stylesheet" href="../css/secundarias.css">

    <link rel="icon" type="image/png" href="../imagenes/rana.png"/>

    <?php 
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    require_once '../php/nav.php';
    require_once '../php/conexion.php';
    ?>

    <a href="#top" class="returnTop"><img src="../imagenes/flechaArriba.png" alt="ir arriba"></a>
</head>
<body>
    <div class="textbox">
        <h1>Nuestro equipo</h1>
        <p>Nuestros empleados son lo más importante para nosotros. Contamos con un equipo diverso y talentoso que trabaja arduamente para brindar el mejor servicio a nuestros clientes. Desde desarrolladores de software hasta especialistas en marketing, cada miembro del equipo aporta habilidades únicas y una pasión por lo que hacen. Valoramos la colaboración, la innovación y el crecimiento profesional, y nos esforzamos por crear un ambiente de trabajo positivo y enriquecedor para todos.</p>
        <p>Conoce a algunos de los miembros clave de nuestro equipo:</p>
        <h2>Nuestro equipo de desarrollo web</h2>
        <img src="../imagenes/Equipo.png" alt="Miembro del equipo" class="person-card">
        <h2>Zoe Jastreb, Daniel Parra y David Martínez</h2>
        <p>Son los encargados de crear y mantener nuestra plataforma en línea, asegurándose de que sea fácil de usar y esté siempre actualizada con las últimas tecnologías.</p>
    </div>

    <div class="textbox">
        <h2>Juan Pérez - CEO</h2>
        <img src="../imagenes/persona4.jpeg" alt="Miembro del equipo" class="person-card">
        <p>Juan es nuestro fundador y CEO. Con más de 67 años de experiencia en la industria, ha liderado la empresa hacia el éxito con su visión estratégica y su enfoque centrado en el cliente.</p>
    </div>

    <?php 
    require_once '../php/footer.php';
    ?>
    <script src="../js/CulitoDeRana.js"></script>
</body>
</html>