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

    <footer>
        <div class="logoF">
            <a href="CulitoDeRana.html"><img src="../imagenes/rana.png" alt="Culitos de rana"></a>
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