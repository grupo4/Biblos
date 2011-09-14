<?php
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
        <h1>Ficha completa de libro</h1>
        <?php
        $cod_dewey = $_GET['c1'];
        $id_apellido = $_GET['c2'];
        $id_titulo = $_GET['c3'];

        iniciaBD(); // Paso 1 y 2 de BD

        $sql = "select * from titulo where 
                dewey_id_categoria_dewey='$cod_dewey'
                AND id_apellido_autor='$id_apellido'
                AND id_titulo='$id_titulo'";

        //echo $sql;

        $resultado = mysql_query($sql);
        if ($resultado) {
            echo"<table border=1>";
            echo "<tr>";
            echo"<th>Codigo</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Edción</th>
                        <th>ISBN</th>
                        <th>Editorial</th>
                        <th>Pags</th>
                        <th>FPublicación</th>
                        <th>FAdquisición</th>                      
                        \n";
            echo "</tr>";

            $titulo = mysql_fetch_array($resultado);
            // Saco en variables el codigo completo del libro
            $cat_dewey = $titulo['dewey_id_categoria_dewey'];
            $id_apellido = $titulo['id_apellido_autor'];
            $id_titulo = $titulo['id_titulo'];
            $id_autor = $titulo['id_autor'];
            echo "<tr>";
            echo "<td>" .
            $cat_dewey .
            "" . strtoupper($id_apellido) .
            "" . strtoupper($id_titulo) . "</td>";
            echo "<td>" . htmlentities($titulo['nombre_titulo']) . "</td>";

            /* Para gestion 1..n de titulo con multiples autores, lo cual no estan implementado
             * La implementacion es de 1 titulo con 1 solo autor
             * $autores = obtenerAutores($cat_dewey, $id_apellido, $id_titulo);
             */
            echo "<td>";
            /*
            if (sizeof($autores)>0) {
                echo "<ul>";
                foreach ($autores as $autor) {
                    echo "<li>" . $autor;
                }
                echo "</ul>";
            }
            else
                echo "No autor";*/
            $autorCompleto = obtenerAutor($idAutor);
            if($autorCompleto)
                echo $autorCompleto;
            else echo "Sin Autor";
            echo "</td>\n";

            echo "<td>" . $titulo['edicion'] . "</td>";
            echo "<td>" . htmlentities($titulo['isbn']) . "</td>";
            $id_editorial = $titulo['editorial_id_editorial'];
            $nombre_editorial = obtenerEditorial($id_editorial);
            echo "<td>" . htmlentities($nombre_editorial) . "</td>";
            echo "<td>" . htmlentities($titulo['numero_paginas']) . "</td>";
            echo "<td>" . $titulo['fecha_publicacion'] . "</td>";
            echo "<td>" . $titulo['fecha_adquisicion'] . "</td>";



            echo "</tr>\n";

            echo"</table>";
        }
        ?>
        <br>Volver al <a href='../recursos/menuG.php'>men&uacute;</a>;
    </body>
</html>
