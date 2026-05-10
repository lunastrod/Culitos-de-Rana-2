<nav class="navigation">
        <div class="logoTitle">
            <a href="CulitoDeRana.php"><img src="../imagenes/rana.png" alt="logo" class="logo"></img></a>
            <p class="title">Culitos de rana</p>
        </div>

        <div class="grupMenu">
            <div id="divContactos" class="divMenu" onmouseover="mostrarMenu('contactos')"
                onmouseleave="ocultarMenu('contactos')">
                <button class="dropdownButton">Contáctanos</button>

                <ul id="contactos" class="dropdown">
                    <li><a href="tel:123456789">Teléfono Particulares</a></li>
                    <li><a href="tel:987654321">Teléfono Empresas</a></li>
                    <li><a href="mailto:culitosrana@gmail.com">Email</a></li>
                </ul>
            </div>

            <div class="divMenu" onmouseover="mostrarMenu('menu')" onmouseleave="ocultarMenu('menu')">
                <button class="dropdownButton">Nosotros</button>

                <ul id="menu" class="dropdown">
                    <li><a href="CulitoDeRana.php">Principal</a></li>
                    <li><a href="nuestraEmpresa.php">Nuestra Empresa</a></li>
                    <li><a href="nuestrosClientes.php">Nuestros Clientes</a></li>
                    <li><a href="conoceANuestroEquipo.php">Nuestro Equipo</a></li>
                    <li><a href="conoceANuestraMascota.php">Nuestra Mascota</a></li>
                </ul>

            </div>
            <div class="divMenu" onmouseover="mostrarMenu('culito')" onmouseleave="ocultarMenu('culito')">
            <button class="dropdownButton">Tu culito</button>
            <ul id="culito" class="dropdown">
                <?php if (!isset($_SESSION["usuario"])){ ?>
                    <li><a href="../html/formularioInicioSesion.html">Iniciar sesión</a></li>
                    <li><a href="../html/formularioRegistrarse.html">Registrarse</a></li>
                <?php }elseif($_SESSION["access"] === 1){ ?>
                    <li><a href="enProceso.html">Cuenta</a></li>
                    <li><a href="enProceso.html">Ver Usuarios</a></li>
                    <li><a href="../php/cerrarS.php">Cerrar Sesión</a></li>
                <?php }elseif($_SESSION["access"] === 2){ ?>
                    <li><a href="../html/enProceso.html">Cuenta</a></li>
                    <li><a href="../php/cerrarS.php">Cerrar Sesión</a></li>
                <?php } ?>
            </ul>
        </div>

    </nav>