<?php
	include_once("db.php");
	ob_start();
	$f1=$_GET['f1'];
	$f2=$_GET['f2'];
	
	$originalDate = $f1;;
	$f3 = date("d-m-Y", strtotime($originalDate));
	$originalDate1 = $f2;;
	$f4 = date("d-m-Y", strtotime($originalDate1));
?>
<page>
<style type="text/css">
.table {     font-family: Arial;
        margin: 45px;     width: 380px; text-align: left;    border-collapse: collapse; }
.tr th {
	font-size:12px;
}
.tr td {
	font-size:11px;
}
.celda{
height: auto;
width: 200px;
}
</style>
<!-- //////////////////////    INICIO DEL CONTENIDO  ///////////////////////// -->
<h3 align="center"><img src="images/logo.png" width="270" height="80"></h3>
<h4 align="center"><strong>CUADRO DE CONCILIACIÓN <br/>ÁREA DE TRANSPORTES</strong><br></h4>
<div align="center"><strong>DE: </strong><?php echo $f3 ?> &nbsp;&nbsp; <strong>A:</strong> <?php echo $f4 ?></div>

   <p align="right">
 <?php
    //echo "La Paz".", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
 ?>
 </p>

<?php 
//$link = mysql_connect("localhost", "root"); 
$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						tra_gasolina.id,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.fecha_factura,
						tra_gasolina.motivo,
						tra_gasolina.placa,
						tra_gasolina.factura,
						tra_gasolina.cantidad,
						tra_gasolina.anulado,
						users.nombre,
						tra_unidad.sigla,
						tra_gasolina.usuario
						FROM
						tra_gasolina
						INNER JOIN users ON tra_gasolina.usuario = users.id
						INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
						WHERE tra_gasolina.usuario = '384' and tra_gasolina.anulado ='0'
 AND tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2'> \n";
   echo "<tr align='left'>
   			<th colspan='4'>NOMBRE:  ".$row["nombre"]. "</th>
			<th colspan='3' align='right'>UNIDAD:  ".$row["sigla"]. "</th>
		</tr>\n";
   echo "<tr align='center'><b>
   			<td colspan='2' bgcolor='#D9D9D9'>FECHA </td>
			<td width='130' rowspan='2' bgcolor='#D9D9D9'>MOTIVO</td>
			<td width='60' rowspan='2' bgcolor='#D9D9D9'>PLACA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>N° FACTURA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>CANTIDAD LITROS</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>MONTO Bs.</td></b>
		</tr>
		<tr align='center'><b>
   			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>FACTURA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
	  			<td align='center'>".$row["fecha_solicitud"]."</td>
				<td align='center'>".$row["fecha_factura"]."</td>
				<td class='celda'>".$row["motivo"]."</td>
				<td align='center'>".$row["placa"]."</td>
				<td align='center'>".$row["factura"]."</td>
				<td align='center'>".$row["cantidad"]."</td>
				<td align='right'>".$row["cantidad"]*(3.74)."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "<tr>
  			<td align='right' colspan='5'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
			<td align='right'><strong>".$totalB."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
<br>
<?php 
//$link = mysql_connect("localhost", "root"); 
$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						tra_gasolina.id,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.fecha_factura,
						tra_gasolina.motivo,
						tra_gasolina.placa,
						tra_gasolina.factura,
						tra_gasolina.cantidad,
						tra_gasolina.anulado,	
						users.nombre,
						tra_unidad.sigla,
						tra_gasolina.usuario
						FROM
						tra_gasolina
						INNER JOIN users ON tra_gasolina.usuario = users.id
						INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
						WHERE tra_gasolina.usuario = '338' and tra_gasolina.anulado ='0'
 AND tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2'> \n";
   echo "<tr align='left'>
   			<th colspan='4'>NOMBRE:  ".$row["nombre"]. "</th>
			<th colspan='3' align='right'>UNIDAD:  ".$row["sigla"]. "</th>
		</tr>\n";
   echo "<tr align='center'><b>
   			<td colspan='2' bgcolor='#D9D9D9'>FECHA </td>
			<td width='130' rowspan='2' bgcolor='#D9D9D9'>MOTIVO</td>
			<td width='60' rowspan='2' bgcolor='#D9D9D9'>PLACA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>N° FACTURA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>CANTIDAD LITROS</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>MONTO Bs.</td></b>
		</tr>
		<tr align='center'><b>
   			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>FACTURA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
	  			<td align='center'>".$row["fecha_solicitud"]."</td>
				<td align='center'>".$row["fecha_factura"]."</td>
				<td class='celda'>".$row["motivo"]."</td>
				<td align='center'>".$row["placa"]."</td>
				<td align='center'>".$row["factura"]."</td>
				<td align='center'>".$row["cantidad"]."</td>
				<td align='right'>".$row["cantidad"]*(3.74)."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "<tr>
  			<td align='right' colspan='5'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
			<td align='right'><strong>".$totalB."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
