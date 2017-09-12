<?php
session_start();
include_once("db.php"); 
$user=$_GET['user'];
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza Callisaya - 2016">
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
<title></title>
</head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
      <h1><span><strong><BR>
  REPORTE DE PASAJES Y VIÁTICOS</strong></span>
</h1></div>
<p align="right">
    <font size="2"></p>
<table width="91">
  <tr align="center">
    <!--<td width="120"><a href="rptControlMant4.php?placa=<?php echo $placa;?>"><img src="images/print.png" width="40" height="36"><br>Imprimir</a></td>-->
        <td width="83"><a href="frmBusqueda.php"><img src="images/buscar.png" width="40" height="36"><br>
        Búsqueda<br>avanzada</a></td>
  </tr>
</table>




<table class="table table-striped" id="example">
  <thead>
      <tr>
        <th>N°</th>
        <th>fecha salida</th>
        <th>fecha llegada</th>
        <th>nombre</th>
        <th>hoja de ruta</th>
        <th>origen</th> 
        <th>destino</th> 
        <th>nro. boleto</th> 
        <th>aerolinea</th>
        <th>monto pasaje</th>
        <th>monto viático</th>
        </tr>
      </thead>
    <tbody>
  <?php $i = 0;
	 
		 	   $sql_codice = "SELECT
								documentos.id,
								documentos.codigo,
								documentos.nur,
								documentos.nombre_remitente,
								documentos.fecha_creacion,
								pvfucovs.origen,
								pvfucovs.destino,
								pvfucovs.fecha_salida,
								pvfucovs.fecha_arribo,
								pvfucovs.total_viatico,
								pvfucovs.total_pasaje,
								pvfucovs.nro_boleto,
								pvfucovs.empresa
								FROM
								documentos
								INNER JOIN pvfucovs ON pvfucovs.id_documento = documentos.id
								WHERE documentos.codigo LIKE 'FCV/MDPyEP%' AND documentos.nur LIKE 'MDPyEP/201%'
								ORDER BY pvfucovs.fecha_salida DESC;";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;


	while ((!$reg_codice->EOF)) {
		$eec = $reg_codice->fields["placa"];

		 $fechaA = $reg_codice->fields["fecha_salida"];
		$dateA = date_create($fechaA);
		$fecha1=date_format($dateA, 'd-m-Y');
		 
		 $fechaL = $reg_codice->fields["fecha_arribo"];
		$dateB = date_create($fechaL);
		$fecha2=date_format($dateB, 'd-m-Y');
		
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $i;?></td>
        <td align="left"><?php echo $fecha1 ?></td>      
        <td align="left"><?php echo $fecha2 ?></td>      
        <td align="left"><?php echo $reg_codice->fields["nombre_remitente"];?></td>
        <td align="left"><?php echo $reg_codice->fields["nur"];?></td>
        <td align="left"><?php echo $reg_codice->fields["origen"];?></td>     
        <td align="left"><?php echo $reg_codice->fields["destino"];?></td>     
        <td align="center"><?php echo $reg_codice->fields["nro_boleto"];?></td>
        <td><?php echo $reg_codice->fields["empresa"];?></td> 
        <td align="center"><?php echo $reg_codice->fields["total_pasaje"];?></td> 
        <td align="center"><?php echo $reg_codice->fields["total_viatico"];?></td>   
        
      </tr>
        
      <?php
		   $reg_codice->MoveNext();
        }
        ?>
        
      </tbody>
    <?php /*
		$sql="SELECT SUM(total_pasaje) FROM documentos
								INNER JOIN pvfucovs ON pvfucovs.id_documento = documentos.id
								WHERE documentos.codigo LIKE 'FCV/MDPyEP%' AND documentos.nur LIKE 'MDPyEP/2015-%' AND pvfucovs.fecha_salida BETWEEN '2015-09-27' AND '2015-09-28' AND empresa = 'BOA'";  
		$consulta=mysql_query($sql); 
		$rcount=mysql_result($consulta,0);
		echo '<b><span style="color:red; font-size:12px;">TOTAL PASAJES: '.$rcount.'</span></b>';
	*/?>
</table>

    </div></div></div>
   <br>
</body>
