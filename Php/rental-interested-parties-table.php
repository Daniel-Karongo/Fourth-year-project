<?php
    include('../fpdf/fpdf.php');

    $interestedParties = json_decode($_POST['interested-parties'], true);
    $rentalName = $_POST['rental-name'];
    
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(62,24,'');
    $pdf->Cell(100,24,'HouseSearchKE',0,1);

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(37,16,'');
    $pdf->Cell(100,24,'People Interested In ' . $rentalName,0,1);

    $pdf->SetFont('Arial','B',12);

    $pdf->Cell(6,16,'');
    $pdf->Cell(50,9,'Name',1,0,'C');
    $pdf->Cell(50,9,'Phone Number',1,0,'C');
    $pdf->Cell(80,9,'Email',1,1,'C');
    
    $pdf->SetFont('Arial','',12);
    for($i=0; $i<count($interestedParties); $i++) {
        $pdf->Cell(6,16,'');
        $pdf->Cell(50,9,$interestedParties[$i][0],1,0,'C');
        $pdf->Cell(50,9,$interestedParties[$i][1],1,0,'C');
        $pdf->Cell(80,9,$interestedParties[$i][2],1,1,'C');

    }

    $pdf->Output();
?>