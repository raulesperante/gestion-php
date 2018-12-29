<?php

CREATE TABLE productos(
	cod_producto VARCHAR(20) NOT NULL,
	descripcion VARCHAR(50) NOT NULL,
	stock VARCHAR(20) NOT  NULL,
	proveedor VARCHAR(50) NOT NULL,
	fecha_ingreso VARCHAR(30) NOT NULL,
	PRIMARY KEY(cod_producto)
)charset=latin1;

CREATE TABLE entregas(
	rut VARCHAR(20) NOT NULL,
	cod_producto VARCHAR(50) NOT NULL,
	cantidad VARCHAR(50) NOT NULL,
	fecha_entrega VARCHAR(30) NOT NULL

if (isset($_POST['agregar']))
{
    $rut = $_POST['rut'];
    $cod = $_POST['codigo'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];
    
    if ($cod <= 0)
    {
        //Debe ingresar una cantidad positiva
        header('Location:realizar_entrega.php?msg=0');
    }
    
    //con el codigo tengo que validar si hay stock para retirar
    //if ($stock - $cantidad < 0)
    //tengo que validar que no pongan una cantidad negativa
    
    
}
    



?>