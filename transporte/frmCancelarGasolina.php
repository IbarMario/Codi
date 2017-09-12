<?php
session_start();
include_once("db.php"); 
$user=$_GET['user'];
//$placa=$_GET['placa'];
//$gestion = $_GET['gestion'];
//echo $gestion;
//echo 'Efras';
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
  CANCELAR  VALES DE GASOLINA</strong></span>
  </h1></h3></div>
<p align="right">
    <a href="frmSolicitudGasolina.php?user=<?php echo $user ?>"><img src="images/boton_volver.png" width="98" height="44"></a> </p>

<table class="table table-striped" id="example">
  <thead>
      <tr>
        <th>N°</th>
        <th>Formulario</th>
        <th>Placa</th>
        <th>Solicitado por</th>
        <th>fecha solicitud</th>
        <th>cantidad (litros)</th> 
        <th>acción</th>
        </tr>
      </thead>
    <tbody>
  <?php $i = 0;
	 
		 	   $sql_codice = "SELECT
								tra_gasolina.id,
								tra_gasolina.form,
								tra_gasolina.usuario,
								tra_gasolina.unidad_solicitante,
								tra_gasolina.fecha_registro,
								tra_gasolina.fecha_solicitud,
								tra_gasolina.cantidad,
								tra_gasolina.km_anterior,
								tra_gasolina.fecha_anterior,
								tra_gasolina.km_actual,
								tra_gasolina.placa,
								tra_gasolina.motivo,
								tra_gasolina.vales,
								tra_gasolina.factura,
								tra_gasolina.anulado,
								users.nombre
								FROM
								tra_gasolina
								INNER JOIN users ON tra_gasolina.usuario = users.id
								ORDER BY tra_gasolina.id DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;

	while ((!$reg_codice->EOF)) {
		$eec = $reg_codice->fields["placa"];
		$anulado = $reg_codice->fields["anulado"];	
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $i;?></td>
        <td align="left"><?php echo $reg_codice->fields["form"];?></td>
        <td align="left"><?php echo $reg_codice->fields["placa"];?></td>
        <td align="left"><?php echo $reg_codice->fields["nombre"];?></td>        <td align="left"><?php echo $reg_codice->fields["fecha_solicitud"];?></td>        <td align="center"><?php echo $reg_codice->fields["cantidad"];?></td>     
        <td align="center">
        <?php if($anulado == 0){ ?>
        <a href="frmAnularGas.php?id=<?php echo $reg_codice->fields["form"];?> & placa=<?php echo $reg_codice->fields["placa"];?> & user=<?php echo $user ?>"><img src="images/ok.jpg" width="23" height="19" title="Anular vale"></a>
        <?php } 
			else {?>
            <a href="frmHabilitarGas.php?id=<?php echo $reg_codice->fields["form"];?> & placa=<?php echo $reg_codice->fields["placa"];?> & user=<?php echo $user ?>"><img src="images/cerrar.png" width="24" height="20" title="Habilitar vale"></a>
 		 <?php } ?>
        </td>        
      </tr>
        
      <?php
		   $reg_codice->MoveNext();
        }
        ?>
      </tbody>
</table>
</div></div></div>

<div align="center">
<font size="1">Elaborado por:  Desarrollo y Mantenimiento de Sistemas<br>MDPyEP @ 2015<br>Consultas: Int. 318</font>
</div>
   <br>
</body>
