<?php 
	require_once("dompdf/dompdf_config.inc.php");
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("correspondencia",$conexion);

$date = date('d - m - Y');
$id = $_GET['placa'];

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista</title>
<style>
body{
font:11px Arial, Tahoma, Verdana, Helvetica, sans-serif;
color:#000;
}
</style>
</head>

<body>
<div align="center">';

$consulta1=mysql_query("SELECT
						tra_vehiculo.placa,
						tra_vehiculo.marca,
						tra_vehiculo.tipo,
						tra_vehiculo.color,
						tra_vehiculo.anio,
						tra_vehiculo.asignado,
						tra_vehiculo.conductor,
						tra_vehiculo.estado,
						tra_vehiculo.poliza,
						tra_vehiculo.id
						FROM
						tra_vehiculo
						WHERE tra_vehiculo.placa = '$id'");
$dato1=mysql_fetch_array($consulta1);

$codigoHTML.='
<table align="center">
	<tr>
  	<td colspan="4"><center><img src="recursos/logo.png" width="250" height="90"/><br><br><b><h2>CONTROL MANTENIMIENTO DE MOVILIDADES </h2></b></center></td>
    </tr>
	<tr>    
  	<td colspan="4"><h2 align="center">Placa: <strong>  '.$dato1['placa'].'</strong></h2></td>
  	</tr>
	<tr>
     <td>                                                 
          <ul>    
            <li><font color="#000099" size="1">Marca: <strong>  '.$dato1['marca'].'</strong></font></li>
            <li><font color="#000099" size="1">Tipo: <strong>  '.$dato1['tipo'].'</strong></font></li>
        </ul>
      </td>
     <td>                                                 
          <ul>    
            <li><font color="#000099" size="1">Color: <strong>  '.$dato1['color'].'</strong></font></li>    
            <li><font color="#000099" size="1">Periodo: <strong>  '.$dato1['anio'].'</strong></font></li>
        </ul>
      </td>
     <td>
    	<ul>    
            <li><font color="#000099" size="1">Asignado a: <strong>  '.$dato1['asignado'].'</strong></font></li>
            <li><font color="#000099" size="1">Conductor: <strong>  '.$dato1['conductor'].'</strong></font></li>
        </ul>
    </td>
     <td>
    	<ul>    
            <li><font color="#000099" size="1">Estado funcionamiento:<strong>  '.$dato1['estado'].'</strong></font></li>    
            <li><font color="#000099" size="1">Poliza de seguro: <strong>  '.$dato1['poliza'].'</strong></font></li>
        </ul>
    </td>
  </tr>
</table>';

$codigoHTML.='
<div align="right">La Paz, '.$date.'</div><br>
	<table align="center" class="table table-striped" id="example" border="1" cellpadding="0" cellspacing="0">
      <tr align="center">
        <td bgcolor="#cedbec"><strong>FECHA</strong></td>
        <td bgcolor="#cedbec"><strong>DETALLE MANTENIMIENTO</strong></td>
        <td bgcolor="#cedbec"><strong>REPARACION</strong></td>
        <td bgcolor="#cedbec"><strong>CAMBIO REPUESTO</strong></td>
        <td bgcolor="#cedbec"><strong>KM. ACTUAL</strong></td>
        <td bgcolor="#cedbec"><strong>TALLER</strong></td>
        <td bgcolor="#cedbec"><strong>COSTO Bs</strong></td>
      </tr>';

        $consulta=mysql_query("SELECT * FROM tra_mantenimiento WHERE placa = '$id' ORDER BY fecha_mant DESC");
        while($dato=mysql_fetch_array($consulta)){
$codigoHTML.='
      <tr>
        <td>'.$dato['fecha_mant'].'</td>
        <td>' .$dato['detalle'].'</td>
        <td>' .$dato['reparacion'].'</td>
        <td>' .$dato['repuesto'].'</td>
        <td>' .$dato['kilometraje'].'</td>
        <td>' .$dato['taller'].'</td>
        <td>' .$dato['costo'].'</td>
      </tr>';
      } 
$codigoHTML.='
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
$dompdf->stream("Control Mantenimiento de Movilidades.pdf");
?>