<br>
<?php 
//$link = mysql_connect("localhost", "root"); 
$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						tra_gasolina.id,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.fecha_factura,
						tra_gasolina.motivo,
						tra_gasolina.placa,
						tra_gasolina.factura,
						tra_gasolina.cantidad,
						tra_gasolina.anulado,
						users.nombre,
						tra_unidad.sigla,
						tra_gasolina.usuario
						FROM
						tra_gasolina
						INNER JOIN users ON tra_gasolina.usuario = users.id
						INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
						WHERE tra_gasolina.usuario = '284'and tra_gasolina.anulado ='0'
 AND tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2'> \n";
   echo "<tr align='left'>
   			<th colspan='4'>NOMBRE:  ".$row["nombre"]. "</th>
			<th colspan='3' align='right'>UNIDAD:  ".$row["sigla"]. "</th>
		</tr>\n";
   echo "<tr align='center'><b>
   			<td colspan='2' bgcolor='#D9D9D9'>FECHA </td>
			<td width='130' rowspan='2' bgcolor='#D9D9D9'>MOTIVO</td>
			<td width='60' rowspan='2' bgcolor='#D9D9D9'>PLACA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>N° FACTURA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>CANTIDAD LITROS</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>MONTO Bs.</td></b>
		</tr>
		<tr align='center'><b>
   			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>FACTURA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
	  			<td align='center'>".$row["fecha_solicitud"]."</td>
				<td align='center'>".$row["fecha_factura"]."</td>
				<td class='celda'>".$row["motivo"]."</td>
				<td align='center'>".$row["placa"]."</td>
				<td align='center'>".$row["factura"]."</td>
				<td align='center'>".$row["cantidad"]."</td>
				<td align='right'>".$row["cantidad"]*(3.74)."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "<tr>
  			<td align='right' colspan='5'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
			<td align='right'><strong>".$totalB."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
<br>
<?php 
//$link = mysql_connect("localhost", "root"); 
$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						tra_gasolina.id,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.fecha_factura,
						tra_gasolina.motivo,
						tra_gasolina.placa,
						tra_gasolina.factura,
						tra_gasolina.cantidad,
tra_gasolina.anulado,

						users.nombre,
						tra_unidad.sigla,
						tra_gasolina.usuario
						FROM
						tra_gasolina
						INNER JOIN users ON tra_gasolina.usuario = users.id
						INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
						WHERE tra_gasolina.usuario = '315' and tra_gasolina.anulado ='0'
 AND tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2'> \n";
   echo "<tr align='left'>
   			<th colspan='4'>NOMBRE:  ".$row["nombre"]. "</th>
			<th colspan='3' align='right'>UNIDAD:  ".$row["sigla"]. "</th>
		</tr>\n";
   echo "<tr align='center'><b>
   			<td colspan='2' bgcolor='#D9D9D9'>FECHA </td>
			<td width='130' rowspan='2' bgcolor='#D9D9D9'>MOTIVO</td>
			<td width='60' rowspan='2' bgcolor='#D9D9D9'>PLACA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>N° FACTURA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>CANTIDAD LITROS</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>MONTO Bs.</td></b>
		</tr>
		<tr align='center'><b>
   			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>FACTURA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
	  			<td align='center'>".$row["fecha_solicitud"]."</td>
				<td align='center'>".$row["fecha_factura"]."</td>
				<td class='celda'>".$row["motivo"]."</td>
				<td align='center'>".$row["placa"]."</td>
				<td align='center'>".$row["factura"]."</td>
				<td align='center'>".$row["cantidad"]."</td>
				<td align='right'>".$row["cantidad"]*(3.74)."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "<tr>
  			<td align='right' colspan='5'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
			<td align='right'><strong>".$totalB."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
