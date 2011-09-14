<?php
include "funciones.php";
compruebaSesion();
compruebaPermisos(true);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Baja de usuario</title>
       <?php fijaPlantillaCSS();?>
</head>
<body>
<form action="gestion_usuario_bajaP.php" method="POST">
<label>DNI:</label>
<input type="text" name="dni" value="" size="9" /><br>
<input type="submit" value="Baja" />
<input type="reset" value="Borrar" name="Borrar" />
</body>
</html>

