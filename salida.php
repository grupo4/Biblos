<?php
/**
 * en este fichero salimos de la base de datos 
 */

include "funciones.php";
compruebaSesion();
compruebaPermisos(true);
?>  

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        Saliendo...
        <?php
        $_SESSION['usuario']="";
        session_destroy();
        ?>
        Bye, bye!
    </body>
</html>
