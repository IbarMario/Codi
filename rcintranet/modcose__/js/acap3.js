function showInputOtro( tipo ) {
    var cate;
    switch ( tipo ) {
        case "electricidad":  
            var inp1 = formatinteger($("#input-1").val()); 
            if( inp1 > 0 ) {
                var cate = $("#input-11").val(); 
                if( cate == 'OTRAS' ) {
                    $("#otroelectricidad").show();
                } else {
                    $("#otroelectricidad").val("");
                    $("#otroelectricidad").hide();
                }
            } else {            
                $("#input-11 option[value='']").attr("selected","selected");
            }
            $("#msg").hide();
            $("#msg3").hide();
            $("#otroelectricidad").removeClass("req");
            break;
        case "agua":  
            var inp2 = formatinteger($("#input-2").val()); 
            if( inp2 > 0 ) {
                cate = $("#input-12").val(); 
                if( cate == 'OTRAS' ) {
                    $("#otroagua").show();
                } else {
                    $("#otroagua").val("");
                    $("#otroagua").hide();
                }
            } else {            
                $("#input-12 option[value='']").attr("selected","selected");
            }
            $("#msg").hide();
            $("#msg3").hide();
            $("#otroagua").removeClass("req");
        break;
        case "gas":  
            var inp3 = formatinteger($("#input-3").val()); 
            if( inp3 > 0 ) {    
                cate = $("#input-13").val(); 
                if( cate == 'OTRAS' ) {
                    $("#otrogas").show();
                } else {
                    $("#otrogas").val("");
                    $("#otrogas").hide();
                }            
            } else {
                $("#input-13 option[value='']").attr("selected","selected");
            }
            $("#msg").hide();
            $("#msg3").hide();
            $("#otrogas").removeClass("req");
            break;
    }        
    //console.log( cate );

}
//----------------------modificado-----------------------
//----------------MDPyEP - VPIMGE

