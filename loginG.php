<?PHP
include "recursos/funciones.php";
iniciaBD();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>login</title>
        
      <link href="./recursos/login.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/validaciones1.js"></script>
    </head>
    <body>
        <div id="login">
            <H1>Login</H1>
            <h4>Bilioteca PAI</h4>
            <form action="recursos/loginP.php" method="post" onSubmit="return ValidaCampoVacioConFormato2(this);">
                DNI<br />
                <input name="dni" type="text" size="20" maxlength="20" class="Obligado"/><br />
                Contraseña<br />
                <input name="clave" type="password" size="20" maxlength="20" class="Obligado"/><br />
                Tema<br />
                <?php cargardorLista("plantilla", "idplantilla", "nombre_plantilla", "1", "Seleccione"); ?>
                <input type="submit" value="Logearse">
                <input type="reset" value="limpiar">
            </form>
        </div>
    </body>
</html>
