<?php
mb_internal_encoding( 'UTF-8' );
require('../vendor/autoload.php');
ob_start();
$pdf=new \fpdf\FPDF();
$pdf->AddPage();
$rand_rechts = 15;
$rand_links = 15;
$rand_oben = 5;
$pdf->SetMargins($rand_rechts,$rand_oben, $rand_links);

$pdf->SetFont('Arial','',20);
$pdf->MultiCell(0,4,utf8_decode('Förderverein Jugendtreff Mutterstadt e.V.'),0,1);   //leerzeile
//$pdf->Image('../assets/logo.jpg',150,6,45,0,'JPG');  //logo
$pdf->Cell(50,4,'',0,1); // leere zeile

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,4,'E-Mail: info@juzmu.de',0,1);
$pdf->Cell(50,4,'Tel.: 555-12325354',0,1);

$pdf->Cell(50,4,'',0,1); // leere zeile

$pdf->SetFont('Arial','',8);
$pdf->MultiCell(90,3,utf8_decode("Förderverein Jugendtreff Mutterstadt e.V,\n Oggersheimerstraße 10, 67112 Mutterstadt"),1,'C');
$pdf->SetFont('Courier','', 12);
$pdf->MultiCell(90,4,utf8_decode("\nVorname Nachname\nStraße 12\n\n123456 Musterort\n\n"),1,'L');


$monate = array("Jannuar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");
$timestamp= time();
$monat = $monate[date('n', $timestamp)];
$timestamp= time();
$jahr = date(" Y",$timestamp);
$tag = date("d. ",$timestamp);
$pdf->Cell(0,4,$tag . $monat . $jahr,0,1,'R');
//$name =  $A_vname .' '. $A_nname;
//$pdf->Cell(50,4,utf8_decode($A_vname .' '. $A_nname),0,1,'L'); $pdf->Cell(0,4,utf8_decode($tag . $monat . $jahr),0,1,'R');
//$pdf->Cell(50,4,$A_str,0,1);
//$pdf->Cell(50,4,$A_plz . ' ' . $A_ort,0,1);

//Empfänger
$pdf->Cell(50,4,'',0,1);   //leerzeile
$pdf->Cell(50,4,'',0,1);
$pdf->Cell(50,4,'',0,1);
$pdf->Cell(50,4,'',0,1);

$pdf->SetFont('Arial','B',22);
$pdf->Cell(50,4,utf8_decode("Betreff"),0,1);
$pdf->Cell(50,4,'',0,1); //leer
$pdf->Cell(50,4,'',0,1); //leer


$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,4,utf8_decode("Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet."),0,'J');
$pdf->Cell(50,4,'',0,1); //leer
$pdf->Cell(50,4,'',0,1); //leer
$pdf->Cell(50,4,utf8_decode("Mit freundlichem Gruß"),0,1);
$pdf->Cell(50,4,'',0,1); //leer
$pdf->Cell(50,4,'',0,1); //leer
$pdf->Cell(50,4,'',0,1); //leer
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(50,4,utf8_decode("Vereinsmitglied Stefan Marx"),0,1); //leer



header("content-tpye:application/pdf");
$pdf->Output();