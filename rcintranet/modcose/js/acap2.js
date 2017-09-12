$(document).ready( function() {
//--------modcose  actual se modifico ---
//------------MDPyEP  - VPIMGE ----------
//--------------- 16-04-2015 ------------      
$("#totperH").focus();

$("#sendData").click( function(){       
var peventualh, peventualm, totperh, totperm, sumatot, sumaeven, control, toteven, tothm; 
    tothm = formatinteger( $("#totperHM").val() );
    if (tothm > 0){                                    
        toteven = formatinteger( $("#peventual").val() );
        if (toteven > 0){
              return true;              
        } else {
            peventualh = formatinteger( $("#peventualH").val() );
            peventualm = formatinteger( $("#peventualM").val() );    
            sumaeven = parseFloat(peventualh) + parseFloat(peventualm);
            if (sumaeven > 0){
                alert("Debe introducir el dato correspondiente al Sueldos y Salarios de Personal Eventual");
                $("#peventualM").focus();
                $("#peventualM").select();
                //return false;
                return true;     
            }                
        }

    } else {
        totperh = formatinteger( $("#totperH").val() );
        totperm = formatinteger( $("#totperM").val() );        
        sumatot = parseFloat(totperh) + parseFloat(totperm);
        if (sumatot > 0){
            alert("Debe introducir el dato correspondiente al Total de Sueldos y Salarios");
            $("#totperHM").focus();
            $("#totperHM").select();
            //return false;
            return true;     
        }
    }                           
});
//var subtotal;

//se modificó
$("#peventualH").blur( function () {
    //se llama cuando cambia personal eventual hombres
    var tot1 = formatinteger( $("#totperH").val());
    var h2 = formatinteger( $("#peventualH").val()), h1, iH1, iH2;       
    $("#msg5").hide();
    $("#msg2").hide();
    if ($("#peventualH").val().length != 0){
        h1 = tot1 - h2;
        //alert(h1);
        if (h1 >= 0){
            $("#pepermanenteH").text(number_format(h1,0,'',','));
            $("#msg5").hide();
            $("#totperM").select();
            //console.log(subtotal);                   
        } else {
            $("#msg2").text('La cantidad de personal eventual Hombres no puede ser mayor que el Total Hombres reportado, vuelva a escribirlo');
            $("#msg2").show();
            $("#peventualH").val(0);
            $("#peventualH").focus();               
        }
    } else {
        $("#peventualH").val(0);
        $("#peventualM").focus();
    }
} );


$("#totperH").blur( function () {
    //cuando sale de total personal hombres
    var totperh;
    totperh = formatinteger( $("#totperH").val() );
    //alert(totperh);  
    if ($("#totperH").val().length != 0){
        //Si no es vacio
        if (totperh < 5001){
            //es menor a 5001
            if (totperh > 0){
                //es distinto de cero
                $("#totperH").text(number_format(totperh,0,'.',','));
                $("#msg2").hide();
                $("#peventualH").focus();
                $("#peventualH").select();            
            } else {
                //es cero
                //alert("cero");
                $("#totperH").val(0);
                $("#peventualH").val(0);
                $("#pepermanenteH").text(0);
            }
        } else {
            $("#msg5").hide();
            $("#msg2").show();  
            $("#totperH").val(0);
        }    
    } else {
         $("#totperH").val(0);
         $("#peventualH").focus();
    }
    //$("#peventualH").focus();
});

$("#peventualM").blur( function () {   
    //se llama cuando cambia personal permanente o eventual mujeres    
    var t1 = formatinteger( $("#totperM").val() ),  h2 = formatinteger( $("#peventualM").val() ), h1, iH1, iH2; 
    if (h2!=''){
        $("#msg4").hide();
        $("#msg2").hide();
        //alert(t1);
        //alert(h2);
        h1 = t1 - h2;
        //alert(h1);
        if (h1 >= 0) {            
            $("#pepermanenteM").text(number_format(h1,0,'',','));
            $("#pepermanenteM").show();
            $("#msg4").hide();
            $("#totperHM").select();
            //console.log(subtotal);                   
        } else {
            $("#msg2").text('La cantidad de personal eventual Hombres no puede ser mayor que el Total Hombres reportado, vuelva a escribirlo');
            $("#msg2").show();
            $("#peventualM").val(0);
            $("#peventualM").focus();  
        }
    }    
} );

$("#totperM").blur( function () {
    //cuando sale de total personal hombres
    var totperm;
    totperm = formatinteger( $("#totperM").val() );
    //alert(totperh);    
    if ($("#totperM").val().length != 0){
        if (totperm < 5001){
            if (totperm > 0){
                $("#totperM").text(number_format(totperm,0,'.',','));
                $("#msg2").hide();
                $("#peventualM").focus();
                $("#peventualM").select();
                } else {
                    $("#totperM").val(0);
                    $("#peventualM").val(0);
                    $("#pepermanenteM").text(0);
                    if ($("#totperH").val() == 0){
                        $("#totperHM").val(0);
                        $("#peventual").val(0);
                        $("#pepermanente").text(0);
                    }                           
                }
        } else {
            $("#msg5").hide();
            $("#msg2").show();            
        }
    } else {
        $("#totperM").val(0);
        $("#totperHM").focus();
    }
    //$("#peventualM").focus();    
});

$("#peventual").blur( function () {
    //se llama cuando cambia sueldos y salarios del personal eventual
    var t1 = formatinteger( $("#totperHM").val() ),  h2 = formatinteger( $("#peventual").val() ), h1, suma, control;
    
    if ( $("#peventual").val().length != 0){
        $("#msg5").hide();
        $("#msg2").hide();
        //alert(t1);
        //alert(h2);
        if (h2 > 0) {
            var peventualh = formatinteger( $("#peventualH").val() );
            var peventualm = formatinteger( $("#peventualM").val() );
            suma = parseFloat(peventualh) + parseFloat(peventualm);
            //alert(suma);
            control = parseFloat(720) * suma;
            //alert(control);
            //alert(totsspe);            
        /*if (parseFloat(h2) >= parseFloat(control)){            */
            h1 = t1 - h2;
        //alert(h1);
        if ( h1 >= 0) {
            //alert(t1);
            //alert(h2);
            $("#pepermanente").text(number_format(h1,0,'',','));
            $("#pepermanente").show();
            $("#msg5").hide();
            $("#nopagH").val(0);
            $("#nopagH").focus();     
            $("#nopagH").select();
            //console.log(subtotal);
        } else {
                $("#msg2").show();        
                $("#peventual").val(0);                
                $("#nopagH").focus();
            }            
        /*} else {
            alert("Revisar el monto que registra, puede que no sea el correcto");
                $("#peventual").val(0);
                $("#peventual").focus();
            }*/
        } else {            
            $("#peventual").val(0);
            $("#nopagH").focus();
        }
    } else {        
        $("#peventual").val(0);
        $("#nopagH").focus();
    }
});

$("#totperHM").blur( function () {
    //se llama cuando cambia personal eventual
    var totsspe, totperh, totperm, suma, control;
    totsspe = formatinteger( $("#totperHM").val() );
    totperh = formatinteger( $("#totperH").val() );
    totperm = formatinteger( $("#totperM").val() );
    //alert(totperh);
    //alert(totperm);
    //alert(totsspe);
    
    if ( $("#totperHM").val().length != 0) {
        if (totsspe > 0){
            suma = parseFloat(totperh) + parseFloat(totperm);
            //alert(suma);
            control = parseFloat(720) * suma;
            //alert(control);
            //alert(totsspe);            
            /*if (parseFloat(totsspe) >= parseFloat(control)){*/
                $("#totperHM").text(number_format(totsspe,0,'.',','));
                $("#pepermanente").text(number_format(totsspe,0,'.',','));
                //$("#pepermanente").show();       //muestra el
                $("#peventual").val(0);            //
                $("#peventual").show();            //muestra el
                $("#peventual").select();
                /*
            } else {
                alert("Revisar el monto que registra, puede que no sea el correcto");
                $("#totperHM").val(0);
                $("#totperHM").focus();
            }*/
        }  else {
            $("#totperHM").val(0);
            $("#peventual").val(0);
            $("#pepermanente").text(0);
            $("#peventual").focus();
        }        
    } else {
        $("#totperHM").val(0);
        $("#peventualH").focus();
    }  
} );

//-------------------------------------------------------------------------hasta aqui----------------
/*
function subTotal( tipo ) {
    //calcula los subtotales de la fila 3
    var tot;
    switch( tipo ){
        case "sueldo": 
        var s1 = $("#pepermanente").val(), s2=$("#peventual").val(), iS1=0, iS2=0;
        iS1 = s1.replace(/,/g, "");
        iS2 = s2.replace(/,/g, "");                
        tot = parseFloat( iS1 ) + parseFloat( iS2 );    //total de sueldos
        break;
        default: tot = 0; break;
    }       
    tot = verifyNaN(tot)
    return tot;
}
*/

function formatinteger( numero ) {
    numero = numero.replace(/,/g, ""); 
    numero = verifyNaN(numero);
    return numero;
}

function verifyNaN(numero)
{
   if (isNaN(numero)) 
     return 0;
 else
     return numero;
}
} );

function saveUPD(inp){
    if (inp==1) {
        $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
        var datos="pack=1&pepermanenteH="+$("#pepermanenteH").val()+"&pepermanenteM="+$("#pepermanenteM").val()+"&pepermanente="+$("#pepermanente").val();
        $.ajax({
            type:"POST",
            url: "acap2Upd.php",
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
        url: "acap2Upd.php",
        cache: false,
        data: "pack=2&peventualH="+$("#peventualH").val()+"&peventualM="+$("#peventualM").val()+"&peventual="+$("#peventual").val(),
        success: function (data) {
            $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
        },
        complete: function (data) {
          $("#statusACAP1").fadeOut(1600, "linear");
      }
  });  
  };
}
