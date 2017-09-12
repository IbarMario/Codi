$(document).ready(function (){
$("#r_548").html($("#548").val());
$("#r_551").html($("#551").val());
$("#r_558").html($("#558").val());
$("#r_565").html($("#565").val());
numerico();

$("input").blur(function(){
$("#statusACAP1").show();
setInterval(function(){  $("#statusACAP1").hide(); },2000);
});


var emptyTextBoxes = $('input:text').not('#input7069, #610').filter(function() { return this.value == ""; });
emptyTextBoxes.each(function() {
    $(this).val("0")
});

$("#569_in").click(function (){

if ($('#569_in').attr('checked')) {
     // alert('si esta marcado');
     $("#input7069").val("");
     $("#569_out").show();
}
else {
  $("#569_out").hide();
$("#input7069").val("");
}

});

$("#557").blur(function (){
if ($("#557").val()!=0) {
$("#re610").show();
}else{
$("#re610").hide();
};
});
});

function formatinteger( numero ) {
        numero = numero.replace(/,/g, "");
        numero = parseInt( numero );
        return verifyNaN(numero);        
    }

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

function verifyNaN(numero) {
   if (isNaN(numero)) 
     return 0;
   else
     return numero;
}

function suma1 () {
  /*var a1 = formatinteger( $("#539").val() );
  alert(a1);
  alert(parseInt($("#539").val()));*/
  var suma=parseInt(formatinteger($("#539").val()))+parseInt(formatinteger($("#540").val()))+parseInt(formatinteger($("#541").val()))+parseInt(formatinteger($("#542").val()))+parseInt(formatinteger($("#543").val()))+parseInt(formatinteger($("#544").val()))+parseInt(formatinteger($("#545").val()))+parseInt(formatinteger($("#546").val()))+parseInt(formatinteger($("#547").val()));   
  $("#r_548").html(verifyNaN(suma));
  $("#548").val(verifyNaN(suma));
  $("#548").text( number_format(suma,0,'',',') );   
}

function suma2 () {
    var suma2 =parseInt(formatinteger($("#549").val()))+parseInt(formatinteger($("#550").val()));     
     $("#r_551").html(verifyNaN(suma2));
     $("#551").val(verifyNaN(suma2));
     $("#551").text( number_format(suma2,0,'',',') );   
}

function suma3 () {
    var suma3 =parseInt(formatinteger($("#553").val()))+parseInt(formatinteger($("#554").val()))+parseInt(formatinteger($("#555").val()))+parseInt(formatinteger($("#556").val()))+parseInt(formatinteger($("#557").val()));
    $("#r_558").html(verifyNaN(suma3));
    $("#558").val(verifyNaN(suma3));
    $("#558").text( number_format(suma3,0,'',',') );   
}

function suma4 () {
    var suma4 =parseInt(formatinteger($("#560").val()))+parseInt(formatinteger($("#561").val()))+parseInt(formatinteger($("#562").val()))+parseInt(formatinteger($("#563").val()))+parseInt(formatinteger($("#564").val()))+parseInt(formatinteger($("#566").val()));  
    $("#r_565").html(verifyNaN(suma4));
    $("#565").val(verifyNaN(suma4));
    $("#565").text( number_format(suma4,0,'',',') );   
}




/*
function suma1 () {
    /*var a1 = formatinteger( $("#539").val() );
    alert(a1);
    alert(parseInt($("#539").val()));
  var suma=parseInt($("#539").val())+parseInt($("#540").val())+parseInt($("#541").val())+parseInt($("#542").val())+parseInt($("#543").val())+parseInt($("#544").val())+parseInt($("#545").val())+parseInt($("#546").val())+parseInt($("#547").val());   
  $("#r_548").html(verifyNaN(suma));
  $("#548").val(verifyNaN(suma));
  $("#548").text( number_format(suma,0,'',',') );   
}

function suma2 () {
    var suma2 =parseInt($("#549").val())+parseInt($("#550").val());     
     $("#r_551").html(verifyNaN(suma2));
     $("#551").val(verifyNaN(suma2));
     $("#551").text( number_format(suma2,0,'',',') );   
}

function suma3 () {
    var suma3 =parseInt($("#553").val())+parseInt($("#554").val())+parseInt($("#555").val())+parseInt($("#556").val())+parseInt($("#557").val());
    $("#r_558").html(verifyNaN(suma3));
    $("#558").val(verifyNaN(suma3));
    $("#558").text( number_format(suma3,0,'',',') );   
}

function suma4 () {
    var suma4 =parseInt($("#560").val())+parseInt($("#561").val())+parseInt($("#562").val())+parseInt($("#563").val())+parseInt($("#564").val())+parseInt($("#566").val());  
    $("#r_565").html(verifyNaN(suma4));
    $("#565").val(verifyNaN(suma4));
    $("#565").text( number_format(suma4,0,'',',') );   
}*/

$(document).ready(function (){
$("#sendData").click(function (){

if ($("#557").val()!=0) {
if ($("#610").val()=="") {
  $("#610").addClass("req");   
               $('body').scrollTo('#610', 500);
 return false;
 sw = false;
              
};
               
}
           if (sw)       
           { return true; } else { return false; }
});
});