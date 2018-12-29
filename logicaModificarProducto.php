<?php
include('conexion.php');
include('funciones.php');


function updateStock($conexion, $stock, $cod)
{
   $query = "UPDATE productos SET stock={$stock} WHERE
   cod_producto={$cod}";
    
   $execute = mysql_query($query, $conexion) or die('Error: No se pudo
   actualizar el stock');
}


function modifyProduct($conexion, $arguments)
{
   $query = "UPDATE productos SET descripcion='{$arguments['description']}',
   proveedor='{$arguments['provider']}', fecha_ingreso='{$arguments['date']}' WHERE cod_producto='{$arguments['cod']}'";
    
    
   $execute = mysql_query($query, $conexion) or die('Error: No se pudo
   modificar el producto');
}

if (isset($_POST['actualiza']))
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
          header('Location:mod_producto.php');
       }
   }
   else
   {
      //El codigo ingresado no esta en la base de datos
      header('Location:mod_producto.php?msg=1');
   }
}//fin de actualizar stock
elseif (isset($_POST['modificar']))
{
   $cod = $_POST['seleccionar'];
   $description = $_POST['descripcion'];
   $provider = $_POST['proveedor'];
   $date = $_POST['fecha'];
   
   $keys = ['cod', 'description', 'provider', 'date'];
   $values = [$cod, $description, $provider, $date];
   $arguments = array_combine($keys, $values);
    
   $array = validateCode($conexion, $cod);
   if ($array['bool']) //El cod ingresado es valido
   {
       modifyProduct($conexion, $arguments);
       header('Location:mod_producto.php');
   }
   else
   {
      //El codigo ingresado no esta en la base de datos
      header('Location:mod_producto.php?msg=1');
   } 
}//fin de modificar producto
?>
