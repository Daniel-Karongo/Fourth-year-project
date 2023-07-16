<?php
    include('../fpdf/fpdf.php');

    $table = json_decode($_POST['table-details'], true);
    $title = $_POST['table-name'];

    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(103,16,'');
    $pdf->Cell(100,24,'HouseSearchKE',0,1);

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(70,16,'');
    $pdf->Cell(100,24,'People Interested In Your '. $title ,0,1);

    $pdf->SetFont('Arial','B',9);

    $pdf->Cell(42,6,'Rental Name',1,0,'C');
    $pdf->Cell(35,6,'Location',1,0,'C');
    $pdf->Cell(40,6,'Name',1,0,'C');
    $pdf->Cell(35,6,'Phone Number',1,0,'C');
    $pdf->Cell(65,6,'Email Address',1,0,'C');
    $pdf->Cell(60,6,'Date Of Booking',1,1,'C');

    $pdf->SetFont('Arial','',10);
    for($i=0; $i<count($table); $i++) {
        $refinedTable = explode(", ", $table[$i]);
        
        $pdf->Cell(42,6,$refinedTable[0],1,0,'C');
        $pdf->Cell(35,6,$refinedTable[1],1,0,'C');
        $pdf->Cell(40,6,$refinedTable[2],1,0,'C');
        $pdf->Cell(35,6,$refinedTable[3],1,0,'C');
        $pdf->Cell(65,6,$refinedTable[4],1,0,'C');
        $pdf->Cell(60,6,$refinedTable[5],1,1,'C');
    }

    $pdf->Output();
?>