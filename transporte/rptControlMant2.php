<?php
require('fpdf/fpdf.php');
require('conexion.php');
//include('../db/dbclass.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('recursos/logo.png' , 80 ,10, 55 , 18,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(135, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 8, '', 0);
$pdf->Cell(100, 8, 'CONTROL MANTENIMIENTO DE MOVILIDADES', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 7);

 echo '<table cellpadding="0" cellspacing="0" width="100%" border="1">';
 echo '<thead>
	<tr>
		<th>FECHA</th>
		<th>DETALLE MANTENIMIENTO</th>
		<th>REPARACION</th>
		<th>CAMBIO REPUESTO</th>
		<th>KM. ACTUAL</th>
		<th>TALLER</th>
		<th>COSTO</th>
	</tr> </thead>';
	/*	$pdf->Cell(15, 8, 'FECHA', 1);
		$pdf->Cell(45, 8, 'DETALLE MANTENIMIENTO', 1);
		$pdf->Cell(30, 8, 'REPARACION', 1);
		$pdf->Cell(35, 8, 'CAMBIO REPUESTO', 1);
		$pdf->Cell(26, 8, 'KM. ACTUAL', 1);
		$pdf->Cell(25, 8, 'TALLER', 1);
		$pdf->Cell(15, 8, 'COSTO', 1);*/
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 7);

//CONSULTA
$productos = mysql_query("SELECT * FROM tra_mantenimiento");

	$fill = 1;
    $border='LTR';
    $ln=0;
    $fill = 0;
    $align='T';
    $link=0;
    $stretch=0;
    $ignore_min_height=0;
    $calign='T';
    $valign='T';
    $height=6;

while($productos2 = mysql_fetch_array($productos)){
	//$Y = 61;
	//$pdf->SetY(61);
  	echo '<tr>';
		echo '<td>'.$productos2['fecha_mant'].'</td>';
		echo '<td>'.$productos2['detalle'].'</td>';
		echo '<td>'.$productos2['reparacion'].'</td>';
		echo '<td>'.$productos2['repuesto'].'</td>';
		echo '<td>'.$productos2['kilometraje'].'</td>';
		echo '<td>'.$productos2['taller'].'</td>';
		echo '<td>'.$productos2['costo'].'</td>';
	echo '</tr>';   
	
/////	$border,$ln,$align,$fill,$link,$stretch,$ignore_min_height,$calign,$valign
	//$pdf->SetY(61);
	//$pdf->SetX(10);
	
	/*$y = $pdf->GetY();
	
	$pdf->Cell(15, 20, $productos2['fecha_mant'], 1);
	//$pdf->SetX(25);
	$pdf->SetXY(25,$y);
	$pdf->MultiCell(45, 20, $productos2['detalle'],0, 'L');
	//$pdf->SetX(70);
	$pdf->SetXY(70,$y);
	$pdf->MultiCell(30, 20, $productos2['reparacion'], 1);
	//$pdf->SetX(100);
	$pdf->SetXY(100,$y);
	$pdf->MultiCell(35, 20, $productos2['repuesto'], 1);
	//$pdf->SetX(135);
	$pdf->SetXY(135,$y);
	$pdf->MultiCell(26, 20, $productos2['kilometraje'], 1);
	//$pdf->SetX(161);
	$pdf->SetXY(161,$y);
	$pdf->MultiCell(25, 20, $productos2['taller'], 1);
	//$pdf->SetX(186);
	$pdf->SetXY(186,$y);
	$pdf->MultiCell(15, 20, $productos2['costo'], 1);*/
	//$pdf->Ln(8);
}
echo "</table>";
////////////////
$pdf->Output();
?>