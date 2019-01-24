<!-- incluir archivos requeridos.
	Verificar la confirmación de la contraseña.
		Recuperar las variables con los datos ingresados en el formulario. 
		Validar que el rut ingresado no se encuantre en la base de datos.
			Si ya existe un registro vinculado al rut ingresado:
				Redirigir a login y entregar mensaje.

			Si no existe:
			Insertar datos en tabla correspondiente.
			Redirigir a login y mostrar mensaje.

	Si las contraseñas no existen redirigir a login y mostrar mensaje. -->  

<?php
include('conexion.php');
include('funciones.php');

if (isset($_POST['boton-enviar']) && 
    $_POST['contrasena1'] == $_POST['contrasena2'])
{
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cargo = $_POST['cargo'];
    $pass = md5($_POST['contrasena1']);
    
    
    $query = "SELECT * FROM personal WHERE rut='$rut'";
    $array = validateField($conexion, $query);
    if ($array['bool']) //Si el rut ya está en la base 
    {
        //regresar
        header('Location:crear_personal.php?msg=2');
    }
    //Crear usuario
    $query = "INSERT INTO personal(rut, nombre, apellido,
    cargo, contraseña) VALUES ('$rut', '$nombre',
    '$apellido', '$cargo', '$pass')";

    $execute = mysqli_query($conexion, $query) or die('Error');
    header('Location:crear_personal.php?msg=3');
}
else
{
    header('Location:crear_personal.php?msg=1');
}
?>