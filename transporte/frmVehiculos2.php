<?php
session_start();
include_once("db.php"); 
$user=$_GET['user'];
$gestion = $_GET['gestion'];
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
  <h3><img src="images/banner.jpg" width="629" height="166"></h3>
  <h1><span class="bold"><strong><BR>
  VEHÍCULOS - MDPyEP</strong></span>
  </h1></div>
<p align="right">
    <font size="2">
     <a href="index.php?user=<?php echo $user ?>"><img src="images/boton_volver.png" width="98" height="44"></a> <!--<a href="logout.php">| Cerrar Sesión |</a>--></font></p>

<!--<a href="RegVehiculo.php" target="_blank" onClick="window.open(this.href,this.target,'width=750,height=610,top=170,left=370,toolbar=no,scrollbars=1,location=no,status=no,menubar=no,directories=no,titlebar=no,resizable=0');return false;"><img src="images/auto_new.jpg" width="50" height="21"><br>&nbsp;&nbsp;NUEVO</a>-->
<!--<a href="RegVehiculo.php"><img src="images/auto_new.jpg" width="50" height="21"><br>&nbsp;&nbsp;NUEVO</a>-->
<table class="table table-striped" id="example">
  <thead>
      <tr>
        <th width="39">N°</th>
        <th width="91">placa</th>
        <th width="93">marca</th>
        <th width="96">tipo</th>
        <th width="81">color</th> 
        <th width="118">asignado</th> 
        <th width="108">estado</th>
        <th width="111">control mantenimiento</th>
        </tr>
      </thead>
    <tbody>
  <?php $i = 0;
	 
		 	   $sql_codice = "SELECT
								tra_vehiculo.id,
								tra_vehiculo.placa,
								tra_vehiculo.marca,
								tra_vehiculo.tipo,
								tra_vehiculo.color,
								tra_vehiculo.asignado,
								tra_vehiculo.estado
								FROM
								tra_vehiculo
								ORDER BY tra_vehiculo.placa DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;

	while ((!$reg_codice->EOF)) {
		$eec = $reg_codice->fields["placa"];	
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $i;?></b></td>
        
		<td align="left"><a href="verDatosVehiculo.php?placa=<?php echo $reg_codice->fields["placa"];?>"><?php echo $reg_codice->fields["placa"];?></a></td>        
        <td align="left"><?php echo $reg_codice->fields["marca"];?>  </td>
        <td align="left"><?php echo $reg_codice->fields["tipo"];?><br></td>
        <td align="left"><?php echo $reg_codice->fields["color"];?></td>     
        <td align="center"><?php echo $reg_codice->fields["asignado"];?></td>
        <td><?php echo $reg_codice->fields["estado"];?></td> 
        <td align="center"><a href="frmControlMantVista.php?placa=<?php echo $reg_codice->fields["placa"];?> & user=<?php echo $user ?>"><img src="images/ver.png" width="41" height="36"></a></td>   
        
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
