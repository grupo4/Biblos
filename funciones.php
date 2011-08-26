<?php

function compruebaSesion() {
    session_start();
    if (!isset($_SESSION['usuario']))
        die("Debe logearse primero");
}

function iniciaBD() {
    @ $sgdb = mysql_connect("localhost", "root", "");
    if (!$sgdb) {
        echo "Error: No se puede conectar al servidor. Por favor inténtalo de nuevo.";
        exit;
    }
    $db = mysql_select_db("biblos_g4");
    if (!$db) {
        echo "Error: No se puede conectar a la bd. Por favor inténtalo de nuevo.";
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

function obtenerAutor($idAutor) {
    iniciaBD();

    $query = "select nombre_autor,apellido1, apellido2 from autor where
        id_autor='$idAutor'";
    

    //echo $query;
    // (id,autor,editorial,nombre)
    // values ($id,'$autor','$editorial','$nombre')";
    $resultado = mysql_query($query);
    if ($resultado) {
        $i = 0;
        while ($autor = mysql_fetch_array($resultado)) {
            $autor_nombre = htmlentities($autor['nombre_autor']);
            $autor_apellido1 = htmlentities($autor['apellido1']);
            $autor_apellido2 = htmlentities($autor['apellido2']);
            $autores[$i] = $autor_apellido1 . " " . $autor_apellido2 . ", " . $autor_nombre;
            $i++;
        }
    }else
        $autores[0] = "Fallo autores";

    return $autores;
}

function retornarStringValido($cadena)
{
    $login = strtolower($cadena);
    $b     = array("á","é","í","ó","ú","ä","ë","ï","ö","ü","à","è","ì","ò","ù","ñ"," ",",",".",";",":","¡","!","¿","?",'"');
    $c     = array("a","e","i","o","u","a","e","i","o","u","a","e","i","o","u","n","","","","","","","","","",'');
    $login = str_replace($b,$c,$login);
    return $login;
}  

function retornarStringValidoNueva($cadena)
{
    $cadena= strtolower($cadena);
    $b     = array("á","é","í","ó","ú","ä","ë","ï","ö","ü","à","è","ì","ò","ù");
    $c     = array("a","e","i","o","u","a","e","i","o","u","a","e","i","o","u");
    $cadena = str_replace($b,$c,$cadena);
    return $cadena;
}  

/**
 *
 * @param type $nombreTabla
 * @param type $codCampo
 * @param type $valorCampo1
 * @param type $valorCampo2
 * @param type $visibles 
 */

function cargardorLista2($nombreTabla, $codCampo, $valorCampo1, $valorCampo2, $visibles=1) {
    iniciaBD();
    $query = "SELECT * FROM $nombreTabla";
    $resultado = mysql_query($query);

    echo "<select name='$nombreTabla' size='$visibles'>";
    while ($salida = mysql_fetch_array($resultado)) {
        echo "<option value='".$salida[$codCampo]."-". strtoupper(substr($salida[$valorCampo1],0,3))."'>" . htmlentities($salida[$valorCampo1] . ", " . $salida[$valorCampo2]) . "</option>";
    }
    echo "</select><br />";
    
        while ($salida = mysql_fetch_array($resultado)) {
        echo "\n<input type='hidden' name='$nombreTabla" . "_" . $salida[$codCampo] . "' value='" . htmlentities($salida[$valorCampo1]) . "'>";
        //$tabla[$nombreTabla,$i] = $salida;
    }
    
}

/**
 *
 * @param type $nombreTabla
 * @param type $codCampo
 * @param type $valorCampo1
 * @param type $visibles 
 */

function cargardorLista($nombreTabla, $codCampo, $valorCampo1, $visibles=1) {
    iniciaBD();
    $query = "SELECT * FROM $nombreTabla";
    $resultado = mysql_query($query);

    echo "<select name='$nombreTabla' size='$visibles'>";
    while ($salida = mysql_fetch_array($resultado)) {
        echo "<option value='" . $salida[$codCampo] . "'>(".$salida[$codCampo].") ".htmlentities($salida[$valorCampo1]) . "</option>";
        //$tabla[$nombreTabla,$i] = $salida;
    }
    echo "</select><br />";
  

}

?>
