<?php
include "funciones.php";
compruebaSesion();
define("id_titulo", "2");
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
        
        $query = "select * from titulo order by nombre_titulo";
        $resultado=mysql_query($query);
        if($resultado){
            echo "Número de libros:".mysql_num_rows($resultado);
            
            
            echo"<table border='1'>
            <th>C&oacute;digo</th><th>Nombre</th><th>Autor</th>";
            while($fila=mysql_fetch_array($resultado)){
                $codCompleto = $fila['dewey_id_categoria_dewey'].$fila['id_apellido_autor'].$fila[id_titulo];
                $autor=codAutor2NombreAutor($fila['autor_id_autor']);
                $autorCompleto=htmlentities($autor['apellido1']." ".$autor['apellido2'].", ".$autor['nombre_autor']);
                 echo "<tr>
                <td>$codCompleto</td>
                <td>".htmlentities($fila['nombre_titulo'])."</td>
                <td>$autorCompleto</td>
            </tr>";
            }
        echo "</table>";
            
        }
        
        ?>

    </body>
</html>

