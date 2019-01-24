
<!-- Incluir archivos requeridos -->
<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include('sesion.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Bodega</title>
        <link rel="stylesheet" href="estilo.css"/>
    </head>
    <body>
        
        <div class="contenedor">
            <h1 align="center">CUENTA DE BODEGA</h1>
            <div class= "encabezado">
                <div class="izq">
            
                    <p>Bienvenido/a:<br><?php echo $_SESSION['nombres']?></p>

                </div>
                
                <div class="derecha">
                    <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
                </div>
                <br><h2 align="center">CONTROL DE PRODUCTOS</h2><br>
            </div>
                
            <div>
                <table align="center" class="tabla">
                    <tr height="150">
                    <td width="200"><center><a class="modulos" href="agregar_producto.php"><img src="imagenes/adp.png"></a>
                    <br><br><br>Agregar producto
                    <td></center>
                    <td width="200"><center><a class="modulos" href="mod_producto.php"><img src="imagenes/modp.png"></a>
                    <br><br><br>Modificar poducto<td></center>
                    <td width="200"><center><a class="modulos" href="eliminar_producto.php"><img src="imagenes/elp.png"></a>
                    <br><br><br>Eliminar producto<td></center>
                    <td width="200"><center><a class="modulos" href="realizar_entrega.php"><img src="imagenes/entrega.png"></a>
                    <br><br><br>Entrega de productos<td></center>
                    <td width="200"><center><a class="modulos" href="entregas.php"><img src="imagenes/entregado.png"></a>
                    <br><br><br>Entregas realizadas<td></center>
                    </tr>
                </table>

            </div>
        </div>
        
    </body>
</html>