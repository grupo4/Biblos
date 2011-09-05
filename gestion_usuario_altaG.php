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
<form action="gestion_usuario_altaP.php" method="POST">
<label>DNI:</label><input type="text" name="dni" value="" size="9" /><br>
<label>Nombre:</label><input type="text" name="nombre" value="" size="25" /><br>
<label>Apellido 1:</label><input type="text" name="apellido1" value="" size="25" /><br>
<label>Apellido 2:</label><input type="text" name="apellido2" value="" size="25" /><br>
<label>email:</label><input type="text" name="email" value="" size="25" /><br>
<label>direcion:</label><input type="text" name="direccion" value="" size="25" /><br>
<label>telefono:</label><input type="text" name="telefono" value="" size="25" /><br>
<label>Plantilla:</label>
<?php cargardorLista("plantilla", "idplantilla", "nombre_plantilla", "1"); ?><br>
<label>Tipo usuario:</label>
<?php cargardorLista("tipo_usuario", "id_tipo_usuario", "tipo_usuario", "1"); ?><br>
<label>clave:</label><input type="password" name="clave" value="" size="25" /><br>
<input type="submit" value="Alta" />
<input type="reset" value="Borrar" name="Borrar" />
</form>
</body>
</html>