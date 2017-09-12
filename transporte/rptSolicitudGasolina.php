<?php

require_once('../libs/tcpdf/config/lang/eng.php');
require_once('../libs/tcpdf/tcpdf.php');
include('../db/dbclass.php');
$id = $_GET['id'];
$user=$_GET['user'];
//echo $id;

$fecha = date("Y-m-d h:i:s");
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    public $datatime;
    public $meses;
    public $dias;
    public $dia;
    public $mes;

    public function Header() {

        // dir logos /codice/media/logos/
        $id = $_GET['id'];
        $dbh = New db();
        $stmt = $dbh->prepare("SELECT c.logo,c.id FROM entidades AS c");
        $stmt->execute();
        //echo "<B>outputting...</B><BR>";
        $image_file = 'logo.jpg';
        while ($rs2 = $stmt->fetch(PDO::FETCH_OBJ)) {
            if ($rs2->logo) {
                $image_file = '../media/logos/' . $rs2->logo;
            }
            $id_entidad=$rs2->id;
        }

        $this->Image($image_file, 70, 10, 75, 25, 'PNG');

        $this->SetFont('Helvetica', 'B', 20);
        //$this->Ln(120);
    }

    public function Footer() { 
    // No Footer 
    } 
    
     public function get_fecha($fecha)
        {
            $this->datatime=strtotime($fecha);
            $this->meses=array(1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre');            
            $this->dias=array(1=>'Lunes',2=>'Martes',3=>'Miercoles',4=>'Jueves',5=>'Viernes',6=>'Sabado',0=>'Domingo');
            $this->mes=(int)date('m',$this->datatime);                       
            $this->mes=$this->meses[$this->mes]; 
            //dia
            $this->dia=(int)date('w',$this->datatime);                       
            $this->dia=$this->dias[$this->dia];                        
            //retornamos
          ////  return 'La Paz, '.$this->dia.' '.date('d',$this->datatime).' de '.$this->mes.' de '.date('Y',$this->datatime);  
        }


}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Efrain Espinoza C.');
$pdf->SetTitle('Formulario Solicitud');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$dbh = New db();
$sql="SELECT d.id_entidad FROM documentos d WHERE d.id='$id'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
            $id_entidad=$rs->id_entidad;
        } 
$margin_top=45;
if($id_entidad==2){
    $margin_top=33;
}elseif ($id_entidad==4) {
    $margin_top=60;
}

//set margins
$pdf->SetMargins(20, $margin_top, 20);
//$pdf->SetMargins(20, PDF_MARGIN_TOP, 20);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

$pdf->SetFont('Helvetica', 'B', 9);

