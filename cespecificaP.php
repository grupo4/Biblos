<?php
include "funciones.php";
controlSesion();
$usuario = $_SESSION['usuario'];
?>  
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        iniciaBD();
        $tipo_busqueda = $_POST['tipo_busqueda'];
        echo $tipo_busqueda;
        $busqueda = $_POST['busqueda'];

        $query = "select * from titulo where ";

        switch ($tipo_busqueda) {
            case 1:
                $catDewey = substr($busqueda, 0, 3);
                $idApellido = strtoupper(substr($busqueda, 3, 3));
                $idLibro = strtoupper(substr($busqueda, 6, 3));
                
                //$query = $query . "titulo_dewey_id_categoria_dewey='$catDewey' AND id_apellido='$idApellido' AND id_titulo='$idLibro'";
                header("location:mostrarFichaLibro.php?c1=$catDewey&c2=$idApellido&c3=$idLibro");
                break;
            case 2:
                $query = $query . "nombre='$busqueda'";
                break;
            case 3:
                break;
            case 4:
                break;
            default:
        }
  

        echo $query;

        $resultado = mysql_query($query);
        if ($resultado) {
            $autor = mysql_fetch_array($resultado);
            echo $autor;
        }
        else
            $autor = "Sin Autor";
        echo "Numero de Título:" . mysql_num_rows($resultado) . "<p>";
        ?>
    </body>
</html>
