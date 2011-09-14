<?php
/**
 * Fichero que nos permite, modificar cualquier usuario en la BD
 * @author Manu
 * @version 1.0
 */
include "../recursos/funciones.php";
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

 // Aqui rellenamos los campos requeridos para la modificación.
  
 
        
        
        $dni = $_POST['dni'];
        $tipo_usuario = $_POST['tipo_usuario'];
        $clave = $_POST['clave'];
        
        $consulta = "update usuario
set tipo_usuario_id_tipo_usuario='$tipo_usuario', clave='$clave'
where dni='$dni'";
        echo $consulta;

        iniciaBD();
        $resultado = mysql_query($consulta);
        if ($resultado) {
            $afectados = mysql_affected_rows();
            if ($afectados > 0)
                echo "Modificacion correcto ($afectados)";
            else
                echo "No existe el usuario en cuesti&oacute;n ($afectados)";
        }
        else {
            echo "Fallo en modificacion:" . mysql_error();
        }
        echo "<a href='../recursos/menuG.php'> Menu</a>";

        ?>
</body>
</html>
