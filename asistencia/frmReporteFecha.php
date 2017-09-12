<?php
session_start();
include_once("db.php"); 
$user=$_GET['user'];

if (isset($_POST["Enviar"])) {
$f1 = $_POST[fini];
$f2 = $_POST[fin];
echo "<script> var f1 = '$f1'; var f2 = '$f2';</script>";	
echo '<script type="text/javascript">window.location.href="rptReporteSoporte.php?f1="+f1+"&f2="+f2 </script>';
}
?>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza Callisaya - 2016">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/> 
<link href="css/efra.css" rel="stylesheet" type="text/css"/>  
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script> 
<script src="js/bootstrap-datepicker2.js" type="text/javascript"></script>
<script>

function format(input)
{
	var num = input.value.replace(/\./g,'');
	if(!isNaN(num)){
		num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		num = num.split('').reverse().join('').replace(/^[\.]/,'');
		input.value = num;
	} 
	else{ alert('Solo se permiten numeros');
		input.value = input.value.replace(/[^\d\.]*/g,'');
	}
}

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
</script> 
<!--   CALENDARIO EFRA   -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <script src="js/ui.datepicker-es-MX2.js"></script>
  <script>
  $(function() {
    $.datepicker.setDefaults($.datepicker.regional['es-MX']);
  });
  </script>
<!-- FIN CALEMDARIO  -->
</head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
      <h1><span><strong><BR>
  REPORTE SOPORTE TÈCNICO MDPyEP</strong></span>
</h1></div>
<div align="center">
<form id="form1" name="form1" method="post" action="">
<table class="table table-striped" id="example">
    <tr>
      <td colspan="4">Ingrese fecha:</td>
      </tr>
    <tr>
      <td colspan="4"></td>
      </tr>
      <tr>
      <td>De:</td>
      <td><input type="text" id="datepicker" name="fini" /></td>
      <td>A:</td>
      <td><input type="text" id="datepicker2" name="fin" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><a href="frmSeguimientoAdmin.php?user=<?php echo $user ?>">
      <input type="button" name="Cancelar" value="CANCELAR" class="btn btn-warning btn-cons" id="Cancelar" /></a>
      <input type="submit" name="Enviar" value="VER REPORTE" class="btn btn-primary btn-cons" id="Enviar" />
      </td>
      </tr>
  </table>
</form>  
</div>
<table width="91">
  <tr align="center">
  </tr>
</table>
	</div></div></div>
   <br>
</body>
