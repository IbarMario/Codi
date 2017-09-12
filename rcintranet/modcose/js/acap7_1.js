$(document).ready( function() {

   alert("HOla MUNDO");

    $("#mes_1, #mes_2, #mes_3, #mes_4, #mes_5, #mes_6, #mes_7, #mes_8, #mes_9, #mes_10, #mes_11, #mes_12").click(function(){
        $("#msg3").hide();
    });

    $("#input-1").blur( function(){
        $("#errore3").hide();
        var t1 , t2 , total2, tot, t3, t4;
        t1 = formatinteger( $("#input-1").val() );
        t2 = formatinteger( $("#input-2").val() );                
        t3 = formatinteger( $("#total3").val() );
        t4 = formatinteger( $("#total4").val() );                
        total2 = t4-t3;                
        if (total2 > (t1 + t2)){
            tot = total2 - (t1 + t2);                        
            $("#input-3").text( number_format(tot,2,'.',',') );

            if( tot > 0 ) {
                $("#msg2").hide();
                $("#msg4").hide();                
            }
            if( t1 == 0 ) {
                $("#input-21").val(0);
                $("#input-22").val(0);
                $("#input-23").val(0);
                $("#input-24").val(0);
                $("#percent1").text(0);
            } }else{
                $("#msg4").show();
                $("#input-1").val(0);
            }      
        $("#input-21").focus();
        $("#input-21").select();
    } );

    $("#input-2").blur( function(){
        $("#errore3").hide();
        var t1, t2, tot, total2, t3, t4;        
        t1 = formatinteger( $("#input-1").val() );
        t2 = formatinteger( $("#input-2").val() );        
        t3 = formatinteger( $("#total3").val() );
        t4 = formatinteger( $("#total4").val() );                
        total2 = t4-t3;
        if (total2 > (t1 + t2)){
            tot = total2 - t1 - t2;
            $("#input-3").text( number_format(tot,2,'.',',') );
            if( tot > 0 ) {
                $("#msg2").hide();
                $("#msg3").hide();
            }
            if( t2 == 0 ) {
                $("#input-25").val(0);
                $("#input-26").val(0);
                $("#input-27").val(0);
                $("#input-28").val(0);
                $("#percent2").text(0);
            } 
        }else{
            $("#msg3").show();
            $("#input-2").val(0);
            $("#input-2").select();
        }
        $("#input-1").focus();
        $("#input-1").select();
    } );

    //externo
    //cambios incorporados      
    $("#total3").blur( function(){   
        //alert("tres");
        var ventasnacional, ventasexterno, totv;        
        ventasnacional = formatinteger( $("#total4").val());
        ventasexterno = formatinteger( $("#total3").val());
        //alert(ventasnacional);
        //alert(ventasexterno);
        if (ventasnacional > ventasexterno){
            totv = ventasnacional - ventasexterno;        
            //alert(totv);
            $("#total2").text( number_format(totv,2,'.',',')  );
            alert("Ahora debe llenar lo de arriba tomando en cuenta los totales declarados");
            $("#input-3").text( number_format(totv,2,'.',',')  );
            $("#input-2").focus();
            $("#input-2").select();
            if( totv > 0 ) {
                $("#msg2").hide();
                $("#msg3").hide();
            }
            } else {
            $("#msg3").show();
            $("#total3").val(0);
            $("#total3").select();
        }        
      } );
    
      $("#total4").blur( function(){        
        var totv;
        totv = formatinteger( $("#total4").val() );
        //alert(totv);
        $("#total2").text( number_format(totv,2,'.',','));                
        $("#input-1").val(0);
        $("#input-2").val(0);
        $("#input-3").val(0);        
        $("#total3").val(0);
        $("#total3").focus();
        $("#total3").select();
        if( totv > 0 ) {
            $("#msg2").hide();
        }        
      } );        
            
    $("input-21").blur( function(){
        alert("hola mundo");
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-1").val() );
        alert(v1);
        $("#errore3").hide();
        alert("21");
        if( v1 <= 0 ) {
            $(this).val(0);
            $(this).focus();
            $(this).select();
        } else {
            p1 = formatinteger( $("#input-21").val() );
            p2 = formatinteger( $("#input-22").val() );
            p3 = formatinteger( $("#input-23").val() );
            p4 = formatinteger( $("#input-24").val() );            
            alert("p1");
            alert(p1);
            if (p1 > 100 ) {
                alert('Mayor a 100');
                $(this).val(0);
                $(this).focus();
                $(this).select();                
            } else {
                pt = p1 + p2 + p3 + p4;
                alert(pt);
                if( pt == 100 ) {
                    // pt es igual a 100
                    alert("es igual");
                    $("#msg").hide();
                    $("#percent1").removeClass("labB2");
                    $("#percent1").text(pt);
                    $("#input-25").focus();
                    $("#input-25").select();
                    } else {
                        if ( pt > 100 ) {
                            alert("es mayor");
                            //pt es mayor a 100 
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                        } else {
                            alert("es menor");
                            //pt es menor a 100 
                            $("#msg").hide();
                            $("#percent1").text(pt);
                            $("#input-22").focus();
                            $("#input-22").select();                                                
                        }
                    }
                }
            }
    });
    
    $("input-22").blur( function(){
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger($("#input-1").val());
        alert(v1);
        $("#errore3").hide();
        alert("22");
        if( v1 <= 0 ) {
            $(this).val(0);
            $(this).focus();
            $(this).select();
        } else {
            p1 = formatinteger( $("#input-21").val() );
            p2 = formatinteger( $("#input-22").val() );
            p3 = formatinteger( $("#input-23").val() );
            p4 = formatinteger( $("#input-24").val() );            
            alert("p2");
            alert(p2);
            if (p2 > 100 ) {
                alert('Mayor a 100');
                $(this).val(0);
                $(this).focus();
                $(this).select();                
            } else {
                pt = p1 + p2 + p3 + p4;
                alert(pt);
                if( pt == 100 ) {
                    // pt es igual a 100
                    alert("es igual");
                    $("#msg").hide();
                    $("#percent1").removeClass("labB2");
                    $("#percent1").text(pt);
                    $("#input-25").focus();
                    $("#input-25").select();
                    } else {
                        if ( pt > 100 ) {
                            alert("es mayor");
                            //pt es mayor a 100 
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                        } else {
                            alert("es menor");
                            //pt es menor a 100 
                            $("#msg").hide();
                            $("#percent1").text(pt);
                            $("#input-22").focus();
                            $("#input-22").select();                                                
                        }
                    }
                }
            }
    });
    
    $("input-23").blur( function(){
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-1").val() );
        alert(v1);
        $("#errore3").hide();
        alert("23");
        if( v1 <= 0 ) {
            $(this).val(0);
            $(this).focus();
            $(this).select();
        } else {
            p1 = formatinteger( $("#input-21").val() );
            p2 = formatinteger( $("#input-22").val() );
            p3 = formatinteger( $("#input-23").val() );
            p4 = formatinteger( $("#input-24").val() );            
            alert("p3");
            alert(p3);
            if (p3 > 100 ) {
                alert('Mayor a 100');
                $(this).val(0);
                $(this).focus();
                $(this).select();                
            } else {
                pt = p1 + p2 + p3 + p4;
                alert(pt);
                if( pt == 100 ) {
                    // pt es igual a 100
                    alert("es igual");
                    $("#msg").hide();
                    $("#percent1").removeClass("labB2");
                    $("#percent1").text(pt);
                    $("#input-24").focus();
                    $("#input-24").select();
                    } else {
                        if ( pt > 100 ) {
                            alert("es mayor");
                            //pt es mayor a 100 
                            $("#msg").show();
                            $(this).val(0);
                            $(this).focus();
                            $(this).select();
                        } else {
                            alert("es menor");
                            //pt es menor a 100 
                            $("#msg").hide();
                            $("#percent1").text(pt);
                            $("#input-24").focus();
                            $("#input-24").select();                                                
                        }
                    }
                }
            }
    });    
    
    
     $("input-24").blur( function(){
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-1").val() );
        $("#errore3").hide();        
        if( v1 == 0 ) {
            $(this).val(0);
        } else {
            p1 = formatinteger( $("#input-21").val() );
            p2 = formatinteger( $("#input-22").val() );
            p3 = formatinteger( $("#input-23").val() );
            p4 = formatinteger( $("#input-24").val() );
            alert(p4);
            if (p4 > 100 ) {
                alert('Mayor a 100');
                $(this).val(0);
                $(this).focus();
                $(this).select();                
            } else {
            pt = p1 + p2 + p3 + p4;
            alert(pt);
            if( pt == 100 ) {
                // pt es igual a 100
                alert("es igual");
                $("#msg").hide();
                $("#percent1").removeClass("labB2");
                $("#percent1").text(pt);
                $("#input-25").focus();
                $("#input-25").select();
                } else {
                    if ( pt > 100 ) {
                        alert("es mayor");
                        //pt es mayor a 100 
                        $("#msg").show();
                        $(this).val(0);
                        $(this).focus();
                        $(this).select();                    
                    } else {
                        alert("es menor");
                        //pt es menor a 100 
                        $("#msg").hide();
                        $("#percent1").text(pt);
                        $("#input-22").focus();
                        $("#input-22").select();                                                
                    }
                }
           }
        }
    });
    
    $("#input-28").blur( function(){
        $("#errore3").hide();
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-2").val() );
        if( v1 == 0 ) {
            $(this).val(0);
        } else {
            p1 = formatinteger( $("#input-25").val() );
            p2 = formatinteger( $("#input-26").val() );
            p3 = formatinteger( $("#input-27").val() );
            p4 = formatinteger( $("#input-28").val() );
            
            pt = p1 + p2 + p3 + p4;
            
            if( pt == 100 ) { $("#percent2").removeClass("labB2"); }
            if( pt > 100 ) {                
                $("#percent2").text(pt);
            } else {
                $("#percent2").text(pt);
                if( pt == 100){
                    $("#msg").hide();
                    $("#msg").hide();
                }
            }
        }
    });
    
    $("#input-25, #input-26, #input-27").blur( function(){
        $("#errore3").hide();
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-2").val() );
        if( v1 == 0 ) {
            $(this).val(0);
        } else {
            p1 = formatinteger( $("#input-25").val() );
            p2 = formatinteger( $("#input-26").val() );
            p3 = formatinteger( $("#input-27").val() );
            p4 = formatinteger( $("#input-28").val() );
            
            pt = p1 + p2 + p3 + p4;
            
            if( pt == 100 ) { $("#percent2").removeClass("labB2"); }
            if( pt > 100 ) {
                //$(this).val(0);
                $("#percent2").text(pt);
            } else {
                $("#percent2").text(pt);
                if( pt == 100){
                    $("#msg").hide();
                }
            }
        }     
    });
 
    
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
    
    $("#sendData").click( function(){        
     var v1, v2, percent1, percent2, total3, sw;
     v1 = formatinteger( $("#input-1").val() );                   
     v2 = formatinteger( $("#input-2").val() );     
     total3 = formatinteger( $("#total3").val() );     

     if (v1!="0.00" || v2!="0.00" || total3!="0.00") {
         sw = false;
         if( v1 != 0 ) {        
            percent1 = formatinteger ( $("#percent1").text() );
            if( percent1 == 100 ) {
                sw = true;
            } else {
                if( percent1 < 100 ) {
                    $("#msg").show();
                    $("#percent1").addClass("labB2");
                    $("#msg2").show();                 
                    $("#msg1").hide();
                    return false;
                } else {                   
                    $("#msg").show();
                    $("#percent1").addClass("labB2");
                    $("#msg2").show();
                    $("#msg1").hide();
                    return false;                   
                }
            }
        }

        if(!sw) {
            if( v2 != 0 ) {
                percent2 = formatinteger ( $("#percent2").text() );

                if( percent2 == 100 ) {
                    sw = true;
                } else {
                    if( percent2 < 100 ) {
                        $("#msg").show();
                        $("#percent2").addClass("labB2");
                        $("#msg1").hide();
                        return false;
                    } else {                   
                        $("#msg").show();
                        $("#percent2").addClass("labB2");
                        $("#msg1").hide();
                        return false;                   
                    }
                }
            }
        }
    } else{
           $("#msg2").show();
           $("#msg1").hide();
           return false;     
    };

/*    var togen = formatinteger( $("#total4").text() );
    if( togen == 0 ) {            
        $("#msg2").show();
        return false;
    }*/

    var $chk, numchecked;        
        /*
        for( var j = 1; j<=12; j++ ) {
            chk = document.getElementById("mes_"+j).checked;
            if( chk ) {
                numchecked =  numchecked + 1;
            }
        }
        */
        $chk = $("input[id^='mes_']:checked");
        numchecked = $chk.length;        
        if( numchecked > 0 ) {
            return true;
        } else {
            $("#msg3").show();
            return false;
        }
    });
});

function saveUPD(inp){
    if (inp==1) {
        $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
        var datos="pack=1&input-1="+$("#input-1").val()+"&input-21="+$("#input-21").val()+"&input-22="+$("#input-22").val()+"&input-23="+$("#input-23").val()+"&input-24="+$("#input-24").val()+"&input-2="+$("#input-2").val()+"&input-25="+$("#input-25").val()+"&input-26="+$("#input-26").val()+"&input-27="+$("#input-27").val()+"&input-28="+$("#input-28").val();
        $.ajax({
            type:"POST",
            url: "acap7Upd.php",
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
}

 