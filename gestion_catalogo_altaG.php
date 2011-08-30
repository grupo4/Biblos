<?php
include "funciones.php";
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

        
        
    </head>
    <body bgcolor="#b1b9ad ">
        <form action="gestion_catalogo_altaP.php" method="POST"  onSubmit="return Valida(this);">
            <fieldset>
                <legend align="center">   <font size="7" face="Blackadder ITC" align="center"> 
                    NUEVO TITULO </font></legend> 
                <p align="center">   <font size="3"  align="center"> 
                    Añade las caracteristicas del titulo </font></p>
                <table border="1" align="center" cellspacing="6" bgcolor="#d3c8c8"> 
                    <tr>
                        <th><font color="red"> *</font> categoria dewey  </th>
                        <th> <?php cargardorLista("dewey", "id_categoria_dewey", "categoria_dewey", "1"); ?></th>
                    </tr>
                    <tr>
                        <th><font color="red"> *</font>  id_apellido_autor  </th>
                        <th> <?php cargardorLista2("autor", "id_autor", "apellido1", "nombre_autor", "1"); ?> 
                          </th>
                    </tr>
                    <tr>
                        <th> <font color="red"> *</font> nombre_titulo </th>
                        <th> <input type="text" name="nombre_titulo" value="" size="30" />  </th>
                    </tr>
                    <tr>
                        <th> isbn  </th>
                        <th> <input type="text" name="isbn" value="" size="30" />  </th>
                    </tr>
                    <tr>
                        <th> fecha_publicacion </th>
                        <th> <input type="text" name="fecha_publicacion" id="fecha_publicacion" value="" size="30" />  
                        <input type="button" id="trigger" value="..." /><br></th>
                    </tr>
                    <tr>
                        <th> fecha_adquisicion  </th>
                        <th> <input type="text" name="fecha_adquisicion" id="fecha_adquisicion" value="" size="30" />  
                        <input type="button" id="trigger2" value="..." /><br></th>
                    </tr>
                    <tr>
                        <th> idioma  </th>
                        <th> <input type="text" name="idioma" value="" size="30" />  </th>
                    </tr>
                    <tr>
                        <th> num_paginas  </th>
                        <th> <input type="text" name="num_paginas" value="" size="30" />  </th>
                    </tr>
                    <tr>
                        <th> edicion </th>
                        <th> <input type="text" name="edicion" value="" size="30" />  </th>
                    </tr>

                    <tr>
                        <th> <font color="red"> *</font> editorial_id_editorial </th>
                        <th> <?php cargardorLista("editorial", "id_editorial", "nombre_editorial", "1"); ?>  </th>
                    </tr>
                </table>
                <p align="center"><font color="red"> * Campos Obligatorios.</font></p>
            </fieldset>
            <input type="reset" value="Restablecer"/>
            <input type="submit" value="enviar" />
        </form>
    </body>

<script type="text/javascript">

       Calendar.setup(
        {
            inputField  : "fecha_publicacion",
            ifFormat    : "%d/%m/%Y",
            button      : "trigger"          
        });
        
       Calendar.setup(
        {
            inputField  : "fecha_adquisicion",
            ifFormat    : "%d/%m/%Y",
            button      : "trigger2"          
        });        

    function Valida( formulario ) {
        var valido=true;
        var i=0, strCamposVacios;
        var camposVacios=new Array();
            
        if (formulario.nombre_titulo.value == '') {
            strCamposVacios=formulario.nombre_titulo.name;
            i++;
            valido=false;
        }
            
        if(i>0){
            var mensaje="("+i+") - Faltan los siguientes campos obligatorios:\n"
            window.alert(mensaje+strCamposVacios);
        }
        return valido;
    } 
</script>
</html>
