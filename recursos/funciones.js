/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function Valida2( formulario ) {
    var valido=true;
    var i=0, strCamposVacios;
    var camposVacios=new Array();
            
            
             window.alert("hola");
            
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