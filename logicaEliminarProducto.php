<?php
include('conexion.php');
include('funciones.php');

function deleteProduct($conexion, $cod)
{
   $query = "DELETE FROM productos WHERE cod_producto='$cod'";
    
   $execute = mysql_query($query, $conexion) or die('No se encontraron los datos');
}


if (isset($_POST['eliminar']))
{
    $cod = $_POST['eliminar-producto'];
    
    $array = validateCode($conexion, $cod);
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
