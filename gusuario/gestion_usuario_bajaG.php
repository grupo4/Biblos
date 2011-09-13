<?php
include "../recursos/funciones.php";
compruebaSesion();
compruebaPermisos(true);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php fijaPlantillaCSS(); ?>
    </head>
    <body>
        <form action="gestion_usuario_bajaP.php" method="POST">
            <fieldset>
                <table border="1">
                <tr>
                    <th>DNI:</th>
                    <th><input type="text" name="dni" value="" size="9" /><br></th>
                </tr>
                </table>

                <input type="submit" value="Baja" />
            <input type="reset" value="Borrar" name="Borrar" />



            </fieldset>
            <a href="../recursos/menuG.php">Menu</a>
    </body>
</html>
