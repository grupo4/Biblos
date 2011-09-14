<?php

/**
 * Aqui lo que hacemos es loguearnos conectandonos a la base de datos seleccionada
 * @author grupo4
 * @version 1.0
 */
session_start();
include "../recursos/funciones.php"
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
</head>
<body>
<?php
        
        $dni = $_POST['dni'];
        $clave = $_POST['clave'];
        $tema = $_POST['plantilla'];
        if (!$dni || !$clave) {
            echo "No has introducido todos los detalles requeridos.<br>"
            . "Por favor vuelve e inténtalo de nuevo.";
            exit;
        }
        iniciaBD();
        

           // echo "Entramos a la bd";
            // Usuario y contrasena ok?
            $sql = "SELECT * FROM usuario WHERE dni='$dni' AND clave='$clave'";
            $resultado = mysql_query($sql);
            if (mysql_affected_rows() == 1) {
                // Login correcto
                $usuario = mysql_fetch_array($resultado);
                
                // Cargando variables de sesion
                $_SESSION['usuario'] = $usuario;
                $_SESSION['tema'] = $tema;
                
                
                //echo "Hola " . $usuario['nombre_usuario'] . " (" . $usuario['tipo_usuario_id_tipo_usuario'] . ")<br>";
                echo "<a href='menuG.php'>Dentro</a>";
                //header('location=menuG.php');
                


            }
            else
                echo "Usuario / contraseña incorrectos";
        
        ?>
</body>
</html>
