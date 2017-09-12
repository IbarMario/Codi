<?php
session_start();
include_once("db.php"); 
$user=$_GET['user'];
$placa=$_GET['placa'];
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
  <h3><img src="images/banner.jpg" width="629" height="166">
  <h1><span class="bold"><strong><BR>
  SOLICITUD  VALES DE GASOLINA</strong></span>
  </h1></h3></div>
<p align="right">
    <a href="frmSolicitudGasolina.php?user=<?php echo $user ?>"><img src="images/boton_volver.png" width="98" height="44"></a> </p>
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
						tra_vehiculo.id
						FROM
						tra_vehiculo
						WHERE tra_vehiculo.placa = '$placa'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$estado = $reg_codice1->fields["estado"];
		?>    
<table align="center">
  <tr><h1 align="center">Placa: <strong><?php echo $placa;?></strong><br/></h1>  	
     <td>                                                  
          <ul>    
            <li><font color="#000099" size="2">Marca: <strong><?php echo $reg_codice1->fields["marca"];?></strong></font></li>
            <li><font color="#000099" size="2">Tipo: <strong><?php echo $reg_codice1->fields["tipo"];?></strong></font></li>
            <li><font color="#000099" size="2">Color: <strong><?php echo $reg_codice1->fields["color"];?></strong></font></li>    
            <li><font color="#000099" size="2">Año: <strong><?php echo $reg_codice1->fields["anio"];?></strong></font></li>
        </ul><font size="2" color="#000099">´</font>
      </td>
     <td>
    	<ul>    
            <li><font color="#000099" size="2">Asignado a: <strong><?php echo $reg_codice1->fields["asignado"];?></strong></font></li>
            <li><font color="#000099" size="2">Solicitante: <strong><?php echo $reg_codice1->fields["conductor"];?></strong></font></li>
            <li><font color="#000099" size="2">Estado funcionamiento:<strong> <?php echo $estado;?></strong></font></li>    
            <li><font color="#000099" size="2">Poliza de seguro: <strong><?php echo $reg_codice1->fields["poliza"];?></strong></font></li>
        </ul>
    </td>
  </tr>
</table>  
<table width="224">
  <tr>
    <td><a href="frmSolicitudGas.php?placa=<?php echo $placa;?> & user=<?php echo $user ?>"><img src="images/gas.png" width="64" height="55"><br>
    Solicitar</a></td>
  </tr>
</table>




<table class="table table-striped" id="example">
  <thead>
      <tr>
        <th>N°</th>
        <th>Formulario</th>
        <th>Solicitado por</th>
        <th>fecha solicitud</th>
        <th>km. anteriror</th> 
        <th>km. actual</th> 
        <th>cantidad (litros)</th> 
        <th>Nro. Factura</th> 
        <th>IMPRIMIR</th>
        <th>Actualizar</th>
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
								users.nombre
								FROM
								tra_gasolina
								INNER JOIN users ON tra_gasolina.usuario = users.id
								WHERE tra_gasolina.placa = '$placa'
								ORDER BY tra_gasolina.fecha_solicitud DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;

	while ((!$reg_codice->EOF)) {
		$eec = $reg_codice->fields["placa"];	
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $i;?></td>
        <td align="left"><?php echo $reg_codice->fields["form"];?></td>
        <td align="left"><?php echo $reg_codice->fields["nombre"];?></td>        <td align="left"><?php echo $reg_codice->fields["fecha_solicitud"];?></td>        <td align="left"><?php echo $reg_codice->fields["km_anterior"];?></td>   
        <td align="left"><?php echo $reg_codice->fields["km_actual"];?></td>						        <td align="left"><?php echo $reg_codice->fields["cantidad"];?></td>     
        <td align="left"><?php echo $reg_codice->fields["factura"];?></td>
        <td align="center">
        <a href="rptSolicitudGasolina.php?id=<?php echo $reg_codice->fields["id"];?> & user=<?php echo $user ?>" target="_blank"><img src="images/print.png" width="36" height="36"></a>
        </td>   
		<td align="center"><a href="frmSolicitudGasEdit.php?id=<?php echo $reg_codice->fields["id"];?> & user=<?php echo $user ?> & placa=<?php echo $reg_codice->fields["placa"];?>"><img src="images/edit.png" width="41" height="36" title="Editar registro"></a></td>        
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
