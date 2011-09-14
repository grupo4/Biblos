<?php
/**
 * Este fichero sirve, para dar de alta a un usuario
 * @author Manu
 * @version 1.0
 */

include "../recursos/funciones.php";
compruebaSesion();
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
        
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $email = $_POST['email'];
        $direccion = $_POST['direcion'];
        $telefono = $_POST['telefono'];
        $plantilla_idplantilla = $_POST['plantilla'];
        $tipo_usuario_id_tipo_usuario = $_POST['tipo_usuario'];
        $clave = $_POST['clave'];

        // Preparar la consulta sql para inserta el nuevo usuario en la BD
        iniciaBD();
        $query = "insert into usuario
(dni, nombre_usuario, apellido1_usuario, apellido2_usuario, email,direccion, telefono, plantilla_idplantilla, tipo_usuario_id_tipo_usuario, clave)
values ('$dni','$nombre','$apellido1','$apellido2','$email', '$direccion', '$telefono', '$plantilla_idplantilla', '$tipo_usuario_id_tipo_usuario','$clave')";

        //echo $query;
        $resultado = mysql_query($query);
        if (!$resultado)
            echo "Fallo en el alta de usuario ($nombre):" . mysql_error();
        else
            echo "Usuario insertado correctamente. Volver al <a href='../recursos/menuG.php'>men&uacute;</a>";
        ?>




    </body>
</html>