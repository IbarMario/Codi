$(document).ready( function() {
    
    $("#capitaltotal").focus();
    
    if ($("#capitaltotal").val().length > 0 ){
        $("#sendData").focus();
    } else {
        $("#capitaltotal").focus();
    }
                
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
    
$("#capitaltotal").blur( function(){
    var tam = $("#capitaltotal").val().length;
    //alert(tam);
    if (tam > 0 ) {
        var v1;
        v1 = formatinteger( $("#capitaltotal").val() );
        $("#capitaltotal").text( number_format(v1,0,'.',',') );
        $("#input-13").focus();
        $("#input-13").select();
    } else {
        alert("Verificar los datos que registra.....");
        $(this).focus();
    }
});

$("#input-13 ").blur( function(){
    if ($("#input-13").val().length > 0){
        var v1, v2, v3, tot;
        v1 = formatinteger( $("#capitaltotal").val() );
        v2 = formatinteger( $("#input-12").val() );
        v3 = formatinteger( $("#input-13").val() );        
        if (v1 >= (v2+v3)) {
            tot = v1 - ( v2 + v3);
            //$("#input-11").text( number_format(tot,2,'.',',') );
            $("#msg").hide();            
            $("#input-12").focus();
            $("#input-12").select();
        } else {
            $("#msg").show();
            $("#input-13").val(0);
            $("#input-12").val(0);
            $("#input-13").select();
            //$("#input-11").text( number_format(v1,2,'.',',') );
        }
    } else {
        alert("Verificar los datos que registra.....");
        $("#input-12").focus();
    }
} );
    
$("#input-12").blur( function(){
    if ($("#input-12").val().length > 0){
        var v1, v2, v3, tot;
        v1 = formatinteger( $("#capitaltotal").val() );
        v2 = formatinteger( $("#input-12").val() );
        v3 = formatinteger( $("#input-13").val() );        
        if (v1 >= (v2+v3)) {
            tot = v1 - ( v2 + v3);                
            $("#input-11").text( number_format(tot,2,'.',',') );            
            $("#msg").hide();
            $("#input-15").select();
        } else {
            $("#msg").show();
            $("#input-12").val(0);
            $("#input-13").val(0);
            $("#input-12").select();
            $("#input-11").text( number_format(v1,2,'.',',') );            
        }
    } else {
        alert("Verificar los datos que registra.....");
        $("#input-12").focus();
        $("#input-12").select();        
    }    
} );

$("#input-15").click( function() {
    //if ($("#input-15").val().length > 0 ){
        if (formatinteger( $("#capitaltotal").val()) > 0) {
             $("#sendData").focus();
        } else {
            alert("Introduzca valor para el Capital...");
            $("#capitaltotal").focus();
            $("#capitaltotal").select();
        }
    //} else {
    //    $("#capitaltotal").focus();
    //}
    $("#msg2").hide();
});

$("#sendData").click( function (){
    var captot = $("#capitaltotal").val();
    var sw, sw2;
    captot = formatinteger( captot );
    /*
    if( captot > 0 ){
        $("#msg2").hide();
        sw = true;
    } else {
        $("#msg").show();
        return false;            
    }
    var patri = formatinteger( $("#input-15").val() );
    if(  patri > 0 ) {
        sw2 = true;
    } else {
        $("#msg2").show();
        return false;
    }
    */
    });      
});

function saveUPD(inp){
if (inp==1) {    
    $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
    var datos="pack=1&input-11="+$("#input-11").val()+"&input-12="+$("#input-12").val()+"&input-13="+$("#input-13").val()+"&input-15="+$("#input-15").val();
$.ajax({
            type:"POST",
            url: "acap10Upd.php",
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