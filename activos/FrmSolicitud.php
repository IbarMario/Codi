<?php
session_start();
include('db.php');
$user=$_GET['user'];
//echo $user;
//echo 'Hola';
//$fecha = date('Y-m-d');
$fecha = date('Y-m-d H:i:s');

///////
$query="SELECT MAX(id) as id FROM salida_ingreso";
$reg_dat = $conn->Execute($query);
$cod = $reg_dat->fields["id"];
$codi = $cod + 1;
///////

if (isset($_POST["Enviar"])) {
	
	$sql_insert = $conn->Execute("INSERT INTO salida_ingreso(con_fecha_solicitud, con_num_solicitud, con_institucion, con_piso, con_telefono, con_descripcion, con_color, con_serie, con_concepto, con_tipo, con_autorizado_por, con_cargo_autoriza, con_responsable, con_cargo_responsable, con_ci_responsable, con_motivo_reparacion, con_motivo_mantenimiento, con_motivo_prestamo, con_motivo_devolucion, con_motivo_transferencia, con_motivo_otros, con_usuario, con_fecha_reg) 
			VALUES ('$_POST[fecha_sol]','$codi','$_POST[inst]','$_POST[piso]','$_POST[fono]','$_POST[descripcion]','$_POST[color]','$_POST[serie]','$_POST[concepto]','$_POST[tipo]','$_POST[autorizado]','$_POST[cargo_au]','$_POST[responsable]','$_POST[c_responsable]','$_POST[ci_resp]','$_POST[reparacion]','$_POST[mantenimiento]','$_POST[prestamo]','$_POST[devolucion]','$_POST[transferencia]','$_POST[otros]','$user','$fecha')");
			
	echo '<script language="javascript">alert("Registro guardado correctamente...!!! \n  "); </script>';


	echo "<script> var us = '$user';</script>";	
	echo "<script> var id = '$codi';</script>";	
//	echo '<script type="text/javascript">window.location.href="index.php?user="+us <script>';
	echo '<script type="text/javascript">window.location.href="rptIngresoSalida.php?user="+us+"&id="+id </script>';
	

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
    <img src="images/banner.jpg" alt="" width="710" height="191" align="middle"><br>
  <h2>FORMULARIO CONTROL DE INGRESO Y SALIDA DE BIENES</h2>  
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
    
      <table width="662">
      <tr>
        <td width="654" height="547">
<!--  FORMULARIO  -->        
<table width="656">
      <tr>
        <th width="216" align="right">FECHA::</th>

        <td width="216" ><input type="text" class="some_class" value="" id="some_class_1" name="fecha_sol"/></td>
        <td width="216" align="right"><strong>FORM. Nro.:</strong></td>
         <td width="216"><input name="formulario" type="text" id="formulario" size="8" maxlength="8" style="font-family: Arial; font-size: 15pt; background-color: #FFC; color:#F00;" value="AC - <?php echo $codi;?>" readonly  /></td>
       </tr>
       <tr>
       <th>INSTITUCIÓN</th>
       <td colspan="3">  <input name="inst" type="text" id="inst"/></td>
       </tr>
      <tr>
        <th align="right">PISO:</th><td>
          <input name="piso" type="text" id="piso" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();" /></td>

        <th align="right">TELÉFONO
          /INTERNO</th><td>
          <input name="fono" type="text" id="fono" onKeyPress="return justNumbers(event);"

 /></td>
       </tr> 
      <tr>
        <th  height="86" align="right">DESCRIPCIÓN DEL BIEN:</th>
        
        <td colspan="3"><textarea name="descripcion" cols="55" rows="3" id="descripcion" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();"></textarea></td>
      </tr>       
      <tr>
        <th align="right">COLOR:</th>

        <td ><input name="color" type="text" id="color" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();" /></td>
        <th align="right">SERIE</th>
         <td ><input name="serie" type="text" id="serie" /></td>
       </tr> 
      <tr>
        <th height="86" align="right">CONCEPTO:</th>
        
        <td colspan="3"><textarea name="concepto" cols="55" rows="3" id="concepto" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();"></textarea></td>
      </tr> 
      <tr>      
        <td colspan="2" align="right">
          <label for="ingreso"> INGRESO</label><input name="tipo" type="radio" value="INGRESO">
        </td>
        <td colspan="2" align="center">
		  <label for="salida"> SALIDA</label><input type="radio" name="tipo" value="SALIDA"> 
        </td>
      </tr> 
      <tr>
        <th align="right">AUTORIZADO POR:</th>

        <td ><input name="autorizado" type="text" id="autorizado" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();" /></td>
        <th align="right">CARGO:</th>
         <td ><input name="cargo_au" type="text" id="cargo_au" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();"/></td>
       </tr>  
      <tr>
        <th align="right">RESPONSABLE</th>

        <td ><input name="responsable" type="text" id="responsable" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();" /></td>
        <th align="right">CÉDULA DE IDENTIDAD</th>
         <td ><input name="ci_resp" type="text" id="ci_resp"/></td>
       </tr> 
      <tr>
        <th align="right">CARGO RESPONSABLE</th>

        <td ><input name="c_responsable" type="text" id="c_responsable" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();" /></td>
        <th align="right">&nbsp;</th>
         <td >&nbsp;</td>
       </tr>        
       <tr>
       <th>MOTIVO SALIDA</th>
       <td colspan="3">
       <table width="200" border="0">
         <tr>
           <td>&nbsp;</td>
           <td><strong>REPARACIÓN
             <input name="reparacion" type="checkbox" value="REPARACION">
           </strong></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><strong>MANTENIMIENTO
             <input type="checkbox" name="mantenimiento" value="MANTENIMIENTO">
           </strong></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><strong>PRÉSTAMO
             <input type="checkbox" name="prestamo" value="PRESTAMO">
           </strong></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><strong>DEVOLUCIÓN
             <input type="checkbox" name="devolucion" value="DEVOLUCION">
           </strong></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><strong>TRANSFERENCIA
             <input type="checkbox" name="transferencia" value="TRANSFERENCIA">
           </strong></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><textarea name="otros" placeholder="Otro" cols="40" rows="2" id="otros" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();" ></textarea></td>
         </tr>
       </table>
		</td>
       </tr>                                                            
       <tr>
       <td colspan="4"><br><div align="center">
       <a href="index.php?user=<?php echo $user ?>"><input type="button" name="Cancelar" value="CANCELAR" class="btn btn-warning btn-cons" id="Cancelar"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        
       <input onClick="verifica();" type="submit" name="Enviar" value="REGISTRAR" class="btn btn-primary btn-cons" id="Enviar" /></div></td>
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
