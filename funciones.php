<?php
//Llamar a esta funcion solo una vez
//sino myslq_fetch_array pasa a valer 0
//a partir de la segunda llamada
function getStock($execute)
{
   $row = mysqli_fetch_array($execute, MYSQLI_NUM);
   return (int) $row['stock'];
    
}

//Devuelve un arreglo. La primera componente es un booleano
//que indica que la primary key es correcta (true)
//la segunda componente es el resultado de la consulta
function validateField($conexion, $query)
{
    $execute = mysqli_query($conexion, $query) or die('Error');
    
    $result = mysqli_num_rows($execute);
    
    $array = [
        'bool' => true,
        'executeQuery' => $execute,
    ]; 
    
    if ($result ==  1) //Es primary key 
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

function updateStock($conexion, $stock, $cod)
{
   $query = "UPDATE productos SET stock={$stock} WHERE
   cod_producto={$cod}";
    
   $execute = mysqli_query($conexion, $query) or die('Error: No se pudo
   actualizar el stock');
}
?>