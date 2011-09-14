<?php
/**
 * Este fichero nos permite hacer consultas especificas de un titulo
 * @author Grupo4
 * @version 1.0
 */
include "../recursos/funciones.php";
compruebaSesion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php fijaPlantillaCSS(); ?>
    </head>
    <body>
        <h1>Listado concreto del catalogo.</h1>
        <?php
        listarCatalogo();
        ?>
        <a href="../recursos/menuG.php">Menu</a>
    </body>
</html>