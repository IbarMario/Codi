<?php
session_start();
include_once("db.php"); 
$user=$_GET['user'];

	   $sql_codice1 = "SELECT
						oficinas.oficina,
						users.nombre,
						users.username,
						users.cargo,
						users.email
						FROM
						users
						INNER JOIN oficinas ON users.id_oficina = oficinas.id
						WHERE users.id = '$user'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$usuario = $reg_codice1->fields["nombre"];		
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
<body>
<br />
	<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    
  <div align="center">
  <h3><img src="images/banner.jpg" alt="" width="698" height="165" align="middle"></h3>
  <h2><span class="bold">APROBACIÓN DE SOLICITUDES</span>
  </h2></div>
<p align="right">
    <font size="2"><b> <?php echo $usuario;?><br></b>
    <a href="index.php?user=<?php echo $user ?>"><img src="images/boton_volver.png" width="98" height="44"></a></font></p>

<p>&nbsp;</p>
<table class="table table-striped" id="example">
  <thead>
      <tr>
        <th>N°</th>
        <th>Formulario</th>
        <th>Fecha solicitud</th>
        <th>Solicitante</th>
        <th>fecha salida</th>
        <th>fecha retorno</th>
        <th>destino</th>
        <th>APROBAR</th>
        </tr>
      </thead>
    <tbody>
  <?php $i = 0;
	 
		 	   $sql_codice = "SELECT
								tra_solicitud.id,
								tra_solicitud.formulario,
								tra_solicitud.fecha_reg,
								tra_solicitud.fecha_ini,
								tra_solicitud.fecha_fin,
								tra_solicitud.hora_salida,
								tra_solicitud.hora_llegada,
								tra_solicitud.destino,
								tra_solicitud.telefono,
								tra_solicitud.motivo,
								tra_solicitud.atendido,
								tra_solicitud.usuario,
								users.nombre,
								oficinas.oficina
								FROM
								tra_solicitud
								INNER JOIN users ON tra_solicitud.usuario = users.id
								INNER JOIN oficinas ON users.id_oficina = oficinas.id
								ORDER BY tra_solicitud.formulario DESC";	     
	  	 $reg_codice = $conn->Execute($sql_codice) ;

		$sql="SELECT COUNT(atendido) FROM tra_solicitud";  
		$consulta=mysql_query($sql); 
		$rcount=mysql_result($consulta,0);
		echo '<b><span style="color:black; font-size:12px;">TOTAL SOLICITUDES: '.$rcount.'</span></b><br>';

		$sql="SELECT COUNT(atendido) FROM tra_solicitud where atendido = '1' or atendido = '2'";  
		$consulta=mysql_query($sql); 
		$rcount=mysql_result($consulta,0);
		echo '<b><span style="color:orange; font-size:12px;">EN TRÁMITE: '.$rcount.'</span></b><br>';

		$sql="SELECT COUNT(atendido) FROM tra_solicitud where atendido = '4'";  
		$consulta=mysql_query($sql); 
		$rcount=mysql_result($consulta,0);
		echo '<b><span style="color:green; font-size:12px;">ATENDIDOS: '.$rcount.'</span></b><br>';

		$sql="SELECT COUNT(atendido) FROM tra_solicitud where atendido = '3'";  
		$consulta=mysql_query($sql); 
		$rcount=mysql_result($consulta,0);
		echo '<b><span style="color:red; font-size:12px;">CANCELADO: '.$rcount.'</span></b><br>';


	while ((!$reg_codice->EOF)) {
		$eec = $reg_codice->fields["id"];	
		$desc = $reg_codice->fields["descripcion"];
				 
		$i = $i +1;
		?>
      <tr> 
        <td align="center"><?php echo $i;?></b></td>
        <td align="center"><?php echo $reg_codice->fields["formulario"];?></td>
        <td align="center"><?php echo $reg_codice->fields["fecha_reg"];?></td>
        <td align="center"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["nombre"];?></font></b><br><font size="2"><?php echo $reg_codice->fields["oficina"];?></font></td>
        <td align="center"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["fecha_ini"];?></font></b><br><font size="2"><?php echo $reg_codice->fields["hora_salida"];?></font></td>
        <td align="center"><b><font color="#000066" size="2"><?php echo $reg_codice->fields["fecha_fin"];?></font></b><br><font size="2"><?php echo $reg_codice->fields["hora_llegada"];?></font></td>
        <td align="left"><?php echo $reg_codice->fields["destino"];?></td>
        <td align="center">
          
          <?php 
				$atendido = $reg_codice->fields["atendido"];			
				if($atendido == 0){
					?>
          <!--<a href="verSolititudSptr.php?eec=<?php echo $eec ?> & user=<?php echo $user ?>"><img src="images/b_amarillo.png" width="45" height="34" title="Pendiente"></a>					-->
          <img src="images/b_amarillo.png" width="45" height="34" title="Asignar vehículo">
          <?php
                  }
				elseif($atendido == 1){
					?>
					<img src="images/print.png" width="34" height="34" title="Imprimir formulario">
          <?php
                  }
	elseif($atendido == 3){
					?>
	          <img src="images/cerrar.png" width="34" height="34" title="Cancelado">
          <?php
                  }				  

	elseif($atendido == 4){
					?>
	          <img src="images/ok.jpg" width="34" height="34" title="Solicitud Atendida">
          <?php
                  }				  

				else{
					?>
          		<!--<img src="images/b_verde.png" width="45" height="34" title="Atendido">-->
                <a href="verSolititudSptr.php?eec=<?php echo $eec ?> & user=<?php echo $user ?>"><img src="images/b_verde.png" width="45" height="34" title="Aprobar"></a>
          <?php
                  }
			?>
          
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
