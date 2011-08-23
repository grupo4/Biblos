<?php

function compruebaSesion() {
    session_start();
    if (!isset($_SESSION['usuario']))
        die("Debe logearse primero");
}

function iniciaBD() {
    @ $sgdb = mysql_pconnect("localhost", "biblosadmin", "1234");
    if (!$sgdb) {
        echo "Error: No se puede conectar al servidor. Por favor inténtalo de nuevo.";
        exit;
    }
    $db = mysql_select_db("biblos_g4");
    if (!$db) {
        echo "Error: No se puede conectar al servidor. Por favor inténtalo de nuevo.";
        exit;
    }
}

function codAutor2NombreAutor($codAutor) {
    iniciaBD();
    $query = "select * from autor where id_autor='$codAutor'";
    $resultado = mysql_query($query);
    if ($resultado) {
        $autor = mysql_fetch_array($resultado);
    }
    else
        $autor = "Sin Autor";

    return $autor;
}

?>
