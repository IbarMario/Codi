$(document).ready(function (){
$("input[type=checkbox]").click(function (){
// alert(this.id);
if (this.id==603) {
$("#603").attr('checked', true);
$("#605").attr('checked', false);
$("#604").attr('checked', false);
};
if (this.id==604) {
$("#604").attr('checked', true);
$("#605").attr('checked', false);
$("#603").attr('checked', false);
};
if (this.id==605) {
$("#605").attr('checked', true);
$("#603").attr('checked', false);
$("#604").attr('checked', false);
};
if (this.id==606) {
$("#606").attr('checked', true);
$("#607").attr('checked', false);
$("#te_606").show();
$("#608").val("");
$("#608").focus();
};
if (this.id==607) {
$("#606").attr('checked', false);
$("#607").attr('checked', true);
$("#te_606").hide();
$("#608").val("");
};
});
numerico();
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


$(document).ready(function (){
$("#sendData").click(function (){

 

  
sw=true;
if ($('#606').attr('checked')) {
if ($("#608").val()!="" && $("#608").val()!="0"){}else {
  $("#608").addClass("req");   
               $('body').scrollTo('#608', 500);

 sw = false;


              

};
               
}
           if (sw)       
           { return true; } else { return false; }
});
});