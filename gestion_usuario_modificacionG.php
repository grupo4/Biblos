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
<form action="gestion_usuario_modificacionP.php" method="POST">
<label>DNI:</label><input type="text" name="dni" value="" size="9" /><br>
<label>Tipo usuario:</label>
<?php cargardorLista("tipo_usuario", "id_tipo_usuario", "tipo_usuario", "1") ?><br>
<label>Clave:</label><input type="text" name="clave" value="" size="9" /><br>
<input type="submit" value="Modificacion" />
<input type="reset" value="Borrar" name="Borrar" />
</body>
</html>

