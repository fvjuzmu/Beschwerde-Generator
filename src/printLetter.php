<?php
require_once '../vendor/autoload.php';
require_once 'PDF.php';
require_once 'EtherpadHandler.php';

$pdfFile = "./../tmp/output.pdf";

//check if pdf already exist and if so delet it
while (file_exists($pdfFile)) {
    unlink($pdfFile);
}

if(isset($_REQUEST['user']))
{
    $user = $_REQUEST['user'];
}
else
{
   // die;
    $user = 'Flash Gordon';
}

$etherpad = new EtherpadHandler();
$anrede = $etherpad->getSalutation();
$mitte = $etherpad->getCenterPart();
$schluss = $etherpad->getClosingWord();

// Instanciation of inherited class
$pdf = new PDF('P', 'mm', 'A4');
$pdf->SetMargins('15', '20');
$pdf->AliasNbPages();
$pdf->AddPage();

// Betreff
$pdf->SetFont('Arial','B',22);
$pdf->Cell(50,4,utf8_decode("Betreff"),0,1);
$pdf->Ln(8);

//Anschreiben
$pdf->SetFont('Arial','',12);
//Absatz 1
$pdf->MultiCell(0,4,$anrede,0,'J');
$pdf->Ln(4);
//Absatz 2
$pdf->MultiCell(0,4,$mitte,0,'J');
$pdf->Ln(4);
//Absatz 3
$pdf->MultiCell(0,4,$schluss,0,'J');
$pdf->Ln(8);

//Gruß + Unterschrift
$pdf->Cell(50,4,utf8_decode("Mit freundlichem Gruß"),0,1);
$pdf->Ln(24);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,4,utf8_decode("Vereinsmitglied " . $user),0,1); //leer

//$pdf->Output();
$pdf->Output($pdfFile, 'F');


/*/
print a simple text file
$ipp = new \PHPIPP\PrintIPP();
$ipp->setHost("localhost");
$ipp->setPrinterURI("/printers/epson");
$ipp->setData($pdfFile);
$ipp->printJob();
//*/

