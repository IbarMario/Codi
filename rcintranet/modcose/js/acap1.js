//modcose  se toma como base para todo el proyecto
$(document).ready( function() {    
  numerico();
  $("#sendData").click( function() {

    var regex = /^\w+([\.\-\w]+)?\.([a-z]{2,4}|travel)(:\d{2,5})?(\/.*)?$/i;
    var input = document.getElementById("ai_pagweb").value;
    if (input) {
      if(regex.test(input)) {
        return true;
      } else {
        $("#ai_pagweb").addClass("req");  
        $("#div_ai_pagweb_2").show(); 
        $('body').scrollTo('#ai_pagweb', 500);
        return false;
      }
    }

    if ( $("#ai_phone2").val()=="" && $("#ai_phone1").val()=="" && $("#ai_phone3").val()=="" && $("#ai_phone4").val()=="")
    {
     sw = false; 
     $("#div_ai_phone1").show(); 
     $("#ai_phone1").addClass("req");   
     $('body').scrollTo('#ai_phone1', 500);

     return false;
   } else { 
     sw = true; 
   }

   if (document.getElementById("afil_1").checked == true || document.getElementById("afil_2").checked == true || document.getElementById("afil_3").checked == true || document.getElementById("afil_4").checked == true || document.getElementById("afil_5").checked == true ) 
   {
     sw1= true;
   } else {
     sw1= false; 
     $("#div_ai_afil1").show(); 
     $('body').scrollTo('#afil_1', 500);
     return false;
   }
   if (document.getElementById("afil_4").checked && $("#afil_otros").val()=="" ) {
    $("#afil_otros").addClass("req");
    $("#div_afil_otros").show(); 
    $('body').scrollTo('#afil_otros', 500);
    return false;
  };   

  if (sw && sw1)       
   { return true; } else { return false; }

});


    $("#ai_actsec1").blur( function() {
        if ($("#ai_actsec1").val().length == 0){
            $("#ai_actsec1").val("");
        }
    } );

    $("#ai_actsec2").blur( function() {
        if ($("#ai_actsec2").val().length == 0){
            $("#ai_actsec2").val("");
        }
    } );

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
  if ($(this).val()=="NaN") { $(this).val("")};
}); 

};

function showMunicipios(){   
  var uid;
  uid = document.getElementById("ai_provin").value;    	
  $.ajax({
   type: "POST",
   url: "municipiosList.php",
   data: "uid="+uid,
   success: function( resp ){		  
    $("#areamunicipio").html(resp);		  
  }
});   
};

function showProvin(){   
  var uid;
  uid = document.getElementById("ai_depto").value;      
  $.ajax({
    type: "POST",
    url: "provinciList.php",
    data: "uid="+uid,
    success: function( resp ){      
      $("#areaprovincia").html(resp);     
    }
  });   
};

function showAfilCamara() {        
  var chkIsChecked = document.getElementById("afil_1").checked;
  if( chkIsChecked ) {
    $("#afil_camara").show();
    document.getElementById("afil_5").checked = false;
  } else {
    //$("#afil_camara").val("");
    $("#afil_camara").hide();
  } 
  $("#div_ai_afil1").hide();
};

function showAfilFederacion() {        
  var chkIsChecked = document.getElementById("afil_2").checked;
  if( chkIsChecked ) {
    $("#afil_federacion").show();
    document.getElementById("afil_5").checked = false;
  } else {
    //$("#afil_federacion").val("");
    $("#afil_federacion").hide();
  }
  $("#div_ai_afil1").hide();
};

function showAfilAsociacion() {        
  var chkIsChecked = document.getElementById("afil_3").checked;
  if( chkIsChecked ) {
    $("#afil_asociacion").show();
    document.getElementById("afil_5").checked = false;
  } else {
    //$("#afil_asociacion").val("");
    $("#afil_asociacion").hide();
  }
  $("#div_ai_afil1").hide();
};

