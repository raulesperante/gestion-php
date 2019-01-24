<?php
include('conexion.php');
include('funciones.php');

function deleteProduct($conexion, $cod)
{
   $query = "DELETE FROM productos WHERE cod_producto='$cod'";
    
   $execute = mysqli_query($conexion, $query) or die('No se encontraron los datos');
}


if (isset($_POST['eliminar']))
{
    $cod = $_POST['eliminar-producto'];
    
    $query = "SELECT * FROM productos WHERE cod_producto='$cod'";
    $array = validateField($conexion, $query);
    if ($array['bool']) //el codigo es valido
    {
        deleteProduct($conexion, $cod);
        header('Location:eliminar_producto.php');
        
    }
    else
    {
      //El codigo ingresado no esta en la base de datos
      header('Location:eliminar_producto.php?msg=1');
    }
    
}
?>
