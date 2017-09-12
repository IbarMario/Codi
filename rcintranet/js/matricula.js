   function formatinteger( numero ) {
        numero = numero.replace(/,/g, "");
        numero = parseInt( numero );
        return verifyNaN(numero);
   }
    
   function verifyNaN(numero) {
       if (isNaN(numero)) 
         return 0;
       else
         return numero;
   };

$(document).ready( function() {
    $("#nromatricula").focus();                    
} );
    
$("#nromatricula").blur( function (){
    
});

$("#sendData").click( function() {

} );         


