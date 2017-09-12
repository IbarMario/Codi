<?php
	include_once("db.php"); 
	$gestion=$_GET['gestion'];
	$inst=$_GET['inst'];
	$nuri=$_GET['nur'];
	$cite=$_GET['cite'];
	$ref=$_GET['ref'];
	$remite=$_GET['remite'];
	$cremite=$_GET['cremite'];
	$instremite=$_GET['instremite'];
	$dest=$_GET['dest'];
	$cdest=$_GET['cdest'];

	$cb_nur=$_GET['cb_nur'];
	$cb_cite=$_GET['cb_cite'];
	$cb_ref=$_GET['cb_ref']; 
	$cb_remite=$_GET['cb_remite']; 
	$cb_cremite=$_GET['cb_cremite']; 
	$cb_inst=$_GET['cb_inst']; 
	$cb_desti=$_GET['cb_desti']; 
	$cb_cdesti=$_GET['cb_cdesti']; 
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Ing. Efrain Espinoza Callisaya - 2017">
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
                RESULTADO DE LA BÚSQUEDA
            </h4>
        </div>
<div class="container" align="center">
  <p align="center">
    <a href="busqueda.php"><img src="images/buscar.png" width="39" height="41"><br>
      VOLVER A BUSCAR</a></p>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Hoja de Ruta</th>
        <th>Remitente</th>    
        <th>Referencia</th>
        <th>Ver</th>
        </tr>
      </thead>
    <tbody>

<?php 

$sql_codice = "SELECT
				documentos.nur,
				documentos.codigo,
				documentos.referencia,
				documentos.fecha_creacion,
				documentos.nombre_destinatario,
				documentos.cargo_destinatario,
				documentos.institucion_destinatario,
				documentos.nombre_remitente,
				documentos.cargo_remitente,
				documentos.institucion_remitente,
				documentos.id_entidad
				FROM
				documentos
				WHERE
				documentos.fecha_creacion LIKE '%$gestion%' AND documentos.id_entidad = '$inst' AND documentos.nur LIKE 'E-%$nuri%'
				GROUP BY documentos.nur";
			

	  	 $reg_codice = $conn->Execute($sql_codice) ;

        while ((!$reg_codice->EOF)) {
		?>
     <tr class="table-body">
        <td align="left"><b><font color="#000099" size="2"><a href="frmReporteDetalle.php?id=<?php echo $reg_codice->fields["nur"];?>"><?php echo $reg_codice->fields["nur"];?></a></font></b></td>
        <td align="left"><font size="2"><?php echo $reg_codice->fields["nombre_remitente"];?></font><br>
                         <font size="2"><b><?php echo $reg_codice->fields["cargo_remitente"];?></b></font><br>
            <font size="2"  color="#000066"><b><?php echo $reg_codice->fields["institucion_remitente"];?></b></font></td>
        <td align="left"><font size="2"><?php echo $reg_codice->fields["referencia"];?></font></td>
        <td align="center"><b><font color="#000099" size="2"><a href="frmReporteDetalle.php?id=<?php echo $reg_codice->fields["nur"];?>"><img src="images/lupa.png" width="30" height="27"></br>DETALLE</a></font></b></td>
      </tr>
        
      <?php
		   $reg_codice->MoveNext();
        }
/*}else
{ echo "NO EXISTEN REGISTROS...!!!";}*/
        ?>
        
      </tbody>
</table>
</div>
</div>
</div>
</body>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</html>