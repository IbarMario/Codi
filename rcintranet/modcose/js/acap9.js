$(document).ready( function() {  
    $("#input-45").focus();
                
    // numero 1,225 = 1225
    function formatinteger( numero ) {
        numero = numero.replace(/,/g, "");
        numero = parseFloat( numero );
        return verifyNaN(numero); 

    }
    
    function verifyNaN(numero) {
       if (isNaN(numero)) 
         return 0;
       else        
         return numero;
             
    }        
    
    $("#input-682, #input-683, #input-684, #input-685, #input-686, #input-687, #input-688, #input-689, #input-690").blur( function(){
        
        $("#input-682").val(number_format(verifyNaN(formatinteger($("#input-682").val())),0,'.',','));
        $("#input-683").val(number_format(verifyNaN(formatinteger($("#input-683").val())),0,'.',','));
        $("#input-684").val(number_format(verifyNaN(formatinteger($("#input-684").val())),0,'.',','));
        $("#input-685").val(number_format(verifyNaN(formatinteger($("#input-685").val())),0,'.',','));
        $("#input-686").val(number_format(verifyNaN(formatinteger($("#input-686").val())),0,'.',','));
        $("#input-687").val(number_format(verifyNaN(formatinteger($("#input-687").val())),0,'.',','));
        $("#input-688").val(number_format(verifyNaN(formatinteger($("#input-688").val())),0,'.',','));
        $("#input-689").val(number_format(verifyNaN(formatinteger($("#input-689").val())),0,'.',','));


        var v1, v2, v3, v4, v5, v6, v7, v8, tot;
        v1 = formatinteger($("#input-682").val());
        v2 = formatinteger($("#input-683").val());
        v3 = formatinteger($("#input-684").val());
        v4 = formatinteger($("#input-685").val());
        v5 = formatinteger($("#input-686").val());
        v6 = formatinteger($("#input-687").val());
        v7 = formatinteger($("#input-688").val());
        v8 = formatinteger($("#input-689").val());
        // v9 = formatinteger($("#input-690").val());
        tot = v1 + v2 + v3 + v4 + v5 + v6 + v7 + v8;        
        $("#input-690_divs").text( number_format(tot,0,'.',',') );
        $("#input-690").val( number_format(tot,0,'.',',') );        
        if( tot > 0 ){ $("#msg2").hide(); }        
        $("#msg").hide();        
    });
    
    $("#input-45, #input-46, #input-47, #input-48, #input-49, #input-50, #input-51, #input-52").blur( function(){
        
        $("#input-45").val(number_format(verifyNaN(formatinteger($("#input-45").val())),0,'.',','));
        $("#input-46").val(number_format(verifyNaN(formatinteger($("#input-46").val())),0,'.',','));
        $("#input-47").val(number_format(verifyNaN(formatinteger($("#input-47").val())),0,'.',','));
        $("#input-48").val(number_format(verifyNaN(formatinteger($("#input-48").val())),0,'.',','));
        $("#input-49").val(number_format(verifyNaN(formatinteger($("#input-49").val())),0,'.',','));
        $("#input-50").val(number_format(verifyNaN(formatinteger($("#input-50").val())),0,'.',','));
        $("#input-51").val(number_format(verifyNaN(formatinteger($("#input-51").val())),0,'.',','));
        $("#input-52").val(number_format(verifyNaN(formatinteger($("#input-52").val())),0,'.',','));

        var v1, v2, v3, v4, v5, v6, v7, v8, tot;
        v1 = formatinteger($("#input-45").val());
        v2 = formatinteger($("#input-46").val());
        v3 = formatinteger($("#input-47").val());
        v4 = formatinteger($("#input-48").val());
        v5 = formatinteger($("#input-49").val());
        v6 = formatinteger($("#input-50").val());
        v7 = formatinteger($("#input-51").val());
        v8 = formatinteger($("#input-52").val());
        // v9 = formatinteger($("#input-690").val());
        tot = v1 + v2 + v3 + v4 + v5 + v6 + v7 + v8;
        $("#input-53").val(number_format(tot,0,'.',','));        
        $("#input-53_divs").text( number_format(tot,0,'.',',') );        
        // console.log(number_format(tot,2,'.',','));
        if( tot > 0 ){ $("#msg2").hide(); }        
        $("#msg").hide();        
    });    
    
  $("#input-52").blur( function() {
        var v = $(this).val();
        v = parseFloat( v );  
        if( v > 0 ) {
            $("#input_52").show();  
            $("#input_52").focus();
            $("#input_52").addClass("required");
        } else {
            $("#input_52").hide();            
            $("#input_52").removeClass("required");
        }
        $("#msg4").hide();
        totalvalortarifa();        
    });
    
    $("#input_52").blur( function() {
        if ($("#input_52").val()=='') {
            $("#input-52").focus();
        } else {
            $("#sendData").focus();
        }        
    } );
        
    $("#sendData").click( function (){        
        var totact =  $("#input-53_divs").text();
        totact = formatinteger(totact);
        /*
        //console.log( totact )
        if( totact < 100.00 ) {
            $("#msg2").show();
            return false;
        }        
       */
    } );
    
});

function saveUPD(inp){
if (inp==1) {
    
$("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
 setTimeout(function (){$("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>'); }, 1000);
 setTimeout(function (){$("#statusACAP1").hide();}, 2000);
};
}