<?php
include('conexion.php');


function validateCode($conexion, $cod)
{
    $query = "SELECT * FROM productos WHERE cod_producto='$cod'";
    
    $execute = mysql_query($query, $conexion) or die('Error');
    
    $result = mysql_num_rows($execute);
    
    $array = [
        'bool' => true,
        'executeQuery' => $execute,
    ]; 
    
    if ($result ==  1) //El cod. es primary key 
    {
        return $array;
    }
    else
    {
        $array['bool'] = false;
        $array['executeQuery'] = null;
        return $array;
    }   
}

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
