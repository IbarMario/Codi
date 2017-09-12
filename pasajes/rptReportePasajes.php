<?php 
require_once("dompdf/dompdf_config.inc.php");
$conexion = mysql_connect("192.168.20.38","correspondencia","c0rr3sp0nd3nc14");
mysql_select_db("correspondencia",$conexion);



$date = date('d - m - Y');
$fechas1=$_GET['f1'];
$fechas2=$_GET['f2'];
//$total=$_GET['con'];
	
	$sql="SELECT SUM(total_pasaje) FROM documentos
	INNER JOIN pvfucovs ON pvfucovs.id_documento = documentos.id
	WHERE documentos.codigo LIKE 'FCV/MDPyEP%' AND documentos.nur LIKE 'MDPyEP/201%' AND pvfucovs.fecha_salida BETWEEN '$fechas1' AND '$fechas2'";  
		$consulta=mysql_query($sql); 
		$rcount=mysql_result($consulta,0);
//		echo '<b><span style="color:red; font-size:12px;">TOTAL PASAJES: '.$rcount.'</span></b>';
	$total = $rcount;
	
$codigoHTML.='
';

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista</title>
<style>
body{
font:10px Arial, Tahoma, Verdana, Helvetica, sans-serif;
color:#000;
}
</style>
</head>

<body>
<table align="center">
	<tr>
  	  <td colspan="4">
		<center><img src="recursos/logo.png" width="250" height="90"/><br><br><b><h2>REPORTE PASAJES Y VIATICOS </h2></b>
			</br>DEL: &nbsp;&nbsp; '.$fechas1. ' &nbsp;&nbsp; A: &nbsp;&nbsp; '.$fechas2.'
		</center>
	  </td>
    </tr>
</table>

<div align="center">';
$codigoHTML.='
<div align="right">La Paz, '.$date.'</div><br>
	<table align="center" border="1" cellpadding="2" cellspacing="2">
      <tr align="center">
        <td bgcolor="#cedbec"><strong>NRO</strong></td>
        <td bgcolor="#cedbec"><strong>FECHA SALIDA</strong></td>
        <td bgcolor="#cedbec"><strong>FECHA LLEGADA</strong></td>
        <td bgcolor="#cedbec"><strong>TOTAL VIATICO</strong></td>
        <td bgcolor="#cedbec"><strong>NOMBRE COMISIONADO</strong></td>
        <td bgcolor="#cedbec"><strong>HOJA DE RUTA</strong></td>
        <td bgcolor="#cedbec"><strong>ORIGEN</strong></td>
        <td bgcolor="#cedbec"><strong>DESTINO</strong></td>
        <td bgcolor="#cedbec"><strong>NRO. BOLETO</strong></td>
        <td bgcolor="#cedbec"><strong>AEROLINEA</strong></td>
        <td bgcolor="#cedbec"><strong>TOTAL PASAJE</strong></td>
      </tr>';

        $consulta=mysql_query("SELECT
						documentos.id,
						documentos.codigo,
						documentos.nur,
						documentos.nombre_remitente,
						documentos.fecha_creacion,
						pvfucovs.origen,
						pvfucovs.destino,
						pvfucovs.fecha_salida,
						pvfucovs.fecha_arribo,
						pvfucovs.total_viatico,
						pvfucovs.total_pasaje,
						pvfucovs.nro_boleto,
						pvfucovs.empresa
						FROM
						documentos
						INNER JOIN pvfucovs ON pvfucovs.id_documento = documentos.id
						WHERE documentos.codigo LIKE 'FCV/MDPyEP%' AND documentos.nur LIKE 'MDPyEP/201%' AND pvfucovs.fecha_salida BETWEEN '$fechas1' AND '$fechas2'
						ORDER BY pvfucovs.fecha_salida DESC;");
											
        while($dato=mysql_fetch_array($consulta)){
			$i = $i +1;
$codigoHTML.='
      <tr>
        <td align="center">'.$i.'</td>
        <td align="center">'.$dato['fecha_salida'].'</td>
        <td align="center">'.$dato['fecha_arribo'].'</td>
        <td>'.$dato['total_viatico'].'</td>
        <td>'.$dato['nombre_remitente'].'</td>
        <td>'.$dato['nur'].'</td>
        <td>'.$dato['origen'].'</td>
        <td>'.$dato['destino'].'</td>
        <td>'.$dato['nro_boleto'].'</td>
        <td>'.$dato['empresa'].'</td>
        <td>'.$dato['total_pasaje'].'</td>
	  </tr>';
      } 	  
$codigoHTML.='
	<tr>
        <td colspan="9"></td>
        <td><strong><center>'.TOTAL.'</center></strong></td>
        <td><b>'.$total.'</b></td>	
	</tr>
    </table>
</div>
</body>
</html>';



$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->set_paper("letter","landscape"); 
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte pasajes y viaticos.pdf");
?>