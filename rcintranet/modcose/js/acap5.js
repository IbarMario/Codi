
$(document).ready( function() {
//--------modcose  actual se modifico ---
//------------MDPyEP  - VPIMGE ----------
//--------------- 16-04-2015 ------------      
$("#otros_gastos").focus();


$("#otros_gastos").blur( function () {
    //se llama cuando cambia personal eventual    
    if ( $("#otros_gastos").val().length == 0) {
        alert("No puede registrar este dato sin valor.");
        $("#otros_gastos").valor(0);
    } else {
      var totsspe;
      totsspe = formatinteger( $("#otros_gastos").val() );
    } 
} );

function totalHM() {
    var t1 = $("#perH").text(); //hombre
    t1 = t1.replace(/,/g, "");

    var t2 = $("#perM").text(); //mujer
    t2 = t2.replace(/,/g, "");     

    var tot = parseInt( t1 ) + parseInt( t2 );

    tot = verifyNaN(tot)                
    return tot;
}       

function formatinteger( numero ) {
    numero = numero.replace(/,/g, "");
    numero = parseInt( numero );
    return verifyNaN(numero);        
}
    

function saveUPD(inp){
if (inp==1) {
    
    $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
    var datos="pack=1&otros_gastos="+$("#otros_gastos").val();
$.ajax({
            type:"POST",
            url: "acap5Upd.php",
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
} );