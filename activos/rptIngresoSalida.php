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

        $this->Image($image_file, 15, 10, 55, 20, 'PNG');

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
          ////  return 'La Paz, '.$this->dia.' '.date('d',$this->datatime).' de '.$this->mes.' de '.date('Y',$this->datatime);  
        }


}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Efrain Espinoza C.');
$pdf->SetTitle('Control de Ingreso y Salida de Bienes');
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
    $stmt = $dbh->prepare("SELECT * FROM salida_ingreso	WHERE id='$id'");

					
    // call the stored procedure
    $stmt->execute();
    //echo "<B>outputting...</B><BR>";
    //$pdf->Ln(7);
    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
		$pdf->SetY(40);

		$pdf->SetFont('Helvetica', 'B', 12);
		$pdf->Write(0, 'CONTROL DE INGRESO Y SALIDA DE BIENES', '', 0, 'C');
		
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '                                                                                                                                            FORM: AC - ', '', 0, 'L');
		
		
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->con_num_solicitud), '', 0, 'L');
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'FECHA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->con_fecha_solicitud), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'INSTITUCIÓN A LA QUE PERTENECE: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->con_institucion), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'PISO: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->con_piso), '', 0, 'L');

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '                                                                             TELÉFONO/INTERNO: ', '', 0, 'L');
            
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->con_telefono), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'DESCRIPCIÓN DEL BIEN: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->con_descripcion), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'COLOR: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->con_color), '', 0, 'L');
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '                                                                SERIE: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->con_serie), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'CONCEPTO: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->con_concepto ), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 9);
		$pdf->Write(0, '                                                INGRESO/SALIDA:     ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->  con_tipo), '25', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'NOMBRE DE LA PERSONA QUE AUTORIZA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->  con_autorizado_por), '5', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
				
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'CARGO: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->con_cargo_autoriza), '', 0, 'L');

		$pdf->SetFont('Helvetica', 'B', 8);
		$pdf->Write(12, '                                                                                   SELLO Y FIRMA ', '', 0, 'L');
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'NOMBRE DEL RESPONSABLE: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->con_responsable), '', 0, 'L');			
		$pdf->Ln();		
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'CARGO: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->con_cargo_responsable), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();	
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'CÉDULA DE IDENTIDAD: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->  con_ci_responsable), '', 0, 'L');	
		
		$pdf->SetFont('Helvetica', 'B', 8);
		$pdf->Write(12, '                                                                                                          FIRMA ', '', 0, 'L');
		$pdf->Ln();			
						
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'MOTIVO DE SALIDA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		if($rs->con_motivo_reparacion <> ''){
		$pdf->Write(0, utf8_encode($rs->con_motivo_reparacion), '', 0, 'L');
		$pdf->Write(0, ' - ', '', 0, 'L');
		}
		if($rs->con_motivo_mantenimiento <> ''){
		$pdf->Write(0, utf8_encode($rs->con_motivo_mantenimiento), '    ', 0, 'L');
		$pdf->Write(0, ' - ', '', 0, 'L');
		}
		if($rs->con_motivo_prestamo <> ''){
		$pdf->Write(0, utf8_encode($rs->con_motivo_prestamo), '    ', 0, 'L');
		$pdf->Write(0, ' - ', '', 0, 'L');
		}
		if($rs->con_motivo_devolucion <> ''){
		$pdf->Write(0, utf8_encode($rs->con_motivo_devolucion), '   ', 0, 'L');
		$pdf->Write(0, ' - ', '', 0, 'L');
		}
		if($rs->con_motivo_transferencia <> ''){
		$pdf->Write(0, utf8_encode($rs->con_motivo_transferencia), '   ', 0, 'L');
		$pdf->Write(0, ' - ', '', 0, 'L');
		}
		if($rs->con_motivo_otros <> ''){
		$pdf->Write(0, utf8_encode($rs->con_motivo_otros), '   ', 0, 'L');
		}
		$pdf->Ln();		
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'PARA USO EXCLUSIVO DEL SERVICIO DE SEGURIDAD FÍSICA', '', 0, 'C');
		
		$pdf->Ln();

	
	$pdf->SetFont('Helvetica','B',8);
    $pdf->SetFillColor(255); 
    	
	$pdf->SetXY(20, 207);
    $pdf->Cell(70, 0, '                   CONTROL DE SALIDA', 0, 0, 'L', 1);  
	
	$pdf->SetXY(20, 215);
    $pdf->Cell(70, 0, 'GRADO:  _____________________________', 0, 0, 'L', 1);     

	$pdf->SetXY(20, 225);
    $pdf->Cell(70, 0, 'NOMBRE:  ____________________________', 0, 0, 'L', 1);     

	$pdf->SetXY(20, 235);
    $pdf->Cell(70, 0, 'FECHA Y HORA:  ______________________', 0, 0, 'L', 1);     

	$pdf->SetXY(20, 245);
    $pdf->Cell(70, 0, '              ______________________', 0, 0, 'L', 1);     

	$pdf->SetXY(20, 250);
    $pdf->Cell(70, 0, '                          FIRMA', 0, 0, 'L', 1);     



	$pdf->SetXY(115, 207);
    $pdf->Cell(70, 0, '                   CONTROL DE INGRESO', 0, 0, 'L', 1);  
	
	$pdf->SetXY(110, 215);
    $pdf->Cell(70, 0, 'GRADO:  _____________________________', 0, 0, 'L', 1);     

	$pdf->SetXY(110, 225);
    $pdf->Cell(70, 0, 'NOMBRE:  ____________________________', 0, 0, 'L', 1);     

	$pdf->SetXY(110, 235);
    $pdf->Cell(70, 0, 'FECHA Y HORA:  ______________________', 0, 0, 'L', 1);     

	$pdf->SetXY(110, 245);
    $pdf->Cell(70, 0, '              ______________________', 0, 0, 'L', 1);     

	$pdf->SetXY(110, 250);
    $pdf->Cell(70, 0, '                          FIRMA', 0, 0, 'L', 1);  

			
    $y      =   130;

	//	$pdf->SetFont('Helvetica', 'I', 9);
		//$pdf->Write(0, $fecha, '', 0, 'L');
//		$pdf->Write(0, $pdf->get_fecha($fecha), '', 0, 'R');
		////$pdf->Line(0,160,300,160);//impresión de linea

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

