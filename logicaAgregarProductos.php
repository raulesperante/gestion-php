<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include('sesion.php');
include('conexion.php');
session_start();


//@validarCodigo devuelve true si el código existe
//en la base de datos. Caso contrario false
function existeCodigo($cod, $conexion)
{
    $consulta = "SELECT cod_producto FROM productos WHERE 
    cod_producto = '$cod'";
    
    $ejecutar = mysqli_query($conexion, $consulta); 
    
    $result = mysqli_num_rows($ejecutar);
    
    if ($result >= 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function insertarDatos($arreglo, $conexion)
{
   $consulta = "INSERT INTO productos (cod_producto,
       descripcion, stock, proveedor, fecha_ingreso)
       VALUES 
       ('{$arreglo["codigo"]}', '{$arreglo["descripcion"]}',
       '{$arreglo["stock"]}', '{$arreglo["proveedor"]}', '{$arreglo["fecha"]}')";
        
   $ejecutar = mysqli_query($conexion, $consulta) or die('Error al
    insertar datos');
}

if (isset($_POST['crear']))
{
   $codigo = $_POST['codigo'];
   $descripcion = $_POST['descripcion'];
   $stock = $_POST['stock'];
   $proveedor = $_POST['proveedor'];
   $fecha = $_POST['fecha'];
    
   $claves= ['codigo', 'descripcion', 'stock', 'proveedor', 'fecha'];
   $valores= [$codigo, $descripcion, $stock, $proveedor, $fecha];
   $arreglo = array_combine($claves, $valores);
   if (existeCodigo($codigo, $conexion))
   {
      header("Location:agregar_producto.php?existe=si");
   }
   else
   {
      insertarDatos($arreglo, $conexion);
      header("Location:agregar_producto.php?");
   }
}
?>
