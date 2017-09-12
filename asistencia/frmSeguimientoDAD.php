<?php
session_start();
include_once("db.php");
$dat=$_GET['dat']; 
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
opener.location.href = 'frmSeguimientoDA.php'
//ventana.close();
} 
//--> 
</script>
<title>MDPyEP - SEGUIMIENTO</title>
</head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
  <h3><img src="images/baner_soporte.jpg" alt="" width="818" height="165" align="middle"></h3>
  <h3><span class="bold">CONTROL</span>
  </h3></div>
<p align="right">
    <font size="2"><b>
    <a href="frmSeguimientoDA.php" class="btn btn-warning">| VOLVER |</a></b></font></p>

<p>&nbsp;</p>
<table class="table table-striped" id="example">
  <thead>
      <tr>
        <th>usuario</th>
        <th>Entidad</th>
        <th>Fecha solicitud</th>        
        <th>solicitud</th>        
        <th>fecha respuesta</th>
        <th>Respuesta</th>
        <th>Tecnico</th>
       </tr>
      </thead>
    <tbody>
  <?php $i = 0;
	 
		 	   $sql_codice = "SELECT
								soporte_solicitud.id,
								soporte_solicitud.telefono,
								soporte_solicitud.descripcion,
								soporte_solicitud.fecha,
								soporte_solicitud.a1,
								soporte_solicitud.a2,
								soporte_solicitud.a3,
								soporte_solicitud.a4,
								soporte_solicitud.a5,
								soporte_solicitud.a6,
								soporte_solicitud.atendido,
								users.nombre,
								oficinas.oficina,
								entidades.sigla,
								soporte_respuesta.tecnico,
								soporte_respuesta.fecha as fecha2,
								soporte_respuesta.observaciones,
								soporte_respuesta.id_soporte
								FROM
								soporte_solicitud
								INNER JOIN users ON soporte_solicitud.id_usuer = users.id
								INNER JOIN oficinas ON users.id_oficina = oficinas.id
								INNER JOIN entidades ON oficinas.id_entidad = entidades.id
								INNER JOIN soporte_respuesta ON soporte_solicitud.id = soporte_respuesta.id_soporte
								WHERE soporte_respuesta.id_soporte = '$dat'
								ORDER BY soporte_solicitud.fecha DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;
	while ((!$reg_codice->EOF)) {
		$eec = $reg_codice->fields["id"];	
		$desc = $reg_codice->fields["descripcion"];
				 
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $reg_codice->fields["nombre"];?><br> <?php echo $reg_codice->fields["oficina"];?></td>        
        <td align="left"><?php echo $reg_codice->fields["sigla"];?></td>
        <td align="left"><?php echo $reg_codice->fields["fecha"];?></td>
        <td align="left"><?php echo $reg_codice->fields["descripcion"];?></td>        
        <td align="left"><?php echo $reg_codice->fields["fecha2"];?></td>            
        <td align="left"><?php echo $reg_codice->fields["observaciones"];?></td>
        <td align="left"><?php echo $reg_codice->fields["tecnico"];?></td>            
      </tr>
        
      <?php
		   $reg_codice->MoveNext();
        }
        ?>
      </tbody>
</table>
</div></div></div>
<div align="center">
<font size="1">Elaborado por: Área de Desarrollo y Mantenimiento de Sistemas<br>MDPyEP @ 2015<br>Consultas: Int. 318</font>
</div>
   <br>
</body>
