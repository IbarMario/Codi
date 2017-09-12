$(document).ready(function (){
$("#r_620").html($("#620").val());
$("#r_623").html($("#623").val());
$("#r_629").html($("#629").val());
$("#r_636").html($("#636").val());
numerico();

$("input").blur(function(){
$("#statusACAP1").show();
setInterval(function(){  $("#statusACAP1").hide(); },2000);
});


var emptyTextBoxes = $('input:text').not('#input7069', '#646').filter(function() { return this.value == ""; });
emptyTextBoxes.each(function() {
    $(this).val("0")
});


$("#640_in").click(function (){

if ($('#640_in').attr('checked')) {
     // alert('si esta marcado');
     $("#input7069").val("");
     $("#640_out").show();
}
else {
  $("#640_out").hide();
$("#input7069").val("");
}

});

$("#628").blur(function (){
if ($("#628").val()!=0) {
$("#re610").show();
}else{
$("#re610").hide();
};
});



});

$("#539").blur(function (){

var a539 = $("#539").val();
        
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
}); 
};

function suma1 () {
    var suma=parseFloat($("#611").val())+parseFloat($("#612").val())+parseFloat($("#613").val())+parseFloat($("#614").val())+parseFloat($("#615").val())+parseFloat($("#616").val())+parseFloat($("#617").val())+parseFloat($("#618").val())+parseFloat($("#619").val());
  $("#r_620").html(suma);
  $("#620").val(suma);
}

function suma2 () {
    var suma2 =parseFloat($("#621").val())+parseFloat($("#622").val());
      $("#r_623").html(suma2);
  $("#623").val(suma2);
}
function suma3 () {
    var suma3 =parseFloat($("#624").val())+parseFloat($("#625").val())+parseFloat($("#626").val())+parseFloat($("#627").val())+parseFloat($("#628").val());
      $("#r_629").html(suma3);
  $("#629").val(suma3);
}
function suma4 () {
    var suma4 =parseFloat($("#631").val())+parseFloat($("#632").val())+parseFloat($("#633").val())+parseFloat($("#634").val())+parseFloat($("#635").val())+parseFloat($("#637").val());
      $("#r_636").html(suma4);
  $("#636").val(suma4);
}