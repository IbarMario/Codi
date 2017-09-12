
$(document).ready(function (){
$("#sendData").click( function (e){
  return true;
});



//suma1();
//suma2();
//suma3();
//suma4();
//suma5();
   
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

$("#A_1, #A_2, #A_3").blur( function(){
        var a1, a2, a3, suma1;
        a1 = formatinteger( $("#A_1").val() );
        a2 = formatinteger( $("#A_2").val() );
        a3 = formatinteger( $("#A_3").val() );                
        suma1 = parseInt(a1) + parseInt(a2) + parseInt(a3);        
        //alert(suma1);
        $("#r_A").text( number_format(suma1,0,'',',') );
});

$("#B_1, #B_2, #B_3").blur( function(){
        var a1, a2, a3, suma2;
        a1 = formatinteger( $("#B_1").val() );
        a2 = formatinteger( $("#B_2").val() );
        a3 = formatinteger( $("#B_3").val() );                
        suma2 = parseInt(a1) + parseInt(a2) + parseInt(a3);                
        $("#r_B").text( number_format(suma2,0,'',',') );
});

$("#C_2, #C_3").blur( function(){
        var a2, a3, suma3;        
        a2 = formatinteger( $("#C_2").val() );
        a3 = formatinteger( $("#C_3").val() );                        
        suma3 =  parseInt(a2) + parseInt(a3);   
        //alert(suma3);
        $("#r_C").text( number_format(suma3,0,'',',') );
});

$("#D_2, #D_3").blur( function(){
        var a2, a3, suma4;        
        a2 = formatinteger( $("#D_2").val() );
        a3 = formatinteger( $("#D_3").val() );                
        suma4 = parseInt(a2) + parseInt(a3);
        //alert(suma4);
        $("#r_D").text( number_format(suma4,0,'',',') );
});

$("#E_2, #E_3").blur( function(){
        var a2, a3, suma5;        
        a2 = formatinteger( $("#E_2").val() );
        a3 = formatinteger( $("#E_3").val() );        
        suma5 = parseInt(a2) + parseInt(a3);
        //alert(suma5);        
        $("#r_E").text( number_format(suma5,0,'',',') );
});

});




/*

function suma1 () {
    var suma=parseFloat( formatinteger($("#A_1").val())) + parseFloat(formatinteger($("#A_2").val())) + parseFloat(formatinteger($("#A_3").val()));
    //number_format(suma,0,'',',')
    suma = number_format(suma,0,'',',')
    $("#r_A").text(suma);
    //$("#r_A").html(suma);
}

function suma2 () {
    var suma2 =parseFloat($("#B_1").val())+parseFloat($("#B_2").val())+parseFloat($("#B_3").val());
    suma2 = number_format(suma2,0,'',',')
    $("#r_B").text(suma2);
      //$("#r_B").html(suma2);
  }
  
function suma3 () {
    var suma3 =parseFloat($("#C_2").val())+parseFloat($("#C_3").val());
    suma3 = number_format(suma3,0,'',',')
    $("#r_C").text(suma3);
    //$("#r_C").html(suma3);
}

function suma4 () {
    var suma4 =parseFloat($("#D_2").val())+parseFloat($("#D_3").val());
      //$("#r_D").html(suma4);
      suma4 = number_format(suma4,0,'',',')
      $("#r_D").text(suma4);
}

function suma5 () {
    var suma5 =parseFloat($("#E_2").val())+parseFloat($("#E_3").val());
      //$("#r_E").html(suma5);
      suma5 = number_format(suma5,0,'',',')
      $("#r_E").text(suma5);
}
*/



function saveUPD(inp){
    var sw=0;    
    switch( inp ) {
        case 1: sw = 1; break;
    }
    
    if( sw == 1 ) {
        $.ajax({
            type:"POST",
            url: "dcap1eUpd.php",
            cache: false,
            data: $(".formA").serialize()+'&tabla='+inp,
            success: function (data) {
                $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
            }
        });
                
        $("#statusACAP1").hide(1600);
    }
    
}
