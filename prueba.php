<?php
include('conexion.php');

//Llamar a esta funcion solo una vez
//sino myslq_fetch_array pasa a valer 0
//a partir de la segunda llamada
function getStock($execute)
{
   $row = mysql_fetch_array($execute);
   return (int) $row['stock'];
    
}

//Devuelve un arreglo. La primera componente es un booleano
//que indica que el codigo es correcto (true)
//la segunda componente es el resultado de la consulta
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

function updateStock($conexion, $stock, $cod)
{
   $query = "UPDATE productos SET stock={$stock} WHERE
   cod_producto={$cod}";
    
   $execute = mysql_query($query, $conexion) or die('Error: No se pudo
   actualizar el stock');
}

if ($_POST['actualiza'] == 'Actualizar')
{
   $cod = $_POST['seleccionar'];
    
   $stock = (int) $_POST['stock']; //Puede ser positivo o negativo
   
   $array = validateCode($conexion, $cod);
   if ($array['bool']) //el codigo es valido
   {
       
       $stock += getStock($array['executeQuery']);
       if ($stock < 0) //stock negativo
       {
          header('Location:mod_producto.php?msg=2');
       }
       else
       {
          updateStock($conexion, $stock, $cod);
          header('Location:mod_producto.php?');
       }
   }
   else
   {
      //El codigo ingresado no esta en la base de datos
      header('Location:mod_producto.php?msg=1');
   }
    
}

?>
