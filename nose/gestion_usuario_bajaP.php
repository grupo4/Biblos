<?php
include "funciones.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
</head>
<body>
<?php
        // put your code here
        $dni = $_POST['dni'];
        $consulta = "delete from usuario where dni='$dni'";
        echo $consulta;

        iniciaBD();
        $resultado = mysql_query($consulta);
        if ($resultado) {
            $afectados = mysql_affected_rows();
            if ($afectados > 0)
                echo "Borrado correcto ($afectados)";
            else
                echo "No existe el usuario en cuesti&oacute;n ($afectados)";
        }
        else {
            echo "Fallo en borrado:" . mysql_error();
        }
        echo "<a href='menuG.php'> Menu</a>";
        ?>
</body>
</html>