$(document).ready( function(){
    $("#input-1").focus();
    
    //cuando se hace click en el boton de enviar información
    $("#sendData").click( function(){
        var tot = formatinteger( $("#ai_totsuministros").val());        
        //alert($("#ai_totsuministros").val());
        //alert(tot);
        if( tot > 0 ) {   
        } else {
            $("#msg2").show();
            //return false;
        }
        
        /*
        var ct1 = $("#input-11").val(), ct2 = $("#input-12").val(), ct3 = $("#input-13").val();
        var sw1=1,sw2=1,sw3=1;       
        var inp1 = formatinteger($("#input-1").val());
        var inp2 = formatinteger($("#input-2").val());
        var inp3 = formatinteger($("#input-3").val());
        if (inp1 <= 0 || inp2 <= 0) {
            $("#msg2ik").show();
            return false;
        };
        
        if( ct1 == '' && inp1 > 0 ){
            $("#div_input-11").show();
            return false;
        }
        
        if( ct2 == '' && inp2 > 0 ){
            $("#div_input-12").show();
            return false;
        }
        
        if( ct3 == '' && inp3 > 0 ){
            $("#div_input-13").show();
            return false;
        }        
        
        var inp8 = formatinteger( $("#input-7").val() );
        
        if( inp8 > 0 ){
            var otroscomb = $("#input-8").val();
            if( otroscomb == '' ){
                $("#input-8").addClass("req");
                $("#msg4").show();
                return false;
            }
        }  */             
    });
    
    $("#input-1, #input-2, #input-3, #input-4, #input-5, #input-6").blur( function() {
        totalvalortarifa();        
        
        var myId = (this).id;
        if( myId == "input-1" ){
            var val1 = formatinteger($(this).val());
            if( val1 == 0 || val1 == '' ) {
                $("#input-11 option[value='']").attr("selected","selected");
                $("#otroelectricidad").val("");
                $("#otroelectricidad").hide();
                $("#input-2").focus();
                $("#input-2").select();
            }
        }
        
        if( myId == "input-2" ){
            var val1 = formatinteger($(this).val());          
            if( val1 == 0 || val1 == '' ) {
                $("#input-12 option[value='']").attr("selected","selected");
                $("#otroagua").val("");
                $("#otroagua").hide();
                $("#input-3").focus();
                $("#input-3").select();
            }
        }
        
        if( myId == "input-3" ){
            var val1 = formatinteger($(this).val());          
            if( val1 == 0 || val1 == '' ) {
                $("#input-13 option[value='']").attr("selected","selected");
                $("#otrogas").val("");
                $("#otrogas").hide();
                $("#input-4").focus();
                $("#input-4").select();
            }
        }        
    } );
        
    $("#input-7").blur( function() {
        var v = $(this).val();
        v = parseFloat( v );  
        if( v > 0 ) {            
            $("#input-8").show();                      
            $("#input-8").addClass("required");
            $("#input-8").val("");
            
        } else {
            $("#input-8").hide();
            $("#input-8").val("");
            $("#input-8").val("NINGUNA");
            $("#input-8").removeClass("required");
        }
        $("#msg4").hide();
        totalvalortarifa();        
    } );
    
    $("#input-8").blur( function() {               
        totalvalortarifa();        
        $("#msg4").hide();
    } );   
    
    $("#otroelectricidad").click(function(){
        $("#otroelectricidad").removeClass("req");
        $("#msg").hide();
    });
    
    $("#otroagua").click(function(){
        $("#otroagua").removeClass("req");
        $("#msg").hide();
    });
    
    $("#otrogas").click(function(){
        $("#otrogas").removeClass("req");
        $("#msg").hide();
    });
    
    function totalvalortarifa() {
        var v1, v2, v3, v4, v5, v6, v7, tot;
        v1 = formatinteger( $("#input-1").val() );
        //alert(v1);
        v2 = formatinteger( $("#input-2").val() );
        //alert(v2);
        v3 = formatinteger( $("#input-3").val() );
        //alert(v3);
        v4 = formatinteger( $("#input-4").val() );
        //alert(v4);
        v5 = formatinteger( $("#input-5").val() );
        //alert(v5);
        v6 = formatinteger( $("#input-6").val() );
        //alert(v6);
        v7 = formatinteger( $("#input-7").val() );
        //alert(v7);                
        tot = v1 + v2 + v3 + v4 + v5 + v6 + v7; 
        //alert("total");
        //alert(tot);                
        $("#ai_totsuministros").val(number_format(tot,0,'.',','));          
        if( tot > 0 ) {
            $("#msg2").hide();
            $("#msg2ik").hide();
        }
        //$("#totperH").val(subtotal);
    }  
});

function totalHM() {
    var t1 = $("#perH").text(); //hombre
    t1 = t1.replace(/,/g, "");

    var t2 = $("#perM").text(); //mujer
    t2 = t2.replace(/,/g, "");     

    var tot = parseFloat( t1 ) + parseFloat( t2 );

    tot = verifyNaN(tot)                
    return tot;
}

// numero 1,225 = 1225
    function formatinteger( numero ) {
        numero = numero.replace(/,/g, "");
        numero = parseFloat( numero );
        return verifyNaN(numero);        
    }
    
    function verifyNaN(numero){
       if (isNaN(numero)) 
         return 0;
       else
         return numero;
    }

function saveUPD(inp){
if (inp==1) {    
    $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
    var datos="pack=1&input-1="+$("#input-1").val()+"&input-11="+$("#input-11").val()+"&otroelectricidad="+$("#otroelectricidad").val();
$.ajax({
            type:"POST",
            url: "acap3Upd.php",
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
            url: "acap3Upd.php",
            cache: false,
            data: "pack=2&input-2="+$("#input-2").val()+"&input-12="+$("#input-12").val()+"&otroagua="+$("#otroagua").val(),
            success: function (data) {
                $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
            },
            complete: function (data) {
                  $("#statusACAP1").fadeOut(1600, "linear");
            }
});  
};
if (inp==3) {
    
    $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
    var datose="pack=3&input-3="+$("#input-3").val()+"&input-13="+$("#input-13").val();
$.ajax({
            type:"POST",
            url: "acap3Upd.php",
            cache: false,
            data: datose, 
            success: function (data) {
                $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
            },
            complete: function (data) {
                  $("#statusACAP1").fadeOut(1600, "linear");
            }
});
};
}