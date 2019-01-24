<!-- Conexión a la base de datos,
codificación de caracteres,
seleccion de base de datos. -->
<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);
$conexion = mysqli_connect("localhost", "root", "", "gestion_bodega") or die("No conectado </br>");

mysqli_set_charset($conexion, 'utf8');

?>
