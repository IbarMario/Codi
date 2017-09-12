<?php
session_start();
include_once("db.php"); 
$user=$_GET['user'];
//echo $user;
//echo 'Efras';
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
<body onLoad="cuenta_atras=setTimeout('Cerrar_Ventana();',40000)">
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
  <h3><img src="images/baner_soporte.jpg" alt="" width="818" height="165" align="middle"></h3>
  <h3><span class="bold">ADMIN</span>
  </h3></div>
<p align="right">
    <font size="2"><b>
    <a href="" onClick="window.close()">| Salir |</a></b></font></p>

<p>&nbsp;</p>
<table class="table table-striped" id="example">
  <thead>
      <tr>
        <th>N°</th>
        <th>Usuario</th>
        <th>Oficina</th>
        <th>Interno</th>
        <th>Fecha solicitud</th>
        <th>Tipo</th>
        <th>Descripción</th>        
        <th>Atención</th>

        <!--<th>feha de atención</th>
        <th>responsable</th>
        <th>observaciones</th>-->
        </tr>
      </thead>
    <tbody>
       <!-- <a href="frmReporteFecha.php?user=<?php echo $user ?>"><img src="images/solicitud2.jpg" width="40" height="36"><br>
    Reporte</a>-->
  <?php $i = 0;
	 
		 	   $sql_codice = "SELECT
                                soporte_solicitud.id,
                                soporte_solicitud.telefono,
                                soporte_solicitud.descripcion,
                                soporte_solicitud.fecha,
                                soporte_solicitud.a1,
                                soporte_solicitud.a2,
                                soporte_solicitud.a3,
                                soporte_solicitud.a4,
                                soporte_solicitud.a5,
                                soporte_solicitud.a6,
                                soporte_solicitud.atendido,
                                soporte_solicitud.respuesta,
                                users.nombre,
                                oficinas.oficina,
                                entidades.entidad,
                                entidades.sigla
                                FROM
                                soporte_solicitud
                                INNER JOIN users ON soporte_solicitud.id_usuer = users.id
                                INNER JOIN oficinas ON users.id_oficina = oficinas.id
                                INNER JOIN entidades ON oficinas.id_entidad = entidades.id
                                ORDER BY soporte_solicitud.fecha DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;

		$sql="SELECT COUNT(atendido) FROM soporte_solicitud where atendido = '0'";  
		$consulta=mysql_query($sql); 
		$rcount=mysql_result($consulta,0);
		echo '<b><span style="color:red; font-size:12px;">NO ATENDIDOS: '.$rcount.'</span></b><br>';
		//echo $rcount;
		$sql="SELECT COUNT(atendido) FROM soporte_solicitud where atendido = '1'";  
		$consulta=mysql_query($sql); 
		$rcount=mysql_result($consulta,0);
		echo '<b><span style="color:green; font-size:12px;">ATENDIDOS: '.$rcount.'</span></b><br>';


	while ((!$reg_codice->EOF)) {
		$eec = $reg_codice->fields["id"];	
		$desc = $reg_codice->fields["descripcion"];
        $resp = $reg_codice->fields["respuesta"];
				 
		$i = $i +1;
		?>
      <tr> 
        <td align="left"><?php echo $i;?></b></td>
		<td align="left"><?php echo $reg_codice->fields["nombre"];?></td>                
        <td align="left"><?php echo $reg_codice->fields["sigla"];?><br><br> <?php echo $reg_codice->fields["oficina"];?></td>
        <td align="left"><?php echo $reg_codice->fields["telefono"];?></td>
        <td align="left"><?php echo $reg_codice->fields["fecha"];?></td>
        <td align="left"><?php echo $reg_codice->fields["a1"];?> <?php echo $reg_codice->fields["a2"];?> <?php echo $reg_codice->fields["a3"];?></td>
        <td align="left"><?php echo $reg_codice->fields["descripcion"];?></td>        
        <td align="left">
        	
        	<?php 
				$atendido = $reg_codice->fields["atendido"];
				if($atendido == 0){
					//echo //'<img src="images/b_rojo.png" width="45" height="34">';
					?>
                    <a href="verasistenciaSptr.php?eec=<?php echo $eec ?> & user=<?php echo $user ?> & desc=<?php echo $desc ?>" target="_blank" onClick="window.open(this.href,this.target,'width=700,height=580,top=250,left=700,toolbar=no,location=no,status=no,menubar=no');return false;"><img src="images/b_rojo.png" width="45" height="34"></a>
					
                    <?php
                    }
				else{ ?>
					<img src="images/b_verde.png" width="45" height="34">
                    <a href="editarResp.php?eec=<?php echo $eec ?> & user=<?php echo $user ?> & desc=<?php echo $desc ?> & resp=<?php echo $resp ?>" target="_blank" onClick="window.open(this.href,this.target,'width=700,height=580,top=250,left=700,toolbar=no,location=no,status=no,menubar=no');return false;"><img src="images/editar.png" width="20" height="24"></a>
				<?php	}
			?>
			<?php //echo $reg_codice->fields["atendido"];?>
        
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
