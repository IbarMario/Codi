<?php
include_once("db.php"); 

$nuri = $_GET["id"];
//$nuri = 'E-MDPyEP/2014-05426';
//echo $nuri;

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<!--<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>-->
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#example').dataTable( {
		"dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
	} );
} );

</script>
<title>MDPyEP - SEGUIMIENTO</title></head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <h3>
    <span class="bold">SEGUIMIENTO MDPyEP</span>
  </h3>
  <table class="table table-striped" id="example2" width="100%">
    <tbody>       
      <?php
	   $sql_codice1 = "SELECT DISTINCT documentos.nur,
					documentos.referencia,
					documentos.codigo
					FROM
					documentos
					INNER JOIN seguimiento ON documentos.nur = seguimiento.nur
					WHERE documentos.nur = '$nuri'";
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$estado = $reg_codice1->fields["estado"];
		?>
      <tr>
        <td><strong>HOJA DE RUTA:</strong></td>
        <td><font size="3" color="#000099"><b><?php echo $reg_codice1->fields["nur"];?></b></font></td>
      </tr>
      <tr>
        <td align="left"><strong>REFERENCIA:</strong></td>
        <td align="left"><?php echo $reg_codice1->fields["referencia"];?></td>
      </tr>
      <tr>
        <td align="left"><strong>DOCUMENTO:</strong></td>
        <td align="left"><?php echo $reg_codice1->fields["codigo"];?></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <table class="table table-striped" id="example">
    <thead>
      <tr>
        <th>Nro.</th>
        <th> emisión</th>
        <th> recepción</th>
        <th>Referencia</th>
        <!--<th>Contenido</th>-->
        </tr>
      </thead>
    <tbody>
  <?php 
  	   $i = 0;
	   $sql_codice = "SELECT * FROM seguimiento WHERE nur = '$nuri'";	     
	   $reg_codice = $conn->Execute($sql_codice) ;
	   
        while (!$reg_codice->EOF) {
		$estado = $reg_codice->fields["estado"];
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $i;?></td>
        <td align="left"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["de_oficina"];?></font></b><br><font size="1"><?php echo $reg_codice->fields["nombre_emisor"];?></font><br><font size="1"><b><?php echo $reg_codice->fields["cargo_emisor"];?></b></font><br><font size="1"><div align="right"><?php echo $reg_codice->fields["fecha_emision"];?></div></font></td>
        <td align="left"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["a_oficina"];?></font></b><br><font size="1"><?php echo $reg_codice->fields["nombre_receptor"];?></font><br><font size="1"><b><?php echo $reg_codice->fields["cargo_receptor"];?></b></font><br><font size="1"><div align="right"><?php echo $reg_codice->fields["fecha_recepcion"];?></div></font></td>
        <td align="left"><?php echo $reg_codice->fields["proveido"];?></td>
        </tr>
      <?php
            $reg_codice->MoveNext();
        }
        ?>
      </tbody>
</table>
</div></div></div>
   
</body>
