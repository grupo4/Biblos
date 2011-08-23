<?php
include "./funciones.php";
compruebaSesion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Listado concreto del catalogo.</h1>
        <?php
        listarCatalogo();
        ?>
    </body>
</html>

<?php

function listarCatalogo() {
    iniciaBD();

    $tipoBusqueda = $_POST['tipo_busqueda'];
    $busqueda = retornarStringValidoNueva($_POST['busqueda']);
    echo $busqueda;



    $query = "select * from titulo where ";

    // Montar la query en funcion del tipo de busqueda seleccionado
    switch ($tipoBusqueda) {
        case 1:// Dewey
            $query = $query . "dewey_id_categoria_dewey='$busqueda'";
            break;
        case 2:// Por titulo exacto
            $query = $query . "nombre_titulo='$busqueda'";
            break;
        case 3:// Por titulo aproximado
            $query = $query . "nombre_titulo like '%$busqueda%'";
            break;
        default:
            die("Tipo de busqueda $tipoBusqueda no valido");
    }


    //          (id,autor,editorial,nombre)
    // values ($id,'$autor','$editorial','$nombre')";
    $resultado = mysql_query($query);
    echo "Numero de títulos:" . mysql_num_rows($resultado) . "<p>";


    echo"<table border=1>";
    echo"<th>Codigo</th>
            <th>Titulo</th>
            <th>Autor</th>\n";
    if ($resultado) {
        while ($titulo = mysql_fetch_array($resultado)) {
            // Saco en variables el codigo completo del libro
            $cat_dewey = $titulo['dewey_id_categoria_dewey'];
            $id_apellido = $titulo['id_apellido_autor'];
            $id_titulo = $titulo[2];
            $idAutor = $titulo['autor_id_autor'];
            echo "<tr>";
            echo "<td><a href='mostrarFichaLibro.php?c1=$cat_dewey&c2=$id_apellido&c3=$id_titulo'>" .
            $cat_dewey . strtoupper($id_apellido) . strtoupper($id_titulo) . "</a></td>";
            echo "<td>" . htmlentities($titulo['nombre_titulo']) . "</td>";

            $autores = obtenerAutor($idAutor);
            echo "<td><ul>";
            foreach ($autores as $autor) {
                echo "<li>" . $autor;
            }
            echo "</ul></td>";
            echo "<tr>\n";
        }
        echo"</table>";
    }

    else
        die("Fallo al listar") . mysql_error();
}
?>