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
        <form action="gestion_usuario_modificacionP.php" method="POST">
            <fieldset>
                <table border="1">
                    <tr>
                        <th>DNI:</th>
                        <th><input type="text" name="dni" value="" size="9" /><br></th>
                    </tr>
                    <tr>
                        <th>Tipo usuario:</th>
                        <th><?php cargardorLista("tipo_usuario", "id_tipo_usuario", "tipo_usuario", "1") ?><br></th>
                    </tr>
                    <tr>
                        <th>Clave:</th>
                        <th><input type="text" name="clave" value="" size="9" /><br></th>
                    </tr>
                </table><br>
                <input type="submit" value="Modificacion" />
                <input type="reset" value="Borrar" name="Borrar" />


            </fieldset>

<a href="../recursos/menuG.php">Menu</a>
    </body>
</html>