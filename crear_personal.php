
<!-- Incluir archivos requeridos -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Crear personal</title>
        <link rel="stylesheet" href="estilo.css"/>
    </head>
    <body>

        <div class="contenedor">
            <?php
                error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING);
            ?>
            <div class= "encabezado">
                <div class="izq">
                    <p>Bienvenido/a:<br><!-- Agregar variable de sesión con nombre y apellido del usuario --></p>
                </div>

                <div class="centro">
                    <a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a> 
                </div>
                
                <div class="derecha">
                    <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
                </div>
            </div>

            <br><h1 align="center">GESTIÓN DE PERSONAL</h1>

            <div class="formulario">
                <form ="registro" method="post" action="registro.php" enctype="application/x-www-form-urlencoded">
                    <div class="campo">
                        <label for="cabra">RUT:</label>
                        <input type="text" name="rut" required/>
                    </div>

                    <div class="campo">
                        <div class="en-linea izquierdo">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" required/>
                        </div>

                        <div class="en-linea">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" required/>
                        </div>
                    </div>

                    <div class="campo">
                        <label for="cargo">Cargo:</label>
                            <select name="cargo" required/>
                                <option>Admin</option>
                                <option>Bodega</option>
                            </select>
                    </div>

                    <div class="campo">
                        <div class="en-linea izquierdo">
                            <label for="contrasena1">Contraseña:</label>
                            <input type="password" name="contrasena1" required/>
                        </div>
                        
                        <div class="en-linea">
                            <label for="contrasena2">Repetir contraseña:</label>
                            <input type="password" name="contrasena2" required/>
                        </div>
                    </div>

                    <div class="botones">
                        <input type="submit" name="boton-enviar" value="crear usuario"/>

                        <!-- Realizar verificación de variables segun sea el resultado de la validación en el archivo registro.php:
                        caso 1: Entregar el mensaje "Las contraseñas no coinciden",
                        caso 2: Entregar el mensaje "Usuario creado correctamente",
                        caso 3: entregar mensaje "Ya existe un registro asociado al rut ingresado". -->
                        
                    </div>
                </form>
            </div>

        </div>
    </body>
</html>