<?php
/**
 * Este fichero nos sirve para dar de baja a un usuario
 * @author Manu
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
        <?php
        // put your code here
        $dni = $_POST['dni'];
        $consulta = "delete from usuario where dni='$dni'";
        echo $consulta;

        iniciaBD();
        $resultado = mysql_query($consulta);
        if ($resultado) {
            $afectados = mysql_affected_rows();
            if ($afectados > 0)
                echo "Borrado correcto ($afectados)";
            else
                echo "No existe el usuario en cuesti&oacute;n ($afectados)";
        }
        else {
            echo "Fallo en borrado:" . mysql_error();
        }
        echo "<a href='../recursos/menuG.php'> Menu</a>";
        ?>
    </body>
</html>