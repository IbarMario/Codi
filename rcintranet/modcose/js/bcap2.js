    function verifyNaN(numero) {
       if (isNaN(numero)) 
         return 0;
     else
         return numero;
 }  

 function verifyNaN2(numero) {
   if (isNaN(numero)) 
     return "";
 else
     return numero;
}  


$(document).ready( function() {    

    // numero 1,225 = 1225
    function formatinteger( numero ) {
        numero = numero.replace(/,/g, "");
        numero = parseInt( numero );
        return verifyNaN(numero);        
    }    

    numerico();
    
    $("#rbtn_inversion2").click( function(){
        
        $("#noopcion").show();
        $("#chk_1_div").hide();
        $("#div_rbtn_certi1").hide();
        //$("#inversionotros").val("NINGUNA");
        
        //$("#inputA_1").val("NINGUNA");
        //$("#inversionotros").val("NINGUNA");
        
        
        
        
         
    } );
    
    $("#rbtn_inversion1").click( function(){
        
        $("#div_rbtn_inversion1").hide();
        if( (this).checked ) {
            $("#chk_1_div").show();
            $("#noopcion").hide();                     
        } else {
            $("#chk_1_div").hide();                       
        }
       //$("#inversionotros").val("NINGUNA");  
    } );    
    
    
    $("#chk_3").click( function(){    

        if( (this).checked ) {
            $("#inversionotros").show();
            //$("#inversionotros").val("NINGUNA");
        } else {
            $("#inversionotros").hide();
            //$("#inversionotros").val("NINGUNA");
        }
        $("#msg1").hide();
        
    } );
    
    $("#chk_1, #chk_2").click( function(){ 
        $("#msg1").hide();
        //$("#inversionotros").val("NINGUNA");
    });
    
    $("#rbtn_certi1").click( function (){
        $("#siotrasambiental").show();     
        $("#siotrasambiental_msg").show();     
        $("#msg2").hide();
        $("#div_rbtn_certi1").hide();
    } );
    
    $("#rbtn_certi2").click( function (){
        $("#siotrasambiental").hide();        
        $("#siotrasambiental_msg").hide();        
        $("#msg2").hide();
        $("#div_rbtn_certi1").hide();
        //$("#certiambiental").val("NINGUNA");
        
    } );
    
    $("#certiambiental").click(function(){
        $("#msg2").hide();
    });
    
    
    $("#addcertificacion").click( function( event ){                    

        event.preventDefault();        
        var nextrow = formatinteger( $("#maxrow").val() ) + 1;        
        $("#maxrow").val( nextrow );        
        $("#tablecertificacion > tbody").append("<tr id=\"row_"+nextrow+"\"><td align=\"center\"><input name=\"inputA_"+nextrow+"\" type=\"text\" id=\"inputA_"+nextrow+"\" size=\"30\" class=\"inpC2\" onKeyUp=\"this.value = this.value.toUpperCase();\" pattern=\"[A-Z0-9 ]*\" ></td> <td align=\"center\"><input name=\"inputB_"+nextrow+"\" style=\"text-align:right;\" type=\"text\" id=\"inputB_"+nextrow+"\" size=\"10\" maxlength=\"4\" class=\"integer validar inpC2\" ></td><td align=\"center\"><input name=\"inputC_"+nextrow+"\" type=\"text\" id=\"inputC_"+nextrow+"\" size=\"30\" class=\"inpC2\" onKeyUp=\"this.value = this.value.toUpperCase();\" pattern=\"[A-Z ]*\" ></td><td width=\"10%\" align=\"center\"><a href=\"#\" class=\"lnkCls\" id=\"delcerti_"+nextrow+"\" onclick=\"delRow("+nextrow+");return false;\" >eliminar</a></td></tr>");        
        numerico();
    });      
    
    
    
    
 });
    
    
