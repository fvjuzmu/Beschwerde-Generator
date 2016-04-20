<?php
require_once '../vendor/autoload.php';
require_once 'PDF.php';

$pdfFile = "./../tmp/output.pdf";

if(isset($_REQUEST['user']))
{
    $user = $_REQUEST['user'];
}
else
{
   // die;
    $user = 'Flash Gordon';
}


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
$pdf->MultiCell(0,4,utf8_decode("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent massa ex, luctus nec dui id, ultrices cursus turpis. Integer in leo pretium, varius urna non, ornare lorem. Duis ac bibendum erat, pulvinar vehicula nibh. Praesent nec feugiat quam, ac ultricies velit. Fusce eget enim blandit, mollis leo eget, semper massa."),0,'J');
$pdf->Ln(4);
//Absatz 2
$pdf->MultiCell(0,4,utf8_decode("Proin interdum quis eros a faucibus. Nullam hendrerit ipsum dolor, vel molestie tellus tincidunt quis. Ut dignissim est ut varius mattis. Nunc vitae sapien ut turpis varius posuere nec et tellus. Cras a maximus sapien. Ut sed consectetur leo. Nunc luctus vel velit non facilisis. Mauris facilisis varius erat vitae congue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi sit amet sollicitudin quam."),0,'J');
$pdf->Ln(4);
//Absatz 3
$pdf->MultiCell(0,4,utf8_decode("Vivamus lacinia pretium erat, et dapibus magna pulvinar a. Quisque nec gravida elit, vel condimentum neque. Duis scelerisque, justo et viverra posuere, lectus justo euismod purus, nec convallis purus lorem a ipsum. Sed cursus tortor maximus iaculis tristique. Ut eu porttitor tortor. Vivamus elementum dignissim magna, eget tristique erat bibendum et. Nam at enim eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus."),0,'J');
$pdf->Ln(8);

//Gruß + Unterschrift
$pdf->Cell(50,4,utf8_decode("Mit freundlichem Gruß"),0,1);
$pdf->Ln(16);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,4,utf8_decode("Vereinsmitglied " . $user),0,1); //leer

//check if pdf already exist and if so delet it
if (file_exists($pdfFile)) {
    unlink($pdfFile);
}
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