<br>
<?php 
//$link = mysql_connect("localhost", "root"); 
$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						tra_gasolina.id,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.fecha_factura,
						tra_gasolina.motivo,
						tra_gasolina.placa,
						tra_gasolina.factura,
						tra_gasolina.cantidad,
tra_gasolina.anulado,

						users.nombre,
						tra_unidad.sigla,
						tra_gasolina.usuario
						FROM
						tra_gasolina
						INNER JOIN users ON tra_gasolina.usuario = users.id
						INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
						WHERE tra_gasolina.usuario = '244' and tra_gasolina.anulado ='0'
 AND tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2'> \n";
   echo "<tr align='left'>
   			<th colspan='4'>NOMBRE:  ".$row["nombre"]. "</th>
			<th colspan='3' align='right'>UNIDAD:  ".$row["sigla"]. "</th>
		</tr>\n";
   echo "<tr align='center'><b>
   			<td colspan='2' bgcolor='#D9D9D9'>FECHA </td>
			<td width='130' rowspan='2' bgcolor='#D9D9D9'>MOTIVO</td>
			<td width='60' rowspan='2' bgcolor='#D9D9D9'>PLACA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>N° FACTURA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>CANTIDAD LITROS</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>MONTO Bs.</td></b>
		</tr>
		<tr align='center'><b>
   			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>FACTURA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
	  			<td align='center'>".$row["fecha_solicitud"]."</td>
				<td align='center'>".$row["fecha_factura"]."</td>
				<td class='celda'>".$row["motivo"]."</td>
				<td align='center'>".$row["placa"]."</td>
				<td align='center'>".$row["factura"]."</td>
				<td align='center'>".$row["cantidad"]."</td>
				<td align='right'>".$row["cantidad"]*(3.74)."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "<tr>
  			<td align='right' colspan='5'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
			<td align='right'><strong>".$totalB."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
<br>
<?php 
//$link = mysql_connect("localhost", "root"); 
$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						tra_gasolina.id,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.fecha_factura,
						tra_gasolina.motivo,
						tra_gasolina.placa,
						tra_gasolina.factura,
						tra_gasolina.cantidad,
tra_gasolina.anulado,

						users.nombre,
						tra_unidad.sigla,
						tra_gasolina.usuario
						FROM
						tra_gasolina
						INNER JOIN users ON tra_gasolina.usuario = users.id
						INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
						WHERE tra_gasolina.usuario = '245' and tra_gasolina.anulado ='0'
 AND tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2'> \n";
   echo "<tr align='left'>
   			<th colspan='4'>NOMBRE:  ".$row["nombre"]. "</th>
			<th colspan='3' align='right'>UNIDAD:  ".$row["sigla"]. "</th>
		</tr>\n";
   echo "<tr align='center'><b>
   			<td colspan='2' bgcolor='#D9D9D9'>FECHA </td>
			<td width='130' rowspan='2' bgcolor='#D9D9D9'>MOTIVO</td>
			<td width='60' rowspan='2' bgcolor='#D9D9D9'>PLACA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>N° FACTURA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>CANTIDAD LITROS</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>MONTO Bs.</td></b>
		</tr>
		<tr align='center'><b>
   			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>FACTURA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
	  			<td align='center'>".$row["fecha_solicitud"]."</td>
				<td align='center'>".$row["fecha_factura"]."</td>
				<td class='celda'>".$row["motivo"]."</td>
				<td align='center'>".$row["placa"]."</td>
				<td align='center'>".$row["factura"]."</td>
				<td align='center'>".$row["cantidad"]."</td>
				<td align='right'>".$row["cantidad"]*(3.74)."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "<tr>
  			<td align='right' colspan='5'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
			<td align='right'><strong>".$totalB."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
