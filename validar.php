<!-- incluir archivos requeridos.
	Obtener variables con los datos ingresados en login, la contraseña debe estar dentro de una función hash.
	Verificar que exista el registro en la base de datos.
		Si el registro existe entonces:
			Iniciar sesión.
			Crear variables de sesión a ocupar.
			Asignar los permisos según el cargo.

		Si no existe el registro enviar una variable para mostra mensaje en pagina de login.



<?php
include('conexion.php');
$usuario = $_POST['usuario'];
$pass = md5($_POST['pass']);

$consulta = "SELECT * FROM personal WHERE rut='$usuario' AND
contraseña='$pass'";

$ejecutar = mysql_query($consulta, $conexion);

$result = mysql_num_rows($ejecutar);

if ($result > 0)
{
	while ($result = mysql_fetch_array($ejecutar))
	{
		session_start();
		$_SESSION['activo'] = true;
		//$_SESSION['usuario'] = $usuario;  //Se usa? verificar
		$_SESSION['nombres'] = $result['nombre'] . ' ' . $result['apellido'];
		$_SESSION['cargo'] = $result['cargo'];
  		
  		if ($result['cargo'] == 'Admin')
  		{
    		header('Location:principalAdmin.php');
		} 
		elseif ($result['cargo'] == 'Bodega') 
		{
    		header('Location:principalBodega.php');
		}
	}
} 
else 
{
	header ("Location:login.php?error=si");
}
?>
