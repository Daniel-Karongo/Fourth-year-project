<?php
    include('../fpdf/fpdf.php');
    $administrators = json_decode($_POST['administrators'], true);
    
    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(103,16,'');
    $pdf->Cell(100,24,'HouseSearchKE',0,1);

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(108,16,'');
    $pdf->Cell(100,24,'Administrators',0,1);

    $pdf->SetFont('Arial','B',9);

    $pdf->Cell(30,6,'Phone Number',1,0,'C');
    $pdf->Cell(50,6,'Email Address',1,0,'C');
    // $pdf->Cell(100,6,'Password',1,0,'C');
    $pdf->Cell(23,6,'First Name',1,0,'C');
    $pdf->Cell(23,6,'Last Name',1,0,'C');
    $pdf->Cell(30,6,'Password Reset',1,0,'C');
    $pdf->Cell(130,6,'Remember Me Tokens',1,1,'C');

    $pdf->SetFont('Arial','',10);
    for($i=0; $i<count($administrators); $i++) {
        $pdf->Cell(30,6,$administrators[$i][0],1,0,'C');
        $pdf->Cell(50,6,$administrators[$i][1],1,0,'C');
        // $pdf->Cell(100,6,$administrators[$i][2],1,0,'C');
        $pdf->Cell(23,6,$administrators[$i][3],1,0,'C');
        $pdf->Cell(23,6,$administrators[$i][4],1,0,'C');
        $pdf->Cell(30,6,$administrators[$i][5],1,0,'C');
        $pdf->Cell(130,6,$administrators[$i][6],1,1,'C');
    }

    $pdf->Output();
?>