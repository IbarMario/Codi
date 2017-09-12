$(document).ready( function() {  
    
//modagin  anterior 
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
        var a1 = formatinteger( $("#A1").text() );
        var a2 = formatinteger( $("#A2").val() );
        var a3 = formatinteger( $("#A3").val() );
        var a4 = formatinteger( $("#A4").val() );
        var a5 = formatinteger( $("#A5").val() );        
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
        var tot = formatinteger( $("#perH").val() ), pmh, obh;
        var a1 = formatinteger( $("#A1").text() );
        var a2 = formatinteger( $("#A2").val() );
        var a3 = formatinteger( $("#A3").val() );
        var a4 = formatinteger( $("#A4").val() );
        var a5 = formatinteger( $("#A5").val() );                
        a5 = formatinteger( $("#A5").val() );
        tot = formatinteger( $("#perH").val() );        
        pmh = tot - a5;        
        if (pmh > 0 ){
            $("#perTH").text( number_format(pmh,0,'',',') );            
            $("#A1").text( number_format(pmh,0,'',',') );
            $("#msg2").hide();               
            obh = pmh - a2 - a3 -a4;
            if (obh >= 0) {
                $("#A1").text( number_format(obh,0,'',',') );                                    
                $("#msg2").hide();            
                //$("#A4").val(0);
                $("#A4").focus();
                $("#A4").select();
            } else {
            $("#A5").val(0);
            $("#A5").focus();
            $("#A5").select();
            }        
        }
    } );
    
    $("#A2").blur( function(){
        var a1, a2, a3, a4, a5, tot, th, tm, thm;        
        th = formatinteger( $("#perTH").Tex() );
        a2 = formatinteger( $("#A2").val() );
        a3 = formatinteger( $("#A3").val() );
        a4 = formatinteger( $("#A4").val() );        
        a5 = formatinteger( $("#A5").val() );
        alert(th);        
        alert(a2);
        alert(a3);
        alert(a4);
        alert(a5);
        
        a1 = th - a2 - a3 - a4;
        
        if (a1 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#A1").text( number_format(a1,0,'',',') );            
            
        }   else {
            $("#msg6").show("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");            
            $("#A1").text( number_format(th,0,'',',') );            
            $("#A2").val(0);
            $("#A3").val(0);
            $("#A4").val(0);            
        }                                                    
    } );    
    
    $("#A3").blur( function(){
        var a1, a2, a3, a4, a5, tot, th, tm, thm;        
        th = formatinteger( $("#perTH").Tex() );
        a2 = formatinteger( $("#A2").val() );
        a3 = formatinteger( $("#A3").val() );
        a4 = formatinteger( $("#A4").val() );        
        a5 = formatinteger( $("#A5").val() );
        alert(th);        
        alert(a2);
        alert(a3);
        alert(a4);
        alert(a5);
        
        a1 = th - a2 - a3 - a4;
        
        if (a1 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#A1").text( number_format(a1,0,'',',') );  
            $("#A2").focus();
            $("#A2").select();            
            
        }   else {
            $("#msg6").show("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");            
            $("#A1").text( number_format(th,0,'',',') );            
            $("#A2").val(0);
            $("#A3").val(0);
            $("#A4").val(0);            
        }                                                    
    } );       
    
    $("#A4").blur( function(){
        var a1, a2, a3, a4, a5, tot, th, tm, thm;        
        th = formatinteger( $("#perTH").Tex() );
        a2 = formatinteger( $("#A2").val() );
        a3 = formatinteger( $("#A3").val() );
        a4 = formatinteger( $("#A4").val() );        
        a5 = formatinteger( $("#A5").val() );
        alert(th);        
        alert(a2);
        alert(a3);
        alert(a4);
        alert(a5);        
        a1 = th - a2 - a3 - a4;        
        if (a1 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
            $("#A1").text( number_format(a1,0,'',',') );                        
            $("#A3").focus();
            $("#A3").select();
        }   else {
            $("#msg6").show("La cantidad introducida no puede ser mayor que el Total de personal Permanente (fijo)");            
            $("#A1").text( number_format(th,0,'',',') );            
            $("#A2").val(0);
            $("#A3").val(0);
            $("#A4").val(0);            
        }                                                    
    } );   
    
    $("#perM").blur( function (){
        //var a5, tot, tm;
        var tot = formatinteger( $("#perM").val() );
        alert(tot);
        if (tot >= 0 ){
            if( tot < 5000 ) {
                $("#perTM").text( number_format(tot,0,'',',') );
                $("#B1").text( number_format(tot,0,'',',') );
                $("#msg2").hide();                
                } else {
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
    
    $("#perS").blur( function (){
        //var a5, tot, tm;
        var tot = formatinteger( $("#perS").val() );
        alert(tot);
        if (tot >= 0 ){
            if( tot > 5000 ) {
                $("#perTS").text( number_format(tot,0,'',',') );
                $("#C1").text( number_format(tot,0,'',',') );
                $("#msg2").hide();                
                } else {
                $("#msg7").show();                        
                }            
        } else {
            $("#perTS").val(0);
            $("#C1").val(0);
            $("#C2").val(0);
            $("#C3").val(0);
            $("#C4").val(0);
            $("#msg7").hide();
        }               
    } );        

    
   $("#B2, #B3, #B4").blur( function(){
        var a1, a2, a3, a4, a5, tot, th, tm, thm;
        a1 = formatinteger( $("#B1").val() );
        a2 = formatinteger( $("#B2").val() );
        a3 = formatinteger( $("#B3").val() );
        a4 = formatinteger( $("#B4").val() );
            
    });    
    
    $("#B5").blur( function (){
        var a5, tot, th, thm;
        tot = formatinteger( $("#perTM").text() );
        a5 = formatinteger( this.value );        
        tot = tot + a5;        
        //restricciones
        th = formatinteger( $("#perH").text() );  //tot hombres      
        thm = tot + th;
        //console.log( a5+"____"+tot+"____"+th );
        if( thm > 5000 ) {
            $("#msg2").show();            
            tot = tot -  formatinteger( this.value );
            this.value = 0;
        } else {
            $("#msg2").hide();  
        }
        
        $("#perM").text( number_format(tot,0,'',',') );        
        $("#msg3").hide();
        $("#msg4").hide();
        $("#msg5").hide();
        
        var a6 = formatinteger( $("#B6").val() );
        tot = tot + a6;
        $("#perGM").text( number_format(tot,0,'',',') );        
    } );
    
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
    
    $("#C2, #C3, #C4").blur( function(){
        var a1, a2, a3, a4, a5, tot, th;
        a1 = formatinteger( $("#C1").val() );
        a2 = formatinteger( $("#C2").val() );
        a3 = formatinteger( $("#C3").val() );
        a4 = formatinteger( $("#C4").val() );
        
        tot = a1 + a2 + a3 + a4;
        
        $("#perTS").text( number_format(tot,0,'',',') );
        
        a5 = formatinteger( $("#C5").val() );
        th = a5 + tot;
        $("#perS").text( number_format(th,0,'',',') );
        
        $("#msg3").hide();
        $("#msg4").hide();
        $("#msg5").hide();
                
        $("#perGS").text( number_format(th,0,'',',') );
    } );
    
    $("#C5").blur( function (){     
        var a5, tot;
        tot = formatinteger( $("#perTS").text() );
        a5 = formatinteger( this.value );        
        tot = tot + a5;
        $("#perS").text( number_format(tot,0,'',',') );
        
        $("#msg3").hide();
        $("#msg4").hide();
        $("#msg5").hide();
                
        $("#perGS").text( number_format(tot,0,'',',') );
    } );
    
      
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