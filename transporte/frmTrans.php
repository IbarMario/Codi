<?php
session_start();
include_once("db.php"); 
$user=$_GET['user'];

	   $sql_codice1 = "SELECT
						oficinas.oficina,
						users.nombre,
						users.username,
						users.cargo,
						users.email
						FROM
						users
						INNER JOIN oficinas ON users.id_oficina = oficinas.id
						WHERE users.id = '$user'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$usuario = $reg_codice1->fields["nombre"];		
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
opener.location.href = 'frmSeguimientoAdmin.php'
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
  <h3><img src="images/banner.jpg" alt="" width="698" height="165" align="middle"></h3>
  <h3><span class="bold">AREA DE TRANSPORTES</span>
  </h3></div>
<p align="right">
    <font size="2"><b> <?php echo $usuario;?><br>
    </b></font></p>

<div align="center">
<table width="657" align="center" class="table table-striped" id="example">
      <tr>
      	<th width="241"><p><a href="frmSeguimientoTrans.php?user=<?php echo $user ?>"><img src="img/comunicados.png" width="108" height="108"></a></p>
          <p><font size="3">seguimiento a solicitudes</font><br>
          </p></th>
        <th width="212"><p><a href="frmSolicitudGasolina.php?user=<?php echo $user ?>"><img src="img/gasolina.png" width="108" height="108"></a></p>
      	  <p><font size="3">SOLICITUD DE VALES DE GASOLINA</font></p></th>
        <!--<th>descripción </th>-->        
        <th width="226"><p><a href="frmSolicitudMantPrev.php?user=<?php echo $user ?>"><img src="img/reglamentos.png" width="108" height="108"></a></p>
          <p><font size="3">Solicitud mantenimiento preventivo</font></p>
          <p>&nbsp;</p></th>
          </tr>
      <tr> 
      	<th>&nbsp;</th>
        <th><p><br>
          </p></th>
        <th>&nbsp;</th>
          </tr> 
      <tr> 
      	<th><p><a href="frmVehiculos.php?user=<?php echo $user ?>"><img src="img/avisos.png" width="108" height="108"></a></p>
          <p><font size="3">control y mantenimiento de movilidades</font></p>
          <p>&nbsp;</p></th>
        <th><p><a href="RegVehiculo.php?user=<?php echo $user ?>"><img src="img/documentos.png" width="108" height="108"></a></p>
      	  <p><font size="3">Registro de vehiculos</font></p>
      	  <p>&nbsp;</p></th>
        <th><p> <a href="index.php?user=<?php echo $user ?>"><img src="img/circulares.png" width="112" height="112"></a></p>
          <p><font size="3">SALIR</font></p></th>
          </tr>             
</table>
</div>
	</div></div></div>

<div align="center">
<font size="1">Elaborado por: Área de Desarrollo y Mantenimiento de Sistemas<br>MDPyEP @ 2015<br>Consultas: Int. 318</font>
</div>
   <br>
</body>
