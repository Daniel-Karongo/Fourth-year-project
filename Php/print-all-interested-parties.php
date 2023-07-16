<?php
    include('../fpdf/fpdf.php');

    $tables = json_decode($_POST['tables'], true);
    $tableDetails = json_decode($_POST['table-details'], true);

    
    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(103,16,'');
    $pdf->Cell(105,24,'HouseSearchKE',0,1);

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(85,16,'');
    $pdf->Cell(100,16,'People Interested In Your Rentals',0,1);

    $pdf->SetFont('Arial','B',9);

    for($i=0; $i<count($tables); $i++) {
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,16,'',0,1);
        $pdf->Cell(100,16,$tables[$i],0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(42,6,'Rental Name',1,0,'C');
        $pdf->Cell(35,6,'Location',1,0,'C');
        $pdf->Cell(40,6,'Name',1,0,'C');
        $pdf->Cell(35,6,'Phone Number',1,0,'C');
        $pdf->Cell(65,6,'Email Address',1,0,'C');
        $pdf->Cell(60,6,'Date Of Booking',1,1,'C');

        $pdf->SetFont('Arial','',10);
        for($j=0; $j<count($tableDetails[$i]); $j++) {
            $refinedTable = explode(", ", $tableDetails[$i][$j]);
            
            $pdf->Cell(42,6,$refinedTable[0],1,0,'C');
            $pdf->Cell(35,6,$refinedTable[1],1,0,'C');
            $pdf->Cell(40,6,$refinedTable[2],1,0,'C');
            $pdf->Cell(35,6,$refinedTable[3],1,0,'C');
            $pdf->Cell(65,6,$refinedTable[4],1,0,'C');
            $pdf->Cell(60,6,$refinedTable[5],1,1,'C');
        }
    }

    $pdf->Output();

?>