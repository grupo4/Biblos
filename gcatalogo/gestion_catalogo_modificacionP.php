
<?php
/**
 * 
 * Modificacion de un titulo de la base de dator
 * @author Carlos
 * @version 1.0
 */
//include_once"*../funciones.php";
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
        // $fecha_publicacion = date('d/m/Y', strtotime($titulo['fecha_publicacion']));
        //$fecha_adquisicion = date('d/m/Y', strtotime($titulo['fecha_adquisicion']));
        $cod_dewey = $_POST['dewey'];
        $dewey_autor = strtoupper($_POST['dewey_autor']);
        $dewey_titulo = strtoupper($_POST['dewey_titulo']);
        $nombre_titulo = $_POST['nombre_titulo'];
        $isbn = $_POST['isbn'];
        $edicion = $_POST['edicion'];
        $tipo_modificacion = $_POST['tipo_modificacion'];
        $consulta = "update titulo ";
        switch ($tipo_modificacion) {
            case 1:
                $consulta = $consulta . "SET nombre_titulo='$nombre_titulo'";
                break;
            case 2:
                $consulta = $consulta . "SET isbn='$isbn'";
                break;
            case 3:
                $consulta = $consulta . "SET edicion='$edicion'";
                break;
            default:
                echo "Opcion no valida";
        }

        $consulta = $consulta . " where dewey_id_categoria_dewey='$cod_dewey' AND id_apellido_autor='$dewey_autor' AND id_titulo='$dewey_titulo'";
        echo $consulta;

        // Funcion incluida en funciones.php
        /**
         * kjlfkjasj
         */
        iniciaBD();
        $resultado = mysql_query($consulta);
        if ($resultado) {
            $afectados = mysql_affected_rows();
            if ($afectados > 0)
                echo "modificacion correcta ($afectados)";
            else
                echo "No existe el libro en cuesti&oacute;n ($afectados)";
        }
        else {
            echo "Fallo en modificacion:" . mysql_error();
        }
        echo "<a href='../recursos/menuG.php'> Menu</a>";
        ?>
    </body>
</html>