function showAfilOtros() {        
  var chkIsChecked = document.getElementById("afil_4").checked;
  if( chkIsChecked ) {
    $("#afil_otros").show();
    document.getElementById("afil_5").checked = false;
  } else {
    //$("#afil_otros").val("");
    $("#afil_otros").hide();
  }
  $("#div_ai_afil1").hide();
};

function showAfilNinguno() {
  var chkIsChecked = document.getElementById("afil_5").checked;
  if( chkIsChecked ) {
    document.getElementById("afil_1").checked = false;
    document.getElementById("afil_2").checked = false;
    document.getElementById("afil_3").checked = false;
    document.getElementById("afil_4").checked = false;
    //$("#afil_camara").val("NINGUNA");
    $("#afil_camara").hide();
    //$("#afil_federacion").val("NINGUNA");
    $("#afil_federacion").hide();
    //$("#afil_asociacion").val("NINGUNA");
    $("#afil_asociacion").hide();
    //$("#afil_otros").val("NINGUNA");
    $("#afil_otros").hide();        
  }
    //$("#afil_camara").val("NINGUNA");    
    
    //$("#afil_federacion").val("NINGUNA");    
    
    //$("#afil_asociacion").val("NINGUNA");    
    
    //$("#afil_otros").val("NINGUNA");
    
    
  $("#div_ai_afil1").hide();
};

function saveUPD(inp){
  if (inp==1) {

    $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
    var datos="pack=1&ai_rs="+$("#ai_rs").val()+"&ai_societario="+$("#ai_societario").val()+"&ai_tradename="+$("#ai_tradename").val();
    $.ajax({
      type:"POST",
      url: "acap1Upd.php",
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
      url: "acap1Upd.php",
      cache: false,
      data: "pack=2&ai_nit="+$("#ai_nit").val()+"&ai_traderegis="+$("#ai_traderegis").val()+"&ai_depto="+$("#ai_depto").val()+"&ai_municipio="+$("#ai_municipio").val()+"&ai_city="+$("#ai_city").val()+"&ai_zona="+$("#ai_zona").val()+"&ai_address="+$("#ai_address").val()+"&ai_reference="+$("#ai_reference").val(),
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
    $.ajax({
      type:"POST",
      url: "acap1Upd.php",
      cache: false,
      data: "pack=3&ai_phone1="+$("#ai_phone1").val()+"&ai_phone2="+$("#ai_phone2").val()+"&ai_fax="+$("#ai_fax").val()+"&ai_pagweb="+$("#ai_pagweb").val(),
      success: function (data) {
        $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
      },
      complete: function (data) {
        $("#statusACAP1").fadeOut(1600, "linear");
      }
    }); 
  };
  if (inp==4) {
    $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
    $.ajax({
      type:"POST",
      url: "acap1Upd.php",
      cache: false,
      data: "pack=4&ai_email="+$("#ai_email").val(),
      success: function (data) {
        $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
      },
      complete: function (data) {
        $("#statusACAP1").fadeOut(1600, "linear");
      }
    }); 
  };

  if (inp==5) {
    $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
    $.ajax({
      type:"POST",
      url: "acap1Upd.php",
      cache: false,
      data: "pack=5&ai_actprin="+$("#ai_actprin").val()+"&ai_actsec1="+$("#ai_actsec1").val()+"&ai_actsec2="+$("#ai_actsec2").val(),
      success: function (data) {
        $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
      },
      complete: function (data) {
        $("#statusACAP1").fadeOut(1600, "linear");
      }
    }); 
  };

  if (inp==6) {
    $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
    $.ajax({
      type:"POST",
      url: "acap1Upd2.php",
      cache: false,
      data: $(".formA").serialize(),
      success: function (data) {
        $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
      },
      complete: function (data) {
        $("#statusACAP1").fadeOut(1600, "linear");
      }
    });
  };

}
