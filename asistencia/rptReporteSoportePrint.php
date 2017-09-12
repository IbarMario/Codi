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
<h3 align="center"><img src="images/logo.png" width="370" height="110"></h3>
<h4 align="center"><strong>REPORTES SOPORTE TECNICO<br/>AREA DE SISTEMAS</strong><br></h4>
<div align="center"><strong>DE: </strong><?php echo $f3 ?> &nbsp;&nbsp; <strong>A:</strong> <?php echo $f4 ?></div>
<?php 
$link = mysql_connect("localhost", "root"); 
//$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
						fecha, a1, a2, a3, a4, a5, a6, atendido
						FROM
						soporte_solicitud
						WHERE fecha BETWEEN '$f1'AND'$f2'", $link); 
						    
    if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;

                $sql="SELECT COUNT(a1) FROM soporte_solicitud WHERE a1 = 'computadora' and fecha BETWEEN '$f1'AND'$f2'";  
		$consulta=mysql_query($sql); 
		$rcounta1=mysql_result($consulta,0);

                $sql="SELECT COUNT(a1) FROM soporte_solicitud WHERE a2 = 'Internet/Red' and fecha BETWEEN '$f1'AND'$f2'";  
		$consulta=mysql_query($sql); 
		$rcounta2=mysql_result($consulta,0);

                $sql="SELECT COUNT(a1) FROM soporte_solicitud WHERE a3 = 'Impresora' and fecha BETWEEN '$f1'AND'$f2'";  
		$consulta=mysql_query($sql); 
		$rcounta3=mysql_result($consulta,0);

                $sql="SELECT COUNT(a1) FROM soporte_solicitud WHERE a4 = 'Scanner' and fecha BETWEEN '$f1'AND'$f2'";  
		$consulta=mysql_query($sql); 
		$rcounta4=mysql_result($consulta,0);

                $sql="SELECT COUNT(a1) FROM soporte_solicitud WHERE a5 = 'Codice' and fecha BETWEEN '$f1'AND'$f2'";  
		$consulta=mysql_query($sql); 
		$rcounta5=mysql_result($consulta,0);

                $sql="SELECT COUNT(a1) FROM soporte_solicitud WHERE a6 = 'Otro' and fecha BETWEEN '$f1'AND'$f2'";  
		$consulta=mysql_query($sql); 
		$rcounta6=mysql_result($consulta,0);

    echo "<input type='submit' name='Enviar' value='IMPRIMIR' class='btn btn-primary btn-cons' class='glyphicon glyphicon-print'  id='Enviar' />
 \n";   
   echo "<br><br><table align='center' border='1' cellspacing='0' cellpadding='2'> \n";
   echo "<tr align='center'><b>
			<td bgcolor='#D9D9D9'>SOPORTE</td>
			<td bgcolor='#D9D9D9'>CANTIDAD</td>
		</tr>"; 
      echo "<tr>
				<td class='celda'>Computadora</td>
				<td class='celda' align='center'>".$rcounta1."</td>
			</tr> \n"; 
          echo "<tr>
				<td class='celda'>Internet/Red</td>
				<td class='celda' align='center'>".$rcounta2."</td>
			</tr> \n"; 
      echo "<tr>
				<td class='celda'>Impresora</td>
				<td class='celda' align='center'>".$rcounta3."</td>
			</tr> \n"; 
      echo "<tr>
				<td class='celda'>Scanner</td>
				<td class='celda' align='center'>".$rcounta4."</td>
			</tr> \n"; 

          echo "<tr>
				<td class='celda'>Codice</td>
				<td class='celda' align='center'>".$rcounta5."</td>
			</tr> \n"; 

          echo "<tr>
				<td class='celda'>Otro</td>
				<td class='celda' align='center'>".$rcounta6."</td>
			</tr> \n"; 

			$total=$rcounta1+$rcounta2+$rcounta3+$rcounta4+$rcounta5+$rcounta6;
   echo "<tr>
  			<td align='right'><strong>".'TOTAL'."</strong></td>
			<td align='center'><strong>".$total."</strong></td>
		</tr> \n"; 
   echo "</table> \n";    
} 
?> 

<?php  
$arrayMeses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
   'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
 
   ?>
   <p align="right">
   <?php
    echo "La Paz".", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
 ?>
 </p>
<!-- ////////////// -->
<h4 align="center"><strong>LISTADO DE SOLICITUDES<br/>AREA DE SISTEMAS</strong><br></h4>
<?php 
$link = mysql_connect("localhost", "root"); 
//$link = mysql_connect("192.168.20.38", "correspondencia","c0rr3sp0nd3nc14"); 
mysql_select_db("correspondencia", $link); 
$result = mysql_query("SELECT
                        users.nombre,
                        soporte_solicitud.fecha,
                        soporte_solicitud.descripcion,
                        soporte_solicitud.respuesta,
                        oficinas.oficina
                        FROM
                        soporte_solicitud
                        INNER JOIN users ON users.id = soporte_solicitud.id_usuer
                        INNER JOIN oficinas ON users.id_oficina = oficinas.id
						WHERE soporte_solicitud.fecha BETWEEN '$f1'AND'$f2'", $link); 
						
if ($row = mysql_fetch_array($result)){ 
	$total = 0;
	$totalB = 0;
	$nombre = $row["nombre"];
	$sigla = $row["sigla"];
	//echo $nombre;
   echo "<table align='center' border='1' cellspacing='0' cellpadding='2'> \n";
   echo "<tr align='center'><b>
			<td width='130' bgcolor='#D9D9D9'>FECHA SOLICITUD</td>
			<td width='60' bgcolor='#D9D9D9'>SOLICITANTE</td>
			<td width='65' bgcolor='#D9D9D9'>OFICINA</td>
			<td width='65' bgcolor='#D9D9D9'>SOLICITUD</td>
			<td width='65' bgcolor='#D9D9D9'>RESPUESTA</td></b>
		</tr>\n"; 
   do { 
      echo "<tr>
				<td class='celda'>".$row["fecha"]."</td>
				<td class='celda'>".$row["nombre"]."</td>
				<td class='celda'>".$row["oficina"]."</td>
				<td class='celda'>".$row["descripcion"]."</td>
				<td class='celda'>".$row["respuesta"]."</td>
			</tr> \n"; 
			$total=$total+$row["cantidad"];
			$totalB=$totalB+$row["cantidad"]*(3.74);
   } while ($row = mysql_fetch_array($result)); 
   echo "</table> \n";    
} else { 
///echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
<br>
<!-- /////////////////////////       FIN DEL CONTENIDO  ///////////////////////// -->
</page>
<?php 
	$content =ob_get_clean();
	include_once('html2pdf/html2pdf.class.php');
	$pdf = new html2pdf('P','LETTER','fr','UTF-8');
	$pdf->writeHTML($content);
	$pdf->pdf->includeJS('print(true)');
	$pdf->output('soporte_tecnico.pdf'); 
?>
