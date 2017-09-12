<?php

require_once('../libs/tcpdf/config/lang/eng.php');
require_once('../libs/tcpdf/tcpdf.php');
include('../db/dbclass.php');
$id = $_GET['id'];
//echo $id;

$fecha = date("Y-m-d h:i:s");
// Extend the TCPDF class to create custom Header and Footer
/*class PDF extends FPDF
{
}*/
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
        $stmt = $dbh->prepare("SELECT c.logo,c.id
FROM
entidades AS c");
        $stmt->execute();
        //echo "<B>outputting...</B><BR>";
        $image_file = 'logo.jpg';
        while ($rs2 = $stmt->fetch(PDO::FETCH_OBJ)) {
            if ($rs2->logo) {
                $image_file = '../media/logos/' . $rs2->logo;
            }
            $id_entidad=$rs2->id;
        }

        $this->Image($image_file, 105, 10, 75, 25, 'PNG');

        $this->SetFont('Helvetica', 'B', 20);
        //$this->Ln(120);
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
            return 'La Paz, '.$this->dia.' '.date('d',$this->datatime).' de '.$this->mes.' de '.date('Y',$this->datatime);  
        }


}

// create new PDF document

//$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);
$pdf = new MYPDF('L', PDF_UNIT, 'LETTER', true, 'UTF-8', false);
////$pdf = new FPDF('L','mm','LETTER'); // L = horizontal     P = Vertical

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

$pdf->SetFont('Helvetica', 'B', 18);

// add a page
$pdf->AddPage();
$nombre = 'Formulario';
try {
    $dbh = New db();
 ////   $stmt = $dbh->prepare("SELECT * FROM tra_solicitud
////							WHERE id='1'");
	$stmt = $dbh->prepare("SELECT
							tra_solicitud.id,
							tra_solicitud.fecha_reg,
							tra_solicitud.formulario,
							tra_solicitud.usuario,
							tra_solicitud.fecha_ini,
							tra_solicitud.fecha_fin,
							tra_solicitud.hora_salida,
							tra_solicitud.hora_llegada,
							tra_solicitud.destino,
							tra_solicitud.telefono,
							tra_solicitud.motivo,
							tra_solicitud.atendido,
							tra_solicitud.aprobado_por,
							tra_solicitud.respuesta,
							tra_solicitud.fecha_aprobado,
							oficinas.oficina,
							users.nombre,
							tra_vehiculo_asig.placa,
							tra_vehiculo_asig.tipo,
							tra_vehiculo_asig.obs
							FROM
							tra_solicitud
							INNER JOIN users ON tra_solicitud.usuario = users.id
							INNER JOIN oficinas ON users.id_oficina = oficinas.id
							INNER JOIN tra_vehiculo_asig ON tra_vehiculo_asig.id_solicitud = tra_solicitud.id
							WHERE tra_solicitud.formulario='AT- 02'
							GROUP BY formulario");						
    // call the stored procedure
    $stmt->execute();
    //echo "<B>outputting...</B><BR>";
    //$pdf->Ln(7);
    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {

		$pdf->cell(30, 5, $rs['nombre'],1,0, 'C');
		$pdf->cell(30, 5, $rs['oficina'],1,1, 'C');
	
		$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 12);
		$pdf->Write(0, 'CONTROL MANTENIMIENTO DE MOVILIDADES ', '', 0, 'C');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'SOLICITANTE: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->nombre), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'UNIDAD SOLICITANTE: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->oficina), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'VEHICULO ASIGNADO A: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->oficina), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'MARCA: ', '', 0, 'L');
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
		$pdf->Write(0, 'FECHA ULTIMO MANTENIMIENTO: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->fecha_ini), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'DETALLE DE TRABAJOS A REALIZAR', '', 0, 'C');
		$pdf->Ln();		
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '01.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();		
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '02.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '03.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '04.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '05.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '06.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '07.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '08.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '09.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '10.- ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();	
		$pdf->Ln();			
				
		$pdf->SetFont('Helvetica', '', 7);	
		$pdf->Write(0, utf8_encode($rs->nombre), '', 0, 'L');
		$pdf->Write(0, utf8_encode($rs->aprobado_por), '', 0, 'L');
		$pdf->Ln();		
		$pdf->SetFont('Helvetica', 'B', 8);
		//$pdf->Write(0, '   SOLICITADO POR                      AUTORIZADO POR                      VoBo TRANSPORTES                  VoBo ACTIVOS', '', 0, 'C');
		$pdf->Ln();

    $pdf->Ln(50);
	
	$pdf->SetFont('Helvetica','',9);
    $pdf->SetFillColor(255); 
    	
	$pdf->SetXY(10, 230);
    $pdf->Cell(70, 5, '_____________', 0, 0, 'C', 1);     
    
	$pdf->SetXY(75, 230);
    $pdf->Cell(30, 5, '_____________', 0, 0, 'C', 1);  
	
	$pdf->SetXY(130, 230);
    $pdf->Cell(10, 5, '_____________', 0, 0, 'C', 1);
	
	$pdf->SetXY(173, 230);
    $pdf->Cell(10, 5, '_____________', 0, 0, 'C', 1);
	
	$pdf->SetXY(10, 235);
    $pdf->Cell(70, 5, 'Solicitado por', 0, 0, 'C', 1);     
	
	$pdf->SetXY(10, 240);
    $pdf->Cell(73, 5, 'Fecha: ...............', 0, 0, 'C', 1);  
	
	$pdf->SetXY(75, 235);
    $pdf->Cell(30, 5, 'Autorizado por', 0, 0, 'C', 1);
		
	$pdf->SetXY(75, 240);
    $pdf->Cell(30, 5, 'Fecha: .............', 0, 0, 'C', 1);             
	
	$pdf->SetXY(105, 235);
    $pdf->Cell(70, 5, 'VoBo Transporte', 0, 0, 'C', 1);     
	
	$pdf->SetXY(105, 240);
    $pdf->Cell(70, 5, 'Fecha: ...............', 0, 0, 'C', 1);  
	
	$pdf->SetXY(160, 235);
    $pdf->Cell(30, 5, 'VoBo Activos', 0, 0, 'C', 1);
		
	$pdf->SetXY(160, 240);
    $pdf->Cell(30, 5, 'Fecha: .............', 0, 0, 'C', 1);
		
    $y      =   130;
	$pdf->Ln();
	$pdf->Ln();
		$pdf->SetFont('Helvetica', 'I', 9);
		//$pdf->Write(0, $fecha, '', 0, 'L');
		$pdf->Write(0, $pdf->get_fecha($fecha), '', 0, 'R');
		////$pdf->Line(0,160,300,160);//impresión de linea

	$padding = 2;
        $contenido='<table border="1" cellpadding="'.$padding.'">
		<tr style="text-align:left;background-color: #F4F4F4;">
                        <td colspan="2"><b>PARTE III. SOLICITUD DE PASAJES Y VIATICOS</b></td>
                    </tr>
                </table>';
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
//Close and output PDF document
$pdf->Output();
//============================================================+
// END OF FILE                                                
//============================================================+

