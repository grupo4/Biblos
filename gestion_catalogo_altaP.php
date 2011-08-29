<?php
include "./funciones.php";
//compruebasesion();
iniciaBD();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $dewey_id_categoria_dewey = $_POST['dewey'];
        $id_apellido_autor = $_POST['autor'];
        $id_titulo = $_POST['id_titulo'];
        $nombre_titulo = $_POST['nombre_titulo'];
        $isbn = $_POST['isbn'];
        $fecha_publicacion = $_POST['fecha_publicacion'];
        $fecha_adquisicion = $_POST['fecha_adquisicion'];
        $idioma = $_POST['idioma'];
        $num_paginas = $_POST['num_paginas'];
        $edición = $_POST['edicion'];
        $editorial_id_editorial = $_POST['editorial'];

        $titulo3 = strtoupper(substr($nombre_titulo, 0, 3));

        $codAutor = strtok($id_apellido_autor, "-");
        $apellido3 = strtok("-");

        $query = "insert into titulo 
    (dewey_id_categoria_dewey ,  id_apellido_autor ,  id_titulo ,
  nombre_titulo ,  isbn ,  fecha_publicacion ,  fecha_adquisicion ,
  idioma,  num_paginas ,  edicion ,  autor_id_autor ,  editorial_id_editorial)
  values('$dewey_id_categoria_dewey' ,  '$apellido3' ,  '$titulo3' ,
  '$nombre_titulo' ,  '$isbn' ,  '$fecha_publicacion' ,  '$fecha_adquisicion' ,
  '$idioma',  '$num_paginas' ,  '$edicion' , '$codAutor' ,  '$editorial_id_editorial'
  )";


        $resultado = mysql_query($query);
        if (!$resultado)
            echo "Fallo en la insercion de libro:" . mysql_error();
        else 
            echo "Libro insertado correctamente. Volver al <a href='menuG.php'>men&uacute;</a>";
        ?>
        
    </body>
</html>
