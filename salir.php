
<!-- Verificar que la variable sal sea igual a si.
Cerrar la sesión. 
Redirigir el flujo a la pagina del login --> 
<?php
if ($_GET['sal'] == 'si'or $_GET['error'] == 'si')
{
	session_start();
	session_destroy();
	header('Location:login.php');
}
?>
<!-- Agregué la condición $_GET['error'] == 'si' por esa variable
viene del archivo sesion.php -->