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
                if ($("#input-1").text().length == 0){
                    
                } else {
                    $("#input-2").val(0);
                    $("#input-1").text(0);
                };                
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
                var t1 = $("#total").val(), t2 = $("#input-2").val();
            if ($("#input-2").val() != 0){
                var t1 = $("#total").val(), t2 = $("#input-2").val();
                t1 = t1.replace(/,/g, "");
                t2 = t2.replace(/,/g, "");
                var tot = parseFloat(t1) - parseFloat(t2);
                tot = verifyNaN(tot);
                if( tot >= 0 ) {
                       // alert("es mayor a cero");
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
                 //alert ("    Está declarando 0 en compra de Mercadería para Reventa. Si esta seguro de este dato continúe el proceso..          ");
                 $("#input-25, #input-26, #input-27, #input-28").val(0);
                 $("#percent2").text(0);
                 $("#input-1").text(number_format(t1,0,'',','));
                 $("#input-21").focus();
            }
        } else {
                alert ("      Está declarando 0 en compra de Mercadería para Reventa. Si esta seguro de este dato continúe el proceso..    ");
        }
        
    });    
    
     $("#input-21").blur( function(){
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-1").text() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-21").val() );
            p2 = formatinteger( $("#input-22").val() );
            p3 = formatinteger( $("#input-23").val() );
            p4 = formatinteger( $("#input-24").val() );                        
            if (p1 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-21").val(0);
                $("#input-21").focus();
                $("#input-21").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                pt = p2 + p3 + p4;
                $("#percent1").text(pt);
            } else {
                pt = p1 + p2 + p3 + p4;
                //alert(pt);
                if( pt == 100 ) {
                    // pt es igual a 100
                    //alert("es igual");
                    $("#msg").hide();                    
                    $("#input-22").val(0);
                    $("#input-23").val(0);
                    $("#input-24").val(0);                         
                    $("#percent1").removeClass("labB2");                    
                    $("#percent1").text(pt);
                    $("#input-25").focus();
                    $("#input-25").select();
                    } else {
                        if ( pt > 100 ) {
                            //alert("es mayor");                            
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent1").text(pt);
                                $("#input-22").focus();
                                $("#input-22").select();                                                
                            }
                        }
                    }
            } else {
            //ventas a instituciones publicas igual a cero
            $("#msg2").show();
            $(this).val(0);
            $(this).focus();
            $(this).select();
       }
    });
    
       
    $("#input-22").blur( function(){        
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-1").text() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {  
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-21").val() );
            p2 = formatinteger( $("#input-22").val() );
            p3 = formatinteger( $("#input-23").val() );
            p4 = formatinteger( $("#input-24").val() );                        
            if (p2 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-22").val(0);
                $("#input-22").focus();
                $("#input-22").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                pt = p1 + p3 + p4;
                $("#percent1").text(pt);
            } else {
                pt = p1 + p2 + p3 + p4;
                //alert(pt);
                if( pt == 100 ) {
                    //pt es igual a 100
                    //alert("es igual");
                    $("#msg").hide();
                    $("#percent1").removeClass("labB2");
                    $("#percent1").text(pt);
                    $("#input-25").focus();
                    $("#input-25").select();
                    } else {
                        if ( pt > 100 ) {
                            //alert("es mayor");                            
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent1").text(pt);
                                $("#input-23").focus();
                                $("#input-23").select();                                                
                            }
                        }
                    }
            } else {
            //ventas a instituciones publicas igual a cero
            $("#msg2").show();
            $(this).val(0);
            $(this).focus();
            $(this).select();
       }
    });   
    
