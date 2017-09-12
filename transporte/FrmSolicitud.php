<?php
session_start();
include('db.php');
$user=$_GET['user'];
//echo $user;
//echo 'Hola';
//$fecha = date('Y-m-d');
$fecha = date('Y-m-d H:i');

///////
$query="SELECT MAX(id) as id FROM tra_solicitud";
$reg_dat = $conn->Execute($query);
$cod = $reg_dat->fields["id"];
$codi = $cod + 1;
///////

if (isset($_POST["Enviar"])) {
	//fecha_ini, fecha_fin,    '$_POST[fini]','$_POST[fin]',
	$sql_insert = $conn->Execute("INSERT INTO tra_solicitud(fecha_reg, formulario, usuario,  hora_salida, hora_llegada, destino, telefono, motivo) 
			VALUES ('$fecha','$_POST[formulario]','$user','$_POST[salida]','$_POST[llegada]','$_POST[destino]','$_POST[telefono]','$_POST[motivo]')");
			
	echo '<script language="javascript">alert("Su solicitud fue registrada... \n Espere respuesta e Imprima Formulario. "); </script>';

/// mandar variable de php a JS
	echo "<script> var us = '$user';</script>";	
	echo '<script type="text/javascript">window.location.href="index.php?user="+us </script>';
/// Fin de mandar
}
?>

<!DOCTYPE HTML>
<html>
	<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza Callisaya - 2015">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/> 
<link href="css/efra.css" rel="stylesheet" type="text/css"/>  




<link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

</style>




<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script> 
<script>
function validarNro(e) {
var key;
if(window.event) // IE
	{
	key = e.keyCode;
	}
else if(e.which) // Netscape/Firefox/Opera
	{
	key = e.which;
	}

if (key < 48 || key > 57)
    {
    if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
        { return true; }
    else 
        { return false; }
    }
return true;
}
</script>

<script>

$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<script>
$(function() {
$( "#datepicker2" ).datepicker();
});



    function justNumbers(e)
    {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
    return true;
     
    return /\d/.test(String.fromCharCode(keynum));
    }


</script> 
<!--   CALENDARIO EFRA   -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <script src="js/ui.datepicker-es-MX.js"></script>
  <script>
  $(function() {
    $.datepicker.setDefaults($.datepicker.regional['es-MX']);
  });
  </script>
<!-- FIN CALEMDARIO  -->
</head>
	<body>
<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    <div align="center">
    <img src="images/banner.jpg" alt="" width="710" height="165" align="middle"><br>
  <h2>FORMULARIO DE SOLICITUD DE MOVILIDAD</h2>  
    </div>
<?php
	   $sql_codice1 = "SELECT
						oficinas.oficina,
						users.nombre,
						users.username,
						users.cargo,
						users.email
						FROM
						users
						INNER JOIN oficinas ON users.id_oficina = oficinas.id
						WHERE users.id = '$user'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$estado = $reg_codice1->fields["estado"];
		$nombre = $reg_codice1->fields["nombre"];
		?>  
<div id="stylized" class="myform">                                         
<form name="f1" action="" method="post">
    <div align="center">
    
      <table>
      <tr>
        <td width="610">
<!--  FORMULARIO  -->        
<table width="614">
      <tr>
        <th align="right">SOLICITANTE:</th>

        <td width="216"> 
          <input  name="destino2" type="text" disabled id="destino2" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $nombre; ?>" readonly /></td>
        <td width="76" align="right">FORM. Nro.:</td>
         <td><input name="formulario" type="text" id="formulario" size="8" maxlength="8" style="font-family: Arial; font-size: 15pt; background-color: #FFC; color:#F00;" value="AT - <?php echo $codi;?>" readonly  /></td>
       </tr>
       <tr>
       <td colspan="4">&nbsp;</td>
       </tr>
      <!--<tr>
        <th width="118" align="right">FECHA DE USO DEL:</th>
        <td width="216">
        <input type="text" id="datepicker" name="fini" />
        </td>
        <th width="76" align="right">AL:</th>
         <td width="322"><input type="text" id="datepicker2" name="fin" /></td>
       </tr>-->
      <tr>
        <th width="118" align="right">FECHA Y HORA DE SALIDA::</th>

        <td width="216">
        <!--<input name="salida" type="text" id="salida" />-->
        <input type="text" class="some_class" value="" id="some_class_1" name="salida"/>     
        </td>
        <th width="76" align="right">FECHA Y HORA DE LLEGADA:</th>
         <td width="322">
         <!--<input name="llegada" type="text" id="llegada"  />-->
         	<input type="text" class="some_class" value="" id="some_class_1" name="llegada"/>
         </td>
       </tr> 
      <tr>
        <th width="118" align="right">DESTINO:</th>

        <td width="216"><input name="destino" type="text" id="destino" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" /></td>
        <th width="76" align="right">TELÉFONO/<br>INTERNO:</th>
         <td width="322"><input name="telefono" type="text" id="telefono" onkeypress="return justNumbers(event);"

 /></td>
       </tr> 
      <tr>
        <th width="118" height="86" align="right">MOTIVO:</th>
        
        <td colspan="3"><textarea name="motivo" cols="50" rows="5" id="motivo" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea></td>
      </tr>                                   
       <tr>
       <td colspan="4"><br><div align="center">
       <a href="index.php?user=<?php echo $user ?>"><input type="button" name="Cancelar" value="CANCELAR" class="btn btn-warning btn-cons" id="Cancelar"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        
       <input onclick="verifica();" type="submit" name="Enviar" value="ENVIAR" class="btn btn-primary btn-cons" id="Enviar" /></div></td>
       </tr>
  </table>
<!--  FIN FORMULARIO  -->        

        </td>
        </tr>
    </table>
    


</form>
</div>
	</div>
</section>							
</div></div>
</body>
<script language="JavaScript" type="text/javascript">
function verifica() {
if (document.f1.mes.fini != "" && document.f1.fin.value != "" && document.f1.salida.value != "" && document.f1.llegada.value != "" && document.f1.destino.value != "" && document.f1.telefono.value != "" && document.f1.motivo.value != "") {
document.f1.submit();
} else {
alert("FAVOR INGRESAR TODOS LOS CAMPOS!!!!!");
}
// EFRA
}
</script> 
<script src="./jquery.js"></script>
<script src="./jquery.datetimepicker.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'es',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('#datetimepicker2').datetimepicker({
	yearOffset:222,
	lang:'ch',
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d',
	minDate:'-1970/01/02', // yesterday is minimum date
	maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
	inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:false,
	allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
	step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if (currentDateTime && currentDateTime.getDay() == 6){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date')
			.toggleClass('xdsoft_disabled');
	},
	minDate:'-1970/01/2',
	maxDate:'+1970/01/2',
	timepicker:false
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}

		return [true, ""];
	}
});
$('#datetimepicker12').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [true, "custom-date-style"];
		}

		return [true, ""];
	}
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>
</html>
