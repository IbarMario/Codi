<?php
session_start();
include_once("db.php"); 
$form=$_GET['id'];

$user=$_GET['user'];
$placa=$_GET['placa'];
//$gestion = $_GET['gestion'];
//echo $gestion;
//echo 'Efras';
if (isset($_POST["Enviar"])) {
$sql_insert = $conn->Execute("UPDATE tra_gasolina SET
									 anulado = '0'
									 WHERE form = '$form'");			
			
   	echo "<script> var us = '$user'; var pla = '$placa';</script>";
	echo '<script type="text/javascript">window.location.href="frmCancelarGasolina.php?user="+us+"&placa="+pla </script>';
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza Callisaya - 2015">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<style type="text/css" class="init">

	div.dataTables_length {
	padding-left: 2em;
	}
	div.dataTables_length,
	div.dataTables_filter {
		padding-top: 0.55em;
	}
</style>

<!--<link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>-->


<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#example').dataTable( {
		"dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
	} );
} );

</script>
<!--  EFRAIN ESPINOZA -->
<script language=”JavaScript”>
function Abrir_ventana (pagina) {
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=640, height=480, top=100, left=100";

window.open(pagina,"",opciones);
}

function reEnviaFormularioCero(){
document.f1.submit();
}
</script>
<script language="javascript"> 
<!-- 
function Cerrar_Ventana() 
{ 
var ventana=window.self; 
ventana.opener=window.self; 
opener.location.href = 'frmSeguimientoSeg.php'
//ventana.close();
} 
//--> 
</script>
<title>MDPyEP - TRANSPORTE</title>
</head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
  <h3><img src="images/banner.jpg" width="629" height="166">
  <h1><span class="bold"><strong><BR>
  HABILITAR  VALES DE GASOLINA</strong></span>
  </h1></h3></div>
<p align="right">&nbsp;</p>
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
						tra_vehiculo.id,
						tra_gasolina.form,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.anulado
						FROM
						tra_vehiculo
						INNER JOIN tra_gasolina ON tra_vehiculo.placa = tra_gasolina.placa
						WHERE tra_vehiculo.placa='$placa' and tra_gasolina.form='$form'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$estado = $reg_codice1->fields["estado"];
		?>    
<table align="center">
  <tr>
  <h1 align="center">FORMULARIO: <strong><?php echo $form;?></strong><br/></h1> - 
  <h1 align="center">Placa: <strong><?php echo $placa;?></strong><br/></h1>  	
     <td>                                                  
          <ul>    
            <li><font color="#000099" size="2">Marca: <strong><?php echo $reg_codice1->fields["marca"];?></strong></font></li>
            <li><font color="#000099" size="2">Tipo: <strong><?php echo $reg_codice1->fields["tipo"];?></strong></font></li>
        </ul></td>
     <td>
    	<ul>    
            <li><font color="#000099" size="2">Asignado a: <strong><?php echo $reg_codice1->fields["asignado"];?></strong></font></li>
            <li><font color="#000099" size="2">Solicitante: <strong><?php echo $reg_codice1->fields["conductor"];?></strong></font></li>
        </ul>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="f1" action="" method="post">
<div align="center">
           <a href="frmCancelarGasolina.php?user=<?php echo $user ?>"><input type="button" name="Cancelar" value="VOLVER" class="btn btn-warning btn-cons" id="Cancelar" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        
           <input type="submit" name="Enviar" value="HABILITAR VALE" class="btn btn-primary" id="Enviar" /></div>
</form>           
	</div></div></div>

<div align="center">
<font size="1">Elaborado por:  Desarrollo y Mantenimiento de Sistemas<br>MDPyEP @ 2015<br>Consultas: Int. 318</font>
</div>
   <br>
</body>
