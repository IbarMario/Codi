<?php

require_once('../libs/tcpdf/config/lang/eng.php');
require_once('../libs/tcpdf/tcpdf.php');
include('../db/dbclass.php');
$id = $_GET['id'];

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
    public function Header() {

        $id = $_GET['id'];
        $dbh = New db();
        $stmt = $dbh->prepare("SELECT c.logo,c.id FROM documentos AS a INNER JOIN oficinas AS b ON a.id_oficina = b.id INNER  JOIN entidades AS c ON b.id_entidad = c.id WHERE a.id = '$id'");
        $stmt->execute();
        $image2_file = '../media/logos/logo_MDPyEP.jpg';
        while ($rs2 = $stmt->fetch(PDO::FETCH_OBJ)) {
            if ($rs2->logo) {
                $image2_file = '../media/logos/' . $rs2->logo;
            }
            $id_entidad = $rs2->id;
        }
        if($id_entidad<>2 && $id_entidad<>4 && $id_entidad<>5 && $id_entidad<>6){
	 		//$this->Image('escudo_b.jpg', 18 ,8, 20 , 20,'JPG', '');
        	$this->Image($image2_file, 137, 7, 60, 18, 'JPG');
        }
        $this->SetFont('Helvetica', 'B', 20);
    }

    // Page footer
    public function Footer() {


        $id = $_GET['id'];
        $dbh = New db();
        $stmt = $dbh->prepare("SELECT e.pie_1,e.pie_2,e.id FROM documentos d
                               INNER JOIN tipos t ON d.id_tipo=t.id
                               INNER JOIN oficinas o ON d.id_oficina=o.id
                               INNER JOIN entidades e ON o.id_entidad=e.id
                               WHERE d.id='$id'");
        $stmt->execute();
        $pie1 = '';
        $pie2 = '';
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
            $pie1 = $rs->pie_1;
            $pie2 = $rs->pie_2;
            $id_entidad=$rs->id;
        }
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('Helvetica', 'I', 7);
        $this->Cell(0, 10,iconv("ISO-8859-1","UTF-8", $pie1), 'T', false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Ln(2);
        $this->Cell(0, 15,iconv("ISO-8859-1","UTF-8", $pie2), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ivan Marcelo Chacolla');
$pdf->SetTitle('DOCUMENTO');
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
$margin_top=38;
//set margins
//$pdf->SetMargins(20, $margin_top, 20);
$pdf->SetMargins(20, PDF_MARGIN_TOP, 20);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

$pdf->SetFont('Helvetica', 'B', 18);

// add a page
$pdf->AddPage();
$nombre = 'circular';

try {
    $dbh = New db();
    $stmt = $dbh->prepare("SELECT * FROM documentos d
                               INNER JOIN tipos t ON d.id_tipo=t.id
                               WHERE d.id='$id'");
    // call the stored procedure
    $stmt->execute();
    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
        $pdf->SetFont('Helvetica', 'B', 15);
        $pdf->Write(0, strtoupper($rs->tipo), '', 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Helvetica', '', 11);
        $pdf->Write(0, strtoupper($rs->codigo), '', 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Helvetica', 'B', 13);
        $pdf->Write(0, strtoupper($rs->nur), '', 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(15, 5, 'A:');
        $pdf->Ln();
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Write(0, iconv("ISO-8859-1","UTF-8",$rs->nombre_destinatario), '', 0, 'L');
        $pdf->Ln();
        $pdf->Cell(15, 5, '');
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Write(0, iconv("ISO-8859-1","UTF-8",$rs->cargo_destinatario), '', 0, 'L');
        $pdf->Ln(5);
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(15, 5, 'De:');
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Write(0, iconv("ISO-8859-1","UTF-8",$rs->nombre_remitente), '', 0, 'L');
        $pdf->Ln();
        $pdf->Cell(15, 5, '');
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Write(0, iconv("ISO-8859-1","UTF-8",$rs->cargo_remitente), '', 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(15, 5, 'Fecha:');
        $pdf->SetFont('Helvetica', '', 10);
        $mes = (int) date('m', strtotime($rs->fecha_creacion));
        $meses = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
        $fecha = date('d', strtotime($rs->fecha_creacion)) . ' de ' . $meses[$mes] . ' de ' . date('Y', strtotime($rs->fecha_creacion));
        $pdf->Write(0, $fecha, '', 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(15, 5, 'Ref:');
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->MultiCell(160, 5, iconv("ISO-8859-1","UTF-8",$rs->referencia), 0, 'L');
        $pdf->Ln(0);
        $pdf->writeHTML(iconv("ISO-8859-1","UTF-8",$rs->contenido));
        $pdf->Ln(10);
        $pdf->SetFont('Helvetica', '', 5);

        if($rs->copias){
	        $pdf->writeHTML('cc. ' . strtoupper($rs->copias));
	    }
        if($rs->adjuntos){
	        $pdf->writeHTML('Adj. ' . strtoupper($rs->adjuntos));
	    }
        if($rs->mosca_remitente){
	        $pdf->writeHTML(strtoupper($rs->mosca_remitente));
		}
        $nombre.='_' . substr($rs->cite_original, -10, 6);
    }
    //echo "<BR><B>".date("r")."</B>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
//Close and output PDF document
$pdf->Output($nombre . '.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
