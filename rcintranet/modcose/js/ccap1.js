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
    };    
//antes de docuem.ready
function hideMsg(){
     $('#tableaplications tbody').find("select, input").focus( function(){
         $('#apps_msg').fadeOut();
     });

};
$(document).ready( function() {    
                
    // numero 1,225 = 1225
  

    $("#rbtn_usointer2").click( function(){             
        $("#opcionesinter").hide();
        $("#div_rbtn_usointer1").hide(); 

    } );
    
    $("#rbtn_usointer1").click( function(){             
        $("#opcionesinter").show();
        $("#div_rbtn_usointer1").hide(); 

    } );
    
    $("#coninter_5").click( function(){        
        var chk1 = document.getElementById("coninter_5").checked;
        //console.log( chk1 );
        if( chk1 ) {
            $("#coninter_otro").show();
        } else {
            $("#coninter_otro").hide();
        }
        
        $("#msgcon").hide();
        $("#msg3").hide();
        
        
    } );
    
    
    $("#coninter_otro").click( function() {
        $("#msgotro").hide();
    } );
    
    $("#nocuenta").click( function() {
        //var chk1 = document.getElementById("nocuenta").checked;
        $("#pre1").hide();
        if( $(this).is(':checked') ) {
            $("#internet").attr('checked', false);
            $("#intranet").attr('checked', false);
            $("#deinternet").hide(); 
        }
    } );
    
    $("#internet").click( function() {   
    $("#pre1").hide();     
        if( $(this).is(':checked') ) {
            $("#nocuenta").attr('checked', false);   
            $("#deinternet").show();            
        }else{
            $("#deinternet").hide();            
        }
    } );
    
    $("#intranet").click( function() {  
    $("#pre1").hide();      
        if( $(this).is(':checked') ) {
            $("#nocuenta").attr('checked', false);            
        }
    } );
    
    $("#inputA-1, #inputB-1").blur( function(){
        var c1, c2, tot;
        c1 = formatinteger( $("#inputA-1").val() );
        c2 = formatinteger( $("#inputB-1").val() );
        tot = c1 + c2;
        $("#tot_1").text( number_format(tot,0,'',',') );
        $("#msg3").hide();
    } );
    
    $("#inputA-2, #inputB-2").blur( function(){
        var c1, c2, tot;
        c1 = formatinteger( $("#inputA-2").val() );
        c2 = formatinteger( $("#inputB-2").val() );
        tot = c1 + c2;
        $("#tot_2").text( number_format(tot,0,'',',') );
        $("#msg3").hide();
    } );
    
    $("#inputA-3, #inputB-3").blur( function(){
        var c1, c2, tot;
        c1 = formatinteger( $("#inputA-3").val() );
        c2 = formatinteger( $("#inputB-3").val() );
        tot = c1 + c2;
        $("#tot_3").text( number_format(tot,0,'',',') );
        $("#msg3").hide();
    } );
    
    $("#inputA-4, #inputB-4").blur( function(){
        var c1, c2, tot;
        c1 = formatinteger( $("#inputA-4").val() );
        c2 = formatinteger( $("#inputB-4").val() );
        tot = c1 + c2;
        $("#tot_4").text( number_format(tot,0,'',',') );
        $("#msg3").hide();
    } );
    
    $("#inputA-5, #inputB-5").blur( function(){
        var c1, c2, tot;
        c1 = formatinteger( $("#inputA-5").val() );
        c2 = formatinteger( $("#inputB-5").val() );
        tot = c1 + c2;
        $("#tot_5").text( number_format(tot,0,'',',') );
        $("#msg3").hide();
    } );
    
    $("#nomprog_1, #nomprog_2, #nomprog_3, #nomprog_4, #nomprog_5 ").blur( function(){
        $("#msg3").hide();
    } );
    
    
    $("#activity_1, #activity_2, #activity_3, #activity_4, #activity_5, #activity_6, #activity_7").click( function(){
       $("#msgacti").hide();
    } );
    
    
    $("#coninter_1, #coninter_2, #coninter_3, #coninter_4").click( function(){
       $("#msgcon").hide();
       $("#msgotro").hide();
    } );    

hideMsg();


   
$("#sendData").click( function() {
    /*
        var txt_otro, tot_1, nom_1;
        var chkIsChecked = document.getElementById("internet").checked;
        if( chkIsChecked ) {                         
            var act1 = document.getElementById("activity_1").checked;
            var act2 = document.getElementById("activity_2").checked;
            var act3 = document.getElementById("activity_3").checked;
            var act4 = document.getElementById("activity_4").checked;
            var act5 = document.getElementById("activity_5").checked;
            var act6 = document.getElementById("activity_6").checked;
            var act7 = document.getElementById("activity_7").checked;

            var ci1 = document.getElementById("coninter_1").checked;
            var ci2 = document.getElementById("coninter_2").checked;
            var ci3 = document.getElementById("coninter_3").checked;
            var ci4 = document.getElementById("coninter_4").checked;
            var ci5 = document.getElementById("coninter_5").checked;

            var sw = false;
            var sw2 = false; 

            if (document.getElementById("rbtn_usointer1").checked) {
            if( !act1 && !act2 && !act3 && !act4 && !act5 && !act6 && !act7 ) {
                 $("#msgacti").show();
                    $("#msgcon").hide();
                    $('body').scrollTo('#activity_1', 500);
                    return false;
            }
            };
            if( !ci1 && !ci2 && !ci3 && !ci4 && !ci5 ) {
                sw2 = true;
            }


            if( sw || sw2 ) {
                if( sw ) {
                   
                } else {
                    $("#msgcon").show();
                    $("#msgacti").hide();
                    $('body').scrollTo('#coninter_1', 500);
                }
                return false;
            }
            
            
            if( $("#coninter_5").is(':checked') ) {                                                                                
                txt_otro = $("#coninter_otro").val();                
                if( txt_otro == '' ) {
                    $("body").scrollTo("#coninter_5");
                    $("#msgotro").show();
                    return false;
                }
            }
        }
        
        if (!document.getElementById("internet").checked && !document.getElementById("intranet").checked && !document.getElementById("nocuenta").checked) {
                    $("body").scrollTo("#internet");
                    $("#pre1").show();
                    return false;
        };
if (document.getElementById("rbtn_usointer1").checked || document.getElementById("rbtn_usointer2").checked) {
sw1=1;
}else{
$("#div_rbtn_usointer1").show(); 
$('body').scrollTo('#rbtn_usointer1', 500);
return false;
}
*/

     /**
         * Validate 4 leastOne per row
         */
        
        
  /*            
        var swStop =0;
         $('#tableaplications tbody').find("tr").each( function(x,el){

            var rowId = $(el).attr("id").substr(4);
            var selectValue = $('#tapli_'+rowId).val();
            var inputValue = $('#napli_'+rowId).val();
            var radioValue = $('#oapli_'+rowId).is(':checked');
            var radioValueX = $('#oaplix_'+rowId).is(':checked');
           

            if(selectValue!='' || inputValue!='' || radioValue || radioValueX ) { //si alguno fue seleccionado

                if(selectValue) { // si select fue seleccionado
                    if(inputValue=='' || (radioValue==false && radioValueX==false) )  { // entonces validar input y radios
                        $('#apps_msg').fadeIn(); 
                        swStop =1;
                        return false;
                    }
                } 
                if(inputValue) { // si input tiene valor
                    if(selectValue=='' || (radioValue==false && radioValueX==false) ) { // entonces validar select y radios
                       $('#apps_msg').fadeIn();   
                       swStop =1;
                       return false;
                 } 
                } 
                if(radioValue || radioValueX) { // si se ha seleccionado algun radio
                    if(selectValue=='' || inputValue=='') { // entonces validar select e input esten seleccionados
                        $('#apps_msg').fadeIn(); 
                        swStop =1;
                       return false;
                    }
                }

              //  console.log( selectValue +' ' + inputValue + ' ' + radioValue + ' ' + radioValueX ); 
            }
        });
    if(swStop) {
        return false;
    }
    
    */
    
    
    // end validate least one

                                
/*        tot_1 = formatinteger( $("#tot_1").text() );
        nom_1 = $("#nomprog_1").val();
        if( tot_1 == 0 && nom_1 != ''  ){
            $("#msg3").show();
            return false;
        }
        
        if( tot_1 > 0 &&  nom_1 == '' ) {
            $("#msg6").show();
            return false;
        }
        
                               
        tot_1 = formatinteger( $("#tot_2").text() );
        nom_1 = $("#nomprog_2").val();
        if( tot_1 == 0 && nom_1 != '' ){
            $("#msg3").show();
            return false;
        }
        
        if( tot_1 > 0 &&  nom_1 == '' ) {
            $("#msg6").show();
            return false;
        }

        tot_1 = formatinteger( $("#tot_3").text() );
        nom_1 = $("#nomprog_3").val();
        if( tot_1 == 0 && nom_1 != '' ){
            $("#msg3").show();
            return false;
        }            
        
        if( tot_1 > 0 &&  nom_1 == '' ) {
            $("#msg6").show();
            return false;
        }
        
        
                
        tot_1 = formatinteger( $("#tot_4").text() );
        nom_1 = $("#nomprog_4").val();
        if( tot_1 == 0 && nom_1 != '' ){
            $("#msg3").show();
            return false;
        }     
        
        if( tot_1 > 0 &&  nom_1 == '' ) {
            $("#msg6").show();
            return false;
        }

        tot_1 = formatinteger( $("#tot_5").text() );
        nom_1 = $("#nomprog_5").val();
        if( tot_1 == 0 && nom_1 != '' ){
            $("#msg3").show();
            return false;
        }
        
        if( tot_1 > 0 &&  nom_1 == '' ) {
            $("#msg6").show();
            return false;
        }*/
         





    } );
          
});

function delRow( numero ) {       
    
    //var evento = this.event;
    //event.preventDefault();
    var co = confirm( "¿Esta seguro de eliminar este registro?" );
    if( co ) {                
        $.ajax( {
            url: "ccap1Del.php",
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