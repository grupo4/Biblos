<?php
/**
 * En este fichero podemos dar de alta un nuevo titulo 
 * @author Carlos
 * @version 1.0
 */
include "../recursos/funciones.php";
//compruebasesion();
iniciaBD();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php fijaPlantillaCSS();?>
    </head>
    <body>
        <?php
        /**
         * para validar la fecha introducimos la cadena str_to_date ya que la fecha que introduce mysql es diferente formato al de phpmyadmin
         * 
         */
        $dewey_id_categoria_dewey = $_POST['dewey'];
        $id_apellido_autor = $_POST['autor'];
        $id_titulo = $_POST['id_titulo'];
        $nombre_titulo = $_POST['nombre_titulo'];
        $isbn = $_POST['isbn'];
        // "str_to_date('valor_$fecha_publicacion','%d/%m/%Y')"
        $fecha_publicacion = "str_to_date('".$_POST['fecha_publicacion']."','%d/%m/%Y')";
        $fecha_adquisicion = "str_to_date('".$_POST['fecha_adquisicion']."','%d/%m/%Y')";
        $idioma = $_POST['idioma'];
        $num_paginas = $_POST['num_paginas'];
        $edicion = $_POST['edicion'];
        $editorial_id_editorial = $_POST['editorial'];

        $titulo3 = strtoupper(substr($nombre_titulo, 0, 3));

        $codAutor = strtok($id_apellido_autor, "-");
        $apellido3 = strtok("-");
        

        $query = "insert into titulo 
    (dewey_id_categoria_dewey ,  id_apellido_autor ,  id_titulo ,
  nombre_titulo ,  isbn ,  fecha_publicacion ,  fecha_adquisicion ,
  idioma,  num_paginas ,  edicion ,  autor_id_autor ,  editorial_id_editorial)
  values('$dewey_id_categoria_dewey' ,  '$apellido3' ,  '$titulo3' ,
  '$nombre_titulo' ,  '$isbn' ,  $fecha_publicacion ,  $fecha_adquisicion ,
  '$idioma',  '$num_paginas' ,  '$edicion' , '$codAutor' ,  '$editorial_id_editorial'
  )";
        

        $resultado = mysql_query($query);
        if (!$resultado)
            echo "Fallo en la insercion de libro:" . mysql_error();
        else 
            echo "Libro insertado correctamente. Volver al <a href='../recursos/menuG.php'>men&uacute;</a>";
        ?>
    </body>
</html>
