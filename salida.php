<?php
session_start();
if(!isset ($_SESSION['usuario'])) die("Debe logearse primero");
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