$("#sendData").click( function(){
  // validate least one
  
  /*
        var rbtn_inversion1 = document.getElementById("rbtn_inversion1").checked;
        if(rbtn_inversion1) {

            var leastOne =0;      
            $('#tablecertificacion').find('input').each( function(x,el){

                if($(el).val()!='') {
                    leastOne=1;
                };

                $(el).click(function(){
                    $("#tablecertificacion_msg").hide();
                });

            });
            if( leastOne == 0 ){
                $("#tablecertificacion_msg").show();
                $('body').scrollTo("#rbtn_certi1", 500);
                return false;
            } else {
                $("#tablecertificacion_msg").hide();
            }    
            var valores = $("#maxrow").val();
            console.log(valores);
            for (var i = 1; i < 20; i++) {
                if ($("#inputA_"+i).val()!="") {
                    if ($("#inputB_"+i).val()!="" && $("#inputB_"+i).val()!="") { 
                        if ($("#inputC_"+i).val()!="0" && $("#inputC_"+i).val()!="") {sw = true;}else{
                            $("#tablecertificacion_msg").show();  
                            
                            return false;
                            
                        }
                    }else{
                        $("#tablecertificacion_msg").show();
                        
                        return false;
                        
                    }
                };

                if ($("#inputC_"+i).val()!="" && $("#inputC_"+i).val()!="") {
                    if ($("#inputA_"+i).val()!="") {
                        if ($("#inputB_"+i).val()!="" && $("#inputB_"+i).val()!="") {sw = true;}else{
                            $("#tablecertificacion_msg").show();
                            
                            return false;
                            
                        }
                    }else{
                       $("#tablecertificacion_msg").show();
                       
                       return false;
                       
                   }
               };

               if ($("#inputB_"+i).val()!="" && $("#inputB_"+i).val()!="" ) {
                if ($("#inputC_"+i).val()!="" && $("#inputC_"+i).val()!="") {
                    if ($("#inputA_"+i).val()!="") {sw = true;}else{
                        $("#tablecertificacion_msg").show();  
                        
                        return false;
                        
                    }
                }else{
                    $("#tablecertificacion_msg").show();
                    
                    return false;
                    
                }
            };
        };
    };




        var chk = document.getElementById("rbtn_inversion2").checked; // gastos ambientales "no"
        if( chk ) {
            var chk1 = document.getElementById("chk_1").checked;
            var chk2 = document.getElementById("chk_2").checked;
            var chk3 = document.getElementById("chk_3").checked;
            if( chk1 || chk2 || chk3  ){ 
                $("#msg1").hide(); 
                if( chk3 ) {
                    if( $("#inversionotros").val() == '' ) { $("#msg1").show(); $('body').scrollTo('#inversionotros', 500); return false; }
                }
            } else { 
                $('body').scrollTo('#chk_1', 500);
                $("#msg1").show(); 
                return false;
            }                        
        }
        
        var chkB = document.getElementById("rbtn_certi1").checked;
        if( chkB ) {        

            if( $("#certiambiental").val() == '' ) { $("#msg2").show(); return false; } else { $("#msg2").hide();  }
        }
        
    if (document.getElementById("rbtn_inversion1").checked || document.getElementById("rbtn_inversion2").checked) {
        sw1=1;
    }else{
        $("#div_rbtn_inversion1").show(); 
        $('body').scrollTo('#rbtn_inversion1', 500);
        return false;
    }

if (document.getElementById("rbtn_certi1").checked || document.getElementById("rbtn_certi2").checked) {
        sw1=1;
    }else{
        $("#div_rbtn_certi1").show(); 
        $('body').scrollTo('#rbtn_certi1', 500);
        return false;
    }
*/


} );
    


    function delRow( numero ) {       

    //var evento = this.event;
    //event.preventDefault();
    var co = confirm( "�Esta seguro de eliminar este registro?" );
    if( co ) {                
        $.ajax( {
            url: "bcap2Del.php",
            data: "uid="+numero,
            type: "POST",
            success: function( ) {            
                $("#row_"+numero).hide();
                $("#row_"+numero).remove();                                
            }
        });
    }    
    //evento.preventDefault();
    //console.log(  );
    return false;        
}
function numerico () {
 $(".validar").keydown(function(event) {
   if(event.shiftKey)
   {
    event.preventDefault();
}

if(event.keyCode!=9)
{
   if (event.keyCode == 46 || event.keyCode == 8)    {
   }
   else {
    if (event.keyCode < 95) {
      if (event.keyCode < 48 || event.keyCode > 57) {
        event.preventDefault();
    }
}
else {
  if (event.keyCode < 96 || event.keyCode > 105) {
      event.preventDefault();
  }
}
}
}
});
 $(".validar").blur(function(){
    $(this).val(verifyNaN2(parseInt(this.value)));
}); 
};
