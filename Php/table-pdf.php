<?php
    include('../fpdf/fpdf.php');
    $property_owners = json_decode($_POST['property-owners'], true);
    
    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(103,16,'');
    $pdf->Cell(100,24,'HouseSearchKE',0,1);

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(108,16,'');
    $pdf->Cell(100,24,'Property Owners',0,1);

    $pdf->SetFont('Arial','B',9);

    $pdf->Cell(30,6,'Phone Number',1,0,'C');
    $pdf->Cell(50,6,'Email Address',1,0,'C');
    // $pdf->Cell(40,6,'Password',1,0,'C');
    $pdf->Cell(23,6,'First Name',1,0,'C');
    $pdf->Cell(23,6,'Last Name',1,0,'C');
    $pdf->Cell(150,6,'Rentals Owned',1,1,'C');
    // $pdf->Cell(30,6,'Password Reset',1,0,'C');
    // $pdf->Cell(40,6,'Remember Me Tokens',1,1,'C');

    $pdf->SetFont('Arial','',10);
    for($i=0; $i<count($property_owners); $i++) {
        $pdf->Cell(30,6,$property_owners[$i][0],1,0,'C');
        $pdf->Cell(50,6,$property_owners[$i][1],1,0,'C');
        // $pdf->Cell(40,6,$property_owners[$i][2],1,0,'C');
        $pdf->Cell(23,6,$property_owners[$i][3],1,0,'C');
        $pdf->Cell(23,6,$property_owners[$i][4],1,0,'C');
        $pdf->Cell(150,6,$property_owners[$i][5],1,1,'C');
        // $pdf->Cell(30,6,$property_owners[$i][6],1,0,'C');
        // $pdf->Cell(40,6,$property_owners[$i][7],1,1,'C');
    }

    $pdf->Output();
?>