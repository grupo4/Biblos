<?php
include "funciones.php";
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $nombre_titulo = $_POST['nombre_titulo'];
        $cod_dewey = $_POST['dewey'];
        $dewey_titulo = strtoupper($_POST['dewey_titulo']);
        $dewey_autor = strtoupper($_POST['dewey_autor']);
        $tipo_baja = $_POST['tipo_baja'];
        
        switch($tipo_baja){
            case 1:
                $consulta = "delete from titulo where nombre_titulo='$nombre_titulo'";
                break;
            case 2:
                $consulta = "delete from titulo where dewey_id_categoria_dewey='$cod_dewey' AND id_apellido_autor='$dewey_autor' AND id_titulo='$dewey_titulo'";
                break;
            default:
                echo "Opcion de baja no correcta.<a href='menuG.php'> Menu</a>";
        }
        

        iniciaBD();

        echo $consulta;

        $resultado = mysql_query($consulta);
        if ($resultado) {
            $afectados = mysql_affected_rows();
            if ($afectados > 0)
                echo "Borrado correcto ($afectados)";
            else echo "No existe el libro en cuesti&oacute;n ($afectados)";
        }
        else {
            echo "Fallo en borrado:" . mysql_error();
        }
        echo "<a href='menuG.php'> Menu</a>";
        ?>
    </body>
</html>
