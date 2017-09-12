<?php
session_start();
include_once("db.php"); 
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
  <H1><strong><font color="#003399">Admin</font></strong></H1>
  </div>
  <p> 
  <div align="right"><a href="central.php"><font color="#0000FF" size="2">Salir Administrador</font></a></div>
    <h2><font color="#FF0000"><strong><b>Seleccione el tipo de archivo a publicar.</b></strong></font></h2>
  </p>
  <div align="center">
<table align="center" class="table table-striped" id="example">
      <tr>
      	<th><p><a href="frmRegistrarDoc.php"><img src="img/documentos.png" width="140" height="140"></a></p>
      	  <p><font size="3">DOCUMENTOS</font></p>
      	  <p>&nbsp;</p></th>
        <th><p><a href="frmRegistrarCom.php"><img src="img/comunicados.png" width="140" height="140"></a></p>
          <p><font size="3">COMUNICADOS</font></p>
          <p>&nbsp;</p></th>
        <!--<th>descripción </th>-->        
        <th><p><a href="frmRegistrarMan.php"><img src="img/manuales.png" width="140" height="140"></a></p>
          <p><font size="3">MANUALES</font></p>
          <p>&nbsp;</p></th>
          <th><p><a href="frmRegistrarCir.php"><img src="img/circulares.png" width="140" height="140"></a></p>
          <p><font size="3">CIRCULARES</font></p>
          <p>&nbsp;</p></th>
        </tr>
      <tr> 
      	<th>&nbsp;</th>
        <th><p><br>
          </p></th>
        <th>&nbsp;</th>
          <th>&nbsp;</th>
      </tr> 
      <tr> 
      	<th><p><a href="frmRegistrarReg.php"><img src="img/reglamentos.png" width="140" height="140"></a></p>
      	  <p><font size="3">REGLAMENTOS</font></p></th>
        <th><p><a href="frmResolucionesAdmin.php"><img src="img/resoluciones.png" width="140" height="140"></a></p>
          <p><font size="3">RESOLUCIONES</font><br>
          </p></th>
        <th><p><a href="frmRegistrarAvi.php"><img src="img/avisos.png" width="140" height="140"></a></p>
          <p><font size="3">AVISOS</font></p></th>
          <th><p><a href="frmRegistrarDes.php"><img src="img/descargas.png" width="140" height="140"></a></p>
          <p><font size="3">DESCARGAS</font></p></th>
      </tr>             
</table>
</div>
</div>

<div align="center">
<font size="1"><br>Elaborado por: Área de Desarrollo y Mantenimiento de Sistemas<br>MDPyEP @ 2015<br>Consultas: Int. 318</font>
</div>
</div></div>
</body>
