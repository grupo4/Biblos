<?php
include "../recursos/funciones.php";
compruebaSesion();
compruebaPermisos(true);
?>
<!DOCTYPE html>

<html>
    <head>
        ALTA DE USUARIO
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ALTA DE USUARIO</title>
        <?php fijaPlantillaCSS(); ?>
    </head>
    <body>



        <form action="gestion_usuario_altaP.php" method="POST">
            <fieldset>
                <table border="1">
                    <tr>

                        <th>DNI</th>
                        <th><input type="text" name="dni" value="" size="25" /><br></th>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <th><input type="text" name="nombre" value="" size="25" /><br></th>
                    </tr>
                    <th>Apellido 1:</th>
                    <th><input type="text" name="apellido1" value="" size="25" /><br></th>
                    </tr>
                    <tr>
                        <th>Apellido 2:</th>
                        <th><input type="text" name="apellido2" value="" size="25" /><br></th>
                    </tr>
                    <tr>
                        <th>email:</th>
                        <th><input type="text" name="email" value="" size="25" /><br></th>
                    </tr>
                    <tr>
                        <th>dirección:</th>
                        <th><input type="text" name="direccion" value="" size="25" /><br></th>
                    </tr>
                    <tr>
                        <th>teléfono:</th>
                        <th><input type="text" name="telefono" value="" size="25" /><br></th>
                    </tr>
                    <tr>
                    <th>Plantilla:</th>
                    <th><?php cargardorLista("plantilla", "idplantilla", "nombre_plantilla", "1"); ?><br></th>
                    </tr>
                    <tr>
                    <th>Tipo usuario:</th>
                    <th> <?php cargardorLista("tipo_usuario", "id_tipo_usuario", "tipo_usuario", "1"); ?><br></th>
                    
                    </tr>
                    
                    
                    
                   
                    <tr>
                    <th>clave:</th>
                    <th><input type="password" name="clave" value="" size="25" /><br></th>
                    </tr>

                </table>
                <input type="submit" value="Alta" />
                <input type="reset" value="Borrar" name="Borrar" />
            </fieldset>
            <a href="../recursos/menuG.php">Menu</a>
        </form>
    </body>
</html>