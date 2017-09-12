<?php
session_start();
include('db.php');
$user=$_GET['user'];
$fecha = date('Y-m-d H:i');

if (isset($_POST["Enviar"])) {
	
	$sql_insert = $conn->Execute("INSERT INTO tra_vehiculo(fecha_reg, placa, fecha_adq, marca, tipo, color, anio, asignado, conductor, estado, poliza, observaciones) 
			VALUES ('$fecha','$_POST[placa]','$_POST[fini]','$_POST[marca]','$_POST[tipo]','$_POST[color]','$_POST[anio]','$_POST[asignado]','$_POST[conductor]','$_POST[estado]','$_POST[poliza]','$_POST[observaciones]')");
	echo '<script language="javascript">alert("Vehículo registrado..."); </script>';
	echo "<script> var us = '$user';</script>";	
	echo '<script type="text/javascript">window.location.href="frmtrans.php?user="+us </script>'; 
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
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script> 
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
<link href="css/form_eec.css" rel="stylesheet" type="text/css"/> 
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker();
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
    <div align="center">
  <h1><img src="images/banner.jpg" width="688" height="169"></h1>  
    </div>
<div id="stylized" class="myform">                                 
<form name="f1" action="" method="post">
    <div align="center">
    <table>
      <tr>
        <td colspan="4" align="center"><h2><b>REGISTRO DE VEHÍCULOS</b></h2></td>
      </tr>
      <tr>
        <th align="right">FECHA ADQUISICIÓN:</th>

        <td width="260"><input type="text" id="datepicker" name="fini" /></td>
        <th width="181" align="right">PLACA:</th>
         <td width="115"><input name="placa" type="text" id="placa"  /></td>
       </tr>
      <tr>
        <th width="180" align="right">MARCA:</th>

        <td width="260"><input name="marca" type="text" id="marca"  /></td>
        <th width="181" align="right">TIPO:</th>
         <td width="115"><input name="tipo" type="text" id="tipo"  /></td>
       </tr>
      <tr>
        <th width="180" align="right">COLOR:</th>

        <td width="260"><input name="color" type="text" id="color"  /></td>
        <th width="181" align="right">AÑO:</th>
         <td width="115"><input name="anio" type="text" id="anio"  /></td>
       </tr>
      <tr>
        <th width="180" align="right">ASIGNADO A:</th>

        <td width="260"><input name="asignado" type="text" id="asignado"  /></td>
        <th width="181" align="right">CONDUCTOR:</th>
         <td width="115"><input name="conductor" type="text" id="conductor"  /></td>
       </tr>
      <tr>
        <th width="180" height="86" align="right">ESTADO DE FUNCIONAMIENTO:</th>

        <td width="260"><input name="estado" type="text" id="estado"  /></td>
        <th width="181" align="right">POLIZA DE SEGURO:</th>
         <td width="115"><input name="poliza" type="text" id="poliza"  /></td>
       </tr> 
      <tr>
        <th width="180" height="86" align="right">OBSERVACIONES:</th>

        <td colspan="3"><textarea name="observaciones" cols="50" rows="4" id="observaciones"></textarea></td>
        </tr>                                   
       <tr>
       <td colspan="4"><br><div align="center">
       <a href="frmtrans.php?user=<?php echo $user ?>"><input type="button" name="Cancelar" value="CANCELAR" class="btn btn-warning btn-cons" id="Cancelar"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        
       <input type="submit" name="Enviar" value="REGISTRAR" class="btn btn-primary btn-cons" id="Enviar" /></div></td>
       </tr>
  </table>
  <div class="spacer"></div> 


</form>
</div>
</body>
</html>
