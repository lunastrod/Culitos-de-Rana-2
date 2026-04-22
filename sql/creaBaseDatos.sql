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

/*
// Insert
function insertUsuario($conexion, $nombre, $dni, $edad, $provincia, $email, $telefono, $mensaje_info, $nomina_fichero, $color_favorito, $genero, $valoracion, $fecha_nacimiento) {
    $stmt = $conexion->prepare("
        INSERT INTO usuario (nombre, dni, edad, provincia, email, telefono, mensaje_info, nomina_fichero, color_favorito, genero, valoracion, fecha_nacimiento)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("ssisssssssii", $nombre, $dni, $edad, $provincia, $email, $telefono, $mensaje_info, $nomina_fichero, $color_favorito, $genero, $valoracion, $fecha_nacimiento);
    return $stmt->execute();
}

// Update
function updateUsuario($conexion, $id, $nombre, $dni, $edad, $provincia, $email, $telefono, $mensaje_info, $nomina_fichero, $color_favorito, $genero, $valoracion, $fecha_nacimiento) {
    $stmt = $conexion->prepare("
        UPDATE usuario SET
            nombre           = ?,
            dni              = ?,
            edad             = ?,
            provincia        = ?,
            email            = ?,
            telefono         = ?,
            mensaje_info     = ?,
            nomina_fichero   = ?,
            color_favorito   = ?,
            genero           = ?,
            valoracion       = ?,
            fecha_nacimiento = ?
        WHERE id = ?
    ");
    $stmt->bind_param("ssisssssssiii", $nombre, $dni, $edad, $provincia, $email, $telefono, $mensaje_info, $nomina_fichero, $color_favorito, $genero, $valoracion, $fecha_nacimiento, $id);
    return $stmt->execute();
}

// Delete
function deleteUsuario($conexion, $id) {
    $stmt = $conexion->prepare("DELETE FROM usuario WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Select todos
function getUsuarios($conexion) {
    $stmt = $conexion->prepare("SELECT * FROM usuario");
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

*/