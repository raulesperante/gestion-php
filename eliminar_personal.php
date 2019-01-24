
<!-- Inclución de archivos requeridos -->
p<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include('sesion.php');
session_start();
?>

<!DOCTYPE html> 
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>formulario eliminar PERSONAL</title>
		<link type="text/css" href="estilo.css" rel="stylesheet">

	</head>

	<body>
		<div class="contenedor">
		<div class= "encabezado">
			<div class="izq">
			
				<p>Bienvenido/a:<br><?php echo $_SESSION['nombres'] ?></p>

			</div>

			<div class="centro">
				<a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a>
			</div>
				
			<div class="derecha">
				<a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
			</div>
		</div>
		
		
		<br><br><h1 align='center'>REGISTROS EXISTENTES</h1><br>
		<?php
			include('conexion.php');

			$consulta="SELECT * FROM personal";
			$ejecutar=mysqli_query($conexion, $consulta);
		
			echo "<table  width='80%' align='center'><tr>";	         	  
			echo "<th width='20%'>RUT</th>";
			echo "<th width='20%'>NOMBRE</th>";
			echo "<th width='20%'>APELLIDO</th>";
			echo "<th width='20%'>CARGO</th>";
			echo  "</tr>"; 
		
			while($result=mysql_fetch_array($ejecutar)){	
	          	
	          echo "<tr>";	         	  
			  echo '<td width=20%>'.$result['rut'].'</td>';
			  echo '<td width=20%>'.$result['nombre'].'</td>';
			  echo '<td width=20%>'. $result['apellido'].'</td>';
			  echo '<td width=20%>'.$result['cargo'].'</td>';
			  echo "</tr>";
			}
			echo "</table></br>";
		?>

		<form action="" method="post" align='center'>
			<label name="elimina">Ingresa el Rut del personal a eliminar:</label>
			<input name='eliminar-personal' type="text">
			<input name='eliminar' type="submit" value="ELIMINAR">
		</form>
		<?php
			/* En las siguientes 5 lineas se verifica la creación del boton submit, se recupera el rut ingresado para ser eliminado y se verifica si es igual al rut del Admin, 
			y se muestra alerta con mensaje*/	
			 if (isset($_POST['eliminar'])) {
				$eliminar = $_POST['eliminar-personal'];
				if ($eliminar == '180332403') {
				echo "<script lenguaje='javascript'>alert('Admin general no puede ser eliminado');</script>";
			}else{

				// Aquí debes agregar la eliminación del registro.
                $query = "DELETE FROM personal WHERE rut='$eliminar'";
                
                $execute = mysqli_query($conexion, $query);
                
                header('Location:eliminar_personal.php');
			
			}

				
			};
		?>
		    	
		</div>
	</body>
</html>		 