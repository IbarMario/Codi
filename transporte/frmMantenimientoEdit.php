<?php
session_start();
include('db.php');
$user=$_GET['user'];
$placa=$_GET['placa'];
$id = $_GET['id'];

if (isset($_POST["Enviar"])) {

var_dump($_POST['fini']);
$fec = explode('/', $_POST['fini']);
$nfecha = "{$fec[2]}-{$fec[1]}-{$fec[0]}";
		
$sql_insert = $conn->Execute("UPDATE tra_mantenimiento SET
									 fecha_mant = '$nfecha',
									 detalle = '$_POST[detalle]',
									 reparacion = '$_POST[reparacion]',
									 repuesto = '$_POST[repuesto]',
									 kilometraje = '$_POST[kilometraje]',
									 taller = '$_POST[taller]',
									 costo = '$_POST[costo]'
									 WHERE id = '$id';");			
			
   	echo "<script> var us = '$user'; var pla = '$placa';</script>";
	echo '<script type="text/javascript">window.location.href="frmControlMant.php?user="+us+"&placa="+pla </script>';
	}	
	
	 
		 	   $sql_codice = "SELECT
			   					tra_mantenimiento.id,
								tra_mantenimiento.fecha_mant,
								tra_mantenimiento.placa,
								tra_mantenimiento.detalle,
								tra_mantenimiento.reparacion,
								tra_mantenimiento.repuesto,
								tra_mantenimiento.fecha_mant2,
								tra_mantenimiento.taller,
								tra_mantenimiento.kilometraje,
								tra_mantenimiento.costo
								FROM
								tra_mantenimiento
								WHERE tra_mantenimiento.id = '$id'";	     
	  		$reg_codice = $conn->Execute($sql_codice) ;
			$eec = $reg_codice->fields["placa"];
			$fecha = $reg_codice->fields["fecha_mant"];
			$detalle = $reg_codice->fields["detalle"];
			$reparacion = $reg_codice->fields["reparacion"];
			$cambio = $reg_codice->fields["repuesto"];
			$kilo = $reg_codice->fields["kilometraje"];
			$taller = $reg_codice->fields["taller"];	
			$costo = $reg_codice->fields["costo"];				
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
    <h3><img src="images/banner.jpg" width="629" height="166"></h3>    
	  <h2>CONTROL DE MANTENIMIENTO DE MOVILIDADES <br />EDITAR</h2>

    </div>
  
<div id="stylized" class="myform">
                                        
<form name="f1" action="" method="post">
    <div align="center">
    
      <table>
      <tr>
<h2 class="subtitulo">PLACA: <strong><?php echo $placa;?></strong><br/></h2>
      </tr>
      <tr>
       <td>
<!--  FORMULARIO  -->        
<table>
      <tr>
        <th width="118" align="right">FECHA:</th>

        <td width="216"><input type="text" id="datepicker" name="fini" value="<?php echo $fecha ?>" /></td>
        <th width="76" align="right">&nbsp;</th>
         <td width="322">&nbsp;</td>
       </tr>
      <tr>
        <th width="118" height="86" align="right">DETALLE DEL MANTENIMIENTO:</th>
        
        <td colspan="3"><textarea name="detalle" cols="50" rows="5" id="detalle"><?php echo $detalle ?></textarea></td>
      </tr> 
      <tr>
        <th width="118" align="right">REPARACIÓN:</th>

        <td width="216"><textarea name="reparacion" cols="25" rows="3" id="reparacion" ><?php echo $reparacion ?></textarea></td>
        <th width="76" align="right">CAMBIO DE REPUESTOS:</th>
         <td width="322"><textarea name="repuesto" cols="25" rows="3" id="repuesto"><?php echo $cambio ?></textarea></td>
       </tr>    
      <tr>
        <th width="118" align="right">KILOMETRAJE:</th>

        <td width="216"><input type="text" id="kilometraje" name="kilometraje" value="<?php echo $kilo ?>"/></td>
        <th width="76" align="right">&nbsp;</th>
         <td width="322">&nbsp;</td>
       </tr>
      <tr>
        <th width="118" align="right">TALLER:</th>

        <td width="216"><input name="taller" type="text" id="taller" value="<?php echo $taller ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
        <th width="76" align="right">COSTO Bs.:</th>
         <td width="322"><input name="costo" type="text" id="costo" value="<?php echo $costo ?>" onChange="formatoMoneda(this.form)"></td>
       </tr>                                                   
       <tr>
       <td colspan="4"><br><div align="center"><a href="frmControlMant.php?placa=<?php echo $placa ?> & user=<?php echo $user ?>"></a><a href="frmControlMant.php?placa=<?php echo $placa ?> & user=<?php echo $user ?>">
         <input type="button" name="Cancelar" value="CANCELAR" class="btn btn-warning btn-cons" id="Cancelar" />
       </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        
       <input type="submit" name="Enviar" value="ACTUALIZAR" class="btn btn-primary btn-cons" id="Enviar" /></div></td>
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
