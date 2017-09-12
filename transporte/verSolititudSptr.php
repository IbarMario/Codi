<?php
session_start();
include('db.php');
$user = $_GET['user'];
$desc = $_GET['desc'];
$eec = $_GET['eec'];
//$fecha = date('Y-m-d');
$fecha = date('Y-m-d H:i');
$fechas = date("Y-m-d h:i:s");

$sql_codice = "SELECT
				users.id,
				users.nombre
				FROM
				users
				WHERE users.id = '$user'";	     
				
$reg_codice = $conn->Execute($sql_codice) ;
$usuario = $reg_codice->fields["nombre"];
		 

if (isset($_POST["Aceptar"])) {
		$sql_insert = $conn->Execute("UPDATE tra_solicitud SET
									 atendido = '1',
									 respuesta = 'FAVOR IMPRIMIR 3 COPIAS DEL FORMULARIO Y PRESENTARLO EN OFICINAS DEL AREA DE TRANSPORTES.',
									 aprobado_por = '$usuario',
									 fecha_aprobado = '$fechas'
									 WHERE id = '$eec';");									 																					 

	//echo '<script language="javascript">alert("Solcitud aprobada. "); <script>';
	echo "<script> var us = '$user';</script>";	
	echo '<script type="text/javascript">window.location.href="frmSeguimientoAdmin.php?user="+us </script>';
}
if (isset($_POST["Rechazar"])) {
		$sql_insert = $conn->Execute("UPDATE tra_solicitud SET
									 atendido = '3',
									 respuesta = '$_POST[obs]',
									 aprobado_por = '$usuario',
									 fecha_aprobado = '$fechas'
									 WHERE id = '$eec';");									 																					 
	//echo '<script language="javascript">alert("Solcitud rechazada. "); <script>';
	echo "<script> var us = '$user';</script>";	
	echo '<script type="text/javascript">window.location.href="frmSeguimientoAdmin.php?user="+us </script>';}
?>


<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza Callisaya - 2015">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>  
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

function reEnviaFormularioCero(){
document.f1.submit();
}
</script>  
</head>
	<body>
<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    <div align="center">
    <img src="images/banner.jpg" alt="" width="710" height="165" align="middle"><br>
  <h2>APROBAR / RECHAZAR</h2>  
    </div>    
<?php
	   $sql_codice1 = "SELECT
						tra_solicitud.id,
						tra_solicitud.formulario,
						tra_solicitud.fecha_ini,
						tra_solicitud.fecha_fin,
						tra_solicitud.hora_salida,
						tra_solicitud.hora_llegada,
						tra_solicitud.destino,
						tra_solicitud.telefono,
						tra_solicitud.motivo,
						tra_solicitud.atendido,
						tra_solicitud.usuario,
						users.nombre,
						tra_vehiculo.tipo,
						tra_vehiculo.marca
						FROM
						tra_solicitud
						INNER JOIN users ON users.id = tra_solicitud.usuario
						INNER JOIN tra_vehiculo ON tra_solicitud.placa = tra_vehiculo.placa
						WHERE tra_solicitud.id = $eec";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$form = $reg_codice1->fields["formulario"];
		$ini = $reg_codice1->fields["fecha_ini"];
		$fin = $reg_codice1->fields["fecha_fin"];
		$salida = $reg_codice1->fields["hora_salida"];
		$llegada = $reg_codice1->fields["hora_llegada"];
		$destino = $reg_codice1->fields["destino"];
		$motivo = $reg_codice1->fields["motivo"];
		$usuario = $reg_codice1->fields["nombre"];
		$tipo = $reg_codice1->fields["tipo"];
		$marca = $reg_codice1->fields["marca"];
		?>                                   
 <form name="f1" method="post" action="" id="f1">
    <div align="center">
    
      <table class="table table-striped" id="example2">
      <tr>
      </tr>
      <tr>
        </tr>
        <tr>
        <td>
          <h3 align="right"><strong><strong>FORM:</strong></strong>&nbsp; <?php echo $form;?></h3>
          <h3 align="left"><strong><strong>Solicitante:</strong></strong>&nbsp; <?php echo $usuario;?></h3>
          <!--<h3 align="left"><strong><strong>Fecha de:</strong></strong>&nbsp; <?php echo $ini;?> <strong><strong>a:</strong></strong> <?php echo $fin;?></h3>-->
          <h3 align="left"><strong><strong>Fecha y hora:</strong></strong>&nbsp; <?php echo $salida;?> <strong><strong>&nbsp;&nbsp;&nbsp;a:&nbsp;&nbsp;&nbsp;</strong></strong> <?php echo $llegada;?></h3>
          <h3 align="left"><strong><strong>Destino:</strong></strong>&nbsp; <?php echo $destino;?></h3>
          <h3 align="left"><strong><strong>Motivo:</strong></strong>&nbsp; <?php echo $motivo;?></h3>
          <h3 align="left"><strong><strong>Vehículo asignado:</strong></strong>&nbsp; <?php echo $tipo;?> - <?php echo $marca;?></h3>
        </td>        
        </tr>
        <tr>
        </tr>
      <tr>
      <td >
          <h3 align="left"><font color="#FF0000">En caso de RECHAZAR favor justificar:</font></h3>
          <textarea name="obs" cols="70" rows="5" id="obs" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
          <br></td>
      </tr>
       <tr>
       <th align="center">
       <input type="submit" name="Aceptar" value="APROBAR" class="btn btn-primary btn-cons" id="Aceptar" title="Aprobar" />
       <a href="frmSeguimientoAdmin.php?user=<?php echo $user ?>"><input type="button" name="Cancelar" value="CANCELAR" class="btn btn-warning btn-cons" id="Cancelar" title="Cerrar"/></a>
       <input type="submit" name="Rechazar" value="RECHAZAR" class="btn btn-danger btn-cons" id="Rechazar" title="Rechazar"/></th>
       </tr>
    </table>   
    </div>
</form>
	</div>
</section>							
</div></div></div>
</body>
</html>
