<?php
session_start();
include('db.php');
$user=$_GET['user'];
$placa=$_GET['placa'];
//echo $user;
//echo 'Hola';
//$fecha = date('Y-m-d');
//$fecha = date('Y-m-d H:i');

if (isset($_POST["Enviar"])) {
	
	$sql_insert = $conn->Execute("INSERT INTO tra_mantenimiento(fecha_mant, placa, detalle, reparacion, repuesto, fecha_mant2, taller, costo) 
			VALUES ('$_POST[fini]','$placa','$_POST[detalle]','$_POST[reparacion]','$_POST[repuesto]','$_POST[fin]','$_POST[taller]','$_POST[costo]')");
	echo '<script language="javascript">alert("Control de mantenimiento de movilidades registrada..."); </script>'; 
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
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script> 
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
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
  <h2>SOLICITUD DE MANTENIMIENTO PREVENTIVO</h2>  
    </div>
<?php
	   $sql_codice1 = "SELECT
						tra_vehiculo.placa,
						tra_vehiculo.marca,
						tra_vehiculo.tipo,
						tra_vehiculo.color,
						tra_vehiculo.anio,
						tra_vehiculo.asignado,
						tra_vehiculo.conductor,
						tra_vehiculo.estado,
						tra_vehiculo.poliza,
						tra_vehiculo.id
						FROM
						tra_vehiculo
						WHERE tra_vehiculo.placa = '$placa'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$estado = $reg_codice1->fields["estado"];
		?>  
<div id="stylized" class="myform">                                         
<form name="f1" action="" method="post">
    <div align="center">
    
      <table>
      <tr>
<table align="center">
  <tr><h1 align="center">Placa: <strong><?php echo $placa;?></strong><br/></h1>
  	
     <td>                                                  
          <font color="#000099" size="2">Marca: <strong><?php echo $reg_codice1->fields["marca"];?></strong></font>
      </td>
     <td>
		<font color="#000099" size="2">Asignado a: <strong><?php echo $reg_codice1->fields["asignado"];?></strong></font>        
    </td>
  </tr>
</table>
      </tr>
      <tr>
       <td>
<!--  FORMULARIO  -->        
<table>
      <tr>
        <th width="118" align="right">FECHA:</th>

        <td width="216"><input type="text" id="datepicker" name="fini" /></td>
        <th width="76" align="right">CÓDIGO:</th>
         <td width="322"><input name="codigo" type="text" id="codigo" value="" readonly></td>
       </tr> 
      <tr>
        <th width="118" align="right">UNIDAD SOLICITANTE:</th>
        
        <td width="216"><input name="reparacion" type="text" id="reparacion" value=""></td>
        <th width="76" align="right">SOLICITANTE:</th>
        <td width="322"><input name="repuesto" type="text" id="repuesto" value=""></td>
      </tr>    
      <tr>
        <th width="118" align="right">FECHA ÚLTIMO MANTENIMIENTO:</th>

        <td width="216"><input type="text" id="datepicker2" name="fin" /></td>
        <th width="76" align="right">&nbsp;</th>
         <td width="322">&nbsp;</td>
       </tr>
      <tr>
        <th width="118" align="right">DETALLE DE TRABAJOS A REALIZAR:</th>

        <td colspan="3"><textarea name="taller" cols="50" rows="5" id="taller"></textarea></td>
        </tr>                                                   
       <tr>
       <td colspan="4"><br><div align="center">
       <input type="submit" name="Cancelar" value="Cancelar" class="btn btn-warning btn-cons" id="Cancelar" onClick="window.close();"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        
       <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary btn-cons" id="Enviar" /></div></td>
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
</html>
