
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



        <!-- Realizar verificación de variables segun sea el resultado de la validación en el archivo registro.php:
        caso 1: Entregar el mensaje "Las contraseñas no coinciden",
        caso 2: Entregar el mensaje "Usuario creado correctamente",
        caso 3: entregar mensaje "Ya existe un registro asociado al rut ingresado". -->

<?php

}
if (isset($_POST['boton-enviar']) && 
    $_POST['contrasena1'] == $_POST['contrasena2'])
{
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cargo = $_POST['cargo'];
    
    validarRut($rut);
    
    
    
}
else
{
    header('Location:crear_personal.php?msg=1');
}

?>