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
    
  <div align="center"><br>
  <H1><strong><font color="#003399">REGLAMENTOS</font></strong></H1>
  </div>
  <p align="right"><a href="frmRegistrar.php"><img src="img/Volver.jpg" width="106" height="49"></a></p>
  <p>
  <form id="test_upload" name="test_upload" action="upload_reg.php" enctype="multipart/form-data" method="post">
	 <div align="center">
      <table align="center" width="200" border="0" cellspacing="1" cellpadding="1">
	    <tr>
	      <td>
          <table class="table table-striped" id="example" border="1">
            <tr>
			<td>
				<font color="#FF0000">Titulo</font>
			</td>

			<td>
				<input type="text" id="titulo" name="titulo" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<font color="#FF0000">Descripcion</font>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<textarea id="descripcion" name="descripcion" cols="50" rows="5"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<font color="#FF0000">Archivo</font> <input type="file" id="archivo" name="archivo"/>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input class="btn btn-success btn-cons" type="submit" value="Registrar Reglamento"/>
			</td>
		</tr>
	</table></td>
	      </tr>
	    </table>
	</div>
</form>
  </p>
	</div>

<div align="center">
<font size="1">   <br>Elaborado por: Área de Desarrollo y Mantenimiento de Sistemas<br>MDPyEP @ 2015<br>Consultas: Int. 318</font>
</div></div></div>

</body>