<br>
<?php 
//$link = mysql_connect("localhost", "root"); 
$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						tra_gasolina.id,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.fecha_factura,
						tra_gasolina.motivo,
						tra_gasolina.placa,
						tra_gasolina.factura,
						tra_gasolina.cantidad,
tra_gasolina.anulado,

						users.nombre,
						tra_unidad.sigla,
						tra_gasolina.usuario
						FROM
						tra_gasolina
						INNER JOIN users ON tra_gasolina.usuario = users.id
						INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
						WHERE tra_gasolina.usuario = '243' and tra_gasolina.anulado ='0'
 AND tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2' width='500'> \n";
   echo "<tr align='left'>
   			<th colspan='4'>NOMBRE:  ".$row["nombre"]. "</th>
			<th colspan='3' align='right'>UNIDAD:  ".$row["sigla"]. "</th>
		</tr>\n";
   echo "<tr align='left'><b>
   			<td colspan='2' bgcolor='#D9D9D9'>FECHA </td>
			<td width='130' rowspan='2' bgcolor='#D9D9D9'>MOTIVO</td>
			<td width='60' rowspan='2' bgcolor='#D9D9D9'>PLACA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>N° FACTURA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>CANTIDAD LITROS</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>MONTO Bs.</td></b>
		</tr>
		<tr align='left'><b>
   			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>FACTURA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
	  			<td align='center'>".$row["fecha_solicitud"]."</td>
				<td align='center'>".$row["fecha_factura"]."</td>
				<td class='celda'>".$row["motivo"]."</td>
				<td align='center'>".$row["placa"]."</td>
				<td align='center'>".$row["factura"]."</td>
				<td align='center'>".$row["cantidad"]."</td>
				<td align='right'>".$row["cantidad"]*(3.74)."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "<tr>
  			<td align='right' colspan='5'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
			<td align='right'><strong>".$totalB."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
<br>
<?php 
//$link = mysql_connect("localhost", "root"); 
$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						tra_gasolina.id,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.fecha_factura,
						tra_gasolina.motivo,
						tra_gasolina.placa,
						tra_gasolina.factura,
						tra_gasolina.cantidad,
tra_gasolina.anulado,

						users.nombre,
						tra_unidad.sigla,
						tra_gasolina.usuario
						FROM
						tra_gasolina
						INNER JOIN users ON tra_gasolina.usuario = users.id
						INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
						WHERE tra_gasolina.usuario = '231' and tra_gasolina.anulado ='0'
 AND tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2'> \n";
   echo "<tr align='left'>
   			<th colspan='4'>NOMBRE:  ".$row["nombre"]. "</th>
			<th colspan='3' align='right'>UNIDAD:  ".$row["sigla"]. "</th>
		</tr>\n";
   echo "<tr align='center'><b>
   			<td colspan='2' bgcolor='#D9D9D9'>FECHA </td>
			<td width='130' rowspan='2' bgcolor='#D9D9D9'>MOTIVO</td>
			<td width='60' rowspan='2' bgcolor='#D9D9D9'>PLACA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>N° FACTURA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>CANTIDAD LITROS</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>MONTO Bs.</td></b>
		</tr>
		<tr align='center'><b>
   			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>FACTURA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
	  			<td align='center'>".$row["fecha_solicitud"]."</td>
				<td align='center'>".$row["fecha_factura"]."</td>
				<td class='celda'>".$row["motivo"]."</td>
				<td align='center'>".$row["placa"]."</td>
				<td align='center'>".$row["factura"]."</td>
				<td align='center'>".$row["cantidad"]."</td>
				<td align='right'>".$row["cantidad"]*(3.74)."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "<tr>
  			<td align='right' colspan='5'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
			<td align='right'><strong>".$totalB."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?>       
