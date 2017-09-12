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
    
  <div align="center">
  <h3><img src="images/logo_mdp.jpg" width="234" height="107" align="middle"></h3>
  <h3><span class="bold">SEGUIMIENTO MDPyEP</span>
  </h3></div>
  <p>&nbsp;</p>
<div align="right"><a href="logout.php">Cerrar sesión</a></div>
 <table class="table table-striped" id="example2">
    <thead>
      <tr>
        <th>Entidad:</th>
        <td>
        
        <form name="f1" method="post" action="" id="f1">
          <select name="entidad" onChange="submit()" id="entidad" style="width: 350px">
            <option value="0" <?php if($_POST['entidad']==0) echo 'selected="selected" ';?>>--- SELECCIONE ENTIDAD ---</option>
            <!--<option value="<?php //echo 'E-MDPyEP'; $a = "E-MDPyEP";?>">MDPyEP - Ministerio de Desarrollo Productivo y Economía Plural</option>
                <option value="<?php //echo 'E-SNP'; $b = 'E-SNP';?>">SNP - Servicio Nacional de Propiedad Intelectual</option>                
                <option value="<?php //echo 'E-SNV'; $c = 'E-SNV';?>">SNV - Servicio Nacional de Verificacion de Exportaciones</option>
                <option value="<?php //echo 'E-PRB'; $d = 'E-PRB';?>">PRB - PROBOLIVIA</option>-->
            <option value="1" <?php if($_POST['entidad']==1) echo 'selected="selected" ';?>>MDPyEP - Ministerio de Desarrollo Productivo y Economía Plural</option>
            <option value="2" <?php if($_POST['entidad']==2) echo 'selected="selected" ';?>>SNP - Servicio Nacional de Propiedad Intelectual</option>
            <option value="3" <?php if($_POST['entidad']==3) echo 'selected="selected" ';?>>SNV - Servicio Nacional de Verificacion de Exportaciones</option>
            <option value="4" <?php if($_POST['entidad']==4) echo 'selected="selected" ';?>>PRB - PROBOLIVIA</option>
          </select>
        </form>
        	
        </td>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p> 
  <?php
  
	$val = $_POST['entidad'];
	//echo $val;
	$x = "";
	$a = '1';
	$b = '2';
	$c = '3';
	$d = '4';

	switch($val){
		case 1:
			$valor = 'E-MDPyEP';
		break;
		case 2:
			$valor = 'E-SNP';
		break;
		case 3:
			$valor = 'E-SNV';
		break;
		case 4:
			$valor = 'E-PRB';
		break;
		default:
			$valor = '0';		
	}
  ?>
  
  
 <table class="table table-striped" id="example">
    <thead>
      <tr>
        <th>Hoja de Ruta</th>
        <th>Fecha </th>
        <th>Remitente</th>
        <th>Referencia</th>
        <th>ÚLTIMA Emisión</th>
        <th>ÚLTIMA Recepción</th>
        <th>Ver</th>
        </tr>
      </thead>
    <tbody>
  <?php $i = 0;
	   /*$sql_codice = "SELECT DISTINCT
						(documentos.nur),
						documentos.codigo,
						documentos.referencia,
						documentos.fecha_creacion,
						documentos.nombre_remitente,
						documentos.cargo_remitente,
						seguimiento.de_oficina,
						seguimiento.nombre_emisor,
						seguimiento.cargo_emisor,
						seguimiento.fecha_emision,
						seguimiento.a_oficina,
						seguimiento.nombre_receptor,
						seguimiento.cargo_receptor,
						seguimiento.fecha_recepcion,
						seguimiento.accion,
						seguimiento.estado,
						seguimiento.proveido,
						seguimiento.nur
						FROM
						documentos
						INNER JOIN seguimiento ON documentos.nur = seguimiento.nur
						WHERE documentos.nur LIKE '$valor%'
						GROUP BY documentos.nur
						ORDER BY seguimiento.fecha_emision DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;*/
		 
		 	   $sql_codice = "SELECT DISTINCT
								seguimiento.nur,
								seguimiento.id,
								seguimiento.de_oficina,
								seguimiento.nombre_emisor,
								seguimiento.cargo_emisor,
								seguimiento.fecha_emision,
								seguimiento.a_oficina,
								seguimiento.nombre_receptor,
								seguimiento.cargo_receptor,
								seguimiento.fecha_recepcion,
								documentos.fecha_creacion,
								documentos.nombre_remitente,
								documentos.cargo_remitente,
								documentos.referencia
								FROM
								seguimiento
								INNER JOIN documentos ON seguimiento.nur = documentos.nur
								WHERE seguimiento.nur LIKE '$valor%'
								GROUP BY seguimiento.nur
								order by seguimiento.nur DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;
	   
        while ((!$reg_codice->EOF)) {
		$nur = $reg_codice->fields["nur"];	
		
		//$estado = $reg_codice->fields["estado"];
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><b><font color="#000099"><?php echo $reg_codice->fields["nur"];?></font></b></td>
        <td align="left"><font size="1"><?php echo $reg_codice->fields["fecha_creacion"];?></font></td>
        <td align="left"><font size="1"><?php echo $reg_codice->fields["nombre_remitente"];?></font><br>
                         <font size="1"><b><?php echo $reg_codice->fields["cargo_remitente"];?></b></font></td>
        <td align="left"><?php echo $reg_codice->fields["referencia"];?></td>
        <td align="left"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["de_oficina"];?></font></b><br><font size="1"><?php echo $reg_codice->fields["nombre_emisor"];?></font><br><font size="1"><b><?php echo $reg_codice->fields["cargo_emisor"];?></b></font><br><font size="1" color="#990033"><div align="right"><?php echo $reg_codice->fields["fecha_emision"];?></div></font></td>
        <td align="left"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["a_oficina"];?></font></b><br><font size="1"><?php echo $reg_codice->fields["nombre_receptor"];?></font><br><font size="1"><b><?php echo $reg_codice->fields["cargo_receptor"];?></b></font><br><font size="1" color="#990033"><div align="right"><?php echo $reg_codice->fields["fecha_recepcion"];?></div></font></td>
        <td align="left">        
        <a href="frmReporteDetalle.php?id=<?php echo $reg_codice->fields["nur"];?>" target="_blank" onClick="window.open(this.href,this.target,'width=550,height=550,top=200,left=250,toolbar=no,scrollbars=1,location=no,status=no,menubar=no,directories=no,titlebar=no,resizable=0');return false;"><img src="images/ver_mas.png" width="39" height="35"></a>
        </td>        
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
</div>
   <br>
</body>
