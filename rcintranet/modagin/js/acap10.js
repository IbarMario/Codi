$(document).ready( function() {  
    
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
    }
    
    $("#A1").blur( function() {
        $("#msg").hide();
        if ($("#A1").val().length == 0){
            $("#A1").val(0);
        } else {
            $("#A2").val(0)
            $("#sendData").focus();
        }                    
    } );
    
    $("#A2").blur( function() {
        $("#msg").hide();
        if ($("#A2").val().length == 0){
            $("#A2").val(0);
        } else {
            $("#A1").val(0)
            $("#sendData").focus();
        }
    } );
    
               
    $("#sendData").click( function() {
        var a1, a2;                      
        a1 = formatinteger( $("#A1").val() );
        a2 = formatinteger( $("#A2").val() );
        if( a1 == 0 && a2 == 0 ) {
            $("#msg").show();
            return false;
        } else {
            return true;
        }                              
    });
        
});