<br/>
<?php 
//$link = mysql_connect("localhost", "root"); 
$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						tra_gasolina.id,
						tra_gasolina.fecha_solicitud,
						tra_gasolina.fecha_factura,
						tra_gasolina.motivo,
						tra_gasolina.placa,
						tra_gasolina.factura,
						tra_gasolina.cantidad,
tra_gasolina.anulado,

						users.nombre,
						tra_unidad.sigla,
						tra_gasolina.usuario
						FROM
						tra_gasolina
						INNER JOIN users ON tra_gasolina.usuario = users.id
						INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
						WHERE tra_gasolina.usuario = '247' and tra_gasolina.anulado ='0'
 AND tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2' width='500'> \n";
   echo "<tr align='left'>
   			<th colspan='4'>NOMBRE:  ".$row["nombre"]. "</th>
			<th colspan='3' align='right'>UNIDAD:  ".$row["sigla"]. "</th>
		</tr>\n";
   echo "<tr align='center'><b>
   			<td colspan='2' bgcolor='#D9D9D9'>FECHA </td>
			<td width='130' rowspan='2' bgcolor='#D9D9D9'>MOTIVO</td>
			<td width='60' rowspan='2' bgcolor='#D9D9D9'>PLACA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>N° FACTURA</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>CANTIDAD LITROS</td>
			<td width='65' rowspan='2' bgcolor='#D9D9D9'>MONTO Bs.</td></b>
		</tr>
		<tr align='center'><b>
   			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>FACTURA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
	  			<td align='center'>".$row["fecha_solicitud"]."</td>
				<td align='center'>".$row["fecha_factura"]."</td>
				<td class='celda'>".$row["motivo"]."</td>
				<td align='center'>".$row["placa"]."</td>
				<td align='center'>".$row["factura"]."</td>
				<td align='center'>".$row["cantidad"]."</td>
				<td align='right'>".$row["cantidad"]*(3.74)."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "<tr>
  			<td align='right' colspan='5'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
			<td align='right'><strong>".$totalB."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?><br /><br /><br />
<table width="219" border="1" align="center">
  <thead>
    <tr>
      <td width="76" align="center" bgcolor='#D9D9D9'>TOTAL VALES</td>
      <td width="76" align="center" bgcolor='#D9D9D9'>TOTAL LITROS</td>
      <td width="82" align="center" bgcolor='#D9D9D9'>TOTAL Bs.</td>
   </tr>
   </thead>
       <tbody>
  <?php 
	   $sql = "SELECT
		tra_gasolina.id,
		tra_gasolina.fecha_solicitud,
		tra_gasolina.fecha_factura,
		tra_gasolina.motivo,
		tra_gasolina.placa,
		tra_gasolina.factura,
		tra_gasolina.cantidad,
		tra_gasolina.anulado,
		tra_gasolina.usuario
		FROM
		tra_gasolina
		WHERE tra_gasolina.fecha_solicitud BETWEEN '$f1'AND'$f2' and tra_gasolina.anulado ='0'";

	 	$reg = $conn->Execute($sql) ;
		$total=0;
        while ((!$reg->EOF)) {
		$cantidad = $reg->fields["cantidad"];
		$total=$total+$cantidad;
		?>
      <?php
		   $reg->MoveNext();
        }
        ?>
      
<tr>
      	<td align="center"><?php echo $total/20;?></td>
      	<td align="center"><?php echo $total;?></td>
     	<td align="center"><?php echo $total*(3.74);?></td>
       </tr>
      </tbody>
   
   
  </table>

<?php  
$arrayMeses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
   'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
 
 //  $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
   //    'Miercoles', 'Jueves', 'Viernes', 'Sabado');
     
//    echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
   ?>
<br><br><br>
   <p align="right">
 <?php
    echo "La Paz".", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
 ?>
 </p>
<!-- /////////////////////////       FIN DEL CONTENIDO  ///////////////////////// -->

</page>

<?php
	$content =ob_get_clean();
	include_once('html2pdf/html2pdf.class.php');
	$pdf = new html2pdf('P','LETTER','fr','UTF-8');
	$pdf->writeHTML($content);
	$pdf->pdf->includeJS('print(true)');
	$pdf->output('Transportes.pdf');
?>
