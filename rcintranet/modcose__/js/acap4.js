$(document).ready( function(){
    $("#totalA").focus();
    
    var sw = 0;
    if ($("#totalA").val() === ''){
         $("#totalA").focus();        
    } else {$("#sendData").focus();}
    
    $("#sendData").click( function(){
        if ( $("#totalA").val()=='' || $("#input-12").val()=='' || $("#totalB").val()=='' || $("#input-22").val()=='' || $("#totalC").val()=='' || $("#input-32").val()=='') {
              $("#camdfgrgegregr").show();
              if ( $("#totalA").val()==''){$("#totalA").focus();}
              if ( $("#totalB").val()==''){$("#totalB").focus();}
              if ( $("#totalC").val()==''){$("#totalC").focus();}
              if ( $("#input-12").val()==''){$("#input-12").focus();}
              if ( $("#input-22").val()==''){$("#input-22").focus();}
              if ( $("#input-32").val()==''){$("#input-32").focus();}
            return false;
        }else{
            var t1, t2, t3, m1, m2, m3, i1, i2, i3;
            t1 = formatinteger( $("#totalA").val() );
            t2 = formatinteger( $("#totalB").val() );
            t3 = formatinteger( $("#totalC").val() );
            m1 = formatinteger( $("#input-12").val() );
            m2 = formatinteger( $("#input-22").val() );
            m3 = formatinteger( $("#input-32").val() );
            i1 = (t1 - m1);
            if (i1 > 0){$("#input-11").val(i1)} 
            i2 = (t2 - m2);
            if (i2 > 0){$("#input-21").val(i2)} 
            i3 = (t3 - m3);
            if (i3 > 0){$("#input-31").val(i3)}            
     };
});

$("#totalA").blur( function() {
    //alert("Llegamos a Total...");
    //alert($("#totalA").val().length);    
    
    var t1, input1, input2;
    t1 = formatinteger( $("#totalA").val() );    
    //alert($("#totalA").val().length);    
    
    
    if ($("#totalA").val().length == 0){
        alert("Este dato no puede estar vacío..verifique la información que declara...");
        $("#totalA").val(0);
        $("#input-12").select();
        $("#input-12").focus();
    } else {
        if (t1>=0) {
            alert(t1);
            input1 = formatinteger( $("#input-11").text() );            
            input2 = formatinteger( $("#input-12").val() );
            alert(input1);
            if (input1 != 0) {
                $("#input-11").text(0);                
            } 
            alert(input2);
            if (input2 != 0) {
                $("#input-11").text(0);
                $("#input-12").val(0);
                alert("Introducir nuevamente el dato para Materiales indirectos..");
            }            
            $("#input-12").focus();            
            $("#camdfgrgegregr").hide();
            $("#input-12").focus();
            $("#input-12").select();
        } 
    }
} );

$("#totalB").blur( function() {
    var t2, input1, input2;
    t2 = formatinteger( $("#totalB").val() );
    //alert(t2);
    if ($("#totalB").val().length == 0){
        $("#input-22").focus();
        alert("Este dato no puede estar vacío..verifique la información que declara...");
        $("#input-22").select();
    } else {
        if (t2>=0) {
            input1 = formatinteger( $("#input-21").text() );
            input2 = formatinteger( $("#input-22").val() );
            if (input1 != 0) {
                $("#input-21").text(0);                
            } 
            if (input2 != 0) {
                $("#input-21").text(0);
                $("#input-22").val(0);
                alert("Introducir nuevamente el dato para Materiales indirectos..");
            }            
            $("#input-22").focus();            
            $("#camdfgrgegregr").hide();
            $("#input-22").focus();
            $("#input-22").select();
        } 
    }
} ); 
   
    $("#totalC").blur( function() {
    var t3, input1, input2;        
    if ($("#totalC").val().length == 0){
        $("#input-32").focus();
        alert("Este dato no puede estar vacío..verifique la información que declara...");
        $("#input-32").select();
    } else {                
        input1 = formatinteger( $("#input-31").text() );
        input2 = formatinteger( $("#input-32").val() );
        if (input1 != 0) {
            $("#input-31").text(0);                
        } 
        if (input2 != 0) {
            $("#input-31").text(0);
            $("#input-32").val(0);
            alert("Introducir nuevamente el dato para Materiales indirectos..");
        }            
            $("#input-32").focus();            
            $("#camdfgrgegregr").hide();
            $("#input-12").focus();
            $("#input-12").select();
    }
    
    $("#input-12").blur( function() {
        var v1, v2, tot1;
        v1 = formatinteger( $("#totalA").val() );
        v2 = formatinteger( $("#input-12").val() );
        //alert(v1);
        //alert(v2);        
        if (v2 > v1){
            $("#msg1").show();
            $("#input-12").val(0);
            $("#input-12").focus();
            $("#input-12").select();            
            return false;
        } else {
        tot1 = v1 - v2;                    
        $("#input-11").text(number_format(tot1,0,'.',','));
        $("#camdfgrgegregr").hide();
        $("#msg1").hide();
        $("#totalB").focus();
        $("#totalB").select();
        $("#input-22").focus();
        $("#input-22").select();
        }             
    } );    
    
    $("#input-22").blur( function() {
        var v3, v4, tot2;
        v3 = formatinteger( $("#totalB").val() );
        v4 = formatinteger( $("#input-22").val() );       
        if (v4 > v3){
            $("#msg2").show();
            $("#input-22").val(0);  
            $("#input-22").focus();
            $("#input-22").select();
            return false;
        } else {
        tot2 = v3 - v4;
        $("#input-21").text(number_format(tot2,0,'.',','));                
        $("#camdfgrgegregr").hide();
        $("#msg2").hide();
        $("#totalC").focus();
        $("#totalC").select();
        $("#input-32").focus();
        $("#input-32").select();        
        }
    } );
    
    $("#input-32").blur( function() {
        var v5, v6, tot3;
        v5 = formatinteger( $("#totalC").val() );
        v6 = formatinteger( $("#input-32").val() );
        //alert(v5);
        //alert(v6);
        if (v6 > v5){
            $("#msg3").show();
            $("#input-32").val(0);
            $("#input-32").focus();
            $("#input-32").select();
            return false;
        } else {     
            //alert("else");
        tot3 = (v5 - v6);
        //alert(tot3);
        $("#input-31").text(number_format(tot3,0,'.',','));                
        $("#camdfgrgegregr").hide();
        $("#msg3").hide();
        $("#sendData").focus();
        }
    });
    
    // numero 1,225 = 1225
    function formatinteger( numero ) {
        numero = numero.replace(/,/g, "");
        numero = parseFloat(numero);
        return verifyNaN(numero);        
    }
    
    function verifyNaN(numero){
     if (isNaN(numero)) 
       return 0;
   else
       return numero;
}
});

function saveUPD(inp){
    if (inp==1) {
        $("#statusACAP1").html('<div class="bxSL"><img alt="Guardando" src="lib/load.gif">guardando</div>');
        var datos="pack=1&input-11="+$("#input-11").val()+"&input-21="+$("#input-21").val()+"&input-31="+$("#input-31").val();
        $.ajax({
            type:"POST",
            url: "acap4Upd.php",
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
        url: "acap4Upd.php",
        cache: false,
        data: "pack=2&input-12="+$("#input-12").val()+"&input-22="+$("#input-22").val()+"&input-32="+$("#input-32").val(),
        success: function (data) {
            $("#statusACAP1").html('<div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div>');   
        },
        complete: function (data) {
          $("#statusACAP1").fadeOut(1600, "linear");
      }
  });  
  };
}
});