$(document).ready( function() {  
    
//modenin  actualizado
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
    
    $("#perH").blur( function (){
        //var a5, tot, tm;
        var tot = formatinteger( $("#perH").val() ), pmh, obh;
        var a1 = formatinteger( $("#A1").text() );  //Obreros
        var a2 = formatinteger( $("#A2").val() );   //
        var a3 = formatinteger( $("#A3").val() );   //
        var a4 = formatinteger( $("#A4").val() );   //
        var a5 = formatinteger( $("#A5").val() );   //        
        /*alert(tot);
        alert(a1);
        alert(a2);
        alert(a3);
        alert(a4);
        alert(a5);  */
        if (tot >= 0 ){
            if (tot != 0) {
            if( tot < 5000 ) {                
                $("#perTH").text( number_format(tot,0,'',',') );
                $("#A1").text( number_format(tot,0,'',',') );
                $("#msg2").hide();   
                pmh = tot-a5;
                if (pmh > 0) {
                    $("#perTH").text( number_format(pmh,0,'',',') );
                    $("#A1").text( number_format(pmh,0,'',',') );
                    obh = pmh - a2 - a3 -a4;
                    if (obh > 0){
                        $("#msg8").hide();
                    $("#A1").text( number_format(obh,0,'',',') );                    
                    $("#A5").focus();
                    //$("#A5").val(0);
                    $("#A5").select();
                    } else {
                        $("#msg8").show();
                    }
                } else {                    
                     $("#msg6").show();
                     $("#perH").val(0);                     
                     $("#perH").focus();
                     $("#perH").select();
                     $("#perTH").text(0);
                    $("#A1").text(0);
                    $("#A2").val(0);
                    $("#A3").val(0);
                    $("#A4").val(0);
                    $("#A5").val(0);
                    }                                                
                } else {
                    $("#perTH").text(0);
                    $("#A1").text(0);
                    $("#A2").val(0);
                    $("#A3").val(0);
                    $("#A4").val(0);
                    $("#A5").val(0);
                    $("#msg6").show();    
                $("#msg2").show();                        
                }
            } else {
                    $("#perTH").text(0);
                    $("#A1").text(0);
                    $("#A2").val(0);
                    $("#A3").val(0);
                    $("#A4").val(0);
                    $("#A5").val(0);
                    $("#msg6").show();    
                $("#msg2").show();                        
                }                
        } else {
            $("#perTH").val(0);
            $("#A1").val(0);
            $("#A2").val(0);
            $("#A3").val(0);
            $("#A4").val(0);
            $("#msg6").show();
        }               
    } );
    
    $("#A5").blur( function (){
        var th;
        var tot = formatinteger( $("#perH").val() ), pph, obh;
        var a1 = formatinteger( $("#A1").text() ); //calculado
        var a2 = formatinteger( $("#A2").val() );
        var a3 = formatinteger( $("#A3").val() );
        var a4 = formatinteger( $("#A4").val() );
        var a5 = formatinteger( $("#A5").val() );  //personal eventual           
        tot = formatinteger( $("#perH").val() );   //total parcial        
        pph = tot - a5;        
        if (pph > 0 ){            
            $("#perTH").text( number_format(pph,0,'',',') );
            $("#A1").text( number_format(pph,0,'',',') );
            $("#msg2").hide();
            obh = pph - a2 - a3 -a4;
            if (obh >= 0 ) {
                $("#A1").text( number_format(obh,0,'',',') );
                $("#msg2").hide();            
                $("#A4").focus();
                $("#A4").select();
             } else {
                 alert("El número introducido no puede ser mayor que el TOTAL PARCIAL introducido..");
                $(this).val(0);
                $(this).focus();
                $(this).select();
            }
        } else {
            alert("El número introducido no puede ser mayor que el TOTAL PARCIAL introducido..");
            $(this).val(0);
            $(this).focus();
            $(this).select(); 
        }
    } );
    
    $("#A2").blur( function(){
        var a1, a2, a3, a4, a5, tot, pph, tm, thm;
        pph = formatinteger( $("#perTH").text() );
        a2 = formatinteger( $("#A2").val() );
        a3 = formatinteger( $("#A3").val() );
        a4 = formatinteger( $("#A4").val() );        
        a5 = formatinteger( $("#A5").val() );        
        a1 = pph - a2 - a3 - a4;        
        if (a1 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#A1").text( number_format(a1,0,'',',') );  
            $("#perM").focus();
            $("#perM").select();                        
          } else {
            $("#msg6").show("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");
            a1 = pph - a3 - a4;
            $("#A1").text( number_format(a1,0,'',',') );
            $(this).val(0);
            $(this).focus();
            $(this).select();
        }
    } );

    $("#A3").blur( function(){
        var a1, a2, a3, a4, a5, tot, pph, tm, thm;
        pph = formatinteger( $("#perTH").text() );
        a2 = formatinteger( $("#A2").val() );
        a3 = formatinteger( $("#A3").val() );
        a4 = formatinteger( $("#A4").val() );        
        a5 = formatinteger( $("#A5").val() );              
        a1 = pph - a2 - a3 - a4;        
        if (a1 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#A1").text( number_format(a1,0,'',',') );  
            $("#A2").focus();
            $("#A2").select();                        
          } else {
            $("#msg6").show("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");            
            a1 = pph - a2 - a4;
            $("#A1").text( number_format(a1,0,'',',') );            
            $(this).val(0);
            $(this).focus();
            $(this).select();
        }                                                    
    } );       
    
    $("#A4").blur( function(){        
        var a1, a2, a3, a4, a5, th, pph;
        pph = formatinteger($("#perTH").text());                
        a1 = formatinteger( $("#A1").text() );  //Obreros
        a2 = formatinteger( $("#A2").val() );  //Supervisores, jefes
        a3 = formatinteger( $("#A3").val() );  //Per, Administrativo
        a4 = formatinteger( $("#A4").val() );  //Gerentes
        a5 = formatinteger( $("#A5").val() );  //personal eventual                
        a1 = pph - a2 - a3 - a4;
        if (a1 >= 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#A1").text( number_format(a1,0,'',',') );
            $("#A3").focus();
            $("#A3").select();
        }   else {
            alert("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");                         
            $(this).val(0);
            $(this).focus();
            $(this).select();
            a1 = pph - a2 - a3;
            $("#A1").text( number_format(a1,0,'',',') );
        }                                                    
    } );   
    
    //------------------------------------------------------------------------------------------------------------------------------
    
    $("#perM").blur( function (){
        //var a5, tot, tm;
        var tot = formatinteger( $("#perM").val() ), pmm, obm;
        var b1 = formatinteger( $("#B1").text() );  //Obreros
        var b2 = formatinteger( $("#B2").val() );   //
        var b3 = formatinteger( $("#B3").val() );   //
        var b4 = formatinteger( $("#B4").val() );   //
        var b5 = formatinteger( $("#B5").val() );   //        
        /*alert(tot);
        alert(b1);
        alert(b2);
        alert(b3);
        alert(b4);
        alert(b5);  */
        if (tot >= 0 ){
            if (tot != 0) {
            if( tot < 5000 ) {                
                $("#perTM").text( number_format(tot,0,'',',') );
                $("#B1").text( number_format(tot,0,'',',') );
                $("#msg2").hide();   
                pmm = tot-b5;
                if (pmm > 0) {
                    $("#perTM").text( number_format(pmm,0,'',',') );
                    $("#B1").text( number_format(pmm,0,'',',') );
                    obm = pmm - b2 - b3 -b4;
                    if (obm > 0){
                        $("#msg8").hide();
                    $("#B1").text( number_format(obm,0,'',',') );                    
                    $("#B5").focus();
                    //$("#A5").val(0);
                    $("#B5").select();
                    } else {
                        $("#msg8").show();
                    }
                } else {                    
                     $("#msg6").show();
                     $("#perM").val(0);                     
                     $("#perM").focus();
                     $("#perM").select();
                     $("#perTM").text(0);
                    $("#B1").text(0);
                    $("#B2").val(0);
                    $("#B3").val(0);
                    $("#B4").val(0);
                    $("#B5").val(0);
                    }                                                
                } else {
                    $("#perTM").text(0);
                    $("#B1").text(0);
                    $("#B2").val(0);
                    $("#B3").val(0);
                    $("#B4").val(0);
                    $("#B5").val(0);
                    $("#msg6").show();    
                $("#msg2").show();                        
                }
            } else {
                    $("#perTM").text(0);
                    $("#B1").text(0);
                    $("#B2").val(0);
                    $("#B3").val(0);
                    $("#B4").val(0);
                    $("#B5").val(0);
                    $("#msg6").show();    
                $("#msg2").show();                        
                }                
        } else {
            $("#perTM").val(0);
            $("#B1").val(0);
            $("#B2").val(0);
            $("#B3").val(0);
            $("#B4").val(0);
            $("#msg6").show();
        }               
    } );
    
    $("#B5").blur( function (){
        var tm;
        var tot = formatinteger( $("#perM").val() ), ppm, obm;
        var b1 = formatinteger( $("#B1").text() ); //calculado
        var b2 = formatinteger( $("#B2").val() );
        var b3 = formatinteger( $("#B3").val() );
        var b4 = formatinteger( $("#B4").val() );
        var b5 = formatinteger( $("#B5").val() );  //personal eventual           
        tot = formatinteger( $("#perM").val() );   //total parcial        
        ppm = tot - b5;        
        if (ppm > 0 ){            
            $("#perTM").text( number_format(ppm,0,'',',') );
            $("#B1").text( number_format(ppm,0,'',',') );
            $("#msg2").hide();
            obm = ppm - b2 - b3 -b4;
            if (obm >= 0 ) {
                $("#B1").text( number_format(obm,0,'',',') );
                $("#msg2").hide();            
                $("#B4").focus();
                $("#B4").select();
             } else {
                 alert("El número introducido no puede ser mayor que el TOTAL PARCIAL introducido..");
                $(this).val(0);
                $(this).focus();
                $(this).select();
            }
        } else {
            alert("El número introducido no puede ser mayor que el TOTAL PARCIAL introducido..");
            $(this).val(0);
            $(this).focus();
            $(this).select(); 
        }
    } );
    
    $("#B2").blur( function(){
        var b1, b2, b3, b4, b5, tot, ppm, tm, thm;
        ppm = formatinteger( $("#perTM").text() );
        b2 = formatinteger( $("#B2").val() );
        b3 = formatinteger( $("#B3").val() );
        b4 = formatinteger( $("#B4").val() );        
        b5 = formatinteger( $("#B5").val() );        
        b1 = ppm - b2 - b3 - b4;        
        if (b1 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#B1").text( number_format(b1,0,'',',') );  
            $("#perS").focus();
            $("#perS").select();
          } else {
            $("#msg6").show("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");
            b1 = ppm - b3 - b4;
            $("#B1").text( number_format(b1,0,'',',') );
            $(this).val(0);
            $(this).focus();
            $(this).select();
        }
    } );

    $("#B3").blur( function(){
        var b1, b2, b3, b4, b5, tot, ppm, tm, thm;
        ppm = formatinteger( $("#perTM").text() );
        b2 = formatinteger( $("#B2").val() );
        b3 = formatinteger( $("#B3").val() );
        b4 = formatinteger( $("#B4").val() );        
        b5 = formatinteger( $("#B5").val() );              
        b1 = ppm - b2 - b3 - b4;
        if (b1 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#B1").text( number_format(b1,0,'',',') );  
            $("#B2").focus();
            $("#B2").select();                        
          } else {
            $("#msg6").show("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");            
            b1 = ppm - b2 - b4;
            $("#B1").text( number_format(b1,0,'',',') );            
            $(this).val(0);
            $(this).focus();
            $(this).select();
        }                                                    
    } );       
    
    $("#B4").blur( function(){
        var b1, b2, b3, b4, b5, th, ppm;
        ppm = formatinteger($("#perTM").text());                
        b1 = formatinteger( $("#B1").text() );  //Obreros
        b2 = formatinteger( $("#B2").val() );  //Supervisores, jefes
        b3 = formatinteger( $("#B3").val() );  //Per, Administrativo
        b4 = formatinteger( $("#B4").val() );  //Gerentes
        b5 = formatinteger( $("#B5").val() );  //personal eventual                
        b1 = ppm - b2 - b3 - b4;
        if (b1 >= 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#B1").text( number_format(b1,0,'',',') );
            $("#B3").focus();
            $("#B3").select();
        }   else {
            alert("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");                         
            $(this).val(0);
            $(this).focus();
            $(this).select();
            b1 = ppm - b2 - b3;
            $("#B1").text( number_format(b1,0,'',',') );
        }                                                    
    } );  
    
    //------------------------------------------------------------------------------------------------------------------------------
    
        $("#perS").blur( function (){
        //var a5, tot, tm;
        var tot = formatinteger( $("#perS").val() ), pms, obs;
        var c1 = formatinteger( $("#C1").text() );  //Obreros
        var c2 = formatinteger( $("#C2").val() );   //
        var c3 = formatinteger( $("#C3").val() );   //
        var c4 = formatinteger( $("#C4").val() );   //
        var c5 = formatinteger( $("#C5").val() );   //      
        
        
        /*alert(tot);
        alert(c1);
        alert(c2);
        alert(c3);
        alert(c4);
        alert(c5);  */
        if (tot >= 0 ){
            if (tot != 0) {
            if( tot < 500000000 ) {                
                $("#perTS").text( number_format(tot,0,'',',') );
                $("#C1").text( number_format(tot,0,'',',') );
                $("#msg2").hide();   
                pms = tot-c5;
                if (pms > 0) {
                    $("#perTS").text( number_format(pms,0,'',',') );
                    $("#C1").text( number_format(pms,0,'',',') );
                    obs = pms - c2 - c3 -c4;
                    if (obs > 0){
                        $("#msg8").hide();
                    $("#C1").text( number_format(obs,0,'',',') );                    
                    $("#C5").focus();
                    //$("#A5").val(0);
                    $("#C5").select();
                    } else {
                        $("#msg8").show();
                    }
                } else {                    
                     $("#msg6").show();
                     $("#perS").val(0);                     
                     $("#perS").focus();
                     $("#perS").select();
                     $("#perTS").text(0);
                    $("#C1").text(0);
                    $("#C2").val(0);
                    $("#C3").val(0);
                    $("#C4").val(0);
                    $("#C5").val(0);
                    }                                                
                } else {
                    $("#perTS").text(0);
                    $("#C1").text(0);
                    $("#C2").val(0);
                    $("#C3").val(0);
                    $("#C4").val(0);
                    $("#C5").val(0);
                    $("#msg6").show();    
                $("#msg2").show();                        
                }
            } else {
                    $("#perTS").text(0);
                    $("#C1").text(0);
                    $("#C2").val(0);
                    $("#C3").val(0);
                    $("#C4").val(0);
                    $("#C5").val(0);
                    $("#msg6").show();    
                $("#msg2").show();                        
                }                
        } else {
            $("#perTS").val(0);
            $("#C1").val(0);
            $("#C2").val(0);
            $("#C3").val(0);
            $("#C4").val(0);
            $("#msg6").show();
        }               
    } );
    
    $("#C5").blur( function (){
        var ts;
        var tot = formatinteger($("#perS").val()), pps, obs;
        var s1 = formatinteger( $("#C1").text() ); //calculado
        var s2 = formatinteger( $("#C2").val() );
        var s3 = formatinteger( $("#C3").val() );
        var s4 = formatinteger( $("#C4").val() );
        var s5 = formatinteger( $("#C5").val() );  //personal eventual
        tot = formatinteger( $("#perS").val() );   //total parcial
        pps = tot - s5;
        if (pps > 0 ){            
            $("#perTS").text( number_format(pps,0,'',',') );
            $("#C1").text( number_format(pps,0,'',',') );
            $("#msg2").hide();
            obs = pps - s2 - s3 -s4;
            if (obs >= 0 ) {
                $("#C1").text( number_format(obs,0,'',',') );
                $("#msg2").hide();            
                $("#C4").focus();
                $("#C4").select();
             } else {
                 alert("El número introducido no puede ser mayor que el TOTAL PARCIAL introducido..");
                $(this).val(0);
                $(this).focus();
                $(this).select();
            }
        } else {
            alert("El número introducido no puede ser mayor que el TOTAL PARCIAL introducido..");
            $(this).val(0);
            $(this).focus();
            $(this).select(); 
        }
    } );
    
    $("#C2").blur( function(){
        var a1, a2, a3, a4, a5, tot, pph, tm, thm;
        pph = formatinteger( $("#perTH").text() );
        a2 = formatinteger( $("#C2").val() );
        a3 = formatinteger( $("#C3").val() );
        a4 = formatinteger( $("#C4").val() );        
        a5 = formatinteger( $("#C5").val() );        
        a1 = pph - a2 - a3 - a4;        
        if (a1 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#C1").text( number_format(a1,0,'',',') );  
            $("#perM").focus();
            $("#perM").select();                        
          } else {
            $("#msg6").show("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");
            a1 = pph - a3 - a4;
            $("#C1").text( number_format(a1,0,'',',') );
            $(this).val(0);
            $(this).focus();
            $(this).select();
        }
    } );

    $("#C3").blur( function(){
        var a1, a2, a3, a4, a5, tot, pph, tm, thm;
        pph = formatinteger( $("#perTH").text() );
        a2 = formatinteger( $("#C2").val() );
        a3 = formatinteger( $("#C3").val() );
        a4 = formatinteger( $("#C4").val() );        
        a5 = formatinteger( $("#C5").val() );              
        a1 = pph - a2 - a3 - a4;        
        if (a1 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#C1").text( number_format(a1,0,'',',') );  
            $("#C2").focus();
            $("#C2").select();                        
          } else {
            $("#msg6").show("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");            
            a1 = pph - a2 - a4;
            $("#C1").text( number_format(a1,0,'',',') );            
            $(this).val(0);
            $(this).focus();
            $(this).select();
        }
    } );
    
    $("#C4").blur( function(){        
        var s1, s2, s3, s4, s5, th, pps;
        pps = formatinteger($("#perTS").text());                
        s1 = formatinteger( $("#C1").text() );  //Obreros
        s2 = formatinteger( $("#C2").val() );  //Supervisores, jefes
        s3 = formatinteger( $("#C3").val() );  //Per, Administrativo
        s4 = formatinteger( $("#C4").val() );  //Gerentes
        s5 = formatinteger( $("#C5").val() );  //personal eventual                
        s1 = pps - s2 - s3 - s4;
        if (s1 >= 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#C1").text( number_format(s1,0,'',',') );
            $("#C3").focus();
            $("#C3").select();
        }  else {
            alert("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");                         
            $(this).val(0);
            $(this).focus();
            $(this).select();
            s1 = pps - s2 - s3;
            $("#C1").text( number_format(s1,0,'',',') );
        }
    } );
    
//------------------------------------------------------------------------------------------------------------------------------ 

    $("#A6").blur( function(){
        var a6 = formatinteger( this.value );
        var tot = formatinteger( $("#perH").text() );
        tot = tot + a6;
        $("#perGH").text( number_format(tot,0,'',',') );
    });
    
    $("#B6").blur( function(){
        var a6 = formatinteger( this.value );
        var tot = formatinteger( $("#perM").text() );
        tot = tot + a6;
        $("#perGM").text( number_format(tot,0,'',',') );
    });
      
    $("#sendData").click( function(){
        var tot, tot1, tot2, apoyo1, apoyo2, sw;
       
      });                   
} );


function saveUPD(inp){    
    var datos = "", sw=0;    
    switch( inp ) {
        case 1: 
        case 2: 
        case 3: 
        case 4: 
        case 5: sw = 1; break;
    }
    
    if( sw == 1 ) {
        $.ajax({
            type:"POST",
            url: "acap2Upd.php",
            cache: false,
            data: $(".formA").serialize(), 
            success: function (data) {
                $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
            },
            complete: function (data) {
                  $("#statusACAP1").fadeOut(1600, "linear");
            }
        });
    }        
}