<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
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
        <h1>Nuestros clientes son nuestra prioridad</h1>
        <p>En Culitos de rana, nos enorgullece contar con una amplia gama de clientes satisfechos que confían en nuestros productos y servicios. Nuestro compromiso es brindar la mejor experiencia posible, adaptándonos a las necesidades específicas de cada cliente.</p>
        <p>Desde pequeñas empresas hasta grandes corporaciones, trabajamos estrechamente con cada uno de nuestros clientes para asegurar que reciban soluciones personalizadas que impulsen su éxito. Valoramos la confianza que depositan en nosotros y nos esforzamos por superar sus expectativas en cada interacción.</p>
        <p>Nos dedicamos a construir relaciones duraderas basadas en la transparencia, la comunicación abierta y el compromiso con la calidad. Nuestro equipo está siempre disponible para atender cualquier consulta o inquietud, garantizando que nuestros clientes se sientan valorados y apoyados en todo momento.</p>
        <p>Gracias a la lealtad de nuestros clientes, hemos podido crecer y mejorar continuamente, innovando en nuestros productos y servicios para satisfacer las demandas del mercado. Estamos agradecidos por la oportunidad de servir a una comunidad tan diversa y esperamos seguir colaborando con nuestros clientes en el futuro.</p>
    </div>
    <div class="textbox">
        <img src="../imagenes/persona1.jpeg" alt="Clientes satisfechos" class="person-card">
        <p class="texto-izquierda">"Culitos de rana ha transformado nuestra forma de hacer negocios. Su atención al cliente es excepcional y siempre están dispuestos a ayudarnos a encontrar la mejor solución para nuestras necesidades."</p>
    </div>
    <div class="textbox">
        <img src="../imagenes/persona2.jpeg" alt="Clientes satisfechos" class="person-card">
        <p class="texto-izquierda">"La calidad de los productos de Culitos de rana es insuperable. Estamos encantados con los resultados y la profesionalidad del equipo."</p>

    </div>
    <div class="textbox">
        <img src="../imagenes/persona5.jpeg" alt="Clientes satisfechos" class="person-card">
        <p class="texto-izquierda">"Pude donar 3 riñones con esta empresa, y no hicieron preguntas incómodas. ¡Gracias!"</p>
    </div>
    



    <footer>

        <div class="logoF">
            <a href="CulitoDeRana.html"><img src="../imagenes/rana.png" alt="Culitos de rana" ></a>
        </div>
        

        <div class="elementos">
            <div class="enlaces">
                <a class="enlace" href="conoceANuestroEquipo.html">Conoce a nuestro equipo</a>
                <a href="nuestraEmpresa.html" class="enlace">Nuestra Empresa</a>
                <a href="nuestrosClientes.html" class="enlace">Nuestros Clientes</a>
                <a href="conoceANuestraMascota.html" class="enlace">Conoce a nuestra mascota</a>
            </div>

            <div class="sponsors">
                <h1>Nuestros sponsors</h1>

                <div class="fotosSponsors" class="fotosSponsors">
                    <div class="fotosSponsorsD">
                        <img src="../imagenes/sponsorPato.png" alt="refugio de patos">
                        <p>Refugio de patos patín</p>
                    </div>

                    <div class="fotosSponsorsD">
                        <img src="../imagenes/jamonesRamon.png" alt="jamonesRamon">
                        <p>Jamones Ramón</p>
                    </div>

                    <div class="fotosSponsorsD">
                        <img src="../imagenes/farmaceuticasMenta.png" alt="farmaceuticasMenta">
                        <p>Farmaceuticas Menta</p>
                    </div>
                </div>
            </div>

        </div>

    </footer>
    <script src="../js/CulitoDeRana.js"></script>
</body>
</html>