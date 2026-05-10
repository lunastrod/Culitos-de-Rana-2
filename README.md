# Integrantes del equipo:
* Zoe Jastreb
* David Martínez
* Daniel Parra

# Culitos de Rana - Documentación del proyecto
Enlace a github: https://github.com/lunastrod/Culitos-de-Rana-2

# Instrucciones de uso
- Entrar en el index.html, este fichero redirige a la página principal.
- La base de datos está en AWS creada, no es necesario crear una tabla local para usar la base de datos.
- Los formularios principales están en el menu principal, esquina superior derecha. Se puede iniciar sesión o registrarse.
- Una vez iniciada sesión, se puede acceder a un formulario de edición de contraseña y nombre de usuario.
- Para crear un usuario administrador se debe acceder a formularioRegistrarseAdmin.html manualmente.
- Si el usuario es administrador, se puede acceder a la página listaUsuarios.php que permite eliminar usuarios y ver todos los usuarios registrados.

# Requisitos del Proyecto

## Funcionalidad CRUD Completa
Tenemos una base de datos de usuarios que se pueden hacer las 4 operaciones CRUD (create, read, update, delete).
## Conexión a Base de Datos
Nos conectamos a una base de datos remota en AWS para no tener que tener varias locales.
## Diseño de la Base de Datos (Tablas, Relaciones, Claves)
```
DROP DATABASE IF EXISTS proyectophp2;
CREATE DATABASE proyectophp2;
USE proyectophp2;

CREATE TABLE users(
    id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username varchar(100) NOT NULL unique,
    pwd varchar(255) NOT NULL,
    access int NOT NULL
);
```
No hay relaciones entre tablas, usamos una clave primaria para una tabla.
## Validación de Formularios
Los formularios se validan en formulario.js
Tenemos una funcion para cada campo, una funcion para cada formulario y usamos listener blur para validar los campos en tiempo real y un listener submit para validar el formulario completo.
## Interfaz de Usuario
La interfaz es limpia incluso para tablas de administracion como listaUsuarios.php
## Seguridad (Protección contra Inyecciones SQL)
Usamos prepared statements para evitar inyecciones SQL en todas las consultas.
## Distribución de Ficheros (Estructura organizada)
Los ficheros están organizados en:
* directorio css: ficheros css
* directorio js: ficheros js
* directorio html: páginas del proyecto principales que están diseñadas para el usuario.
* directorio php: ficheros php y utilidades que se usan en las páginas del proyecto.
* directorio imagenes: imagenes usadas en las páginas del proyecto.
## Documentación del Proyecto
README.md: Documentación del proyecto.
## Mensajes de Error y Confirmación
Usamos popups y alerts para avisar al usuario de errores.
## Código Estructurado y Comentado
Codigo js estructurado en funciones
Codigo php estructurado en ficheros distintos con una funcion concreta.
## Forma Procedimental / Notación Orientada a Objetos
No se mezclan POO y notación funcional
## Gestión de Sesiones y Autenticación
Usamos la variable $_SESSION para gestionar las sesiones y autenticar al usuario.
Comprobamos la sesion para modificar a qué partes del proyecto tiene acceso un usuario (menus, formularios, etc).


# Estructura del Proyecto

## Páginas Principales
* **index.html**: Punto de entrada del sitio. Redirige a la página principal.
* **CulitoDeRana.php**: Página principal.

## Formularios y Usuario
* **html/formularioInicioSesion.html**: Formulario de inicio de sesión. Muestra un error si las credenciales son incorrectas.
* **html/formularioRegistrarse.html**: Formulario de registro para nuevos clientes. Comprueba en tiempo real si el nombre de usuario ya existe.
* **html/formularioRegistrarseAdmin.html**: Igual que el anterior, pero crea el usuario con nivel de acceso de administrador.
* **html/perfil.php**: Página de gestión del perfil. Permite cambiar el nombre de usuario y la contraseña, y eliminar la cuenta.

## Administración de Usuarios
* **php/listaUsuarios.php**: Panel de administración. Lista todos los usuarios registrados y permite banearlos. Solo pueden acceder administradores.

## Estilos (CSS)
* **css/principal.css**: Hoja de estilos global. Define la navegación, formularios, footer y componentes comunes.
* **css/secundarias.css**: Estilos específicos para las páginas de contenido (nuestro equipo, empresa, clientes, mascota).

## JavaScript
* **js/CulitoDeRana.js**: Script global. Gestiona los menús desplegables de navegación y funciones de ventanas emergentes.
* **js/formulario.js**: Script de validación de formularios. Valida campos de formularios y gestiona el submit.

## Páginas Secundarias
* **html/nuestrosClientes.php**
* **html/nuestraEmpresa.php**
* **html/conoceANuestroEquipo.php**
* **html/conoceANuestraMascota.php**

## Navegación
* **php/nav.php**: Barra de navegación superior compartida por todas las páginas. Muestra opciones distintas según el nivel de acceso del usuario (sin sesión, usuario, administrador).
* **php/footer.php**: Footer compartido con enlaces a páginas secundarias y logos de patrocinadores.

## Popups y Mensajes
* **html/enviado.html**: Confirmación de envío exitoso del formulario de contacto.
* **html/bienvenida.html**: Mensaje de bienvenida mostrado tras iniciar sesión correctamente.
* **html/accesoNoAutorizado.html**: Error mostrado cuando se intenta acceder a un recurso PHP directamente sin pasar por el flujo correcto.
* **html/baseDatosActualizada.html**: Confirmación de que una operación sobre la base de datos se ha completado con éxito.
* **html/datosIncompletos.html**: Error mostrado cuando un formulario PHP recibe datos incompletos o faltantes.
* **html/inactividad.html**: Aviso de cierre de sesión automático por inactividad prolongada.
* **html/enProceso.php**: Página provisional para secciones aún en desarrollo.

## Utilidades PHP
* **php/conexion.php**: Establece la conexión con la base de datos MySQL en AWS RDS. La base de datos no es local.
* **php/cerrarS.php**: Destruye la sesión activa y redirige a la página principal.
* **php/login.php**: Verifica las credenciales del usuario contra la base de datos e inicia la sesión si son correctas.
* **php/insertUsuario.php**: Inserta un nuevo usuario con nivel de acceso de cliente tras el registro.
* **php/insertUsuarioAdmin.php**: Inserta un nuevo usuario con nivel de acceso de administrador.
* **php/cambiarCredenciales.php**: Actualiza el nombre de usuario y/o contraseña tras verificar la contraseña actual.
* **php/eliminarCuenta.php**: Elimina la cuenta del usuario en sesión y cierra la sesión.
* **php/eliminarUsuario.php**: Elimina un usuario por ID. Solo accesible desde el panel de administración.
* **php/comprobarUsuario.php**: Devuelve si un nombre de usuario ya está registrado en la base de datos.


