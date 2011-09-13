<?php
/**
 * menu general 
 * @author grupo4
 * @version 1.0
 */
include "../recursos/funciones.php";
compruebaSesion();
$usuario = $_SESSION['usuario'];
?>        
<!DOCTYPE html>
<html>
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Menu principal Biblos - <?php echo $usuario['nombre_usuario']?></title>
        <?php fijaPlantillaCSS();?>
    </head>
    <body>
        <h1> MENU</h1>
        <h1>Opciones</h1>   
        <ul><li>Consultas
                <ul>
                    <li><a href='../consultas/consulta_general.php'>Consulta general</a>
                    <li><a href='../consultas/cespecificaG.php'>Consulta concreta</a>    

                </ul>


                
                <?php
                // Comprobacion del tipo de usuario
                if ($usuario['tipo_usuario_id_tipo_usuario'] == 0)
                    mostrarOpcionesAdministracion();
                ?>

            <li><a href='../recursos/salida.php'>Salir</a>
        </ul></ul>

</body>
</html>

<?php

function mostrarOpcionesAdministracion() {
//echo "Es administrador";

    echo("
                <li>Administración
                <ul>
                    <li>Gestión Catálogo
                        <ul>
                            <li><a href='../gcatalogo/gestion_catalogo_altaG.php'>Alta</a>
                            <li><a href='../gcatalogo/gestion_catalogo_bajaG.php'>Baja</a>
                            <li><a href='../gcatalogo/gestion_catalogo_modificacionG.php'>Modificacion</a>
                        </ul>  
                    <li>Gestión Usuario
                        <ul>
                            <li><a href='../gusuario/gestion_usuario_altaG.php'>Alta</a>
                            <li><a href='../gusuario/gestion_usuario_bajaG.php'>Baja</a>
                            <li><a href='../gusuario/gestion_usuario_modificacionG.php'>Modificacion</a>
                        </ul>  
                </ul>");
}
?>
