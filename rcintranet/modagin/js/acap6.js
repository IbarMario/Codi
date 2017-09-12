$(document).ready( function() {  
    
    var totv
    totv = formatinteger( $("#totventa").val() );
    if (totv ==0 ){
        $("#totventa").focus();
    }else{
        $("#senData").focus();        
    }     
    
   /*
    $("#mes_1, #mes_2, #mes_3, #mes_4, #mes_5, #mes_6, #mes_7, #mes_8, #mes_9, #mes_10, #mes_11, #mes_12").click(function(){
        $("#msg3").hide();
    }); */

    $("#input-1").blur( function(){
        $("#errore3").hide();
        var t1 , t2 , total2, tot, t3, t4;
        t1 = formatinteger( $("#input-1").val() );
        t2 = formatinteger( $("#input-2").val() );                
        t3 = formatinteger( $("#totexterno").val() );
        t4 = formatinteger( $("#totventa").val() );                
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
        t3 = formatinteger( $("#totexterno").val() );
        t4 = formatinteger( $("#totventa").val() );                
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
    $("#totexterno").blur( function(){        
        var ventasnacional, ventasexterno, totv;
        ventasnacional = formatinteger( $("#totventa").val());
        ventasexterno = formatinteger( $("#totexterno").val());  
        totv = ventasnacional - ventasexterno;
        if (totv >= 0){
        
            $("#totventanl").text( number_format(totv,2,'.',',') );            
            $("#input-3").text( number_format(totv,2,'.',',') );
            alert("Ahora debe llenar lo de arriba tomando en cuenta los totales declarados");
            $("#input-2").focus();
            $("#input-2").select();                
            $("#msg2").hide();
            $("#msg3").hide();            
        } else {
            $("#msg3").show();
            $("#totexterno").val(0);
            $("#totexterno").select();
        }
      } );

      $("#totventa").blur( function(){
        var totv;
        totv = formatinteger( $("#totventa").val() );
        if (totv == 0) {
            $("#input-1").val(0);
            $("#input-1").click();
            $("#input-2").val(0);
            $("#input-2").click();
            $("#input-3").text(0);
            $("#totexterno").val(0);
            $("#totexterno").click();
            $("#totventanl").text(0);
            //los procentajes en cero
            $("#input-21").val(0);
            $("#input-22").val(0);
            $("#input-23").val(0);
            $("#input-24").val(0);
            $("#input-25").val(0);
            $("#input-26").val(0);
            $("#input-27").val(0);
            $("#input-28").val(0);
            $("#input-29").val(0);
            $("#input-30").val(0);
            $("#input-31").val(0);
            $("#input-32").val(0);
            $("#input-33").val(0);   
            //resultado de porcentajes en cero
            $("#percent1").text(0);
            $("#percent2").text(0);
            $("#percent3").text(0);   
            //emnsajes
            $("#msg").hide();
            $("#msg1").hide();
            $("#msg2").hide();
            
            $(this).val(0);
            $(this).focus();
            $(this).select();
            } else {
            //alert(totv);
            $("#totventanl").text( number_format(totv,2,'.',','));
            $("#input-1").val(0);
            $("#input-2").val(0);
            $("#input-3").val(0);        
            $("#totexterno").val(0);
            $("#totexterno").focus();
            $("#totexterno").select();
            if( totv > 0 ) {
                $("#msg2").hide();
           }
       }                
      } );        
            
    $("#input-21").blur( function(){        
        var v1, p1, p2, p3, p4, pt;
        v1 = formatinteger( $("#input-1").val() );        
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
        v1 = formatinteger( $("#input-1").val() );        
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
        v1 = formatinteger( $("#input-1").val() );        
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
        v1 = formatinteger( $("#input-1").val() );        
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
    
/***********************************************************************/ 

$("#input-25").blur( function(){
        var v1, p1, p2, p3, p4, p5, p6, p7, pt;
        v1 = formatinteger( $("#input-2").val() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {  
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-25").val() );
            p2 = formatinteger( $("#input-26").val() );
            p3 = formatinteger( $("#input-27").val() );
            p4 = formatinteger( $("#input-28").val() );
            p5 = formatinteger( $("#input-29").val() );
            p6 = formatinteger( $("#input-30").val() );
            p7 = formatinteger( $("#input-31").val() );
             
            if (p1 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-25").val(0);
                $("#input-25").focus();
                $("#input-25").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p2 + p3 + p4 + p5, p6, p7;
                    $("#percent2").text(pt);
                }                                 
            } else {
                pt = p1 + p2 + p3 + p4 + p5, p6, p7;
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
                            pt = p2 + p3 + p4 + p5 + p6 +  p7;
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
        var v1, p1, p2, p3, p4, p5, p6, p7, pt;
        v1 = formatinteger( $("#input-2").val() );        
        $("#error3").hide();
        //alert(v1);
        if( v1 > 0 ) {  
            //ventas a instituciones publicas mayor a cero
            p1 = formatinteger( $("#input-25").val() );
            p2 = formatinteger( $("#input-26").val() );
            p3 = formatinteger( $("#input-27").val() );
            p4 = formatinteger( $("#input-28").val() );
            p5 = formatinteger( $("#input-29").val() );
            p6 = formatinteger( $("#input-30").val() );
            p7 = formatinteger( $("#input-31").val() );                      
            if (p2 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-26").val(0);
                $("#input-26").focus();
                $("#input-26").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p1 + p3 + p4 + p5, p6, p7;
                    $("#percent2").text(pt);
                }                 
            } else {
                pt = p1 + p2 + p3 + p4 + p5 + p6 + p7;               
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
                            pt = p1 + p3 + p4 + p5 + p6 + p7;
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
            p5 = formatinteger( $("#input-29").val() );
            p6 = formatinteger( $("#input-30").val() );
            p7 = formatinteger( $("#input-31").val() );   
            if (p3 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-27").val(0);
                $("#input-27").focus();
                $("#input-27").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p1 + p2 + p4 + p5 + p6 + p7;
                    $("#percent2").text(pt);
                }                                                                    
            } else {
                pt = p1 + p2 + p3 + p4 + p5 + p6 + p7;
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
                            pt = p1 + p2 + p4 + p5 +  p6 + p7;
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
            p5 = formatinteger( $("#input-29").val() );
            p6 = formatinteger( $("#input-30").val() );
            p7 = formatinteger( $("#input-31").val() );
            if (p4 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-28").val(0);
                $("#input-28").focus();
                $("#input-28").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p1 + p2 + p3 + p5 + p6 + p7;
                    $("#percent2").text(pt);
                }  
            } else {
                 pt = p1 + p2 + p3 + p4 + p5 + p6 + p7;  
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
                            pt = p1 + p2 + p3 + p5 +  p6 + p7;
                            $("#percent2").text(pt);   
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent2").text(pt);
                                $("#input-29").focus(); 
                                $("#input-29").select(); 
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
    
  $("#input-29").blur( function(){
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
            p5 = formatinteger( $("#input-29").val() );
            p6 = formatinteger( $("#input-30").val() );
            p7 = formatinteger( $("#input-31").val() );
            if (p5 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-29").val(0);
                $("#input-29").focus();
                $("#input-29").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p1 + p2 + p3 + p4 + p6 + p7;
                    $("#percent2").text(pt);
                }  
            } else {
                 pt = p1 + p2 + p3 + p4 + p5 + p6 + p7;  
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
                            pt = p1 + p2 + p3 + p4 +  p6 + p7;
                            $("#percent2").text(pt);   
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent2").text(pt);
                                $("#input-30").focus(); 
                                $("#input-30").select(); 
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
    
  $("#input-30").blur( function(){
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
            p5 = formatinteger( $("#input-29").val() );
            p6 = formatinteger( $("#input-30").val() );
            p7 = formatinteger( $("#input-31").val() );
            if (p6 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-30").val(0);
                $("#input-30").focus();
                $("#input-30").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p1 + p2 + p3 + p4 + p5 + p7;
                    $("#percent2").text(pt);
                }  
            } else {
                 pt = p1 + p2 + p3 + p4 + p5 + p6 + p7;  
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
                            pt = p1 + p2 + p3 + p4 +  p5 + p7;
                            $("#percent2").text(pt);                               
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent2").text(pt);
                                $("#input-31").focus(); 
                                $("#input-31").select(); 
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
    
  $("#input-31").blur( function(){
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
            p5 = formatinteger( $("#input-29").val() );
            p6 = formatinteger( $("#input-30").val() );
            p7 = formatinteger( $("#input-31").val() );
            if (p7 > 100 ) {
                alert('Valor fuera de rango, vuelva a introducir este dato..');
                $("#input-31").val(0);
                $("#input-31").focus();
                $("#input-31").select();
                $(this).val(0);
                $(this).focus();
                $(this).select();
                if ($("#percent2").text().length > 0 ){
                    pt = p1 + p2 + p3 + p4 + p5 + p6;
                    $("#percent2").text(pt);
                }  
            } else {
                 pt = p1 + p2 + p3 + p4 + p5 + p6 + p7;  
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
                            pt = p1 + p2 + p3 + p4 +  p5 + p6;
                            $("#percent2").text(pt);                               
                            } else {
                                //alert("es menor");
                                //pt es menor a 100 
                                $("#msg").hide();
                                $("#msg2").hide();
                                $("#percent2").text(pt);
                                $("#input-32").focus(); 
                                $("#input-32").select(); 
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
    
    
/*    
    
  $("#input-25, #input-26, #input-27, #input-28, #input-29, #input-30, #input-31").blur( function(){
        var a1, a2, a3, a4, a5, a6, a7, tot, valA;        
        
        valA = formatinteger( $("#input-2").val() );        
        if( valA != '' && valA > 0  ) {
            a1 = formatinteger( $("#input-25").val() );
            a2 = formatinteger( $("#input-26").val() );
            a3 = formatinteger( $("#input-27").val() );
            a4 = formatinteger( $("#input-28").val() );
            a5 = formatinteger( $("#input-29").val() );
            a6 = formatinteger( $("#input-30").val() );
            a7 = formatinteger( $("#input-31").val() );

            tot = a1 + a2 + a3 + a4 + a5 + a6 + a7;        
            $("#percent2").text( number_format(tot,0,'',',') );                       
            
            if( tot == 100 ) {
                $("#percent2").removeClass("labB2");
            }
        } else {
                $(this).val(0);
                $(this).focus();
                $(this).select();
        }        
        
        $("#msg").hide();
        $("#msg2").hide();
    });    */
    
  //se calcula el porcentaje de ventas a personas particulares
  $("#input-32").blur( function(){
      if ($("#input-3").text().length > 0) {
          var var1 = formatinteger($("#input-32").val());
          //alert(var1);
          if (var1 > 100){
              alert ('El valor introducido no puede ser mayor a 100');
              $("#input-32").val(0);
              $("#input-32").focus(0);
          } else {
                var a1, a2;
                a1 = formatinteger( $("#input-32").val() );
                //alert(valA);
                a2 = 100 - parseInt(a1);
                $("#input-33").val( number_format(a2,0,'',',') );                
                $("#input-33").click();
                $("#percent3").text(100);
                
         }                              
    }  else {
        alert(" Debe introducir datos para Ventas a Personas Particulares..");
        $(this).val(0);    
        $("#totexterno");
    }
});

  $("#input-33").blur( function(){
      if ($("#input-3").text().length > 0) {
          var var1 = formatinteger($("#input-33").val());
          //alert(var1);
          if (var1 > 100){
              alert ('El valor introducido no puede ser mayor a 100');
              $("#input-33").val(0);
              $("#input-33").focus(0);
          } else {
                var a1, a2;
                a2 = formatinteger( $("#input-33").val() );
                //alert(valA);
                a1 = 100 - parseInt(a2);
                $("#input-32").val( number_format(a1,0,'',',') ); 
                $("#input-32").click();
                $("#percent3").text(100);
                
         }                              
    }  else {
        alert(" Debe introducir datos para Ventas a Personas Particulares..");
        $(this).val(0);    
        $("#totexterno");
    }
});


/*    
$("#input-33").blur( function(){
      if ($("#input-3").text().length > 0) {
          var var1 = formatinteger($("#input-33").text());
          if (var1 > 0){        
                var a1, a2, tot, valA;                
                valA = formatinteger( $("#input-3").text() );        
                if( valA != '' && valA > 0  ) {
                    a1 = formatinteger( $("#input-32").val() );
                    a2 = formatinteger( $("#input-33").val() );            
                    tot = parseInt(a1) + parse(a2);
                    if (tot<=100) {
                        $("#msg").hide();
                        $("#msg2").hide();            
                        $("#percent3").text( number_format(tot,0,'',',') );
                        $("#percent3").removeClass("labB2");
                        $("#sendData").focus();
                    } else {  if (tot == 100) {
                        $("#percent3").text( number_format(tot,0,'',',') );
                        $("#sedData").focus();
                    } else {
                        $(this).val(0);
                        $(this).focus();
                        $(this).select();
                    }                                                
                    }
                } 
        } else {
            alert(" No puede introducir este dato si el valor de Ventas a Personas Particulares es Cero.. ");
            $(this).val(0);
        }
    }  else {
         alert(" Debe introducir datos para Ventas a Personas Particulares..");
         $(this).val(0);  
         $("#input-3").focus();
         $("#input-3").select();
      }
    });            
  */  
    
    
    
  
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

     if (v1!="" || v2!="" || total3!="") {
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

 