$(document).ready( function() {    

    // numero 1,225 = 1225
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

 $("#rbtn_inversion2").click( function(){             
    $("#noopcion").show();
    $("#div_rbtn_inversion1").hide();
} );

 $("#rbtn_inversion1").click( function(){             
    $("#noopcion").hide();
    $("#div_rbtn_inversion1").hide();
    $("#otrasambiental").val("NINGUNA");
} );

 $("#chk_1, #chk_2").click( function(){ 
    $("#msg1").hide();
    $("#div_chk_1").hide(); 
});

 $("#chk_3").click( function(){    

    if( (this).checked ) {
        $("#inversionotros").show();
    } else {
        $("#inversionotros").hide();
    }
    $("#msg1").hide();
    $("#div_chk_1").hide(); 
} );

 $("#inversionotros").click( function() {
    $("#msg1").hide();
} );


 $("#certiambiental").click( function() {
    $("#msg2").hide();
} );

 $("#otrasambiental").click( function() {
    $("#msg3").hide();
} );


 $("#rbtn_cap1").click( function() {
    $("#div_rbtn_cap1").hide();
} );

 $("#rbtn_cap2").click( function() {
    $("#div_rbtn_cap1").hide();
} );



 $("#rbtn_agua1").click( function() {
    $("#div_rbtn_agua1").hide();
} );

 $("#rbtn_agua2").click( function() {
    $("#div_rbtn_agua1").hide();
} );




 $("#rbtn_ars1").click( function() {
    $("#div_rbtn_ars1").hide();
} );

 $("#rbtn_ars2").click( function() {
    $("#div_rbtn_ars1").hide();
} );




 $("#rbtn_certi1").click( function (){
    $("#sicertificacion").show();
    $("#sicertificacion_msg").show();
    $("#msg2").hide();
$("#div_rbtn_certi1").hide(); 
} );

 $("#rbtn_certi2").click( function (){
    $("#sicertificacion").hide();        
    $("#sicertificacion_msg").hide();        
    $("#msg2").hide();
    $("#div_rbtn_certi1").hide(); 
} );


 $("#rbtn_aga1").click( function (){
    $("#siotrasambiental").show();
    $("#siotrasambiental_msg").show();
    $("#msg3").hide();
        $("#div_rbtn_aga1").hide(); 
} );

 $("#rbtn_aga2").click( function (){
    $("#siotrasambiental").hide();        
    $("#siotrasambiental_msg").hide();        
    $("#msg3").hide();
    $("#div_rbtn_aga1").hide(); 
} );







 $("#sendData").click( function (){

    if (document.getElementById("rbtn_inversion2").checked) {
        /*
         if (document.getElementById("chk_1").checked == true || document.getElementById("chk_2").checked == true || document.getElementById("chk_3").checked == true ){
                sw1= true;
            } else {
                $("#div_chk_1").show(); 
                $('body').scrollTo('#chk_1', 500);
                return false;
            }*/
        };


/*
   var chkIsChecked = document.getElementById("chk_3").checked;                

   if( chkIsChecked ) {
    var otro1 = $("#inversionotros").val();
    if( otro1 == '' ){
        $("#msg1").show();
        $('body').scrollTo("#inversionotros", 500);
        //return false;
    } else {
        $("#msg1").hide();
    }
    
    
}

var rbtn_certi1 = document.getElementById("rbtn_certi1").checked;
if(rbtn_certi1) {
    var leastOne =0;      
    $('#sicertificacion2').find('input').each( function(x,el){

        if($(el).val()!='') {
            leastOne=1;
        };

        $(el).click(function(){
            $("#msg4").hide();
        });

    });
    if( leastOne == 0 ){
        $("#msg4").show();
        $('body').scrollTo("#rbtn_certi1", 500);
        return false;
    } else {
        $("#msg4").hide();
    }    
};


var rbtn_aga1 = document.getElementById("rbtn_aga1").checked;
if(rbtn_aga1) {
    var leastOne =0;      
    $('#siotrasambiental2').find('input').each( function(x,el){

        if($(el).val()!='') {
            leastOne=1;
        };

        $(el).click(function(){
            $("#msg5").hide();
        });

    });
    if( leastOne == 0 ){
        $("#msg5").show();
        $('body').scrollTo("#rbtn_aga2", 500);
        return false;
    } else {
        $("#msg5").hide();
    }    
}



if (document.getElementById("rbtn_inversion1").checked || document.getElementById("rbtn_inversion2").checked) {
sw1=1;
}else{
$("#div_rbtn_inversion1").show(); 
$('body').scrollTo('#rbtn_inversion1', 500);
return false;
}

if (document.getElementById("rbtn_agua1").checked || document.getElementById("rbtn_agua2").checked) {
sw1=1;
}else{
$("#div_rbtn_agua1").show(); 
$('body').scrollTo('#rbtn_agua1', 500);
return false;
}

if (document.getElementById("rbtn_certi1").checked || document.getElementById("rbtn_certi2").checked) {
sw1=1;
}else{
$("#div_rbtn_certi1").show(); 
$('body').scrollTo('#rbtn_certi1', 500);
return false;
}

if (document.getElementById("rbtn_ars1").checked || document.getElementById("rbtn_ars2").checked) {
sw1=1;
}else{
$("#div_rbtn_ars1").show(); 
$('body').scrollTo('#rbtn_ars1', 500);
return false;
}

if (document.getElementById("rbtn_cap1").checked || document.getElementById("rbtn_cap2").checked) {
sw1=1;
}else{
$("#div_rbtn_cap1").show(); 
$('body').scrollTo('#rbtn_cap1', 500);
return false;
}


if (document.getElementById("rbtn_aga1").checked || document.getElementById("rbtn_aga2").checked) {
sw1=1;
}else{
$("#div_rbtn_aga1").show(); 
$('body').scrollTo('#rbtn_aga1', 500);
return false;
}


*/


        //  if( rbtn_certi1 ) {
        //     var otro2 = $("#certiambiental").val();
        //     if( otro2 == '' ){
        //         $("#msg2").show();
        //         $('body').scrollTo("#certiambiental", 500);
        //         return false;
        //     } else {
        //         $("#msg2").hide();
        //     }
        // }        

        // var aga1 = document.getElementById("rbtn_aga1").checked;
        // if( aga1 ) {
        //     var otro3 = $("#otrasambiental").val();
        //     if( otro3 == '' ){
        //         $("#msg3").show();
        //         $('body').scrollTo("#otrasambiental", 500);
        //         return false;
        //     } else {
        //         $("#msg3").hide();
        //         return true;
        //     }
        // }

    });





$("#addcertificacion").click( function( event ){                    

    event.preventDefault();        
    var nextrow = formatinteger( $("#maxrow").val() ) + 1;        
    $("#maxrow").val( nextrow );

    $("#siotrasambiental2 > tbody").append('<tr id="row_'+nextrow+'">'
      +'<td width="40%" align="center"><input name="otrasambiental_'+nextrow+'" class="inpC" type="text" id="otrasambiental" size="60" value="" onKeyUp="this.value = this.value.toUpperCase();" required pattern="[A-Z0-9 ]*" /></td>'
      +'<td width="5%" align="center"><a href="#" class="lnkCls" id="delcert" onclick="delRow('+nextrow+'); return false;" >eliminar</a>  </td>'
      +'</tr>');        
} );           





$("#addcertificacion2").click( function( event ){                    

    event.preventDefault();        
    var nextrow = formatinteger( $("#maxrow2").val() ) + 1;        
    $("#maxrow2").val( nextrow );

    $("#sicertificacion2 > tbody").append('<tr id="row2_'+nextrow+'">'
      +'<td width="40%" align="center"><input name="ceram_'+nextrow+'" class="inpC" type="text" id="otrasambiental" size="60" value="" /></td>'
      +'<td width="5%" align="center"><a href="#" class="lnkCls" id="delcert" onclick="delRow2('+nextrow+'); return false;" >eliminar</a>  </td>'
      +'</tr>');        
} );           



});



function delRow( numero ) {       

    //var evento = this.event;
    //event.preventDefault();
    var co = confirm( "¿Esta seguro de eliminar este registro?" );
    if( co ) {                
        $.ajax( {
            url: "bcap1Del.php",
            data: "uid="+numero,
            type: "POST",
            success: function( ) {            
                $("#row_"+numero).hide();
                $("#row_"+numero).remove();                                
            }
        });
    }    
    //evento.preventDefault();
    //console.log(  );
    return false;        
}
function delRow2( numero ) {       

    //var evento = this.event;
    //event.preventDefault();
    var co = confirm( "¿Esta seguro de eliminar este registro?" );
    if( co ) {                
        $.ajax( {
            url: "bcap1Del2.php",
            data: "uid="+numero,
            type: "POST",
            success: function( ) {            
                $("#row2_"+numero).hide();
                $("#row2_"+numero).remove();                                
            }
        });
    }    
    //evento.preventDefault();
    //console.log(  );
    return false;        
}