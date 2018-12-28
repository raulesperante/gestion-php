<!-- Conexión a la base de datos,
codificación de caracteres,
seleccion de base de datos. -->
<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);
$conexion = mysql_connect("localhost", "root", "") or die("No conectado </br>");

mysql_set_charset('utf8');

mysql_select_db('gestion_bodega') or die('Base de Datos no encontrada </br>');
 ?>
