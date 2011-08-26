<?php include "./funciones.php";
compruebasesion();
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
$dewey_id_categoria_dewey=$_POST['dewey_id_categoria_dewey'];
$id_apellido_autor=$_POST['id_apellido_autor'];
$id_titulo=$_POST['id_titulo'];
$nombre_titulo=$_POST['nombre_titulo'];
$isbn=$_POST['isbn'];
$fecha_publicacion=$_POST['fecha_publicacion'];
$fecha_adquisicion=$_POST['fecha_adquisicion'];
$idioma=$_POST['idioma'];
$num_paginas=$_POST['num_paginas'];
$edición=$_POST['edición'];
$autor_id_autor=$_POST['autor_id_autor'];
$editorial_id_editorial=$_POST['editorial_id_editorial'];

$query= "select * from titulo "


        ?>
    </body>
</html>
