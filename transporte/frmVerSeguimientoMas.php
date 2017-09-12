<?php
session_start();
include('db.php');
$user=$_GET['user'];
$id=$_GET['id'];
//echo $user;
//echo $id;
$fecha = date('Y-m-d H:i');

if (isset($_POST["Enviar"])) {
		$sql_insert = $conn->Execute("UPDATE tra_solicitud SET
									 atendido = '4',									 
									 placa = '$_POST[placa]'
									 WHERE id = '$id';");									 																					 
	$sql_insert = $conn->Execute("INSERT INTO tra_vehiculo_asig(id_solicitud, placa, tipo, obs, registrado_por, fecha) 
			VALUES ('$id','$_POST[placa]','$_POST[tipo]','$_POST[obs]','$user','$fecha')");

?>
<script> window.close();</script>
<?php 
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
</head>
<body>
<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    <div align="center">
  <h1><img src="images/banner.jpg" width="545" height="169"></h1>  
    </div>
<?php
	   $sql_codice1 = "SELECT
						tra_solicitud.id,
						tra_solicitud.formulario,
						users.nombre,
						oficinas.oficina,
						tra_solicitud.fecha_ini,
						tra_solicitud.hora_salida,
						tra_solicitud.fecha_fin,
						tra_solicitud.hora_llegada,
						tra_solicitud.destino,
						tra_solicitud.motivo
						FROM
						tra_solicitud
						INNER JOIN users ON users.id = tra_solicitud.usuario
						INNER JOIN oficinas ON oficinas.id = users.id_oficina
						WHERE tra_solicitud.id = '$id'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		////$estado = $reg_codice1->fields["estado"];
		?>                                   
<form name="f1" action="" method="post">
    <div align="center">
    
      <table width="638" align="center">
      <tr>
      <?php 
	  	$form = $reg_codice1->fields["formulario"];
	    $nombre = $reg_codice1->fields["nombre"];
	    $oficina = $reg_codice1->fields["oficina"];
		$fecha1 = $reg_codice1->fields["fecha_ini"];
		$fecha2 = $reg_codice1->fields["fecha_fin"];
		$hora1 = $reg_codice1->fields["hora_salida"];
		$hora2 = $reg_codice1->fields["hora_llegada"];
	    $destino = $reg_codice1->fields["destino"];
	    $motivo = $reg_codice1->fields["motivo"];
	  ?>
        <td colspan="2">                                               
          <ul class="info">    
            <li><font color="#000099" size="3"><b>Form: </b><?php echo $form;?></font></li>
            <li><font color="#000099" size="3"><b>Solicitante: </b><?php echo $nombre;?></font></li>
            <li><font color="#000099" size="3"><b>Fecha de uso: </b><?php echo $fecha1;?></font></li>
            <li><font color="#000099" size="3"><b>Destino: </b><?php echo $destino;?></font></li>
            <li><font color="#000099" size="3"><b>Motivo: </b><?php echo $motivo;?></font></li>
          </ul></td>
        </tr>
      <tr>
        <td width="506" align="center" colspan="2"><p>&nbsp;</p></td>
       </tr>
      <tr>
        <td width="506" align="center">
        	<table width="614">                                   
       <tr>
         <td width="732"><br><div align="center">
           <a href="frmSeguimientoTrans.php"><input type="button" name="Cancelar" value="Volver" class="btn btn-primary btn-cons" id="Cancelar" /></a></div></td>
       </tr>
  </table>
        </td>
      </tr>              
    </table>
    


</form>
	</div>
</section>							
</div></div>
</body>
</html>
