<?php
include "funciones.php";
compruebaSesion();
?>        
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1> MENU</h1>
        <?php
        if (!$_SESSION['usuario'] || !isset($_SESSION['usuario'])) {
            echo "logeate primero";
        } else {
            $usuario = $_SESSION['usuario'];
            echo "Usuario:" . $usuario['nombre_usuario'];
        }
        ?>
        <h1>Opciones</h1>   
        <ul><li>Consultas
                <ul>
                    <li><a href='consulta_general.php'>Consulta general</a>
                    <li><a href='cespecificaG.php'>Consulta concreta</a>    

                </ul>

            <li>Administración
                <ul>
                    <li>Gestión Catálogo
                        <ul>
                            <li><a href='gestion_catalogo_alta.php'>Alta</a>
                            <li><a href='gestion_catalogo_baja.php'>Baja</a>
                            <li><a href='gestion_catalogo_modificacion.php'>Modificacion</a>
                        </ul>  
                    <li>Gestión Usuario
                        <ul>
                            <li><a href='gestion_usuario_alta.php'>Alta</a>
                            <li><a href='gestion_usuario_baja.php'>Baja</a>
                            <li><a href='gestion_usuario_modificacion.php'>Modificacion</a>
                        </ul>  
                </ul>    
                <?php
                // Comprobacion del tipo de usuario
                if ($usuario['tipo_usuario_id_tipo_usuario'] == 0)
                    mostrarOpcionesAdministracion();
                ?>

            <li><a href='salida.php'>Salir</a>
        </ul></ul>

</body>
</html>

<?php

function mostrarOpcionesAdministracion() {
//echo "Es administrador";
    echo("<li>Administracion
                <ul>
                    <li><a href=''>Cat&aacute;logo</a>
                    <li><a href=''>Usuarios</a>    
                        

                </ul>");
}
?>
