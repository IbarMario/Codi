<?php
include_once("db.php"); 

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
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#example').dataTable( {
		"dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
	} );
} );

</script>
<title>PRO BOLIVIA</title></head>
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <h3>
    <span class="bold">PRO BOLIVIA - 2014 - 2015</span>
  </h3>
  <table class="table table-striped" id="example">
    <thead>
      <tr>
        <th>Nro.</th>
        <th>Nur</th>
        <th>Codigo/Cite</th>
        <th>Destinatario</th>
        <th>Cargo Destinatario</th>
        <th>Via</th>
        <th>Cargo Via</th>
        <th>Remitente</th>
        <th>Cargo Remitente</th>
        <th>Referencia</th>
        <!--<th>Contenido</th>-->
        <th>Fecha creacion</th>
        <th>Adjuntos</th>
        <th>Copias</th>        
      </tr>
      </thead>
    <tbody>
  <?php $i = 0;
	   $sql_politicas = "SELECT *
                         FROM documentos
						 WHERE id_entidad = '5'
						ORDER BY fecha_creacion DESC";	     
	   $reg_politicas = $conn->Execute($sql_politicas) ;
	   
        while (!$reg_politicas->EOF) {
		$codpol = $reg_politicas->fields["codigo_politica"];	
		$estado = $reg_politicas->fields["estadoPolitica"];
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $i;?></td>
        <td align="left"><?php echo $reg_politicas->fields["nur"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["codigo"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["nombre_destinatario"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["cargo_destinatario"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["nombre_via"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["cargo_via"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["nombre_remitente"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["cargo_remitente"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["referencia"];?></td>
        <!--<td align="left"><?php //echo $reg_politicas->fields["contenido"];?></td>-->
        <td align="left"><?php echo $reg_politicas->fields["fecha_creacion"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["adjuntos"];?></td>
        <td align="left"><?php echo $reg_politicas->fields["copia"];?></td>  
      </tr>
      <?php
            $reg_politicas->MoveNext();
        }
        ?>
      </tbody>
</table>
</div></div></div>
   
</body>
