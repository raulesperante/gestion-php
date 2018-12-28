<?php
include('conexion.php');

//echo 'debug: seleccionar: ' . $_POST['seleccionar'];
//echo '<br>debug: stock: ' . $_POST['stock'];
//echo '<br>debug: actualiza: ' . $_POST['actualiza'];

//'getStock' dado un codigo trae su stock. Si el código no existe
//redirecciona a mod_product.php
function getStock($conexion, $cod)
{
    $query = "SELECT stock FROM productos WHERE cod_producto='$cod'";
    
    $execute = mysql_query($query, $conexion) or die('Error');
    
    $result = mysql_num_rows($execute);
    
    if ($result ==  1) //El cod. es primary key 
    {
        $row = mysql_fetch_array($execute);
        return (int) $row['stock'];
        
    }
    else
    {
        header('Location:mod_producto.php?msg=1');
    }
    
}


//Devuelve true si el codigo existe en la base de datos
//caso contrario false
function validateCode($conexion, $cod)
{
    $query = "SELECT * FROM productos WHERE cod_producto='$cod'";
    
    $execute = mysql_query($query, $conexion) or die('Error');
    
    $result = mysql_num_rows($execute);
    
    $array = [
        'bool' => true;
        'executeQuery' => $execute;
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
   if ($array['bool']) 
   {
       //procesar
   }
   else
   {
      header('Location:mod_producto.php?msg=1');
   }
    
   $stock += getStock($conexion, $cod);
    
   if ($stockdb + $stock < 0) //stock negativo
   {
      header('Location:mod_producto.php?msg=2');
   }
   else
   {
      updateStock($conexion, $stock, $cod);
      header('Location:mod_producto.php?');
   }
   
}

?>
