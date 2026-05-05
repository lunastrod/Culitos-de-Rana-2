# Culitos de Rana - Documentacion del proyecto

# Base de datos

El proyecto usa una base de datos MySQL llamada ProyectoPHP.

SQL para crear la base de datos y la tabla principal:

```
DROP DATABASE IF EXISTS ProyectoPHP;
CREATE DATABASE ProyectoPHP CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE ProyectoPHP;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    dni VARCHAR(20),
    edad INT,
    provincia VARCHAR(50),
    email VARCHAR(255),
    telefono VARCHAR(20),
    mensaje_info TEXT,
    nomina_fichero VARCHAR(300),
    color_favorito VARCHAR(20),
    genero VARCHAR(20),
    valoracion INT,
    fecha_nacimiento VARCHAR(20)
);
```

La tabla usuario guarda los datos enviados desde el formulario. El campo id es la clave primaria y se genera automaticamente. El campo nomina_fichero guarda la ruta del fichero PDF subido por el usuario.

# Estructura de ficheros PHP

Los ficheros PHP estan dentro de la carpeta php.

php/conexion.php
php/insertUsuario.php
php/listaUsuarios.php
php/editarFormulario.php
php/editarUsuario.php
php/eliminarUsuario.php
php/datosIncompletos.html
php/accesoNoAutorizado.html
php/baseDatosActualizada.html

Los ficheros principales de operaciones con base de datos son insertUsuario.php, listaUsuarios.php, editarUsuario.php y eliminarUsuario.php.

Los ficheros datosIncompletos.html, accesoNoAutorizado.html y baseDatosActualizada.html son paginas auxiliares para mostrar mensajes reutilizables.

# Resumen de cada fichero PHP

conexion.php

Contiene los datos de conexion a MySQL: host, puerto, usuario, contraseña y base de datos. Crea la variable $conn usando mysqli. Si la conexion falla, muestra un mensaje de error y detiene la ejecucion.

insertUsuario.php

Recibe los datos del formulario mediante POST. Comprueba que los campos principales existan con isset y que no esten vacios con empty. Si los datos son correctos, guarda el usuario en la tabla usuario usando prepare statement. Tambien intenta subir el PDF de la nomina a la carpeta ficheros/nominas y guarda la ruta en el campo nomina_fichero. Si todo va bien, incluye baseDatosActualizada.html.

listaUsuarios.php

Muestra una tabla HTML con todos los usuarios guardados en la base de datos. Hace una consulta SELECT * FROM usuario. Cada fila incluye dos formularios: uno para editar y otro para eliminar. El boton de eliminar usa confirm() para pedir confirmacion antes de borrar.

editarFormulario.php

Recibe por POST los datos de un usuario desde listaUsuarios.php. Si los datos estan completos, muestra un formulario HTML con los campos rellenados. Este formulario envia los cambios a editarUsuario.php.

editarUsuario.php

Recibe por POST los datos editados. Comprueba que los datos obligatorios existan y no esten vacios. Ejecuta un UPDATE sobre la tabla usuario usando prepare statement. Si se sube una nueva nomina, intenta guardar el nuevo fichero y actualiza la ruta. Si la operacion termina correctamente, incluye baseDatosActualizada.html.

eliminarUsuario.php

Recibe por POST el id del usuario. Comprueba que exista y no este vacio. Ejecuta un DELETE usando prepare statement para eliminar el usuario de la tabla usuario. Si la operacion termina correctamente, incluye baseDatosActualizada.html.

datosIncompletos.html

Pagina auxiliar que muestra un mensaje cuando faltan datos obligatorios en un formulario o en una peticion POST.

accesoNoAutorizado.html

Pagina auxiliar que se muestra cuando se intenta acceder directamente a un fichero que solo debe usarse mediante POST.

baseDatosActualizada.html

Pagina auxiliar que muestra el mensaje "Base de datos actualizada correctamente" y un enlace para volver a listaUsuarios.php.

# Acceso al formulario

El formulario principal esta en:

html/formulario.php

Se puede abrir desde el navegador entrando a esa pagina dentro del servidor local del proyecto.

Ejemplo de ruta habitual:

http://localhost/Culitos-de-Rana-2/html/formulario.php

El formulario envia los datos a:

php/insertUsuario.php

Para consultar los usuarios guardados, editar o eliminar registros, se debe acceder a:

php/listaUsuarios.php

Ejemplo:

http://localhost/Culitos-de-Rana-2/php/listaUsuarios.php

# Resumen de las demas paginas

index.html

Pagina inicial del proyecto. Sirve como punto de entrada general.

html/CulitoDeRana.html

Pagina principal de la web. Presenta la marca Culitos de Rana y sirve como navegacion hacia otras secciones.

html/formulario.php

Pagina con el formulario para introducir los datos del usuario y calcular la prima de seguro.

html/nuestrosClientes.html

Pagina dedicada a mostrar clientes, patrocinadores o entidades relacionadas con la empresa.

html/nuestraEmpresa.html

Pagina informativa sobre la empresa, su identidad y sus valores.

html/conoceANuestraMascota.html

Pagina dedicada a la mascota o elemento identificativo de la marca.

html/conoceANuestroEquipo.html

Pagina que presenta el equipo de trabajo o las personas que forman parte del proyecto.

html/enProceso.html

Pagina usada para secciones que todavia estan en desarrollo.

html/enviado.html

Pagina que se abre como confirmacion visual cuando el formulario se envia desde JavaScript.

html/inactividad.html

Pagina usada por el JavaScript para avisar de inactividad.

html/bienvenida.html

Pagina de bienvenida del proyecto.

css/principal.css

Hoja de estilos principal de la web.

css/secundarias.css

Hoja de estilos para paginas secundarias.

js/CulitoDeRana.js

Fichero JavaScript principal. Contiene funciones para menus, popups, validacion del formulario, aviso de inactividad, contador de tiempo y cambios visuales en el boton de envio.

imagenes

Carpeta con las imagenes usadas por la web: logo, personas, iconos, fondos, patrocinadores y recursos visuales.

ficheros/nominas

Carpeta destinada a guardar los ficheros PDF subidos desde el formulario.

sql/creaBaseDatos.sql

Fichero con el SQL necesario para crear la base de datos ProyectoPHP y la tabla usuario.