$("#input-23").blur( function(){        
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-1").text() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {  
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-21").val() );
            p2 = formatinteger( $("#input-22").val() );
            p3 = formatinteger( $("#input-23").val() );
            p4 = formatinteger( $("#input-24").val() );                        
            if (p3 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-23").val(0);
                $("#input-23").focus();
                $("#input-23").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                pt = p1 + p2 + p4;
                $("#percent1").text(pt);
            } else {
                pt = p1 + p2 + p3 + p4;
                //alert(pt);
                if( pt == 100 ) {
                    //pt es igual a 100
                    //alert("es igual");
                    $("#msg").hide();
                    $("#percent1").removeClass("labB2");
                    $("#percent1").text(pt);
                    $("#input-25").focus();
                    $("#input-25").select();
                    } else {
                        if ( pt > 100 ) {
                            //alert("es mayor");                            
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent1").text(pt);
                                $("#input-24").focus();
                                $("#input-24").select();                                                
                            }
                        }
                    }
            } else {
            //ventas a instituciones publicas igual a cero
            $("#msg2").show();
            $(this).val(0);
            $(this).focus();
            $(this).select();
       }
    });   

$("#input-24").blur( function(){        
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-1").text() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {  
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-21").val() );
            p2 = formatinteger( $("#input-22").val() );
            p3 = formatinteger( $("#input-23").val() );
            p4 = formatinteger( $("#input-24").val() );                        
            if (p4 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-24").val(0);
                $("#input-24").focus();
                $("#input-24").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                pt = p1 + p2 + p3;
                $("#percent1").text(pt);
            } else {
                pt = p1 + p2 + p3 + p4;
                //alert(pt);
                if( pt == 100 ) {
                    //pt es igual a 100
                    //alert("es igual");
                    $("#msg").hide();
                    $("#percent1").removeClass("labB2");
                    $("#percent1").text(pt);
                    $("#input-25").focus();
                    $("#input-25").select();
                    } else {
                        if ( pt > 100 ) {
                            //alert("es mayor");                            
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent1").text(pt);
                                $("#input-25").focus();
                                $("#input-25").select();                                                
                            }
                        }
                    }
            } else {
            //ventas a instituciones publicas igual a cero
            $("#msg2").show();
            $(this).val(0);
            $(this).focus();
            $(this).select();
       }
    });
   

$("#input-25").blur( function(){
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-2").val() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {  
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-25").val() );
            p2 = formatinteger( $("#input-26").val() );
            p3 = formatinteger( $("#input-27").val() );
            p4 = formatinteger( $("#input-28").val() );            
             
            if (p1 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-25").val(0);
                $("#input-25").focus();
                $("#input-25").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p2 + p3 + p4;
                    $("#percent2").text(pt);
                }                                 
            } else {
                pt = p1 + p2 + p3 + p4;
                //alert(pt);
                if( pt == 100 ) {
                    //pt es igual a 100
                    //alert("es igual");
                    $("#msg").hide();
                    
                    $("#input-26").val(0);
                    $("#input-27").val(0);
                    $("#input-28").val(0);    
                    
                    $("#percent2").removeClass("labB2");
                    $("#percent2").text(pt);
                    $("#input-32").focus();
                    } else {
                        if ( pt > 100 ) {
                            //alert("es mayor");                            
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                            pt = p2 + p3 + p4;
                            $("#percent2").text(pt);
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent2").text(pt);
                                $("#input-26").focus();
                                $("#input-26").select();                                                
                            }
                        }
                    }
            } else {
            //ventas a instituciones publicas igual a cero
            $("#msg2").show();
            $(this).val(0);
            $(this).focus();
            $(this).select();
            $("#input-2").show();
       }
  }); 


