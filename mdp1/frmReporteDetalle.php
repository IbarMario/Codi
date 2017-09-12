<?php
include_once("db.php"); 

$nuri = $_GET["id"];
//$nuri = 'E-MDPyEP/2014-05426';
//echo $nuri;

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Ing. Efrain Espinoza Callisaya - 2016">
    <title>MDPyEP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.minn.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="icon" href="favicon.ico">
    <script type="text/javascript" language="javascript" src="js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</head>
<body>
<div class="page-header">
<h4 class="text-center"><img src="images/logo_mdp.png" width="372" height="85"></h4>
<div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="text-center">
                SEGUIMIENTO
            </h4>
        </div>
<div class="container" align="center">
<P>
  <p align="right"><a href="busqueda.php" class="btn btn-primary">VOLVER</a></p>
  <table class="table table-striped" id="example2" width="100%">
    <tbody>       
      <?php
	   $sql_codice1 = "SELECT DISTINCT documentos.nur,
					documentos.referencia,
					documentos.codigo,
					documentos.nombre_destinatario,
					documentos.cargo_destinatario,
					documentos.nombre_remitente,
					documentos.cargo_remitente,
					documentos.institucion_remitente
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
        <td align="left"><strong>DESTINATARIO:</strong></td>
        <td align="left"><?php echo $reg_codice1->fields["nombre_destinatario"];?><br><?php echo $reg_codice1->fields["cargo_destinatario"];?></td>
      </tr>      
      <tr>
        <td align="left"><strong>REMITENTE:</strong></td>
        <td align="left"><?php echo $reg_codice1->fields["nombre_remitente"];?><br><?php echo $reg_codice1->fields["cargo_remitente"];?><br><?php echo $reg_codice1->fields["institucion_remitente"];?></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <table class="table table-striped" id="example">
    <thead>
      <tr>
        <th>Nro.</th>
        <th> emisión</th>
        <th width="70">PROVEIDO</th>
        <th> recepción</th>
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
		
	switch($estado){
		case 1:
			$esta = 'NO RECIBIDO';
		break;
		case 2:
			$esta = 'PENDIENTE';
		break;
		case 4:
			$esta = 'DERIVADO';
		break;
		case 6:
			$esta = 'AGRUPADO';
		break;
		case 10:
			$esta = 'ARCHIVADO';
		break;
		default:
			$esta = '';		
	}			
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $i;?></td>
        <td align="left"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["de_oficina"];?></font></b><br><font size="1"><?php echo $reg_codice->fields["nombre_emisor"];?></font><br><font size="1"><b><?php echo $reg_codice->fields["cargo_emisor"];?></b></font><br><font size="1"><div align="left"><?php echo $reg_codice->fields["fecha_emision"];?></div></font></td>
                <td align="left"><font size="1"><?php echo $reg_codice->fields["proveido"];?></font></td>

        <td align="left"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["a_oficina"];?></font></b><br><font size="1"><?php echo $reg_codice->fields["nombre_receptor"];?></font><br>
        <font size="1"><b><?php echo $reg_codice->fields["cargo_receptor"];?></b></font><br>
        <font size="1" color="#990033"><?php echo $esta;?></font><br>
        <font size="1"><div align="left"><?php echo $reg_codice->fields["fecha_recepcion"];?></div></font></td>
        </tr>
      <?php
            $reg_codice->MoveNext();
        }
        ?>
      </tbody>
</table><br><br>
  <p align="right"><a href="busqueda.php" class="btn btn-primary">VOLVER</a></p>
    </div></div></div>
   
</body>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
