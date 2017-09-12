 <?php
//require('fpdf.php');
require('fpdf/fpdf.php');
class PDF extends FPDF
{
    //Cabecera de página
    function Header()
    {
        ////$this->Image('images/barra.jpg',50,10,180);
		$this->Image('recursos/logo.png', 80 ,10, 55 , 18,'PNG');
        $this->SetFont('Arial','B',6);
        $this->Cell(0,20,"Fecha de Impresion: ".date('d - m - Y')."  ",'',1,'R');
            $this->Ln(2);
    }
    //Pie de página
    function Footer()
    {
        //Posición: a 2 cm del final
        $this->SetY(-20);
         //Arial italic 8
        $this->SetFont('Arial','',8);
        $this->Cell(300,4,'Firma:__________________________                                Responsable:__________________________','',1,'C');
         //Arial italic 8
        $this->SetFont('Arial','BI',8);
        $this->Cell(250,2,'GENERAL MOTORS VENEZOLANA C.A','',1,'L');
        $this->Cell(250,5,'Sistema para la Gestion de CNP','',1,'L');
        //Arial italic 8
        $this->SetFont('Arial','BI',8);
        //Número de página
        $this->Cell(195,4,'Reporte de Materiales','T',0,'L');
        $this->Cell(0,4,'Pagina '.$this->PageNo().'/TPAG','T',1,'R');
        
        

    }
}//Fin de la clase


//Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','LETTER');
$pdf->AliasNbPages('TPAG');
$pdf->SetTopMargin(20);
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5);
$pdf->AddPage();



//Aqui te conectas a la base de datos, esta pagina no te la doy porque ya la debes tener si trabajas con php y mysql

////include("conexion.php");
require('conexion.php');
////$link=Conectarse();


//Aqui haces el llamado a la trabla de tu base de datos


    $leer="SELECT * FROM tra_mantenimiento order by id ASC";
    $basededatos=mysql_db_query("correspondencia","$leer");


$pdf->SetFont('Arial','B',7);
$pdf->Cell(230,5,"REPORTE DE MATERIALES",'',1,'C');




$pdf->SetFont('Arial','B',6);
$pdf->Cell(25,6,'Numero de Partes','TRLB',0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(35,6,'Nombre','TRLB',0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(140,6,'Especificaciones','TRLB',0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(25,6,'Unidad/Medida','TRLB',0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(25,6,'Codigo Arancelario','TRLB',0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(15,6,'Status','TRLB',1,'C');






while($fila=mysql_fetch_array($basededatos))
    {
    
    // Aqui empiezas a mostrar los datos

$pdf->SetFont('Arial','',6);    
$pdf->Cell(25,5,$fila[placa],'TRLB',0,'Q');
$pdf->SetFont('Arial','',6);    
$pdf->Cell(35,5,$fila[placa],'TRLB',0,'Q');
$pdf->SetFont('Arial','',6);
$especificaciones=substr($fila[placa],0,140);
$pdf->Cell(140,5,$especificaciones.'...','TRLB',0,'Q');
$pdf->SetFont('Arial','',6);    
$pdf->Cell(25,5,$fila[placa],'TRLB',0,'Q');
$pdf->SetFont('Arial','',6);
$pdf->Cell(25,5,$fila[placa],'TRLB',0,'Q');
$pdf->SetFont('Arial','',6);

$pdf->Cell(15,5,$statu,'TRLB',1,'Q');

}


$pdf->Ln(8);
$pdf->OutPut("Reporte de Materiales.pdf",'D');

?> 