// add a page
$pdf->AddPage();
$nombre = 'Formulario';
try {
    $dbh = New db();
 ////   $stmt = $dbh->prepare("SELECT * FROM tra_solicitud
////							WHERE id='1'");
	$stmt = $dbh->prepare("SELECT
							tra_gasolina.id,
							tra_gasolina.form,
							tra_gasolina.usuario,
							tra_gasolina.unidad_solicitante,
							tra_gasolina.fecha_registro,
							tra_gasolina.fecha_solicitud,
                                                        tra_gasolina.fecha_factura,
							tra_gasolina.cantidad,
							tra_gasolina.km_anterior,
							tra_gasolina.fecha_anterior,
							tra_gasolina.km_actual,
							tra_gasolina.placa,
							tra_gasolina.motivo,
							tra_gasolina.vales,
							tra_gasolina.factura,
							tra_gasolina.anulado,
							tra_vehiculo.marca,
							tra_vehiculo.asignado,
							users.nombre,
							tra_unidad.sigla,
							tra_unidad.unidad,
							tra_vehiculo.tipo
							FROM
							tra_gasolina
							INNER JOIN tra_vehiculo ON tra_vehiculo.placa = tra_gasolina.placa
							INNER JOIN users ON users.id = tra_gasolina.usuario
							INNER JOIN tra_unidad ON tra_unidad.id = tra_gasolina.unidad_solicitante
							WHERE tra_gasolina.id='$id' and tra_gasolina.anulado ='0'
							");						
    // call the stored procedure
    $stmt->execute();
    //echo "<B>outputting...</B><BR>";
    //$pdf->Ln(7);
    /*while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
		$pdf->SetY(40);
		$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 12);
		$pdf->Write(0, 'SOLICITUD DE VALES DE GASOLINA', '', 0, 'C');
		
		$pdf->Ln();$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '                                                                                                                                            FORM: ', '', 0, 'L');
		
		
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->form), '', 0, 'L');
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'UNIDAD SOLICITANTE: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->unidad), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'NOMBRE: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->nombre), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'FECHA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->fecha_solicitud), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'CANTIDAD (litros): ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->cantidad), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'Nro. DE VALES: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->vales), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'KILOMETRAJE ANTERIOR: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->km_anterior ), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'FECHA KILOMETRAJE ANTERIOR: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->  fecha_anterior), '5', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'KILOMETRAJE ACTUAL: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->  km_actual), '5', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
				
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'TIPO DE VEHICULO: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->tipo), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'PLACA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'MOTIVO: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->motivo), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();
						
				
		$pdf->SetFont('Helvetica', '', 7);	
		//$pdf->Write(0, utf8_encode($rs->nombre), '', 0, 'L');
		//$pdf->Write(0, utf8_encode($rs->aprobado_por), '', 0, 'L');
		//$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 8);
		//$pdf->Write(0, '   SOLICITADO POR                      AUTORIZADO POR                      VoBo TRANSPORTES                  VoBo ACTIVOS', '', 0, 'C');
		$pdf->Ln();

    $pdf->Ln(50);
	
	$pdf->SetFont('Helvetica','',9);
    $pdf->SetFillColor(255); 
    	
	$pdf->SetXY(10, 230);
    $pdf->Cell(70, 5, '________________', 0, 0, 'C', 1);     
    
	$pdf->SetXY(75, 230);
    $pdf->Cell(20, 5, '_________________', 0, 0, 'C', 1);  
	
	$pdf->SetXY(130, 230);
    $pdf->Cell(10, 5, '_____________________', 0, 0, 'C', 1);
	
	$pdf->SetXY(173, 230);
    $pdf->Cell(10, 5, '_____________', 0, 0, 'C', 1);
	
	$pdf->SetXY(10, 235);
    $pdf->Cell(70, 5, 'Inmediato superior', 0, 0, 'C', 1);     
	
	$pdf->SetXY(75, 235);
    $pdf->Cell(20, 5, 'Unidad Administrativa', 0, 0, 'C', 1);
		
	$pdf->SetXY(117, 235);
	$pdf->Write(0, utf8_encode($rs->nombre), '', 0, 'L');    
	$pdf->SetXY(100, 240);
    $pdf->Cell(70, 5, 'Solicitante', 0, 0, 'C', 1);  
	
	
	$pdf->SetXY(163, 235);
    $pdf->Cell(30, 5, 'Transportes', 0, 0, 'C', 1);
			
    $y      =   130;
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
		$pdf->SetFont('Helvetica', 'I', 9);
		//$pdf->Write(0, $fecha, '', 0, 'L');
		$pdf->Write(0, $pdf->get_fecha($fecha), '', 0, 'R');
		////$pdf->Line(0,160,300,160);//impresión de linea

    } */
    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
        $form = $rs->form;
        $unidad = $rs->unidad;
        $funcionario = $rs->nombre;
        $fecha_solicitud = $rs->fecha_solicitud;
        $vales = $rs->vales;
        $cantidad_litros = $rs->cantidad;
        $km_anterior = $rs->km_anterior;
        $fecha_anterior = '';
        if($rs->fecha_anterior != '0000-00-00'){
            $fecha_anterior = $rs->fecha_anterior;
        }
        $km_actual = $rs->  km_actual;
        $tipo_vehiculo = $rs->tipo;
        $placa = $rs->placa;
        $motivo = $rs->motivo;
        $factura = $rs->factura;
        $fecha_factura = '';
        if($rs->fecha_factura != '0000-00-00'){
            $fecha_factura = $rs->fecha_factura;
        }
    }
$html = '<p style=" text-align:center;"><h2>FORMULARIO DE SOLICITUD DE VALES DE GASOLINA</p></h2>';
$tabla = '<table border="1" cellpadding="3">'
            . '<tr style="background-color: #D5E5FA;">'
                . '<td colspan="2"><b>FORM: </b>'.$form.'</td><td colspan="2"><b>FECHA: </b>'.$fecha_solicitud.'</td>'
            . '</tr>'
            . '<tr>'
                . '<td><b>UNIDAD SOLICITANTE:</b></td><td colspan="3">'.$unidad.'</td>'
            . '</tr>'
            . '<tr>'
                . '<td><b>FUNCIONARIO:</b></td><td colspan="3">'.$funcionario.'</td>'
            . '</tr>'
            . '<tr>'
                . '<td><b>NRO. DE VALES:</b></td><td colspan="3">'.$vales.'</td>'
            . '</tr>'
            . '<tr>'
                . '<td><b>CANTIDAD (Litros):</b></td><td colspan="3">'.$cantidad_litros.'</td>'
            . '</tr>'
            . '<tr>'
                . '<td><b>KILOMETRAJE ANTERIOR:</b></td><td>'.$km_anterior.'</td><td><b>FECHA:</b></td><td>'.$fecha_anterior.'</td>'
            . '</tr>'
            . '<tr>'
                . '<td><b>KILOMETRAJE ACTUAL:</b></td><td colspan="3">'.$km_actual.'</td>'
            . '</tr>'
            . '<tr>'
                . '<td><b>NRO. FACTURA:</b></td><td>'.$factura.'</td><td><b>FECHA FACTURA:</b></td><td>'.$fecha_factura.'</td>'
            . '</tr>'
            . '<tr>'
                . '<td><b>TIPO VEHICULO:</b></td><td>'.$tipo_vehiculo.'</td><td><b>PLACA:</b></td><td>'.$placa.'</td>'
            . '</tr>'
            . '<tr>'
                . '<td><b>MOTIVO:</b></td><td colspan="3">'.$motivo.'</td>'
            . '</tr>'
            . '</table>';
$html .= $tabla;
// output the HTML content
$pdf->writeHTML(utf8_encode($html), true, false, true, false, '');
//$pdf->Ln(10);
$pdf->SetFont('Helvetica','',8);
$x = 0; $y = 135;
    $pdf->SetFillColor(255);
    
    $pdf->SetXY($x + 10, $y + 0);
    $pdf->Cell(70, 5, '________________', 0, 0, 'C', 1);
    $pdf->SetXY($x + 10, $y + 5);
    $pdf->Cell(70, 5, 'Inmediato superior', 0, 0, 'C', 1);     
    
    $pdf->SetXY($x + 75, $y + 0);
    $pdf->Cell(20, 5, '_________________', 0, 0, 'C', 1);  
    $pdf->SetXY($x + 75, $y + 5);
    $pdf->Cell(20, 5, 'Unidad Administrativa', 0, 0, 'C', 1);
    
    
    $pdf->SetXY($x + 130, $y + 0);
    $pdf->Cell(10, 5, '_____________________', 0, 0, 'C', 1);
    $pdf->SetXY($x + 117, $y + 5);
    $pdf->Write(0, utf8_encode($funcionario), '', 0, 'L');    
    $pdf->SetXY($x + 100, $y + 10);
    $pdf->Cell(70, 5, 'Solicitante', 0, 0, 'C', 1);  
	
    $pdf->SetXY($x + 173, $y + 0);
    $pdf->Cell(10, 5, '_____________', 0, 0, 'C', 1);
    $pdf->SetXY($x + 163, $y + 5);
    $pdf->Cell(30, 5, 'Transportes', 0, 0, 'C', 1);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
//Close and output PDF document
$pdf->Output();
//============================================================+
// END OF FILE                                                
//============================================================+

