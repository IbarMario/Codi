$(document).ready( function() {
    $("#total").focus();    
    
    $("#total").blur( function () {
        $("#camdfgrgegregr").hide();
        if ($("#total").val() != ''){
            if ($("#total").val() != 0){
                var t1 = $("#total").val();
                var t2 = $("#input-2").val();
                t1 = t1.replace(/,/g, "");
                t2 = t2.replace(/,/g, "");
                //var tot = parseFloat( t1 ) + parseFloat( t2 );
                //tot = verifyNaN(tot);
                if( t1 > 0 ) {
                    if( t2 > 0 ) {
                        var tot = parseFloat( t1 ) - parseFloat( t2 );
                        tot = verifyNaN(tot);
                        //alert(tot);
                        if (tot > 0){
                            $("#input-1").text(number_format(tot,0,'.',','));
                        }  else {
                            alert("     Es valor declarado es menor que la Compra de mercadería de fabricaciónno extranjera..  ");
                            $("#input-1").text(0);                            
                            $("#input-2").val(0);
                            $("#input-21, #input-22, #input-23, #input-24").val(0);
                            $("#percent1").text(0);
                            $("#input-25, #input-26, #input-27, #input-28").val(0);
                            $("#percent1").text(0);
                        }                      
                    } 
                    //$("#input-1").text(number_format(t1,0,'.',','));
                    //$("#input-2").val(0);
                    $("#input-2").focus();
                    $("#input-2").select();            
                    $("#msg2").hide();     
                    $("#msg3").hide();     
                }
                else 
                //console.log( tot );
                 {  $("#input-21, #input-22, #input-23, #input-24").val(0);
                    $("#percent1").text(0);
                }                                  
            } else {
                alert ("Esta declarando 0 en compra de Mercadería para Reventa. Si esta seguro de este dato continúe el proceso..");
                $("#input-2").focus(); 
            }
        } else {
            $("#input-2").focus(); 
        }            
    });
    
    $("#input-2").blur( function () {
        $("#camdfgrgegregr").hide();
        //alert($("#input-2").val());
        if ($("#input-2").val() != ''){            
            if ($("#input-2").val() != 0){
                var t1 = $("#total").val(), t2 = $("#input-2").val();
                t1 = t1.replace(/,/g, "");
                t2 = t2.replace(/,/g, "");
                var tot = parseFloat(t1) - parseFloat(t2);
                tot = verifyNaN(tot);
                if( tot > 0 ) {
                    $("#input-1").text(number_format(tot,0,'',','));
                    $("#msg2").hide();
                    $("#input-21").focus();
                    $("#input-21").select();
                } else {
                    alert("       Este monto no puede ser mayor que el TOTAL.      ");
                    $("#input-2").val(0);
                    $("#input-21, #input-22, #input-23, #input-24").val(0);
                    $("#percent1").text(0);
                    $("#input-25, #input-26, #input-27, #input-28").val(0);
                    $("#percent2").text(0);
                }        
                $("#msg").hide();                
            } else {
                 alert ("    Está declarando 0 en compra de Mercadería para Reventa. Si esta seguro de este dato continúe el proceso..          ");
                 $("#input-25, #input-26, #input-27, #input-28").val(0);
                 $("#percent2").text(0);
                  $("#input-21, #input-22, #input-23, #input-24").val(0);
                 $("#percent1").text(0);
                 $("#input-1").text(0);             
            }
        } else {
                alert ("      Está declarando 0 en compra de Mercadería para Reventa. Si esta seguro de este dato continúe el proceso..    ");
        }
        
    });    
    
    $("#input-21").blur( function () {
        var t1 = $("#input-21").val(), t2 = $("#input-22").val(), t3 = $("#input-23").val(), t4 = $("#input-24").val();        
        var compra1 = number_format($("#input-1").text(),0,'.',',');
        //alert("ING");
        //alert(compra1);
        if( compra1 <= 0 ) {
            //alert("cero");
            $("#msg3").show();            
            $("#percent1").text(0);            
            $(this).val(0); 
            $(this).focus();
            $(this).select();
        } else {
                $("#camdfgrgegregr").hide();                
                t1 = t1.replace(/,/g, "");
                t2 = t2.replace(/,/g, "");
                t3 = t3.replace(/,/g, "");
                t4 = t4.replace(/,/g, "");
                //alert(t1);
                //alert(t2);
                //alert(t3);
                //alert(t4);
                var tot = parseFloat( t1 ) + parseFloat( t2 ) + parseFloat( t3 ) + parseFloat( t4 );
                //alert(tot);
                tot = verifyNaN(tot);
                if ( tot > 100 ) {
                        $("#msg").show();
                        //tot = tot - t1;
                        //$("#percent1").text(tot);
                        $("#input-21").val(0);
                        $("#input-21").focus();
                        $("#input-21").select();                    
                } else {
                    if ( tot == 100 ) {
                            $("#msg").show();
                            $("#msg3").hide();
                            $("#percent1").text(tot);
                            $("#input-25").focus();
                            $("#input-25").select();                       
                    } else {
                        $("#percent1").text( tot );                    
                        $("#input-22").focus();
                        $("#input-22").select();                                            
                    }
             }
        }
    });
    
    $("#input-22").blur( function () { 
        var t1 = $("#input-21").val(), t2 = $("#input-22").val(), t3 = $("#input-23").val(), t4 = $("#input-24").val();        
        t1 = t1.replace(/,/g, "");
        t2 = t2.replace(/,/g, "");
        t3 = t3.replace(/,/g, "");
        t4 = t4.replace(/,/g, "");
        $("#camdfgrgegregr").hide();
        var tot = parseFloat( t1 ) + parseFloat( t2 ) + parseFloat( t3 ) + parseFloat( t4 );
        tot = verifyNaN(tot);        
        if( tot == 100 ) { $("#percent1").removeClass("labB2"); }        
        if ( tot > 100 ) {
            tot = tot - formatinteger($(this).val());
            $(this).val(0);            
        }                        
        var compra1 = formatinteger($("#input-1").text());        
        if( compra1 == '' || compra1 == 0 ) {
            $(this).val(0);
            $("#percent1").text( 0 );            
        } else {            
                $("#percent1").text( tot );
                $("#input-23").focus();
                $("#input-23").select();
                if( tot == 100 ){
                    $("#msg").hide();
                }            
       }        
    });
    
    $("#input-23").blur( function () {
        var t1 = $("#input-21").val(), t2 = $("#input-22").val(), t3 = $("#input-23").val(), t4 = $("#input-24").val();
        t1 = t1.replace(/,/g, "");
        t2 = t2.replace(/,/g, "");
        t3 = t3.replace(/,/g, "");
        t4 = t4.replace(/,/g, "");
        $("#camdfgrgegregr").hide();
        var tot = parseFloat( t1 ) + parseFloat( t2 ) + parseFloat( t3 ) + parseFloat( t4 );
        tot = verifyNaN(tot);        
        if( tot == 100 ) { $("#percent1").removeClass("labB2"); }        
        if ( tot > 100 ) {
            tot = tot - formatinteger($(this).val());
            $(this).val(0);            
        }                        
        var compra1 = formatinteger($("#input-1").text());        
        if( compra1 == '' || compra1 == 0 ) {
            $(this).val(0);
            $("#percent1").text( 0 );            
        } else {            
                $("#percent1").text( tot );                
                if( tot == 100 ){
                    $("#msg").hide();
                    $("#input-24").focus();
                    $("#input-24").select();
                }            
        }        
    });
        
        $("#input-24").blur( function () { 
        var t1 = $("#input-21").val(), t2 = $("#input-22").val(), t3 = $("#input-23").val(), t4 = $("#input-24").val();        
        t1 = t1.replace(/,/g, "");
        t2 = t2.replace(/,/g, "");
        t3 = t3.replace(/,/g, "");
        t4 = t4.replace(/,/g, "");
        $("#camdfgrgegregr").hide();
        var tot = parseFloat( t1 ) + parseFloat( t2 ) + parseFloat( t3 ) + parseFloat( t4 );
        tot = verifyNaN(tot);        
        if( tot == 100 ) { $("#percent1").removeClass("labB2"); }        
        if ( tot > 100 ) {
            tot = tot - formatinteger($(this).val());
            $(this).val(0);            
        }                      
        var compra1 = formatinteger($("#input-1").text());        
        if( compra1 == '' || compra1 == 0 ) {
            $(this).val(0);
            $("#percent1").text( 0 );            
        } else {            
                $("#percent1").text( tot );
                $("#input-25").focus();
                $("#input-25").select();
                if( tot == 100 ){
                    $("#msg").hide();
                } else {
                    $("#msg").show();
                    $("#input-24").focus();
                    $("#input-24").select();                    
                }
        }        
        });            
    
    $("#input-25").blur( function () { 
        $("#camdfgrgegregr").hide();
        var t1 = $("#input-25").val(), t2 = $("#input-26").val(), t3 = $("#input-27").val(), t4 = $("#input-28").val();
        t1 = t1.replace(/,/g, "");
        t2 = t2.replace(/,/g, "");
        t3 = t3.replace(/,/g, "");
        t4 = t4.replace(/,/g, "");        
        var tot = parseFloat( t1 ) + parseFloat( t2 ) + parseFloat( t3 ) + parseFloat( t4 );
        tot = verifyNaN(tot);         
        if( tot == 100 ) { $("#percent2").removeClass("labB2"); }        
        if ( tot > 100 ) {
            tot = tot - formatinteger($(this).val());
            $(this).val(0);
        }                  
        var compra2 = $("#input-2").val();
        compra2 = compra2.replace(/,/g, "");
        compra2 = verifyNaN(compra2);        
        if( compra2 == '' || compra2 == 0 ) {
            $(this).val(0);
            $("#percent2").text( 0 );            
        } else {            
                $("#percent2").text( tot );
                $("#input-26").focus();
                $("#input-26").select();
                if( tot == 100 ){
                    $("#msg").hide();
                }            
        }    
    });
    
    $("#input-26").blur( function () { 
        $("#camdfgrgegregr").hide();
        var t1 = $("#input-25").val(), t2 = $("#input-26").val(), t3 = $("#input-27").val(), t4 = $("#input-28").val();
        t1 = t1.replace(/,/g, "");
        t2 = t2.replace(/,/g, "");
        t3 = t3.replace(/,/g, "");
        t4 = t4.replace(/,/g, "");        
        var tot = parseFloat( t1 ) + parseFloat( t2 ) + parseFloat( t3 ) + parseFloat( t4 );
        tot = verifyNaN(tot);         
        if( tot == 100 ) { $("#percent2").removeClass("labB2"); }        
        if ( tot > 100 ) {
            tot = tot - formatinteger($(this).val());
            $(this).val(0);
        }                  
        var compra2 = $("#input-2").val();
        compra2 = compra2.replace(/,/g, "");
        compra2 = verifyNaN(compra2);        
        if( compra2 == '' || compra2 == 0 ) {
            $(this).val(0);
            $("#percent2").text( 0 );            
        } else {            
                $("#percent2").text( tot );
                $("#input-27").focus();
                $("#input-27").select();
                if( tot == 100 ){
                    $("#msg").hide();
                }            
        }    
    });
    
    $("#input-27").blur( function () { 
        $("#camdfgrgegregr").hide();
        var t1 = $("#input-25").val(), t2 = $("#input-26").val(), t3 = $("#input-27").val(), t4 = $("#input-28").val();
        t1 = t1.replace(/,/g, "");
        t2 = t2.replace(/,/g, "");
        t3 = t3.replace(/,/g, "");
        t4 = t4.replace(/,/g, "");        
        var tot = parseFloat( t1 ) + parseFloat( t2 ) + parseFloat( t3 ) + parseFloat( t4 );
        tot = verifyNaN(tot);         
        if( tot == 100 ) { $("#percent2").removeClass("labB2"); }        
        if ( tot > 100 ) {
            tot = tot - formatinteger($(this).val());
            $(this).val(0);
        }                  
        var compra2 = $("#input-2").val();
        compra2 = compra2.replace(/,/g, "");
        compra2 = verifyNaN(compra2);        
        if( compra2 == '' || compra2 == 0 ) {
            $(this).val(0);
            $("#percent2").text( 0 );            
        } else {            
                $("#percent2").text( tot );
                $("#input-28").focus();
                $("#input-28").select();
                if( tot == 100 ){
                    $("#msg").hide();
                }            
        }    
    });
    
    $("#input-28").blur( function () { 
        $("#camdfgrgegregr").hide();
        var t1 = $("#input-25").val(), t2 = $("#input-26").val(), t3 = $("#input-27").val(), t4 = $("#input-28").val();
        t1 = t1.replace(/,/g, "");
        t2 = t2.replace(/,/g, "");
        t3 = t3.replace(/,/g, "");
        t4 = t4.replace(/,/g, "");        
        var tot = parseFloat( t1 ) + parseFloat( t2 ) + parseFloat( t3 ) + parseFloat( t4 );
        tot = verifyNaN(tot);         
        if( tot == 100 ) { $("#percent2").removeClass("labB2"); }        
        if ( tot > 100 ) {
            tot = tot - formatinteger($(this).val());
            $(this).val(0);
        }                  
        var compra2 = $("#input-2").val();
        compra2 = compra2.replace(/,/g, "");
        compra2 = verifyNaN(compra2);        
        if( compra2 == '' || compra2 == 0 ) {
            $(this).val(0);
            $("#percent2").text( 0 );            
        } else {            
                $("#percent2").text( tot );
                $("#sendData").focus();                
                if( tot == 100 ){
                    $("#msg").hide();
                } else{
                    $("#msg").show();
                    $("#input-28").focus();
                    $("#input-28").select();
                }         
        }    
    });                    
    
    function verifyNaN(numero)
    {
       if (isNaN(numero)) 
         return 0;
       else
         return numero;
    }
    
$("#sendData").click( function(){
    console.log("hola");
    if ($("#input-1").text()=="" || $("#input-2").val()=="" || $("#total").val()=="") {
        $("#camdfgrgegregr").show();
        return false;
    } else {
        $("#camdfgrgegregr").hide();
        if ($("#percent1").text() == '100'){
            if ($("#percent2").text() == '100'){
                return true;
            } else {
                alert("Verifique el porcentaje en Compra de mercadería de fabricación extranjera que envía....");
                return false;
            }
                
        } else {
            alert("Verifique el porcentaje en Compra de mercadería de fabricación nacional que envía....");
            return false;
        }
    }            
    /*if ( $("#input-2").val()==0.00 || $("#input-21").val()==0 || $("#input-22").val()==0 || $("#input-23").val()==0 || $("#input-24").val()==0 || $("#input-25").val()==0 || $("#input-26").val()==0 || $("#input-27").val()==0 || $("#input-28").val()==0) {
        $("#camdfgrgegregr").show();
        return false;
        };*/
        var val1, val2, sw;
        val1 = formatinteger($("#input-1").text());
        var percent1 = $("#percent1").text();
        percent1 =  formatinteger( percent1 );
        if( val1 > 0 ) {
            if( percent1 < 100 ) {
                $("#msg").show();
                return false;
            }
        }
        if( val1 > 0 ) {
            if( percent1 == 100 ) {
                sw = true;
            } else {
                if( percent1 < 100 ) {
                    $("#msg").show();
                    $("#percent1").addClass("labB2");
                    $("#msg2").hide();
                    return false;
                } else {                   
                    $("#msg").show();
                    $("#percent1").addClass("labB2");
                    $("#camdfgrgegregr").show();
                    $("#msg2").hide();
                    return false;                   
                }
            }
        }else{
            //$("#camdfgrgegregr").show();
            //return false;  
        }
        val2 = formatinteger($("#input-2").val());
        var percent2 = $("#percent2").text();
        percent2 =  formatinteger( percent2 );        
       
        if( val2 > 0 ) {
            if( percent2 < 100 ) {
                $("#msg").show();
                return false;
            }
        }       
        if( val2 > 0 ) {
            if( percent2 == 100 ) {
                sw = true;
            } else {
                if( percent2 < 100 ) {
                    $("#msg").show();
                    $("#percent2").addClass("labB2");
                    $("#msg2").hide();
                    return false;
                } else {                   
                    $("#msg").show();
                    $("#percent2").addClass("labB2");
                                $("#camdfgrgegregr").show();
                    $("#msg2").hide();
                    return false;                   
                }
            }
        }else{
            //$("#camdfgrgegregr").show();
            //return false;
        }              
    } );
    
    // numero 1,225 = 1225
    function formatinteger( numero ) {
        numero = numero.replace(/,/g, "");
        numero = parseFloat( numero );
        return verifyNaN(numero);        
    }
});

function saveUPD(inp){
if (inp==1) {
    
    $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
    var datos="input-1="+$("#input-1").val()+"&input-21="+$("#input-21").val()+"&input-22="+$("#input-22").val()+"&input-23="+$("#input-23").val()+"&input-24="+$("#input-24").val();
$.ajax({
            type:"POST",
            url: "acap6Upd.php",
            cache: false,
            data: datos, 
            success: function (data) {
                $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
            },
            complete: function (data) {
                  $("#statusACAP1").fadeOut(1600, "linear");
            }
});

};
if (inp==2) {
      $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
  $.ajax({
            type:"POST",
            url: "acap6Upd.php",
            cache: false,
            data: "input-2="+$("#input-2").val()+"&input-25="+$("#input-25").val()+"&input-26="+$("#input-26").val()+"&input-27="+$("#input-27").val()+"&input-28="+$("#input-28").val(),
            success: function (data) {
                $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
            },
            complete: function (data) {
                  $("#statusACAP1").fadeOut(1600, "linear");
            }
});  
};
}
