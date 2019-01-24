<?php
include('conexion.php');
include('funciones.php');

function loadDeliveries($conexion, $arguments)
{
    $query = "INSERT INTO entregas(rut, cod_producto,
    cantidad, fecha_entrega) VALUES ('{$arguments['rut']}',
    '{$arguments['cod']}', '{$arguments['cantidad']}', 
    '{$arguments['fecha']}')";
    
    $execute = mysql_query($query, $conexion) or die('No se cargaron
    los datos');
}
    

if (isset($_POST['agregar']))
{
    $rut = $_POST['rut'];
    $cod = $_POST['codigo'];
    $cantidad = (int) $_POST['cantidad'];
    $fecha = $_POST['fecha'];
    
    $keys = ['rut', 'cod', 'cantidad', 'fecha'];
    $values = [$rut, $cod, $cantidad, $fecha];
    $arguments = array_combine($keys, $values);
    
    $query = "SELECT * FROM productos WHERE cod_producto='$cod'";
    $array = validateField($conexion, $query);   
    
    if ($cantidad <= 0) 
    {
        header('Location:realizar_entrega.php?msg=1');
    }
   elseif ($array['bool']) //el codigo es valido
   {
       $stock = getStock($array['executeQuery']) - $cantidad;
       if ($stock < 0) //stock negativo
       {
          header('Location:realizar_entrega.php?msg=2');
       }
       else
       {
          updateStock($conexion, $stock, $cod);
          loadDeliveries($conexion, $arguments);
          header('Location:realizar_entrega.php');
       }
   }
   else
   {
      //El codigo ingresado no esta en la base de datos
      header('Location:realizar_entrega.php?msg=3');
   }
}
    



?>