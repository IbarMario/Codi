<?php
session_start();
include('db.php');
$user = $_GET['user'];
$desc = $_GET['desc'];
$eec = $_GET['eec'];
//$fecha = date('Y-m-d');
$fecha = date('Y-m-d H:i');
$fechas = date("Y-m-d h:i:s");

if (isset($_POST["Aceptar"])) {
		$sql_insert = $conn->Execute("UPDATE tra_solicitud SET
									 atendido = '1',
									 respuesta = 'Favor imprimir formulario y presentarlo en oficinas de Sevicio de Transporte.',
									 aprobado_por = '$user',
									 fecha_aprobado = '$fechas'
									 WHERE id = '$eec';");									 																					 
?>
<script> window.close();</script>
<?php 
}
if (isset($_POST["Rechazar"])) {
		$sql_insert = $conn->Execute("UPDATE tra_solicitud SET
									 atendido = '3',
									 respuesta = '$_POST[obs]',
									 aprobado_por = '$user',
									 fecha_aprobado = '$fechas'
									 WHERE id = '$eec';");									 																					 
?>
<script> window.close();</script>
<?php 
}
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
						users.nombre
						FROM
						tra_solicitud
						INNER JOIN users ON users.id = tra_solicitud.usuario
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
          <h3 align="right">FORM:&nbsp; <?php echo $form;?></h3>
          <h3 align="left">PLACA:&nbsp; <?php echo $usuario;?></h3></td>        
        </tr>
        <tr>
        </tr>
      <tr>
      <td >
          <table align="center">
            <tr>
              <h1 align="center">Placa: <strong><?php echo $placa;?></strong><br/>
              </h1>
              <td><ul>
                <li><font color="#000099" size="2">Marca: <strong><?php echo $reg_codice1->fields["marca"];?></strong></font></li>
                <li><font color="#000099" size="2">Tipo: <strong><?php echo $reg_codice1->fields["tipo"];?></strong></font></li>
                <li><font color="#000099" size="2">Color: <strong><?php echo $reg_codice1->fields["color"];?></strong></font></li>
                <li><font color="#000099" size="2">Año: <strong><?php echo $reg_codice1->fields["anio"];?></strong></font></li>
              </ul></td>
              <td><ul>
                <li><font color="#000099" size="2">Asignado a: <strong><?php echo $reg_codice1->fields["asignado"];?></strong></font></li>
                <li><font color="#000099" size="2">Conductor: <strong><?php echo $reg_codice1->fields["conductor"];?></strong></font></li>
                <li><font color="#000099" size="2">Estado funcionamiento:<strong> <?php echo $estado;?></strong></font></li>
                <li><font color="#000099" size="2">Poliza de seguro: <strong><?php echo $reg_codice1->fields["poliza"];?></strong></font></li>
              </ul></td>
            </tr>
          </table>
          <h3 align="left">&nbsp;</h3>
          <br></td>
      </tr>
       <tr>
       <th align="center"><a href="frmSolicitudMantPrev.php"><input type="button" name="Aceptar" value="VOLVER" class="btn btn-primary btn-cons" id="Aceptar" title="Aprobar" /></a></th>
       </tr>
    </table>   
    </div>
</form>
	</div>
</section>							
</div></div></div>
</body>
</html>
