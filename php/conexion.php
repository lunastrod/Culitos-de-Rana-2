<?php
/*
$host = 'localhost';
$puerto = '3307';
$usuario = 'root';
$password = '';
$basedatos = 'proyectophp2';
$servidor = $host . ':' . $puerto;

$conn = new mysqli($servidor, $usuario, $password, $basedatos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
*/
?>

<?php
$host = 'proyectophp.c5y80c4m4wwm.eu-north-1.rds.amazonaws.com';
$port = 3306;
$db   = 'proyectophp2';
$user = 'admin';
$pass = 'Akira2503akira';

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>