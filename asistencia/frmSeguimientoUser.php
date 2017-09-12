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

<title>Soporte Tecnico - MDPyEP</title></head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
  <h3><img src="images/baner_soporte.jpg" alt="" width="818" height="165" align="middle"></h3>
  <h3><span class="bold">SEGUIMIENTO SOPORTE TÉCNICO</span>
  </h3></div>
  <p align="right">
    <font size="2"><b><a href="index.php?user=<?php echo $user;?>">Atrás</a> &nbsp;| &nbsp;
    <a href="" onClick="window.close()">Salir</a></b></font></p><br><br>
<table class="table table-striped" id="example">
  <thead>
      <tr>
        <th>N°</th>
        <th>Fecha solicitud</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Respuesta</th>
        <th>&nbsp;</th>
        <!--<th>feha de atención</th>
        <th>responsable</th>
        <th>observaciones</th>-->
        </tr>
      </thead>
    <tbody>
  <?php $i = 0;
	 
		 	   $sql_codice = "SELECT
								soporte_solicitud.id_usuer,
								soporte_solicitud.fecha,
								soporte_solicitud.descripcion,
								soporte_solicitud.a1,
								soporte_solicitud.a2,
								soporte_solicitud.a3,
								soporte_solicitud.a4,
								soporte_solicitud.a5,
								soporte_solicitud.a6,
								soporte_solicitud.atendido,
								soporte_solicitud.respuesta
								FROM
								soporte_solicitud
								WHERE soporte_solicitud.id_usuer ='$user'
								ORDER BY soporte_solicitud.fecha DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;
	   
        while ((!$reg_codice->EOF)) {
		//$nur = $reg_codice->fields["nur"];	
		
		//$estado = $reg_codice->fields["estado"];
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $i;?></b></td>
        <td align="left"><?php echo $reg_codice->fields["fecha"];?></td>
        <td align="left"><?php echo $reg_codice->fields["a1"];?> <?php echo $reg_codice->fields["a2"];?> <?php echo $reg_codice->fields["a3"];?></td>
        <td align="left"><?php echo $reg_codice->fields["descripcion"];?></td>
        <td align="left"><?php echo $reg_codice->fields["respuesta"];?></td>
        <td align="left">
        	
        	<?php 
				$atendido = $reg_codice->fields["atendido"];
				if($atendido == 0){
					echo '<img src="images/b_rojo.png" width="45" height="34">';
					}
				else{
					echo '<img src="images/b_verde.png" width="45" height="34">';
					}
			?>
			<?php //echo $reg_codice->fields["atendido"];?>
        
        </td>
        <!--<td align="left"><?php //echo $reg_codice->fields["fecha1"];?></td>-->
        <!--<td align="left"><?php //echo $reg_codice->fields["tecnico"];?></td>-->
        <!--<td align="left"><?php //echo $reg_codice->fields["observaciones"];?></td>-->
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
