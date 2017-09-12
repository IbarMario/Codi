<?php
session_start();
include_once("db.php"); 
$id=$_GET['id'];


if (isset($_POST["Enviar"])) {
		$sql_insert = $conn->Execute("UPDATE tbl_resoluciones SET
									 titulo = '$_POST[titulo]',									
									 descripcion = '$_POST[descripcion]'
									 WHERE id_documento = '$id'");	

	echo '<script type="text/javascript">window.location.href="frmRegistrar.php" </script>';
}
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
  <H1><strong><font color="#003399">RESOLUCIONES MODIFICAR</font></strong></H1>
  </div>
    <p align="right"><a href="frmResolucionesAdmin.php"><img src="img/Volver.jpg" width="106" height="49"></a></p>
  <p>

<?php
	   $sql_codice1 = "SELECT
						tbl_resoluciones.id_documento,
						tbl_resoluciones.titulo,
						tbl_resoluciones.descripcion
						FROM
						tbl_resoluciones
						WHERE tbl_resoluciones.id_documento = '$id'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$tit = $reg_codice1->fields["titulo"];
		$des = $reg_codice1->fields["descripcion"];
		?>  
  
  <form name="f1" action="" method="post">
	 <div align="center">
      <table align="center" width="200" border="0" cellspacing="1" cellpadding="1">
	    <tr>
	      <td>
          <table class="table table-striped" id="example" border="1">
            <tr>
			<td>
				<font color="#FF0000">Titulo</font>
			</td>

			<td><input type="text" id="titulo" name="titulo" onKeyUp="javascript:this.value=this.value.toUpperCase();" value="<?php echo $tit; ?>"/></td>
		</tr>
		<tr>
			<td colspan="2">
				<font color="#FF0000">Descripcion</font></td>
		</tr>
		<tr>
			<td colspan="2">
				<textarea id="descripcion" name="descripcion" cols="50" rows="5"> <?php echo $des; ?> </textarea>
			</td>
		</tr>

		<tr>
			<td colspan="2" align="center">
				<input type="submit" class="btn btn-warning btn-cons" name="Enviar"  value="Editar Resolución" id="Enviar"/>

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
