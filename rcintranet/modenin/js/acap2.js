$(document).ready( function() {  
    var salmin=720;
    //modenin  actualizado por el VPIMGE
    //DEL MDPyEP - wilfredo mendoza
    //ingreso a la página
    if ($("#perH").val().length == 0) {
        $("#perH").focus();
    } else {
        $("#sendData").focus();
    }
    
    //formaro de un número entero
    function formatinteger( numero ) {
        numero = numero.replace(/,/g, "");
        numero = parseInt( numero );
        return verifyNaN(numero);        
    }
    //verifica si es un número entero
    function verifyNaN(numero) {
       if (isNaN(numero)) 
         return 0;
       else
         return numero;
    }
//--------------------------------cambios para soportar vacio y ceros para la columna de hombres -------------------    
//entrada del valor de totales
$("#perH").blur( function (){
    if ($("#perH").val().length == 0){
        //si está vacio
        alert("Verificar los datos que se registra.....");
        $(this).focus();
    } else {
        //mayor a cero
        //var a5, tot, tm;
        var tot = formatinteger( $("#perH").val() );
        var a1 = formatinteger( $("#A1").text() );  //Obreros
        var a2 = formatinteger( $("#A2").val() );   //
        var a3 = formatinteger( $("#A3").val() );   //
        var a4 = formatinteger( $("#A4").val() );   //
        var a5 = formatinteger( $("#A5").val() );   //
        var pth = formatinteger( $("#perTH").text() );   // 
        if ($("#perH").val() == 0){
            if ($("#A5").val() != 0){
                alert("Introducir nuevamente el dato correspondiente a Personal Eventual...")
                $("#A5").val(0);
            }
            if ($("#perTH").text() != 0){
                alert("Introducir nuevamente el dato correspondiente a Personal Permanente...")
                $("#perTH").text(0);
                $("#A1").text(0);
                $("#A2").val(0);
                $("#A3").val(0);
                $("#A4").val(0);
                $("#A5").val(0);
            }
        } else {
            //alert(tot);
            if( tot > 5000 ) {
                $("#msg2").show();
                if ($("#perTH").text().length > 0){$("#perTH").text(0);}
                if ($("#A1").text().length > 0){$("#A1").text(0);};
                if ($("#A2").val().length > 0){$("#A2").val(0);};
                if ($("#A3").val().length > 0){$("#A3").val(0);};
                if ($("#A4").val().length > 0){$("#A4").val(0);};
                if ($("#A5").val().length > 0){$("#A5").val(0);};
                $("#perH").val(0);
                
            } else {
                //total válido para almacenamiento
                $("#msg2").hide();                
                if (tot < (a5+a1)) {
                    alert ("  Introducir nuevamente la cantidad de Personal Permanente y Eventual... ");
                    $("#perTH").text(0);
                    $("#A1").text(0);
                    $("#A2").val(0);
                    $("#A3").val(0);
                    $("#A4").val(0);
                    $("#A5").val(0);
                }                    
            }
        }
    }
});
    
$("#A5").blur( function (){
     if ($("#A5").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();
    } else {
        var th, pph, obh, perh;
        var tot = formatinteger( $("#perH").val() );
        var a1 = formatinteger( $("#A1").text() );      //calculado
        var a2 = formatinteger( $("#A2").val() );
        var a3 = formatinteger( $("#A3").val() );
        var a4 = formatinteger( $("#A4").val() );
        var a5 = formatinteger( $("#A5").val() );       //personal eventual          
        if (a5>0) {
            pph = tot - a5;
            //alert(pph);
            if (pph >= 0 ) {
                //el resultado es mayor a cero
                $("#perTH").text( number_format(pph,0,'',',') );
                //$("#A1").text( number_format(pph,0,'',',') );
                $("#msg2").hide();
                if ($("#A1").val().length != 0){
                    //suma a obreros
                    a1 = tot - a2 - a3 - a4;
                    $("#A1").text( number_format(a1,0,'',',') );
                }
                $("#A4").focus();
                $("#A4").select();                        
            } else {
                alert("El número introducido no puede ser mayor que el TOTAL PARCIAL introducido..");
                $(this).val(0);
                $(this).focus();
                $(this).select();
            }
        } else {
            //si es cero el personal eventual verificar cuando existe obreros
            //alert("es cero");
            if ($("#perH").val().length != 0){
                //el total parcial de personal no es blanco
                if ($("#perH").val() > 0){                //suma total a personal permanente
                    $("#msg6").hide();
                    $("#perTH").text( number_format(tot,0,'',',') );
                    if ($("#A1").text().length != 0){
                       //suma a obreros
                       if (a1 > 0) {
                           
                            a1 = tot - a2 - a3 - a4;
                            $("#A1").text( number_format(a1,0,'',',') );
                       }
                    }            
                } else {
                    //el total de personal es cero
                    $("#msg6").show();
                    $("#perH").focus();
                    $("#perH").select();
                }
            } else {
                //el total de personal es blanco
                $("#msg").show();
                $("#perH").focus();
                $("#perH").select();
            }
        }                
    }
} );
    
$("#A4").blur( function(){
    if ($("#A4").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();        
        $(this).select();
    } else {
        var a1, a2, a3, a4, th, pph, s4, b4, ctrol, sub1;
        pph = formatinteger($("#perTH").text());
        a1 = formatinteger( $("#A1").text() );  //Obreros
        a2 = formatinteger( $("#A2").val() );  //Supervisores, jefes
        a3 = formatinteger( $("#A3").val() );  //Per, Administrativo
        a4 = formatinteger( $("#A4").val() );  //Gerentes
        s4 = formatinteger( $("#C4").val() );  //Sueldos        
        b4 = formatinteger( $("#B4").val() );  //Sueldos        
        ctrol = parseInt(s4) + parseInt(b4);
        if (a4 > 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();         
            //calculo de resultado de total personal permanente hombres
            if ($("#A1").text().length > 0 ){
              //mayor que cero                            
                th = parseInt(a1) + parseInt(a2) + parseInt(a3) + parseInt(a4);
                //alert(th);
                if (th > pph){
                   alert("   Verifique el dato introducido, la suma de 1.1, 1.2, 1.3, 1.4 no puede ser mayor que 1. Personal permanente(fijo)...  ");
                    $("#A4").val(0);
                    $("#A5").focus();
                    $("#A5").select();
                } else {
                        if (s4 > 0){
                            if (s4 >= (720*ctrol)){
                                //esta todo bien
                                a1 = parseInt(pph) - parseInt(a2) - parseInt(a3) - parseInt(a4);
                                $("#A1").text( number_format(a1,0,'',',') );
                                $("#A3").focus();
                                $("#A3").select();
                            } else {
                                alert("No puede registrar este dato, porque los sueldos y salarios asignados a esta fila no serian los adecuados...");
                            }                                
                        } else {
                          a1 = parseInt(pph) - parseInt(a2) - parseInt(a3) - parseInt(a4);
                          $("#A1").text( number_format(a1,0,'',',') );
                          $("#A3").focus();
                          $("#A3").select();
                        }                            
                    }                    
            } else {
                $("#A3").focus();
                $("#A3").select();                                
            }                         
        }   
    }
});

$("#A3").blur( function(){
    if ($("#A3").val().length == 0){
        //es una celda vacia
        alert("Verificar los datos que se registra.....");
        $(this).focus();        
        $(this).select();
    } else {
        //no es celda vacia
        var a1, a2, a3, a4, th, pph, b3, c3, cal1;
        pph = formatinteger($("#perTH").text());
        a1 = formatinteger( $("#A1").text() );  //Obreros
        a2 = formatinteger( $("#A2").val() );  //Supervisores, jefes
        a3 = formatinteger( $("#A3").val() );  //Per, Administrativo
        a4 = formatinteger( $("#A4").val() );  //Gerentes  
        b3 = formatinteger( $("#B3").val() );  //Per, Administrativo
        c3 = formatinteger( $("#C3").val() );  //Gerentes
        //a1 = pph - a2 - a3 - a4;
        if (a3 > 0) {
            //el valor es mayor a cero
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();
                //mayor a cero
                //calculo de resultado de total personal permanente hombres
                th = parseInt(a1) + parseInt(a2) + parseInt(a3) + parseInt(a4);
                //alert(th);
                if (th > pph){
                    //la suma es mayor que el total personal permanente
                    alert("   Verifique el dato introducido, la suma de 1.1, 1.2, 1.3, 1.4 no puede ser mayor que 1. Personal permanente(fijo)...  ");
                    $("#A3").val(0);
                    $("#A4").focus();
                    $("#A4").select();
                    if ($("#A1").val().length > 0){
                        cal1 = parseInt(pph) - parseInt(a2) - parseInt(a3) - parseInt(a4);
                        $("#A1").text( number_format(cal1,0,'',',') );  
                        $("#A4").focus();
                        $("#A4").select();
                    }
                } else {
                //no es mayor que el total personal permanente
                    if ($("#A1").val().length > 0){
                        //la longitud mayor a cero
                        a1 = parseInt(pph) - parseInt(a2) - parseInt(a3) - parseInt(a4);
                        $("#A1").text( number_format(a1,0,'',',') );
                        $("#A2").focus();
                        $("#A2").select();
                    } else {
                        $("#A2").focus();
                        $("#A2").select();
            }                
        }            
    } else {
        //el valor es cero
        if ($("#A1").val().length > 0){
            a1 = parseInt(pph) - parseInt(a2) - parseInt(a3) - parseInt(a4);
            $("#A1").text( number_format(a1,0,'',',') );
            $("#A2").focus();
            $("#A2").select();
        } else {
            $("#A2").focus();
            $("#A2").select();
        }
    }
}  
});


function calcula_hombres( perh, a5,a4,a3,a2,a1, perth) {
        perh = perh.replace(/,/g, "");
        perh = perseInt( perh );        
        a5 = a5.replace(/,/g, "");
        a5 = parseInt( a5 );
        a4 = a4.replace(/,/g, "");
        a4 = parseInt( a4 );
        a3 = a3.replace(/,/g, "");
        a3 = parseInt( a3 );
        a2 = a2.replace(/,/g, "");
        a2 = parseInt( a2 );
        a1 = a1.replace(/,/g, "");
        a1 = parseInt( a1 );
        perth = perth.replace(/,/g, "");
        perth = parseInt( perth );                        
        return verifyNaN(numero);
};

$("#A2").blur( function(){
    if ($("#A2").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();
        $(this).select();        
        a1 = parseInt(pph) - parseInt(a2) - parseInt(a3) - parseInt(a4);
        $("#A1").text( number_format(a1,0,'',',') );
    } else {
        var a1, a2, a3, a4, a5, pph, th, tot;
        pph = formatinteger( $("#perTH").text() );
        a1 = formatinteger( $("#A1").text() );
        a2 = formatinteger( $("#A2").val() );
        a3 = formatinteger( $("#A3").val() );
        a4 = formatinteger( $("#A4").val() );
        a5 = formatinteger( $("#A5").val() );
        tot = formatinteger( $("#perH").val() );
        if (a2 >= 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();            
            if (a2 >= 0) {
                //calculo de resultado de total personal permanente hombres
                th = a1+a2+a3+a4;
                //alert(th);
                if (th > pph){
                    if (a1 > 0){
                        if (a2 > a1){
                            alert("   Verifique el dato introducido, la suma de 1.1, 1.2, 1.3, 1.4 no puede ser mayor que 1. Personal permanente(fijo)...  ");
                        } else {
                            a1 = pph - a2 - a3 - a4;
                            $("#A1").text( number_format(a1,0,'',',') );
                        }                        
                    } else {
                    alert("   Verifique el dato introducido, la suma de 1.1, 1.2, 1.3, 1.4 no puede ser mayor que 1. Personal permanente(fijo)...  ");                    
                    $("#A2").val(0);
                    $("#A2").focus();
                    $("#A2").select();
                    }
                } else {
                    a1 = pph - a2 - a3 - a4;
                    $("#A1").text( number_format(a1,0,'',',') ); 
                    $("#B5").focus();
                    $("#B5").select();
                }
            } else {
                a1 = pph - a2 - a3 - a4;
                $("#A1").text( number_format(a1,0,'',',') );
                $("#perM").focus();
                $("#B5").focus();
                $("#B5").select();                
            }
        }                                
    }
});


$("#A33333").blur( function(){
    if ($("#perH").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();
    } else {        
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
    }
 } );  
    
//------------------------------------------------------------------------------------------------------------------------------
//--------------------------------cambios para soportar vacio y ceros para la columna de mujeres  ------------------------------        
 $("#perM").blur( function (){        
    if ($("#perM").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();
    } else {
        //mayor a cero
        //var a5, tot, tm;
        var tot = formatinteger( $("#perM").val() );
        var b1 = formatinteger( $("#B1").text() );  //Obreros
        var b2 = formatinteger( $("#B2").val() );   //
        var b3 = formatinteger( $("#B3").val() );   //
        var b4 = formatinteger( $("#B4").val() );   //
        var b5 = formatinteger( $("#B5").val() );   //
        var ptm = formatinteger( $("#perTM").text() );   // 
        if ($("#perM").val() == 0){            
            if ($("#B5").val() != 0){
                alert("Introducir nuevamente el dato correspondiente a Personal Eventual...")
                $("#B5").val(0);
            }
            if ($("#perTM").text() != 0){
                alert("Introducir nuevamente el dato correspondiente a Personal Permanente...")
                $("#perTM").text(0);
                $("#B1").text(0);
                $("#B2").val(0);
                $("#B3").val(0);
                $("#B4").val(0);
                $("#B5").val(0);                
            }            
        } else {
            //alert(tot);
            if( tot > 5000 ) {
                $("#msg2").show();
                if ($("#perTM").text().length > 0){$("#perTM").text(0);}
                if ($("#B1").text().length > 0){$("#B1").text(0);};
                if ($("#B2").val().length > 0){$("#B2").val(0);};
                if ($("#B3").val().length > 0){$("#B3").val(0);};
                if ($("#B4").val().length > 0){$("#B4").val(0);};
                if ($("#B5").val().length > 0){$("#B5").val(0);};
                $("#perM").val(0);
            } else {
                //total válido para almacenamiento
                $("#msg2").hide();
                if (tot < (b5+b1)) {
                    alert ("  Introducir nuevamente la cantidad de Personal Permanente y Eventual... ");
                    $("#perTM").text(0);
                    $("#B1").text(0);
                    $("#B2").val(0);
                    $("#B3").val(0);
                    $("#B4").val(0);
                    $("#B5").val(0);
                }                    
            }
        }
    }
} );
    
$("#B5").blur( function (){
     if ($("#B5").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();
    } else {
        var tm, ppm, obm;
        var tot = formatinteger( $("#perM").val() );
        var b1 = formatinteger( $("#B1").text() );      //calculado
        var b2 = formatinteger( $("#B2").val() );
        var b3 = formatinteger( $("#B3").val() );
        var b4 = formatinteger( $("#B4").val() );
        var b5 = formatinteger( $("#B5").val() );       //personal eventual                
        if (b5>0) {
            ppm = tot - b5;
            //alert(ppm);
            if (ppm >= 0 ) {
                //el resultado es mayor a cero
                $("#perTM").text( number_format(ppm,0,'',',') );
                //$("#A1").text( number_format(pph,0,'',',') );
                $("#msg2").hide();
                if ($("#B1").val().length != 0){
                    //suma a obreros
                    b1 = tot - b2 - b3 - b4;
                    $("#B1").text( number_format(b1,0,'',',') );
                }
                $("#B4").focus();
                $("#B4").select();                        
            } else {
                alert("El número introducido no puede ser mayor que el TOTAL PARCIAL introducido..");
                $(this).val(0);
                $(this).focus();
                $(this).select(); 
            }            
        } else {
            //si es cero verificar cuando existe obreros
            //alert("es cero");
            if (tot > 0){
                //suma a personal permanente                
                if ($("#perM").val().length != 0){
                    $("#perTM").text( number_format(tot,0,'',',') );
                    if ($("#B1").text().length != 0){
                       //suma a obreros
                        b1 = tot - b2 - b3 - b4;
                        $("#B1").text( number_format(b1,0,'',',') );
                    }
                }                 
            }
        }                
    }
} );
    
$("#B4").blur( function(){
    if ($("#B4").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();        
        $(this).select();
    } else {
        var b1, b2, b3, b4, tm, ppm;
        ppm = formatinteger($("#perTM").text());
        b1 = formatinteger( $("#B1").text() );  //Obreros
        b2 = formatinteger( $("#B2").val() );  //Supervisores, jefes
        b3 = formatinteger( $("#B3").val() );  //Per, Administrativo
        b4 = formatinteger( $("#B4").val() );  //Gerentes        
        //b1 = pph - b2 - b3 - b4;
        if (b4 >= 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();            
            if (b4 > 0) {
                //calculo de resultado de total personal permanente hombres
                tm = b1+b2+b3+b4;
                //alert(tm);
                if (tm > ppm){
                    if (b4 > b1){
                        alert("   Verifique el dato introducido, la suma de 1.1, 1.2, 1.3, 1.4 no puede ser mayor que 1. Personal permanente(fijo)...  ");
                        $("#B4").val(0);
                        $("#B4").focus();
                        $("#B4").select();
                        
                    } else {
                            b1 = ppm - b2 - b3 - b4;
                            $("#B1").text( number_format(b1,0,'',',') );
                        }                    
                } else {
                    $("#B3").focus();
                    $("#B3").select();
                    if (b1>0){
                        b1 = ppm - b2 - b3 - b4;
                        $("#B1").text( number_format(b1,0,'',',') );
                    }
                }
            } else { 
                //es cero debe verificarse que todo vuela a su lugar
                if (b1>0){
                    b1 = ppm - b2 - b3 - b4;
                    $("#B1").text( number_format(b1,0,'',',') );
                }
                $("#B3").focus();
                $("#B3").select();
            }
        }
    }
});

$("#B3").blur( function(){
    if ($("#B3").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();        
        $(this).select();
    } else {
        var b1, b2, b3, b4, tm, ppm;
        ppm = formatinteger($("#perTM").text());
        b1 = formatinteger( $("#B1").text() );  //Obreros
        b2 = formatinteger( $("#B2").val() );  //Supervisores, jefes
        b3 = formatinteger( $("#B3").val() );  //Per, Administrativo
        b4 = formatinteger( $("#B4").val() );  //Gerentes        
        //a1 = pph - a2 - a3 - a4;
        if (b3 >= 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();            
            if (b3 > 0) {
                //calculo de resultado de total personal permanente hombres
                tm = b1+b2+b3+b4;
                //alert(tm);
                if (tm > ppm){
                    if (b3 > b1){
                        alert("   Verifique el dato introducido, la suma de 1.1, 1.2, 1.3, 1.4 no puede ser mayor que 1. Personal permanente(fijo)...  ");
                    } else {
                            b1 = ppm - b2 - b3 - b4;
                            $("#B1").text( number_format(b1,0,'',',') );
                        }
                    $("#B3").val(0);
                    $("#B3").focus();
                    $("#B3").select();
                } else {
                    if (b1>0){
                        b1 = ppm - b2 - b3 - b4;
                        $("#B1").text( number_format(b1,0,'',',') );  
                    }
                    $("#B2").focus();
                    $("#B2").select();
                }
            } else {                
                b1 = ppm - b2 - b3 - b4;
                $("#B1").text( number_format(b1,0,'',',') );                  
                    $("#B2").focus();
                    $("#B2").select();
            }                                        
        }
    }
});

$("#B2").blur( function(){
    if ($("#B3").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();        
        $(this).select();
    } else {
        var b1, b2, b3, b4, b5, ppm, tm;
        ppm = formatinteger( $("#perTM").text() );
        b1 = formatinteger( $("#B1").text() );
        b2 = formatinteger( $("#B2").val() );
        b3 = formatinteger( $("#B3").val() );
        b4 = formatinteger( $("#B4").val() );
        b5 = formatinteger( $("#B5").val() );
        if (b2 >= 0) {
            $("#msg3").hide();
            $("#msg4").hide();
            $("#msg5").hide();            
            if (b2 >= 0) {
                //calculo de resultado de total personal permanente hombres
                tm = b1+b2+b3+b4;
                //alert(tm);
                if (tm > ppm){
                    if (b1 > 0){
                        if (b2 > b1){
                            alert("   Verifique el dato introducido, la suma de 1.1, 1.2, 1.3, 1.4 no puede ser mayor que 1. Personal permanente(fijo)...  ");
                        } else {
                            b1 = ppm - b2 - b3 - b4;
                            $("#B1").text( number_format(b1,0,'',',') );
                        }                        
                    } else {
                    alert("   Verifique el dato introducido, la suma de 1.1, 1.2, 1.3, 1.4 no puede ser mayor que 1. Personal permanente(fijo)...  ");  
                    $("#B2").val(0);
                    $("#C5").focus();
                    $("#C5").select();
                    }
                } else {
                    b1 = ppm - b2 - b3 - b4;
                    $("#B1").text( number_format(b1,0,'',',') ); 
                    $("#C5").focus();
                    $("#C5").select();
                }
            } else {
                b1 = ppm - b2 - b3 - b4;
                $("#B1").text( number_format(b1,0,'',',') );
                $("#perS").focus();
            }
        }                                
    }
} );
    
//------------------------------------------------------------------------------------------------------------------------------
//--------------------------------cambios para soportar vacio y ceros para la columna de sueldos -------------------        
$("#perS").blur( function (){    
if ($("#perS").val().length == 0){
    //celda vacia
    alert("Verificar los datos que se registra.....");
    $(this).focus();
    $("#A5").focus();
    $("#A5").select();
} else {
    //celda no vacia    
    var tots, toth, totm, c1, c2, c3, c4, c5, tothm;    
    tots = formatinteger( $("#perS").val() );
    toth = formatinteger( $("#perH").val() );
    totm = formatinteger( $("#perM").val() );   
    c1 = formatinteger( $("#C1").val() );
    c2 = formatinteger( $("#C2").val() );
    c3 = formatinteger( $("#C3").val() );
    c4 = formatinteger( $("#C4").val() );    
    c5 = formatinteger( $("#C5").val() );    
    tothm = parseInt(toth) + parseInt(totm);    //total hombres y mujeres   
    //alert(tots);
    if (tots > 0){
        //total parcial con valores
        if ($("#perH").val().length > 0 || $("#perM").val().length > 0 ){
            //no son vacios las celdas para personas
            $("#msg6").hide();
            tothm = parseInt(toth) + parseInt(totm);    //total hombres y mujeres   
            if (tothm > 0){
                //personas mayor a cero
                //alert("mayor a 7000");
                if (tots >= (tothm * salmin)) {
                    //hasta aqui es aceptado el valor
                    //alert("mayor a 7000");
                    if ($("#C5").val().length > 0){
                        //alert("C no vacio");
                        //distinto de vacio
                        //se debe hacer la operación 
                        var c5 = formatinteger($("#C5").val());
                        if (c5 > 0) {
                            //mayor a cero personal eventual
                            if (tots > c5){
                                var pms = parseInt(tots) - parseInt(c5);
                                $("#perTS").text( number_format(pms,0,'',',') );
                                $("#A5").focus();
                                $("#A5").select();                                
                                if ($("#C1").text().length > 0) {
                                    var obs = parseInt(pms) - parseInt(c2) - parseInt(c3) - parseInt(c4);
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
                                    //alert ("Todo ok");
                                    $("#msg2").hide();
                                    $("#A5").focus();
                                    $("#A5").select();
                                }
                                
                                } else {
                                    //debe reformular el valor introducido anteriormente
                                    alert("Debe introducir nuevamente el valor de Sueldos y Salarios de personal eventual");
                                    $("#C5").val(0);
                                    $("#perTS").text( number_format(tots,0,'',',') );
                                    $("#msg2").hide();
                                    $("#A5").focus();
                                    $("#A5").select();
                                }                                                     
                            } else {
                                //alert("Salio");
                                $("#perTS").text( number_format(tots,0,'',',') );                        
                                $("#msg2").hide();
                                $("#A5").focus();
                                $("#A5").select();
                            }
                        } else {
                            //personal eventual vacio
                            //alert("Vacio..");
                            //coloca el valor
                            //$("#perTS").text( number_format(tots,0,'',',') );
                            
                            $("#msg2").hide();
                            $("#A5").focus();
                            $("#A5").select();                                                    
                        }                                                                                               
                            } else {
                                alert("Revisar el monto que registra, puede que no sea el correcto");
                                $("#perS").val(0);
                                $(this).focus();
                                $(this).select();
                            }
                
            } else {
                //cero personas
                $("#msg6").show();
                $("#A5").focus();
                $("#A5").select();   
            }            
        } else {
            //son vacios
            $("#msg6").show();
            $("#perH").focus();
            $("#perH").select();                        
        }
    } else {
        //el valor es cero
        if (tots > 0){
            alert("   No puede estar en cero este dato, existe cantidad de personal registrado.   ")
            $("#A5").focus();
            $("#A5").select();
        } else {
            $("#msg6").show();
            $("#perH").focus();
            $("#perH").select();            
        }
        if ($("#C5").val().length > 0){
            if (c5 > 0){
                alert("  Intoducir nuevamente todos los datos correspondiente a Sueldos y Salarios..... ");
                $("#perTS").text(0);
                $("#C1").text(0);
                $("#C2").val(0);
                $("#C3").val(0);
                $("#C4").val(0);
                $("#C5").val(0);
                $("#A5").focus();
                }
            } else {
            $("#C5").focus();
            }
        }
    }
} );
    
$("#C5").blur( function (){
    if ($("#C5").val().length == 0){
        alert("Verificar los datos que se registra.....");
        $(this).focus();
        $("#A5").focus();
        $("#A5").select();
    } else {        
            var ts, pps, obs, a5, b5, suma5, tots, s1, s2, s3, s4, s5, sub5, cal5;
            tots = formatinteger($("#perS").val());
            s1 = formatinteger( $("#C1").text() ); //calculado
            s2 = formatinteger( $("#C2").val() );
            s3 = formatinteger( $("#C3").val() );
            s4 = formatinteger( $("#C4").val() );
            s5 = formatinteger( $("#C5").val() );  //personal eventual
            a5 = formatinteger( $("#A5").val() );
            b5 = formatinteger( $("#B5").val() );            
       if (s5 > 0){
           //el valor introducido es mayor a cero
           if (s5 > tots) {
               alert("   Verifique el monto que regitra, no puede ser mayor al Total Parcial registrado...   ");
               $("#C5").val(0);
               $("#C4").focus();               
           } else {
               suma5 = parseInt(a5) + parseInt(b5);
               if (suma5 > 0 ){
                    //suma es mayor que cero existe personal asignado
                    $("#msg4").hide();
                    if (s5 >= (suma5 * salmin)){
                        sub5 = parseInt(tots) - parseInt(s5);
                        $("#perTS").text( number_format(sub5,0,'',',') );
                        $("#msg2").hide();
                        if ($("#C1").text().length == 0){
                            //se realiza por primera vez
                            $("#msg4").hide();
                            
                        } else {                                                        
                            $("#msg4").hide();
                            if (s1 > 0) {
                                //el valor se debe recalcular
                                cal5 = parseInt(sub5) - parseInt(s2) - parseInt(s3) - parseInt(c4);
                                $("#C1").text( number_format(cal5,0,'',',') );                                
                            } else {
                                alert ("Introducir nuevamente los Sueldos y Salarios para el punto 1.");
                                $("#C1").text(0);
                                $("#C2").val(0);
                                $("#C3").val(0);
                                $("#C4").val(0);                        
                                $("#C4").focus();
                                $("#C4").select();
                            }                                                                                                           
                        }
                    } else {
                        alert("El valor introducido debe estar el relación a la cantidad de personal registrado..");
                        $("#msg4").show();
                        $(this).val(0);
                        $(this).focus();
                        $(this).select();
                    }                                                                                                    
             } else {
                    alert("    Debe registrar el número de personal y luego volver a introducir este monto..   ");
                    $(this).val(0);
                    $(this).focus();
                    $(this).select();                    
                }
            }              
            } else {
                //es cero el valor introducido
                suma5 = parseInt(a5) + parseInt(b5);
                if (suma5 > 0 ){
                    alert("Verificar el dato, puesto que tiene personal eventual registrado");
                    $("#S4").focus();
                    $("#S4").select();
                } 
                ts = parseInt(s2) + parseInt(s3) + parseInt(s4); 
                if (ts > 0 ){
                    //recalcular el proceso                    
                    cal5 = parseInt(tots) - parseInt(s2) - parseInt(s3) - parseInt(s4);
                    $("#C1").text( number_format(cal5,0,'',',') );                    
                    $("#S4").focus();
                    $("#C4").select();
                    
                } else {
                    sub5 = parseInt(tots) - parseInt(s5);
                    $("#perTS").text( number_format(sub5,0,'',',') );
                    $("#msg2").hide();                                
                }
            }
     }         
 } );    
              
$("#C4").blur( function(){    
    if ($("#C4").val().length == 0){
        alert("Verificar el dato que se registra.....");
        $(this).focus();
        $("#C5").focus();
        $("#C5").select();
    } else {
        var c1, c2, c3, c4, c5, tot, pps, tm, thm, suma4, cal4, a4, b4, sub4, fila4;
        pps = formatinteger( $("#perTS").text() );
        c1 = formatinteger( $("#C1").text() );
        c2 = formatinteger( $("#C2").val() );
        c3 = formatinteger( $("#C3").val() );
        c4 = formatinteger( $("#C4").val() );
        c5 = formatinteger( $("#C5").val() );
        a4 = formatinteger( $("#A4").val() );        
        b4 = formatinteger( $("#B4").val() );        
        sub4 = pps - c2 - c3 - c4;
        if (c4 > 0){                    
            if (c4 > pps) {
                //c3 es mayor que el total
                alert("Verifique el monto que registra no puede ser mayor que el punto 1. Personal Permanente..");
                $("#C4").val(0);
                $("#C5").select();
                $("#C5").focus();
                //sale de la function
            } else {
                
                suma4 = parseInt(c2) + parseInt(c3) + parseInt(c4);

                if (suma4 > pps){
                    //la suma es mayor que 
                    alert("Verifique el monto que registra no puede ser mayor que el punto 1. Personal Permanente..");
                    $("#C4").val(0);
                    $("#C5").select();
                    $("#C5").focus();
                    //sale de la función
                } else {
                    //la suma de personal no es mayor que el total personla permanente.
                    fila4 = parseInt(a4)+ parseInt(b4);
                    //alert(salmin);
                    if (c4 >= (fila4 * salmin)){
                        sub4 = parseInt(pps) - parseInt(c2) - parseInt(c3) - parseInt(c4);
                        if ($("#C1").text().length == 0) {
                            //no se tiene dato de obreros                    
                            //$("#C1").text( number_format(sub1,0,'',',') );
                            $("#C3").focus();
                            $("#C3").select();                                       
                        } else {
                            $("#C1").text( number_format(sub4,0,'',',') );
                            $("#C3").focus();
                            $("#C3").select();
                        }                    
                    } else {
                        alert("     Verificar el monto que registra, esta cifra no esta de acuerdo a la cantida de personal...    ");
                        $("#C3").focus();
                        $("#C3").select();
                    }                                                
                }                    
            }
        } else {
        //es cero
        if ($("#C1").val().length == 0){
            //esta vacio
            $("#C5").focus();
            $("#C5").select();
        } else{
            //ya fue calculado se recalcula el saldo
            sub4 = parseInt(pps) - parseInt(c2) - parseInt(c3) - parseInt(c4);                        
            $("#C1").text( number_format(sub4,0,'',',') );
            $("#C3").focus();
            $("#C3").select();            
        }        
    }
}        
} );
    
$("#C3").blur( function(){    
    if ($("#C3").val().length == 0){
        alert("Verificar el dato que se registra.....");
        $(this).focus();
        $("#C4").focus();
        $("#C4").select();
    } else {
        var c1, c2, c3, c4, c5, tot, pps, tm, thm, suma3, cal3, a3, b3, sub3, fila3;
        pps = formatinteger( $("#perTS").text() );
        c1 = formatinteger( $("#C1").text() );
        c2 = formatinteger( $("#C2").val() );
        c3 = formatinteger( $("#C3").val() );
        c4 = formatinteger( $("#C4").val() );
        c5 = formatinteger( $("#C5").val() );
        a3 = formatinteger( $("#A3").val() );        
        b3 = formatinteger( $("#B3").val() );                
        if (c3 > 0){                    
            if (c3 > pps) {
                //c3 es mayor que el total
                alert("Verifique el monto que registra no puede ser mayor que el punto 1. Personal Permanente..");
                $("#C3").val(0);
                $("#C4").select();
                $("#C4").focus();
                //sale de la function
            } else {

                suma3 = parseInt(c2) + parseInt(c3) + parseInt(c4);

                if (suma3 > pps){
                    //la suma es mayor que 
                    alert("Verifique el monto que registra no puede ser mayor que el punto 1. Personal Permanente..");
                    $("#C3").val(0);
                    $("#C4").select();
                    $("#C4").focus();
                    //sale de la función
                } else {
                    //la suma de personal no es mayor que el total personla permanente.
                    fila3 = parseInt(a3)+ parseInt(b3);
                    //alert(salmin);
                    if (fila3 > 0){                                            
                        if (c3 >= (fila3 * salmin)){
                            sub3 = parseInt(pps) - parseInt(c2) - parseInt(c3) - parseInt(c4);
                            if ($("#C1").text().length == 0) {
                                //no se tiene dato de obreros                    
                                //$("#C1").text( number_format(sub1,0,'',',') );
                                $("#C2").focus();
                                $("#C2").select();                                       
                            } else {
                                $("#C1").text( number_format(sub3,0,'',',') );
                                $("#C2").focus();
                                $("#C2").select();
                            }                    
                        } else {
                            alert("     Verificar el monto que registra, esta cifra no esta de acuerdo a la cantidad de personal...    ");
                            $("#C4").focus();
                            $("#C4").select();
                        }
                    } else {
                        alert("   Debe registrar el número de personal administrativo, ....    ");
                        $("#C3").val(0);
                        $("#A3").focus();
                        $("#A3").select();
                    }
            }                  
            }
        } else {
        //es cero
        if ($("#C1").val().length == 0){
            //esta vacio la celda de obreros
            $("#C2").focus();
            $("#C2").select();
        } else{
            //ya fue calculado se recalcula el sueldo de obreros
            sub3 = parseInt(pps) - parseInt(c2) - parseInt(c3) - parseInt(c4);                        
            $("#C1").text( number_format(sub3,0,'',',') );
            $("#C2").focus();
            $("#C2").select();            
        }        
    }
}        
} );
    
    
$("#C2").blur( function(){    
    if ($("#C2").val().length == 0){
        alert("Verificar el dato que se registra.....");
        $(this).focus();
        $("#C3").focus();
        $("#C3").select();
    } else {
        var c1, c2, c3, c4, c5, tot, pps, tm, thm, suma2, cal2, a2, b2, sub2, fila2;
        pps = formatinteger( $("#perTS").text() );
        c1 = formatinteger( $("#C1").text() );
        c2 = formatinteger( $("#C2").val() );
        c3 = formatinteger( $("#C3").val() );
        c4 = formatinteger( $("#C4").val() );
        c5 = formatinteger( $("#C5").val() );
        a2 = formatinteger( $("#A2").val() );        
        b2 = formatinteger( $("#B2").val() );                
        if (c2 > 0){                    
            if (c2 > pps) {
                //c2 es mayor que el total
                alert("Verifique el monto que registra no puede ser mayor que el punto 1. Personal Permanente..");
                $("#C2").val(0);
                $("#C3").select();
                $("#C3").focus();
                //sale de la function
            } else {

                suma2 = parseInt(c2) + parseInt(c3) + parseInt(c4);

                if (suma2 > pps){
                    //la suma es mayor que 
                    alert("Verifique el monto que registra no puede ser mayor que el punto 1. Personal Permanente..");
                    $("#C2").val(0);
                    $("#C3").select();
                    $("#C3").focus();
                    //sale de la función
                } else {
                    //la suma de personal no es mayor que el total personla permanente.
                    fila2 = parseInt(a2)+ parseInt(b2);
                    //alert(salmin);
                    if (fila2 > 0){                                            
                        if (c2 >= (fila2 * salmin)){
                            sub2 = parseInt(pps) - parseInt(c2) - parseInt(c3) - parseInt(c4);
                            if ($("#C1").text().length == 0) {
                                //no se tiene dato de obreros                    
                                $("#C1").text( number_format(sub2,0,'',',') );
                                $("#A6").focus();
                                $("#A6").select();                                       
                            } else {
                                $("#C1").text( number_format(sub2,0,'',',') );
                                $("#A6").focus();
                                $("#A6").select();
                            }                    
                        } else {
                            alert("     Verificar el monto que registra, esta cifra no esta de acuerdo a la cantidad de personal...    ");
                            $("#C2").val(0);
                            $("#C3").focus();
                            $("#C3").select();
                        }
                    } else {
                        alert("   Debe registrar el número de personal administrativo, ....    ");
                        $("#C2").val(0);
                        $("#A2").focus();
                        $("#A2").select();
                    }
            }                  
            }
        } else {
        //es cero
        if ($("#C1").val().length == 0){
            //esta vacio
            $("#A6").focus();
            $("#A6").select();
        } else{
            //ya fue calculado se recalcula el saldo
            sub2 = parseInt(pps) - parseInt(c2) - parseInt(c3) - parseInt(c4);                        
            $("#C1").text( number_format(sub2,0,'',',') );
            $("#A6").focus();
            $("#A6").select();
        }
    }
}
} );    



    
//------------------------------------------------------------------------------------------------------------------------------ 

    $("#A6").blur( function(){
        if ($("#perH").val().length == 0){            
            $(this).focus();
        } else {
            var a6 = formatinteger( this.value );
            var tot = formatinteger( $("#perH").text() );
            tot = tot + a6;
            $("#perGH").text( number_format(tot,0,'',',') );
        }
    });
    
    $("#B6").blur( function(){
        if ($("#perH").val().length == 0){         
            $(this).focus();
        } else {
        var a6 = formatinteger( this.value );
        var tot = formatinteger( $("#perM").text() );
        tot = tot + a6;
        $("#perGM").text( number_format(tot,0,'',',') );
        }
    });
     
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
};    
    
    
    
$("#sendData").blur( function(){
if ($("#A1").val().length > 0 || $("#A2").val().length > 0 || $("#A3").val().length > 0 || $("#A4").val().length > 0 || $("#A5").val().length > 0 || $("#B1").val().length > 0 || $("#B2").val().length > 0 || $("#B3").val().length > 0 || $("#B4").val().length > 0 || $("#B5").val().length > 0 || $("#C1").val().length > 0 || $("#C2").val().length > 0 || $("#C3").val().length > 0 || $("#C4").val().length > 0 || $("#C5").val().length > 0 || $("#perTH").val().length > 0 || $("#perTM").val().length > 0 || $("#perTS").val().length > 0 || $("#perH").val().length > 0 || $("#perM").val().length > 0 || $("#perS").val().length > 0 || $("#A6").val().length > 0 || $("B6").val().length > 0) {
        //todos distintos de vacio
}   else {     
alert ("Todas as celdas deben ser distintas de vacio, si no existe información coloque cero donde corresponda.....");    
return false;
}  
} );



});