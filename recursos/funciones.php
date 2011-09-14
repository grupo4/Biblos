<?php

/**
 * Este fichero contiene las funciones de uso comun
 * @author Grupo4
 * @version 1.0
 */

/**
 * Funcion para comprobacion de sesion
 * @author Grupo4
 * @version 1.0
 */
function compruebaSesion() {

    session_start();
    if (!isset($_SESSION['usuario']))
        die("Debe logearse primero");
}

/**
 * comprueba que se entre como administrador en vez de como usuario
 * @author Grupo4
 * @version 1.0
 * @param string $pagAdministrativa 
 */
function compruebaPermisos($pagAdministrativa) {
    $usuario = $_SESSION['usuario'];
    if ($pagAdministrativa == true && $usuario['tipo_usuario_id_tipo_usuario'] != 0)
        die("Acceso prohibido: Pagina administrativa");
}

/**
 * conecta con la base de datos seleccionada
 * @author Grupo4
 * @version 1.0
 * funcion para conectar con la base de d
 * @name iniciaBD
 *
 */
function iniciaBD() {
    @ $sgdb = mysql_connect("localhost", "biblosa", "1234");
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

/**
 * Devuelve el nombre de autor a prartir de su codigo de BD
 * @author Grupo4
 * @version 1.0
 * @param numerico $codAutor
 * @return string Nombre autor
 */
function obtenerAutor($codAutor) {
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


/**
 * Obtener la informacion completa de un autor a partir de su id
 * @author Grupo4
 * @version 1.0
 * @param numerico $idAutor Identificativo del autor en BD
 * @return string Nombre y apellidos del autor
 */
/*function obtenerAutor($idAutor) {
    iniciaBD();

    $query = "select nombre_autor,apellido1, apellido2 from autor where
        id_autor='$idAutor'";


    $resultado = mysql_query($query);
    if ($resultado) {
        $i = 0;
        while ($autor = mysql_fetch_array($resultado)) {
            $autor_nombre = ucfirst(htmlentities($autor['nombre_autor']));
            $autor_apellido1 = ucfirst(htmlentities($autor['apellido1']));
            $autor_apellido2 = ucfirst(htmlentities($autor['apellido2']));
            $autores[$i] = $autor_apellido1 . " - " . $autor_apellido2 . ", " . $autor_nombre;
            $i++;
        }
    }else
        $autores[0] = "Fallo autores";

    return $autores;
}
*/

/**
 * Sustituye caracteres especiales en normales
 * @author Grupo4
 * @version 1.0
 * @param tex $cadena
 * @return tex 
 */
function retornarStringValido($cadena) {
    $login = strtolower($cadena);
    $b = array("á", "é", "í", "ó", "ú", "ä", "ë", "ï", "ö", "ü", "à", "è", "ì", "ò", "ù", "ñ", " ", ",", ".", ";", ":", "¡", "!", "¿", "?", '"');
    $c = array("a", "e", "i", "o", "u", "a", "e", "i", "o", "u", "a", "e", "i", "o", "u", "n", "", "", "", "", "", "", "", "", "", '');
    $login = str_replace($b, $c, $login);
    return $login;
}

/**
 * Sustituye caracteres especiales en normales
 * @author Grupo4
 * @version 1.1
 * @param tex $cadena
 * @return tex 
 */
function retornarStringValidoNueva($cadena) {
    $cadena = strtolower($cadena);
    $b = array("á", "é", "í", "ó", "ú", "ä", "ë", "ï", "ö", "ü", "à", "è", "ì", "ò", "ù");
    $c = array("a", "e", "i", "o", "u", "a", "e", "i", "o", "u", "a", "e", "i", "o", "u");
    $cadena = str_replace($b, $c, $cadena);
    return $cadena;
}

/**
 * selecciona una tabla concreta de la BD asi como sus columnas
 * @author Grupo4
 * @version 1.1
 * @param string $nombreTabla
 * @param numerico $codCampo
 * @param string $valorCampo1
 * @param string $valorCampo2
 * @param numerico $visibles
 * @param string $opcionSeleccione 
 */
function cargardorLista2($nombreTabla, $codCampo, $valorCampo1, $valorCampo2, $visibles=1, $opcionSeleccione=null) {
    iniciaBD();
    $query = "SELECT * FROM $nombreTabla";
    $resultado = mysql_query($query);
    $opcion0 = "";


    $select = "<select name='" . $nombreTabla . "' size='$visibles' ";
    if ($opcionSeleccione) {
        $select .= "class='Obligado'";
        $opcion0 = "<option value='' SELECTED>$opcionSeleccione";
    }

    $select .= ">";
    // $select = $select .">";


    echo $select;
    echo $opcion0;

    while ($salida = mysql_fetch_array($resultado)) {
        echo "<option value='" . $salida[$codCampo] . "-" . strtoupper(substr($salida[$valorCampo1], 0, 3)) . "'>" . htmlentities($salida[$valorCampo1]) . "," . htmlentities($salida[$valorCampo2]) . "</option>";
    }
    echo "</select></br>";
}

/**
 * selecciona una tabla de la BD asi como sus columnas
 * @author Grupo4
 * @version 1.0
 * @param string $nombreTabla
 * @param numerico $codCampo
 * @param string $valorCampo
 * @param numerico $visibles
 * @param string $opcionSeleccione 
 */
function cargardorLista($nombreTabla, $codCampo, $valorCampo, $visibles=1, $opcionSeleccione=null) {
    iniciaBD();
    $query = "SELECT * FROM $nombreTabla";
    $resultado = mysql_query($query);
    $opcion0 = "";


    $select = "<select name='$nombreTabla' size='$visibles' ";
    if ($opcionSeleccione) {
        $select .= "class='Obligado'";
        $opcion0 = "<option value='' SELECTED>$opcionSeleccione";
    }

    $select .= ">";



    //echo "<select name='$nombreTabla' size='$visibles'value='$value'>";
    echo $select;
    echo $opcion0;
    while ($salida = mysql_fetch_array($resultado)) {
        echo "<option value='" . $salida[$codCampo] . "'>" . htmlentities($salida[$valorCampo]) . ' (' . $salida[$codCampo] . ") </option>";
    }
    echo "</select></br>";
}

/**
 * Esta funcion nos permite separar el codigo dewey del codigo de autor y del codigo del libro
 * @author Grupo4
 * @return string tres primeras letras del apellido del autor
 * @version 1.0
 */
function separaIdApellidoAutor($autor) {
    // Tokenizar para separar el codigo de las 3 primeras letras del apellido1 del autor
    // Ejemplo: 000-FOL
    // Separo en $codAutor=0
    // y $Apellido3='FOL'
    // 
    //$tok = strtok($autor, "-");
    //$resultado['codAutor'] = $tok;
    $resultado['codAutor'] = strtok($autor, "-");

    //$tok = strtok("-");
    //$resultado['$Apellido3'] = $tok;
    $resultado['$Apellido3'] = strtok("-");

    return $resultado;
}

/**
 * Aqui podemos elegir el tipo de plantilla que queremos
 * @author Grupo4
 * @version 1.0
 */
function fijaPlantillaCSS() {
    echo "<LINK href='../recursos/plantilla" . $_SESSION['tema'] . ".css' rel='stylesheet' type='text/css'>\n";
}

function obtenerAutores($cat_dewey, $id_apellido, $id_titulo) {
    iniciaBD();

    $query = "select nombre_autor,apellido1_autor, apellido2_autor from titulo_has_autor, autor where
titulo_dewey_categoria_dewey='$cat_dewey' and
titulo_id_apellido='$id_apellido' and
titulo_id_titulo='$id_titulo'
and id_autor=autor_id_autor";

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
        $autores[0] = "Fallo en la consulta" . mysql_error();

    return $autores;
}

function listarCatalogo() {
    iniciaBD();

    $tipoBusqueda = $_POST['tipo_busqueda'];
    $busqueda = retornarStringValidoNueva($_POST['busqueda']);
    //echo $busqueda;
    $query = "select * from titulo where ";
    /**
     * Aqui montamos la query en funcion del tipo de busqueda seleccionada
     */
    // Montar la query en funcion del tipo de busqueda seleccionado
    switch ($tipoBusqueda) {
        case 1:// Dewey
            $query = $query . "dewey_id_categoria_dewey='$busqueda'";
            break;
        case 2:// Por titulo exacto
            $query = $query . "nombre_titulo='$busqueda'";
            break;
        case 3:// Por titulo aproximado
            $query = $query . "nombre_titulo like '%$busqueda%'";
            break;
        default:
            die("Tipo de busqueda $tipoBusqueda no valido");
    }


    //          (id,autor,editorial,nombre)
    // values ($id,'$autor','$editorial','$nombre')";
    $resultado = mysql_query($query);
    echo "Numero de títulos:" . mysql_num_rows($resultado) . "<p>";


    echo"<table border=1>";
    echo"<th>Codigo</th>
            <th>Titulo</th>
            <th>Autor</th>\n";
    if ($resultado) {
        while ($titulo = mysql_fetch_array($resultado)) {
            // Saco en variables el codigo completo del libro
            $cat_dewey = $titulo['dewey_id_categoria_dewey'];
            $id_apellido = $titulo['id_apellido_autor'];
            $id_titulo = $titulo[2];
            $idAutor = $titulo['autor_id_autor'];
            echo "<tr>";
            //echo "<td><a href='../recursos/mostrarFichaLibro.php?c1=$cat_dewey&c2=$id_apellido&c3=$id_titulo'>" .
            echo "<td>";
            echo"$cat_dewey" . strtoupper($id_apellido) . strtoupper($id_titulo) . "</a></td>";
            echo "<td>" . htmlentities($titulo['nombre_titulo']) . "</td>";

            $autores = obtenerAutor($idAutor);
            echo "<td><ul>";
            foreach ($autores as $autor) {
                echo "<li>" . $autor;
            }
            echo "</ul></td>";
            echo "<tr>\n";
        }
        echo"</table>";
    }

    else
        die("Fallo al listar") . mysql_error();
}

?>
