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
            $id_entidad=$rs2->id;
        }
        if($id_entidad<>2 && $id_entidad<>4 && $id_entidad<>5 && $id_entidad<>6){
        $this->Image($image_file, 70, 12, 80, 30, 'PNG');
        //$this->Image($image_file, 70, 5, 80, 30, 'PNG');
        }
        if ($id_entidad==5 || $id_entidad==6) {
            $image_file2='../media/logos/logo_MDPyEP.png';
        $this->Image($image_file, 130, 15, 65, 25, 'PNG');
        $this->Image($image_file2, 30, 15, 70, 30, 'PNG');
        }


        $this->SetFont('Tahoma', 'B', 20);
        //$this->Ln(120);
    }

    // Page footer
    public function Footer() {
        /* establecemos el color del texto */
          //$this->SetTextColor(0,0,200);
          
          $this->SetFont('Tahoma', 'B', 9);
          /* insertamos numero de pagina y total de paginas*/
		  $this->SetY(-19);
          $this->Cell(182, 0, $this->getAliasNumPage().' / '.$this-> getAliasNbPages(),0, false, 'R', 0, '', 0, false, 'T', 'M');
          //$this->Ln(15);
          //$this->SetDrawColor(255,0,0);
          /* dibujamos una linea roja delimitadora del pie de página */
          //$this->Line(15,282,195,282);

     }



/////////////
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
            return 'La Paz, '.date('d',$this->datatime).' de '.$this->mes.' de '.date('Y',$this->datatime);  
            
			//return 'La Paz, ';  

        }

///////////////
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'legal', true, 'UTF-8', false);

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
$margin_top=47;
if($id_entidad==2){
    $margin_top=33;
}elseif ($id_entidad==4) {
    $margin_top=60;
}

//set margins
$pdf->SetMargins(30, $margin_top, 18);
//$pdf->SetMargins(20, PDF_MARGIN_TOP, 20);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(35);


//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

$pdf->SetFont('Tahoma', 'B', 18);

// add a page
////$pdf->AddPage();
////$pdf->AddPage('P','Legal');
$pdf->AddPage('P',array(216,330)); 
$nombre = 'Administrativa';
try {
    $dbh = New db();
    $stmt = $dbh->prepare("SELECT * FROM documentos d 
                               INNER JOIN tipos t ON d.id_tipo=t.id
                               WHERE d.id='$id'");
    // call the stored procedure
	//$id_user=$stmt->id_user;
    $stmt->execute();
    //echo "<B>outputting...</B><BR>";
    //$pdf->Ln(7);
    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
			

        //$pdf->Ln(20);
        $pdf->SetX(100);
        $pdf->SetFont('Tahoma', 'B', '11');
////		$pdf->Write(0, strtoupper($rs->tipo).' No.', '', 0, 'L');
		
	if ((($rs->id_user) == 231) or (($rs->id_user) == 376) or (($rs->id_user) == 379) or (($rs->id_user) == 381)){
			$pdf->SetXY(97, 47  );
			$pdf->Write(0, strtoupper($rs->tipo).' URC No.', '', 0, 'L');
			//$pdf->Write(0, strtoupper($codigo), '', 0, 'R');
		}
		else{
			$pdf->Write(0, strtoupper($rs->tipo).' No.', '', 0, 'L');
		}
		
		$pdf->Ln(8);
        $pdf->SetX(100);
        //$pdf->SetFont('Helvetica', '', 12);
		
		if ((($rs->id_user) == 231) or (($rs->id_user) == 376) or (($rs->id_user) == 379) or (($rs->id_user) == 381)){
			$pdf->SetXY(97, 54  );
			$pdf->Write(0, $pdf->get_fecha($rs->fecha_creacion), '', 0, 'L');
		}
		else{
			$pdf->Write(0, 'La Paz, ', '', 0, 'L');
		}
			
        
        //$pdf->Ln();
		
		$pdf->SetFont('Tahoma', '', 11);
        
		$codigo = substr($rs->codigo, -9); /// aca el tamaño del cite por defecto 11
        //$codigo = str_replace('/', '.', $codigo);
        $codigo = str_replace('/', '/', $codigo);
		
		if ((($rs->id_user) == 231) or (($rs->id_user) == 376) or (($rs->id_user) == 379) or (($rs->id_user) == 381)){
		$pdf->SetXY(157, 47  );	
		$pdf->Write(0, strtoupper($codigo), '', 0, 'R');
		}
		
        $pdf->Ln(20);
        $referencia ='<table border="0" width="100%">
                        <tr  >
                            <td width="80px" style="text-align:left;"><b>TEMA:</b></td>
                            <td width="505px" style="text-align:justify;" ><b>'.utf8_encode($rs->referencia).'</b></td>
                        </tr>
                        </table>';

        $pdf->writeHTML($referencia);        
        $pdf->Ln(-4);
        $pdf->SetFont('Tahoma', '', 11);
        $pdf->writeHTML($rs->contenido);
        $pdf->Ln(10);
        
        //$pdf->writeHTML();
        /*   $pdf->SetY(-5);
          // Set font
          $pdf->SetFont('Tahoma', 'I', 7);
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
