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

<title>IntraNet - MDPyEP - Documentos</title>
</head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
  <H1><strong><font color="#003399">DIRECTORIO TELEFÓNICO - 2017 </font></strong></H1>
</div>
<font size="2" color="#FF0000"><b>NOTA: Si su nombre y teléfono interno no se encuentran, <br>Favor enviar su datos por el Sistema de Soporte Técnico.</b></font>
<table class="table table-striped" id="example">
  <thead>
      <tr>
      	<th>N°</th>
        <th>NOMBRES Y APELLIDOS</th>
        <th>OFICINA  </th>
        <th>INTERNO</th>
        <th>TELÉFONO / FAX</th>
        </tr>
      </thead>
    <tbody>
  <?php $i = 0;		 
		 	   $sql_codice = "SELECT *
								FROM
								directorio";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;
	   
        while ((!$reg_codice->EOF)) {
		$nur = $reg_codice->fields["nur"];	
		
		$id = $reg_codice->fields["id_documento"];
		$i = $i +1;
		?>
      <tr> 
      	<td><?php echo $i; ?></td>
        <td align="left"><font color="#000099"><?php echo $reg_codice->fields["nombres"];?></font><br><font size="1"><?php echo $reg_codice->fields["cargo"];?></font></td>
        <td align="center"><font color="#000099"><?php echo $reg_codice->fields["oficina"];?></font></td>
        <td align="center"><font color="#000099"><?php echo $reg_codice->fields["interno"];?></font></td>
        <td align="center"><font color="#000099"><?php echo $reg_codice->fields["telefono"];?></font></td>
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
<br />
<a href="login.php">Iniciar Sesión</a><br />
</div>
   <br>
</body>
