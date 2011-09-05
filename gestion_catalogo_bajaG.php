<?php
include "funciones.php";
compruebaSesion();
compruebaPermisos(true);
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Baja de t&iacute;tulo</title>
        <?php fijaPlantillaCSS();?>
        <script type="text/javascript" src="js/validaciones1.js"></script>
    </head>
    <body  onload="iniciaFormulario()">
        <form action="gestion_catalogo_bajaP.php" method="POST" 
              onSubmit="return ValidaCampoVacioConFormato(this);"             >
            <fieldset>
                <legend>BAJA DE TITULO</legend> 
                <table border="1" cellspacing="6" bgcolor="#d3c8c8"> 
                    <tr>
                        <th>
                            <input type="radio" name="tipo_baja" value="1" onClick="return AdaptaFormulario(this,1);"/>Título
                            <input type="radio" name="tipo_baja" value="2" checked="checked" onClick="AdaptaFormulario(this,2)" />Código

                        </th>

                    </tr>

                    <tr id="fila_titulo">
                        <th>Titulo *</th>
                        <td><input type="text" name="nombre_titulo" id="nombre_titulo" value="" size="70" maxlength="70" class="Obligado"/></td>
                    </tr>
                    <tr id="fila_codigo">
                        <th>Codigo Dewey *</th>
                        <td><?php cargardorLista("dewey", "id_categoria_dewey", "categoria_dewey", "1"); ?>-(A)
                            <input type="text" name="dewey_autor" id="dewey_autor"  value="" size="3" maxlength="3" class="Obligado"/>-(T)
                            <input type="text" name="dewey_titulo" id="dewey_titulo" value="" size="3" maxlength="3" class="Obligado"/></td>
                    </tr>                   
                </table>

                <input type="reset" value="Restablecer"/>
                <input type="submit" value="enviar" />
            </fieldset>
        </form>
    </body>

    <script type="text/javascript">
        function AdaptaFormulario(formulario,tipoBusqueda){
            if(tipoBusqueda==2) {//Codigo
                //window.alert("R1hola"+tipoBusqueda);
                document.getElementById("fila_titulo").style.visibility ="hidden";
                document.getElementById("fila_codigo").style.visibility="visible";
            }
            else{// Titulo
                //window.alert("R2hola"+tipoBusqueda); 
                document.getElementById("fila_titulo").style.visibility ="visible";
                document.getElementById("fila_codigo").style.visibility="hidden";
            }
       
        } 
        
        function iniciaFormulario(){
                document.getElementById("fila_titulo").style.visibility ="hidden";
        }
    </script>

</html>
