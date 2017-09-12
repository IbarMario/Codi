$(document).ready(function (){
    ///tabla Rowa_a

$("input").blur(function(){
$("#statusACAP1").show();
setInterval(function(){  $("#statusACAP1").hide(); },2000);
});

    
    $("#addrow_a").click( function( event ){                                        
        event.preventDefault();        
        var nextrow = formatinteger( $("#maxrow_a").val() );        
        $("#maxrow_a").val( nextrow );            
        var myrow;
        myrow = '<tr id="rowa_'+nextrow+'" >'
        myrow = myrow + '<td width="13%"><input type="text" name="A_'+nextrow+'" id="A_'+nextrow+'" size="40" class="inpC2" /></td>';
        myrow = myrow + '<td width="6%" ><input type="text" name="C_'+nextrow+'" id="C_'+nextrow+'" size="40" class="inpC2" /></td>';
        myrow = myrow + '<td width="12%"><input type="text" name="B_'+nextrow+'" id="B_'+nextrow+'" size="10" class="inpB2 validar"  /></td>';        
        myrow = myrow + '<td width="5%" ><a href="#" class="lnkCls" id="delplan_'+nextrow+'" onclick="delRow('+nextrow+',0,\'a\'); " >eliminar</a></td>';
        myrow = myrow + '</tr>';        
        $("#table_a > tbody").append(myrow);
        
        nextrow = nextrow + 1;
        $("#maxrow_a").val( nextrow );
        
        $('.numeric').priceFormat({
            prefix: '',
            thousandsSeparator: ',',
            limit: 12,
            centsSeparator: '',
            centsLimit: 0
        });
        numerico();
    } );
//fin
    numerico();
////NO
$("#575_no").click(function (){
if ($('#575_no').attr('checked')) {
    //limpiar tabla SI
    $("#A_1, #B_1, #C_1, #A_2, #B_2, #C_2, #A_3, #B_3, #C_3, #A_4, #B_4, #C_4, #A_5, #B_5, #C_5, #A_6, #B_6, #C_6, #A_7, #B_7, #C_7").val("");
    //limpiar tabla SI fin
    $("#575_div_si").hide();
     $("#575_div_no").show();
}
});
///por que otros

$("#579_in").click(function (){
//alert("click");
if ($('#579_in').attr('checked')) {
     // alert('si esta marcado');
     $("#input8079").val("");
     $("#579_out").show();
}
else {
     // alert('no esta marcado');
$("#579_out").hide();
$("#input8079").val("");
};

});
///SI
$("#575_si").click(function (){
if ($('#575_si').attr('checked')) {
    $("#579_in").attr('checked', false);
    $("#577").attr('checked', false);
    $("#578").attr('checked', false);
    $("#579_out").hide();
    $("#input8079").val("");
     $("#575_div_no").hide();
     $("#575_div_si").show();
}
});
//SI 602
$("#602_si").click(function (){
if ($('#602_si').attr('checked')) {
     $("#602_div_si").show();
}
});
//NO 602
$("#602_no").click(function (){
if ($('#602_no').attr('checked')) {
    $("#602_div_si").hide();
     
}
});
});
$("input:text").blur(function (){
$("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
$("#statusACAP1").show();
setInterval(function(){  $("#statusACAP1").hide(); },1500);
});


function numerico () {
 $(".validar").keydown(function(event) {
   if(event.shiftKey)
   {
        event.preventDefault();
   }
  
   if(event.keyCode!=9)
   {
   
   
 
   if (event.keyCode == 46 || event.keyCode == 8)    {
   }
   else {
        if (event.keyCode < 95) {
          if (event.keyCode < 48 || event.keyCode > 57) {
                event.preventDefault();
          }
        }
        else {
              if (event.keyCode < 96 || event.keyCode > 105) {
                  event.preventDefault();
              }
        }
      }
       }
   });
$(".validar").blur(function(){
$(this).val(parseInt(this.value));
if ($(this).val()=="NaN") { $(this).val("0")};
}); 

};

//tablas
function formatinteger( numero ) {
    numero = parseInt( numero );
    return verifyNaN(numero);        
}

function verifyNaN(numero) {
   if (isNaN(numero)) 
     return 0;
   else
     return numero;
}
function delRow( numero, sw, reg ) {
    var co = confirm( "¿Esta seguro de eliminar este registro?" );
    if( co ) {
                                                
    if( sw == 1 ) {
        $.ajax( {
            url: "bcap1Del.php",
            data: "uid="+numero+"&reg="+reg,
            type: "POST",
            success: function( ) {            
                $("#row"+reg+"_"+numero).hide();
                $("#row"+reg+"_"+numero).remove();                                
            }
        });
    } else {
        $("#row"+reg+"_"+numero).hide();
        $("#row"+reg+"_"+numero).remove();
        var nextrow = formatinteger( $("#maxrow_"+reg).val() ) - 1;        
        $("#maxrow_"+reg).val( nextrow ); 
    }
       
   
    
    }    

            
}
$(document).ready(function (){

$("#A_1, #B_1, #C_1, #A_2, #B_2, #C_2, #A_3, #B_3, #C_3, #A_4, #B_4, #C_4, #A_5, #B_5, #C_5, #A_6, #B_6, #C_6, #A_7, #B_7, #C_7").focus(function(){
 $("#msge1").hide();
 $("#msge2").hide();
 $("#msge3").hide();   
})

// for (i=1;i<8;i++)
//   {


//   $("#575_div_si").append("sw"+i+" && ");
//   $("#"+i).val(i);
//   }




$("#sendData").click(function (){



for (var i = 1; i < 8; i++) {
if ($("#A_"+i).val()!="") {
    if ($("#B_"+i).val()!=0 && $("#B_"+i).val()!="") { 
        if ($("#C_"+i).val()!="0" && $("#C_"+i).val()!="") {sw = true;}else{
            $("#msge2").show();  
         
        sw = false; break;
        
        }
    }else{
        $("#msge1").show();
        
        sw = false; break;
        
    }
};

if ($("#C_"+i).val()!="0" && $("#C_"+i).val()!="") {
    if ($("#A_"+i).val()!="") {
        if ($("#B_"+i).val()!="0" && $("#B_"+i).val()!="") {sw = true;}else{
            $("#msge1").show();
            
        sw = false; break;
          
        }
    }else{
         $("#msge3").show();
        
        sw = false; break;
       
    }
};

if ($("#B_"+i).val()!="0" && $("#B_"+i).val()!="" ) {
    if ($("#C_"+i).val()!="0" && $("#C_"+i).val()!="") {
        if ($("#A_"+i).val()!="") {sw = true;}else{
            $("#msge3").show();  
            
        sw = false; break;
        
        }
    }else{
        $("#msge2").show();
        
        sw = false; break;
        
    }
};
};

sw2=true;
if ($('#579_in').attr('checked')) {
if ($("#input8079").val()!=""){}else {
  $("#input8079").addClass("req");   
               $('body').scrollTo('#input8079', 500);
 
 sw2 = false; return false;
 
              

};
               
}
if (sw && sw2)       
           { return true; } else { return false; }

          
});
});