$("#input-26").blur( function(){                
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-2").val() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {  
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-25").val() );
            p2 = formatinteger( $("#input-26").val() );
            p3 = formatinteger( $("#input-27").val() );
            p4 = formatinteger( $("#input-28").val() );
            if (p2 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-26").val(0);
                $("#input-26").focus();
                $("#input-26").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p1 + p3 + p4;
                    $("#percent2").text(pt);
                }                 
            } else {
                pt = p1 + p2 + p3 + p4;               
                //alert(pt);
                if( pt == 100 ) {
                    //pt es igual a 100
                    //alert("es igual");
                    $("#msg").hide();
                    $("#percent2").removeClass("labB2");
                    $("#percent2").text(pt);
                    $("#input-32").focus();                    
                    } else {
                        if ( pt > 100 ) {
                            //alert("es mayor");                            
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                            pt = p1 + p3 + p4;
                            $("#percent2").text(pt);                            
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent2").text(pt);
                                $("#input-27").focus();
                                $("#input-27").select();                                                
                            }
                        }
                    }
            } else {
            //ventas a instituciones publicas igual a cero
            $("#msg2").show();
            $(this).val(0);
            $(this).focus();
            $(this).select();
            $("#input-2").show();
       }
    }); 
        
$("#input-27").blur( function(){
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-2").val() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {  
            $("#msg2").hide();
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-25").val() );
            p2 = formatinteger( $("#input-26").val() );
            p3 = formatinteger( $("#input-27").val() );
            p4 = formatinteger( $("#input-28").val() );              
            if (p3 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-27").val(0);
                $("#input-27").focus();
                $("#input-27").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p1 + p2 + p4;
                    $("#percent2").text(pt);
                }                                                                    
            } else {
                pt = p1 + p2 + p3 + p4;
                //alert(pt);
                if( pt == 100 ) {
                    //pt es igual a 100
                    //alert("es igual");
                    $("#msg").hide();
                    $("#percent2").removeClass("labB2");
                    $("#percent2").text(pt);
                    $("#input-32").focus();                                          
                    } else {
                        if ( pt > 100 ) {
                            //alert("es mayor");                            
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                            pt = p1 + p2 + p4;
                            $("#percent2").text(pt);                            
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent2").text(pt);
                                $("#input-28").focus();
                                $("#input-28").select();                                                
                            }
                        }
                    }
            } else {
            //ventas a instituciones publicas igual a cero
            $("#msg2").show();
            $(this).val(0);
            $(this).focus();
            $(this).select();
            $("#input-2").show();
       }
    }); 
    
    

    $("#input-28").blur( function(){
        var v1, p1, p2, p3, p4, p5, p6, p7, pt;
        v1 = formatinteger( $("#input-2").val() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {  
            $("#msg2").hide();
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-25").val() );
            p2 = formatinteger( $("#input-26").val() );
            p3 = formatinteger( $("#input-27").val() );
            p4 = formatinteger( $("#input-28").val() );           
            if (p4 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-28").val(0);
                $("#input-28").focus();
                $("#input-28").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p1 + p2 + p3 ;
                    $("#percent2").text(pt);
                }  
            } else {
                 pt = p1 + p2 + p3 + p4;  
                //alert(pt);
                if( pt == 100 ) {
                    //pt es igual a 100
                    //alert("es igual");
                    $("#msg").hide();
                    $("#percent2").removeClass("labB2");
                    $("#percent2").text(pt);
                    $("#input-32").focus();                    
                    } else {
                        if ( pt > 100 ) {
                            //alert("es mayor");                            
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();                                                                                   
                            pt = p1 + p2 + p3;
                            $("#percent2").text(pt);   
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent2").text(pt);
                                $("#sendData").focus(); 
                                $("#sendData").select(); 
                            }
                        }
                    }
            } else {
            //ventas a instituciones publicas igual a cero
            $("#msg2").show();
            $(this).val(0);
            $(this).focus();
            $(this).select();
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
    /*
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
    */    
      
        
    
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
                //return false;
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
                    //return false;
                } else {                   
                    $("#msg").show();
                    $("#percent1").addClass("labB2");
                    $("#camdfgrgegregr").show();
                    $("#msg2").hide();
                    //return false;                   
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
                //return false;
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
                    //return false;
                } else {                   
                    $("#msg").show();
                    $("#percent2").addClass("labB2");
                    $("#camdfgrgegregr").show();
                    $("#msg2").hide();
                    //return false;                   
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
