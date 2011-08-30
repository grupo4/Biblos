<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $email = $_POST['email'];
        $direccion = $_POST['direcion'];
        $telefono = $_POST['telefono'];
        $plantilla_idplantilla = $_POST['plantilla_idplantilla'];
        $tipo_usuario_id_tipo_usuario = $_POST['tipo_usuario_id_tipo_usuario'];
        
        <?php
$bdni = $_GET['bdni'];
@ $db = mysql_pconnect("localhost", "root", "password");
if (!$db){
echo "Error: No se ha podido conectar a la base de datos. Por favor, prueba de
nuevo más tarde.";
exit;
}
mysql_select_db("curso");
$consulta = "select * from usuario where dni = ".$bdni;
$resultado = mysql_query($consulta);
$row_resultado = mysql_fetch_array($resultado);
$num_resultados = mysql_num_rows($resultado);
if( $num_resultados > 1){
    echo 'Error. encontrado más de un registro con ese dni';
}
        

        ?>
    </body>
</html>
