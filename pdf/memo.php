<?php

require_once('../libs/tcpdf/config/lang/eng.php');
require_once('../libs/tcpdf/tcpdf.php');
require_once('../db/dbclass.php');
$id = $_GET['id'];

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {

        // codigo de freddy
        // dir logos /codice/media/logos/
        $id = $_GET['id'];
        $dbh = New db();
        $stmt = $dbh->prepare("SELECT c.logo,c.id FROM documentos AS a INNER JOIN oficinas AS b ON a.id_oficina = b.id
INNER JOIN entidades AS c ON b.id_entidad = c.id WHERE a.id = '$id'");
        $stmt->execute();
        //echo "<B>outputting...</B><BR>";
        $image_file = 'logo.jpg';
        while ($rs2 = $stmt->fetch(PDO::FETCH_OBJ)) {
            if ($rs2->logo) {
                $image_file = '../media/logos/' . $rs2->logo;
            }
            $id_entidad = $rs2->id;
        }
        if($id_entidad<>2 && $id_entidad<>4 && $id_entidad<>5 && $id_entidad<>6){
            ////$this->Image($image_file, 70, 5, 80, 30, 'PNG');
	 //1b4r $this->Image('escudo_b.jpg', 18 ,8, 20 , 20,'JPG', '');
        $this->Image($image_file, 137, 7, 60, 18, 'PNG');
        }
        if ($id_entidad==5 || $id_entidad==6) {
            $image_file2='../media/logos/logo_MDPyEP.png';
        $this->Image($image_file, 150, 5, 50, 20, 'PNG');
        $this->Image($image_file2, 20, 5, 60, 25, 'PNG');
        }


        $this->SetFont('Tahoma', 'B', 20);
        //$this->Ln(120);
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
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
            $pie1 = $rs->pie_1;
            $pie2 = $rs->pie_2;
            $id_entidad=$rs->id;
        }
        if ($id_entidad <> 2 && $id_entidad <> 4) {

            // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font   Helvetica
            $this->SetFont('Tahoma', 'I', 7);

        $this->Cell(0, 10, utf8_encode($pie1), 'T', false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Ln(2);
        $this->Cell(0, 15, utf8_encode($pie2), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
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
$sql = "SELECT d.id_entidad FROM documentos d WHERE d.id='$id'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
    $id_entidad = $rs->id_entidad;
}
$margin_top = 38;
if ($id_entidad == 2) {
    $margin_top = 33;
} elseif ($id_entidad == 4) {
    $margin_top = 60;
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

$pdf->SetFont('Tahoma', 'B', 18);

// add a page
$pdf->AddPage();
////
/*$pdf=new FPDF('P','cm','Legal');
$pdf->AddPage('P','Legal');*/


$nombre = 'memorandum';
try {
    $dbh = New db();
    $stmtp = $dbh->prepare("SELECT d.*,t.tipo, t.via FROM documentos d
                               INNER JOIN tipos t ON d.id_tipo=t.id
                               WHERE d.id='$id'");
    // call the stored procedure
    $stmtp->execute();
    //echo "<B>outputting...</B><BR>";
    //$pdf->Ln(7);
    while ($rs = $stmtp->fetch(PDO::FETCH_OBJ)) {
        if($rs->fucov == 1)
            $focov = ' DE VIAJE';
        else
            $focov = '';
        $pdf->SetFont('Tahoma', 'B', 15);
        $pdf->Write(0, strtoupper($rs->tipo).$focov, '', 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Tahoma', '', 11);
        $pdf->Write(0, strtoupper($rs->codigo), '', 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Tahoma', 'B', 11);
        $pdf->Write(0, strtoupper($rs->nur), '', 0, 'C');
        $pdf->Ln(14);
        $pdf->SetFont('Tahoma', 'B', 11);
        $pdf->Cell(15, 5, 'A:');
		////$pdf->Line(105, 20, 105, 120);
		////$pdf->Line(55, 70 , 155, 70);
        // $pdf->SetFont('Tahoma', '', 10);
        // $pdf->Write(0, utf8_encode($rs->nombre_destinatario), '', 0, 'L');
        // $pdf->Ln();
        // $pdf->Cell(15, 5, '');
        // $pdf->SetFont('Tahoma', 'B', 10);
        // $pdf->Write(0, utf8_encode($rs->cargo_destinatario), '', 0, 'L');

        $destinatario = explode(',',$rs->nombre_destinatario);
        $cargo_dest = explode(',',$rs->cargo_destinatario);
        $i = 0;
        $pdf->SetFont('Tahoma', '', 11);
        $pdf->Write(0, utf8_encode($rs->titulo), '', 0, 'L');
        $html='<table>';
        foreach( $destinatario as $dest) {
            $html .= '<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;'.ltrim(utf8_encode($dest)).'</td></tr><tr><td><b>&nbsp;&nbsp;&nbsp;&nbsp;'.ltrim(utf8_encode($cargo_dest[$i])).'</b></td></tr>';
            $i++;
        }
        $html .='</html>';
        $pdf->writeHTML($html);



        $pdf->Ln(3);
        if (($rs->via != 0) && (trim($rs->nombre_via) != '')) {
            // $pdf->SetFont('Tahoma', 'B', 10);
            // $pdf->Cell(15, 5, 'Via:');
            // $pdf->SetFont('Tahoma', '', 10);
            // $pdf->Write(0, utf8_encode($rs->nombre_via), '', 0, 'L');
            // $pdf->Ln();
            // $pdf->Cell(15, 5, '');
            // $pdf->SetFont('Tahoma', 'B', 10);
            // $pdf->Write(0, utf8_encode($rs->cargo_via), '', 0, 'L');
            // $pdf->Ln(10);

            $pdf->SetFont('Tahoma', 'B', 11);
            //$pdf->Ln(2);
            $pdf->Cell(15, 5, 'Via:');
                $vias = explode(',',$rs->nombre_via);
                $cargo_vias = explode(',',$rs->cargo_via);
                $i = 0;
                $pdf->SetFont('Tahoma', '', 11);
                //$pdf->Write(0, utf8_encode($rs->titulo), '', 0, 'L');
                $html='<table border = "0">';
                foreach( $vias as $v) {
                    if( $i != 0)
                        $salto = '<br />';
                    else
                        $salto = '';
                    $html .= '<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$salto.ltrim(utf8_encode($v)).'</td></tr><tr><td><b>&nbsp;&nbsp;&nbsp;&nbsp;'.ltrim(utf8_encode($cargo_vias[$i])).'</b></td></tr>';
                    $i++;
                }
                $html .='</table>';
                $pdf->writeHTML($html);
        }
        $pdf->SetFont('Tahoma', 'B', 11);
        $pdf->Cell(20, 5, 'De:');
        $pdf->SetFont('Tahoma', '', 11);
        $pdf->Write(0, utf8_encode($rs->nombre_remitente), '', 0, 'L');
        $pdf->Ln();
        $pdf->Cell(20, 5, '');
        $pdf->SetFont('Tahoma', 'B', 11);
        $pdf->Write(0, utf8_encode($rs->cargo_remitente), '', 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(20, 5, 'Fecha:');
        $pdf->SetFont('Tahoma', '', 11);
        $mes = (int) date('m', strtotime($rs->fecha_creacion));
        $meses = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
        $fecha = date('d', strtotime($rs->fecha_creacion)) . ' de ' . $meses[$mes] . ' de ' . date('Y', strtotime($rs->fecha_creacion));
        $pdf->Write(0, $fecha, '', 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Tahoma', 'B', 11);

        $pdf->Cell(20, 5, 'Ref.:');

        $pdf->SetFont('Tahoma', 'BU', 11);
        $pdf->MultiCell(170, 3, utf8_encode($rs->referencia), 0, 'L');

        if($rs->fucov == 1)
            $pdf->Ln(5);
        else
            $focov = '';

        $pdf->SetFont('Tahoma', '', 11);
        $pdf->writeHTML(utf8_encode($rs->contenido));


        $pdf->Ln(10);
        $pdf->SetFont('Tahoma', '', 7);
        $pdf->writeHTML('cc. ' . strtoupper($rs->copias));
        $pdf->writeHTML('Adj. ' . strtoupper($rs->adjuntos));
        $pdf->writeHTML(strtoupper($rs->mosca_remitente));
        //$pdf->writeHTML();
        /*   $pdf->SetY(-5);

          $pdf->Write(0, $fecha,'',0,'L');
         * */

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
