<?php
session_start();
include_once("db.php"); 
$user=$_GET['user'];

//echo $user;
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

<title>MDPyEP - SEGUIMIENTO</title>
</head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
  <h3><img src="images/banner.jpg" alt="" width="710" height="165" align="middle"></h3>
  <h3><span class="bold">CONTROL DE INGRESO Y SALIDA DE BIENES</span>
  </h3></div>
  <p align="right">
    <a href="index.php?user=<?php echo $user;?>"><img src="images/boton_volver.png" width="98" height="44"></a></p><br>
<table class="table table-striped" id="example">
  <thead>
      <tr>
        <th>N°</th>
        <th>Formulario</th>
        <th>Fecha solicitud</th>        
        <th>fecha salida</th>
        <th>fecha retorno</th>
        <th>destino</th>
        <th>Respuesta</th>
        <th>ACCIÓN</th>
       </tr>
      </thead>
    <tbody>
  <?php $i = 0;
	 
		 	   $sql_codice = "SELECT
								tra_solicitud.id,
								tra_solicitud.fecha_reg,
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
								tra_solicitud.respuesta
								FROM
								tra_solicitud
								WHERE tra_solicitud.usuario = '$user'
								ORDER BY tra_solicitud.formulario DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;
	   
        while ((!$reg_codice->EOF)) {
		//$at = $reg_codice->fields["formulario"];	
		$at = $reg_codice->fields["id"];
		//$estado = $reg_codice->fields["estado"];
		$i = $i +1;
		?>
      <tr> 
        <td align="center"><?php echo $i;?></b></td>
        <td align="center"><?php echo $reg_codice->fields["formulario"];?></td>
        <td align="center"><?php echo $reg_codice->fields["fecha_reg"];?></td>        
        <td align="center"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["fecha_ini"];?></font></b><br></td>
        <td align="center"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["fecha_fin"];?></font></b><br></td>
        <td align="left"><?php echo $reg_codice->fields["destino"];?></td>
        <td align="left"><font color="#006600"><?php echo $reg_codice->fields["respuesta"];?></font></td>
        <td align="center"><a href="rptSolicitud.php?eec=<?php echo $at; ?>" target="_blank"><img src="images/print.png" width="34" height="34"></a></td>
      </tr>
        
      <?php
		   $reg_codice->MoveNext();
        }
        ?>
      </tbody>
</table>
</div></div></div>

<div align="center">
<font size="1">MDPyEP @ 2017</font></div>
   <br>
</body>
