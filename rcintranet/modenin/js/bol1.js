$(document).ready( function(){
  $("#chkconforme").click(function (){
   var chkIsChecked = document.getElementById("chkconforme").checked;
   if( chkIsChecked ){
    $("#sendData").show();
  } else {
    $("#sendData").hide();
  }
});

  $("#sendData").click( function (){
        /*
        if( confirm(" ¿Esta seguro de finalizar el llenado de formularios? " ) ) {
            return true;
        } else {
            return false;
        }
        */
        if ($("#ai_nit").val()) {
          sw=true;
        }else{
          $("#ai_nit").addClass("req");  
          $("#div_ai_nit").show(); 
          return false;
        }
        if ($("#ai_ci").val()) {
          sw1=true;
        }else{
          $("#ai_ci").addClass("req");  
          $("#div_ai_ci").show(); 
          return false;
        }

        var chkIsChecked = document.getElementById("chkconforme").checked;
        
        if( chkIsChecked ){
          return true;
        } else {
          return false;
        }

      });
} );

