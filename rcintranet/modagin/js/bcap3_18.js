$(document).ready(function (){
$("input[type=checkbox]").click(function (){
//alert($(this).attr("id"));
if ($(this).attr("id")==674) {
$("#676").attr('checked', false);
$("#675").attr('checked', false);
};
if ($(this).attr("id")==675) {
$("#676").attr('checked', false);
$("#674").attr('checked', false);
};
if ($(this).attr("id")==676) {
$("#674").attr('checked', false);
$("#675").attr('checked', false);
};
if ($(this).attr("id")==677) {
$("#678").attr('checked', false);
$("#te_677").show();
};
if ($(this).attr("id")==678) {
$("#677").attr('checked', false);
$("#te_677").hide();
$("#679").val("");
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
   });
 

};