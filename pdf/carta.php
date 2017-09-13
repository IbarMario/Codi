<?php
require_once('../libs/tcpdf/config/lang/eng.php');
require_once('../libs/tcpdf/tcpdf.php');
include('../db/dbclass.php');
$id = $_GET['id'];

// Extend the TCPDF class to create custom Header and Footer

class MYPDF extends TCPDF {

    public $datatime;
    public $meses;
    public $dias;
    public $dia;
    public $mes;

// EFRAIN
function RotatedText($x, $y, $txt, $angle)
{
    //Text rotated around its origin
    $this->Rotate($angle, $x, $y);
    $this->Text($x, $y, $txt);
    $this->Rotate(0);
}
// FIN EFRAIN

// codigo de Freddy

    public function Header() {

        // codigo de freddy
        // dir logos /codice/media/logos/
        $id = $_GET['id'];
        $dbh = New db();
        $stmt = $dbh->prepare("SELECT c.logo,c.id FROM documentos AS a INNER JOIN oficinas AS b ON a.id_oficina = b.id
INNER JOIN entidades AS c ON b.id_entidad = c.id WHERE a.id = '$id'");
        $stmt->execute();
		$image_file = '../media/logos/logo_MDPyEP.jpg';

        while ($rs2 = $stmt->fetch(PDO::FETCH_OBJ)) {
            if ($rs2->logo) {
				$image_file = '../media/logos/' . $rs2->logo;
            }
            $id_entidad=$rs2->id;
        }
        $this->Image('escudo_b.jpg', 18 ,8, 20 , 20,'JPG', '');
        $this->Image($image_file, 137, 7, 60, 18, 'JPG');
        $this->SetFont('Tahoma', 'B', 20);
    }

    // Page footer
    public function Footer() {

        $id = $_GET['id'];
        $dbh = New db();
        $stmt = $dbh->prepare("SELECT e.pie_1,e.pie_2,e.id,d.nur FROM documentos d
                               INNER JOIN tipos t ON d.id_tipo=t.id
                               INNER JOIN oficinas o ON d.id_oficina=o.id
                               INNER JOIN entidades e ON o.id_entidad=e.id
                               WHERE d.id='$id'");
			////$stmt->execute();
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
			$pie1 = $rs->pie_1;
            $pie2 = $rs->pie_2;
            $id_entidad=$rs->id;
            $nur=$rs->nur;
        }
        if ($id_entidad <> 2 && $id_entidad <> 4) {

            // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('Tahoma', 'I', 7);

        $this->Cell(0, 10, iconv("ISO-8859-1","UTF-8",$pie1), 'T', false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Ln(2);
        $this->Cell(0, 15, iconv("ISO-8859-1","UTF-8",$pie2), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        ////////////////////////////////////
        $this->setFillColor(255,255,255);
        $this->SetFont('Tahoma', '', 7);
        $this->setTextColor(63,62,60);
        $this->SetFont('Tahoma', '', 6);
        $this->SetXY(15,275);
        $this->setCellPaddings(0, 0, 0, 0);
        $comentario=iconv("ISO-8859-1","UTF-8",$nur);
        $this->StartTransform();
        $this->Rotate(90);
        $this->Multicell(30,0,$comentario,0,'C',1);
        $this->StopTransform();
        }

    }
	//////////
    public function get_fecha($fecha){
    	$fecha2 =  new DateTime($fecha); 

            //$this->datatime=strtotime($fecha);
            $this->meses=array(1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre');
            $this->dias=array(1=>'Lunes',2=>'Martes',3=>'Miercoles',4=>'Jueves',5=>'Viernes',6=>'Sabado',0=>'Domingo');
            $this->mes=(int)date('m',$this->datatime);
            $this->mes=$this->meses[$this->mes];
            //dia
            $this->dia=(int)date('w',$this->datatime);
            $this->dia=$this->dias[$this->dia];
            //retornamos
			return 'La Paz, '.$fecha2->format('d').' de '.$this->meses[(int)$fecha2->format('m')].' de '.$fecha2->format('Y');

        }


}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ivan Marcelo Chacolla/');
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
$nombre = 'Carta';
try {
    $dbh = New db();
    $stmt = $dbh->prepare("SELECT * FROM documentos d
                               INNER JOIN tipos t ON d.id_tipo=t.id
                               WHERE d.id='$id'");
    // call the stored procedure
    $stmt->execute();
    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
        $pdf->SetFont('Tahoma', '', 11); //10
        if (isset($rs->fecha_creacion)) {
            $pdf->Write(0, $pdf->get_fecha($rs->fecha_creacion), '', 0, 'L');
        }

        $pdf->Ln(7);
        $pdf->SetFont('Tahoma', 'B', 11);
        $pdf->Write(0, strtoupper($rs->codigo), '', 0, 'L');
        $pdf->Ln(10);

        $pdf->SetFont('Helvetica', '', 11);
        $pdf->Ln(20);
        $pdf->Write(0, iconv("ISO-8859-1","UTF-8",$rs->titulo), '', 0, 'L');
        $pdf->Ln();
        $pdf->SetFont('Tahoma', '', 11);
        $pdf->Write(0, iconv("ISO-8859-1","UTF-8",$rs->nombre_destinatario), '', 0, 'L');
        $pdf->Ln();
        $pdf->SetFont('Tahoma', 'B', 11);
        $pdf->Write(0, iconv("ISO-8859-1","UTF-8",$rs->cargo_destinatario), '', 0, 'L');
        $pdf->Ln();
        $pdf->Write(0, iconv("ISO-8859-1","UTF-8",$rs->institucion_destinatario), '', 0, 'L');
        $pdf->Ln(7);
        $pdf->SetFont('Tahoma', 'U', 11);
        $pdf->Write(0, 'Presente.-', '', 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Tahoma', 'B', 11);
        $pdf->Cell(10, 5, 'Ref.: ');

        $pdf->SetFont('Tahoma', 'U', 11);
        $pdf->MultiCell(170, 5, iconv("ISO-8859-1","UTF-8",$rs->referencia), 0, 'L');
        $pdf->Ln(-3);
		$pdf->SetFont('Helvetica', '', 11);
        $pdf->writeHTML($rs->contenido);
        $pdf->Ln(50);
        $pdf->SetFont('Tahoma', '', 7);
        $pdf->writeHTML('cc. ' . strtoupper($rs->copias));
        $pdf->writeHTML('Adj. ' . strtoupper($rs->adjuntos));
        $pdf->writeHTML(strtoupper($rs->mosca_remitente));
		$pdf->RotatedText(200, 235, '', 90);  // PAra hacer desaparecer la linea del pie de pagina
        $nombre.='_' . substr($rs->cite_original, -10, 6);
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
//Close and output PDF document
$pdf->Output($nombre . '.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
