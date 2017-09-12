<?php
/*require('/fpdf/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

$pdf->Cell(40,10,'FORMULARIO DE SOLICITUD DE MOVILIDAD');
	
$pdf->Output();  

 */?>
<?php

require_once('../libs/tcpdf/config/lang/eng.php');
require_once('../libs/tcpdf/tcpdf.php');
include('../db/dbclass.php');
$id = $_GET['eec'];
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

        $this->Image($image_file, 70, 10, 75, 25, 'PNG');

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
							tra_vehiculo_asig.obs,
							tra_vehiculo.tipo,
							tra_vehiculo.placa,
							tra_vehiculo.color,
							tra_vehiculo.marca
							FROM
							tra_solicitud
							INNER JOIN users ON tra_solicitud.usuario = users.id
							INNER JOIN oficinas ON users.id_oficina = oficinas.id
							INNER JOIN tra_vehiculo_asig ON tra_vehiculo_asig.id_solicitud = tra_solicitud.id
							INNER JOIN tra_vehiculo ON tra_vehiculo_asig.placa = tra_vehiculo.placa
							WHERE tra_solicitud.id='$id'
							GROUP BY formulario");						
    // call the stored procedure
    $stmt->execute();
    //echo "<B>outputting...</B><BR>";
    $pdf->Ln(7);

    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {

		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 12);
		$pdf->Write(0, 'FORMULARIO DE SOLICITUD DE MOVILIDAD ', '', 0, 'C');
		
		$pdf->Ln();$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '                                                                                                                                            FORM: ', '', 0, 'L');
		
		
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->formulario), '', 0, 'L');
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'SOLICITANTE: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->nombre), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'AREA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->oficina), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		
		/*$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'FECHA DE USO  DEL: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->fecha_ini), '', 0, 'L');
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '      AL: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->fecha_fin), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();*/

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'FECHA y HORA SALIDA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->hora_salida), '', 0, 'L');
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '      LLEGADA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);
		$pdf->Write(0, utf8_encode($rs->hora_llegada), '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'JUSTIFICACIÓN: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Ln();
		$pdf->Write(0, utf8_encode($rs->motivo), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();
		$pdf->Ln();		

		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'DESCRIPCION DEL VEHICULO ', '', 0, 'C');
		$pdf->Ln();		
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '                                        PLACA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->placa), '', 0, 'L');
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '                                   TIPO: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->tipo), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '                                        MARCA: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->marca), '', 0, 'L');
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, '                         COLOR: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->color), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();

		/*$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'OBSERVACIONES: ', '', 0, 'L');
		$pdf->SetFont('Helvetica', '', 10);	
		$pdf->Write(0, utf8_encode($rs->obs), '', 0, 'L');
		$pdf->Ln();		
		$pdf->Ln();*/
				
	$pdf->SetFont('Helvetica','',7);
    $pdf->SetFillColor(255); 

	$pdf->SetXY(10, 230);
    $pdf->Cell(70, 5, '____________________', 0, 0, 'C', 1);     
    
	$pdf->SetXY(75, 230);
    $pdf->Cell(30, 5, '____________________', 0, 0, 'C', 1);  
	
	$pdf->SetXY(130, 230);
    $pdf->Cell(10, 5, '____________________', 0, 0, 'C', 1);
	
	$pdf->SetXY(173, 230);
    $pdf->Cell(10, 5, '___________________', 0, 0, 'C', 1);
		
	$pdf->SetXY(10, 235);
    $pdf->Cell(70, 5, utf8_encode($rs->nombre), 0, 0, 'C', 1);
	
	$pdf->SetXY(10, 240);
    $pdf->Cell(70, 5, 'SOLICITANTE', 0, 0, 'C', 1);  
	
	$pdf->SetXY(75, 235);
    $pdf->Cell(30, 5, 'VoBo Inmediato', 0, 0, 'C', 1);
	
	$pdf->SetXY(75, 240);
    $pdf->Cell(30, 5, 'Superior', 0, 0, 'C', 1);  
	
	$pdf->SetXY(100, 235);
    $pdf->Cell(65, 5, 'VoBo Transporte', 0, 0, 'C', 1);  
	
	$pdf->SetXY(163, 235);
    $pdf->Cell(23, 5, utf8_encode($rs->aprobado_por), 0, 0, 'C', 1);
		
	$pdf->SetXY(163, 240);
    $pdf->Cell(30, 5, 'AUTORIZADO', 0, 0, 'C', 1);             
	  	
	//$pdf->SetXY(105, 240);
    //$pdf->Cell(70, 5, 'Fecha: ...............', 0, 0, 'C', 1);  
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Helvetica', 'I', 9);
		//$pdf->Write(0, $fecha, '', 0, 'L');
		$pdf->Write(0, $pdf->get_fecha($fecha), '', 0, 'R');
		////$pdf->Line(0,160,300,160);//impresión de linea

		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Write(0, 'ACCESORIOS ', '', 0, 'C');
		$pdf->Ln();		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 9);
		$pdf->Write(0, '                                                               ENTREGA                              DEVOLUCIÓN', '', 0, 'L');
		$pdf->Ln();

		$pdf->Write(0, '                                                               SI          NO                              SI           NO', '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          LLANTA DE AUXILIO ', '', 0, 'L');
		$pdf->Image('caja.jpg',75,68,5);
		$pdf->Image('caja.jpg',88,68,5);
		$pdf->Image('caja.jpg',119,68,5);
		$pdf->Image('caja.jpg',132,68,5);
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          GATA ', '', 0, 'L');
		$pdf->Image('caja.jpg',75,75,5);
		$pdf->Image('caja.jpg',88,75,5);
		$pdf->Image('caja.jpg',119,75,5);
		$pdf->Image('caja.jpg',132,75,5);
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          LLAVE EN Z ', '', 0, 'L');
		$pdf->Image('caja.jpg',75,82,5);
		$pdf->Image('caja.jpg',88,82,5);
		$pdf->Image('caja.jpg',119,82,5);
		$pdf->Image('caja.jpg',132,82,5);
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          RADIO ', '', 0, 'L');
		$pdf->Image('caja.jpg',75,89,5);
		$pdf->Image('caja.jpg',88,89,5);
		$pdf->Image('caja.jpg',119,89,5);
		$pdf->Image('caja.jpg',132,89,5);
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          FAROLES ', '', 0, 'L');
		$pdf->Image('caja.jpg',75,96,5);
		$pdf->Image('caja.jpg',88,96,5);
		$pdf->Image('caja.jpg',119,96,5);
		$pdf->Image('caja.jpg',132,96,5);
		$pdf->Ln();
		$pdf->Ln();
				
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          PARACHOQUES ', '', 0, 'L');
		$pdf->Image('caja.jpg',75,103,5);
		$pdf->Image('caja.jpg',88,103,5);
		$pdf->Image('caja.jpg',119,103,5);
		$pdf->Image('caja.jpg',132,103,5);
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          STOP ', '', 0, 'L');
		$pdf->Image('caja.jpg',75,110,5);
		$pdf->Image('caja.jpg',88,110,5);
		$pdf->Image('caja.jpg',119,110,5);
		$pdf->Image('caja.jpg',132,110,5);
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          ESPEJOS ', '', 0, 'L');
		$pdf->Image('caja.jpg',75,117,5);
		$pdf->Image('caja.jpg',88,117,5);
		$pdf->Image('caja.jpg',119,117,5);
		$pdf->Image('caja.jpg',132,117,5);
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          PARABRISAS ', '', 0, 'L');
		$pdf->Image('caja.jpg',75,124,5);
		$pdf->Image('caja.jpg',88,124,5);
		$pdf->Image('caja.jpg',119,124,5);
		$pdf->Image('caja.jpg',132,124,5);
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();	

		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Write(0, '          OTROS    ....................................................................................................................................................', '', 0, 'L');
		$pdf->Ln();
		$pdf->Ln();

		
		$pdf->Ln();	
		$pdf->Ln();
		$pdf->Ln();
	$pdf->SetXY(10, 205);

		$pdf->SetFont('Helvetica', 'B', 9);
		$pdf->Write(0, '                                                               ENTREGA                                                            DEVOLUCIÓN', '', 0, 'L');
						

	$pdf->SetFont('Helvetica','',7);
    $pdf->SetFillColor(255); 

	$pdf->SetXY(10, 230);
    $pdf->Cell(70, 5, '____________________', 0, 0, 'C', 1);     
    
	$pdf->SetXY(75, 230);
    $pdf->Cell(30, 5, '____________________', 0, 0, 'C', 1);  
	
	$pdf->SetXY(130, 230);
    $pdf->Cell(10, 5, '____________________', 0, 0, 'C', 1);
	
	$pdf->SetXY(173, 230);
    $pdf->Cell(10, 5, '___________________', 0, 0, 'C', 1);
	
		
	$pdf->SetXY(10, 240);
    $pdf->Cell(70, 5, 'Entregue: ......................................', 0, 0, 'C', 1);
	
	$pdf->SetXY(10, 245);
    $pdf->Cell(70, 5, 'Fecha: ........................................', 0, 0, 'C', 1);  
	
	$pdf->SetXY(75, 240);
    $pdf->Cell(30, 5, 'Recibi: ......................................', 0, 0, 'C', 1);
	
	$pdf->SetXY(75, 245);
    $pdf->Cell(30, 5, 'Fecha: ........................................', 0, 0, 'C', 1);  
	
	$pdf->SetXY(100, 240);
    $pdf->Cell(65, 5, 'Entregue: ......................................', 0, 0, 'C', 1);  

	$pdf->SetXY(100, 245);
    $pdf->Cell(65, 5, 'Fecha: ........................................', 0, 0, 'C', 1);  
	
	$pdf->SetXY(163, 240);
    $pdf->Cell(30, 5, 'Recibi: ......................................', 0, 0, 'C', 1);
		
	$pdf->SetXY(163, 245);
    $pdf->Cell(30, 5, 'Fecha: ........................................', 0, 0, 'C', 1);		

	$pdf->Line(105,65,105,130);
	$pdf->Line(110,600,110,210);
	$padding = 2;       
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

