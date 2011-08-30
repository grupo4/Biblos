// Valida Fecha By Luciano 1998
// Uso: Simple... se debe pasar la cadena de la fecha y devuelve false si no es válida...
// El Formato es dd-mm-aaaa
// Ejemplo: if (Validar('14-08-1981')==false) { alert('Entrada Incorrecta') }
// Uso en formularios: onSubmit="return Validar(this.fecha.value)"
//
// Este script y otros muchos pueden
// descarse on-line de forma gratuita
// en El Código: www.elcodigo.com

         
function ValidaCampoVacioConFormato( frm ) {
    var strCamposVacios="", i=0,j=0;
                
    var sAux="";
    var cajaTexto="";
                 
    for (i=0;i<frm.elements.length;i++)
    {
        cajaTexto = frm.elements[i];
        if(cajaTexto.className=="Obligado"){
            if(cajaTexto.value==""){
                strCamposVacios += cajaTexto.name + "\n" ;
                cajaTexto.style.borderColor="red";
                cajaTexto.style.borderWidth =".25em";
                cajaTexto.style.margin='1em';
                j++;
            }
            else {
                cajaTexto.style.borderColor="black";
                cajaTexto.style.margin='0em';
            }
        }
    }          

    if(j>0){
        var mensaje="("+j+") - Faltan los siguientes campos obligatorios:\n"
        window.alert(mensaje+strCamposVacios);
        return false;
    }
    else return true;

}