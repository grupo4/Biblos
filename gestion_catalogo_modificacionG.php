<?php
include "funciones.php";
compruebaSesion();
compruebaPermisos(true);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Alta de titulo</title>
        <script type="text/javascript" src="./recursos/funciones.js"></script>

        <style type="text/css">@import url(recursos/calendar.css);</style>  

        <script type="text/javascript" src="js/calendar.js"></script>
        <script type="text/javascript" src="js/calendar-es.js"></script>
        <script type="text/javascript" src="js/calendar-setup.js"></script>
        <script type="text/javascript" src="js/validaciones1.js"></script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body onload="iniciaFormulario()">
        <form action="gestion_catalogo_modificacionP.php" method="POST" 
              onSubmit="return ValidaCampoVacioConFormato2(this);"             >
            <fieldset>
                <legend>MODIFICACION DE TITULO</legend> 
                <table border="1" cellspacing="6" bgcolor="#d3c8c8"> 
                    <tr>
                        <th>
                            <input type="radio" name="tipo_modificacion" value="1" checked="checked" onClick="return AdaptaFormulario(this,1);"/>Título
                            <input type="radio" name="tipo_modificacion" value="2"  onClick="AdaptaFormulario(this,2)" />ISBN
                            <input type="radio" name="tipo_modificacion" value="3"  onClick="AdaptaFormulario(this,3)" />Edición
                        </th>

                    </tr>


                    <tr id="fila_codigo">
                        <th>Codigo Dewey *</th>
                        <td><?php cargardorLista("dewey", "id_categoria_dewey", "categoria_dewey", "1", "Seleccione"); ?>-(A)
                            <input type="text" name="dewey_autor" id="dewey_autor"  value="" size="3" maxlength="3" class="Obligado"/>-(T)
                            <input type="text" name="dewey_titulo" id="dewey_titulo" value="" size="3" maxlength="3" class="Obligado"/></td>
                    </tr>                   
                    <tr id="fila_titulo">
                        <th>Titulo *</th>
                        <td><input type="text" name="nombre_titulo" id="nombre_titulo" value="" size="70" maxlength="70" /></td>
                    </tr>
                    <tr id="fila_isbn">
                        <th>ISBN *</th>
                        <td><input type="text" name="isbn" id="isbn" value="" size="70" maxlength="70" /></td>
                    </tr>                    
                    <tr id="fila_edicion">
                        <th>Edicion *</th>
                        <td><input type="text" name="edicion" id="edicion" value="" size="70" maxlength="70" /></td>
                    </tr>                    
                    

                </table>

                <input type="reset" value="Restablecer"/>
                <input type="submit" value="enviar" />
            </fieldset>
        </form>
        <script type="text/javascript">

   

            function AdaptaFormulario(formulario,tipoBusqueda){
                if(tipoBusqueda==1) {//Titulo
                    //window.alert("R1hola"+tipoBusqueda);
                    document.getElementById("fila_titulo").style.visibility ="visible";
                    document.getElementById("fila_isbn").style.visibility="hidden";
                    document.getElementById("fila_edicion").style.visibility="hidden";                    
                }
                if(tipoBusqueda==2) {//ISBN
                    //window.alert("R2hola"+tipoBusqueda); 
                    document.getElementById("fila_titulo").style.visibility ="hidden";
                    document.getElementById("fila_isbn").style.visibility="visible";
                    document.getElementById("fila_edicion").style.visibility="hidden";                    
                }
                if(tipoBusqueda==3) {//Edicion
                    //window.alert("R2hola"+tipoBusqueda); 
                    document.getElementById("fila_titulo").style.visibility ="hidden";
                    document.getElementById("fila_isbn").style.visibility="hidden";
                    document.getElementById("fila_edicion").style.visibility="visible";                    
                }                
       
            } 
        
            function iniciaFormulario(){
                document.getElementById("fila_isbn").style.visibility ="hidden";
                document.getElementById("fila_edicion").style.visibility ="hidden";
            }
        </script>
    </body>
</html>
