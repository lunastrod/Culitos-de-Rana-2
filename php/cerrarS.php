<?php 
session_start();
session_destroy();
header("Location: ../html/CulitoDeRana.php");
exit;
?>