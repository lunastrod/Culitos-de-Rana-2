<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Navegador</title>
    <link rel="stylesheet" href="../css/principal.css">
</head>

<body >
    <?php 
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    require_once '../php/nav.php';
    require_once '../php/conexion.php';
    ?>

    <a href="#top" class="returnTop"><img src="../imagenes/flechaArriba.png" alt="ir arriba"></a>

    <div class="inicio">
        <div class="promocion">
            <div>
                <h1>Seguros de Salud Culito de Rana</h1>
            </div>
            <div>
                <p>
                    Contrata ahora y consigue tu seguro con 1 año de servicios a domicilio y reembolso de farmacia
                </p>
            </div>
        </div>
    </div>

    <div class="presentacion">
        <div class="tituloPresentacion">
            <h1>Seguros para todos</h1>
        </div>
        <div class="tiposSeguros">
            <div class="s">
                <img src="../imagenes/hospital.png" alt="">
                <h2>Centros propios</h2>
                <p>5 hospitales + 3 en proyecto, 31 centros médicos multiespecialidad, 18 centros de rehabilitación
                    avanzada y casi 220 clínicas dentales Culito de Rana.</p>
            </div>
            <div class="s">
                <img src="../imagenes/24Hs.png" alt="">
                <h2>24 Hs</h2>
                <p>Servicio de asesoría médica y de urgencias por videoconsulta y teléfono.</p>
            </div>
            <div class="s">
                <img src="../imagenes/celular.png" alt="">
                <h2>Gestiones online</h2>
                <p>Con nuestra app podrás ver tus analíticas e informes médicos, gestionar citas, tramitar reembolsos,
                    entre otras cosas.</p>
            </div>
            <div class="s">
                <img src="../imagenes/doctor.png" alt="">
                <h2>Cuadro médico</h2>
                <p>Más de 58.000 médicos en más de 4.500 centros propios y concertados.</p>
            </div>
        </div>
    </div>

    <div class="planes">
        <div class="tituloPlanes">
            <h1>Seguros diseñados para todos</h1>
            <p>Diseñamos seguros que se adaptan a tus necesidades. Conoce nuestros seguros médicos con y sin copago.
                Puedes elegir un seguro completo con reembolso o, si lo prefieres, un seguro más económico con las
                coberturas que necesites.</p>
        </div>
        <div class="planSeguros">
            <div class="filas">
                <div class="planes">
                    <img src="../imagenes/SegurosCopago.png" alt="">
                    <!--<h2>Seguros con copago</h2>-->
                </div>

                <div class="planes">
                    <img src="../imagenes/SeguroSinCopago.png" alt="">
                    <!--<h2>Seguros sin copago</h2>-->
                </div>

                <div class="planes">
                    <img src="../imagenes/SegurosEconómicos.png" alt="">
                    <!--<h2>Seguros económicos</h2>-->
                </div>

            </div>

            <div class="filas">
                <div class="planes">
                    <img src="../imagenes/EstudiantesExtranjeros.png" alt="">
                    <!--<h2>Estudiantes extrangeros</h2>-->
                </div>

                <div class="planes">
                    <img src="../imagenes/SeguroMascotas.png" alt="">
                    <!--<h2>Seguro de mascotas</h2>-->
                </div>

                <div class="planes">
                    <img src="../imagenes/SeguroDental.png" alt="">
                    <!--<h2>Seguros dentales</h2>-->
                </div>

            </div>
        </div>
    </div>

    <?php 
    require_once '../php/footer.php';
    ?>
    <script src="../js/CulitoDeRana.js"></script>
</body>
</html>
