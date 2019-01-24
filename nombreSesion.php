<?php
// Obtiene el nombre y apellido de un usuario

include('conexion.php');
$usuario = $_POST['usuario'];
$pass = md5($_POST['password']);

$consulta = "SELECT * FROM personal WHERE rut='$usuario' AND 
contraseña='$pass'";

$ejecutar = mysqli_query($conexion, $consulta);
$result = mysqli_num_rows($ejecutar)

if ($result == 1)
{
    row = mysqli_fetch_array($ejecutar, MYSQLI_ASSOC);
    $nombre = row['nombre'];
    $apellido = row['apellido'];
    $nombreApellido = $nombre . ' ' . $apellido;
}
else
{
    $nombreApellido = 'Datos no encontrados';
}
?>
