<?php
    include('../fpdf/fpdf.php');
    $bedsitters = json_decode($_POST['bedsitters'], true);
    $owners = json_decode($_POST['owners'], true);
    $extraDetails = json_decode($_POST['extra-information'], true);

    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(103,16,'');
    $pdf->Cell(100,24,'HouseSearchKE',0,1);

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(120,16,'');
    $pdf->Cell(105,24,'Bedsitters',0,1);

    for($i=0; $i<count($bedsitters); $i++) {
    
        $pdf->SetFont('Arial','B',9);

        $pdf->Cell(50,6,'Rental Name',1,0,'C');
        $pdf->Cell(50,6,'Location',1,0,'C');
        $pdf->Cell(50,6,'Google Location',1,0,'C');
        $pdf->Cell(50,6,'Number Of Units',1,0,'C');
        $pdf->Cell(50,6,'Number Of Units Remaining',1,1,'C');

        $pdf->SetFont('Arial','B',9);

        $pdf->Cell(50,6,$bedsitters[$i][1],1,0,'C');
        $pdf->Cell(50,6,$bedsitters[$i][2],1,0,'C');
        // $pdf->Cell(40,6,$property_owners[$i][2],1,0,'C');
        $pdf->Cell(50,6,$bedsitters[$i][3],1,0,'C');
        $pdf->Cell(50,6,$bedsitters[$i][6],1,0,'C');
        $pdf->Cell(50,6,$bedsitters[$i][7],1,1,'C');

        $pdf->Cell(40,6,"",0,1,'C');

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(40,6,'',0,0,'C');
        $pdf->Cell(40,6,'Rental Term',1,0,'C');
        $pdf->Cell(30,6,'Amount',1,0,'C');
        $pdf->Cell(40,6,'Owner\'s Number',1,0,'C');
        $pdf->Cell(50,6,'Owner\'s Email',1,0,'C');
        $pdf->Cell(40,6,'First Name',1,0,'C');
        $pdf->Cell(40,6,'Last Name',1,1,'C');

        $rentalExtraDetails = explode(", ", $extraDetails[$i]);
        $rentalOwnerDetails = explode(", ", $owners[$i]);

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(40,6,"",0,0,'C');
        $pdf->Cell(40,6,$rentalExtraDetails[0],1,0,'C');
        $pdf->Cell(30,6,$rentalExtraDetails[1],1,0,'C');
        $pdf->Cell(40,6,$rentalOwnerDetails[0],1,0,'C');
        $pdf->Cell(50,6,$rentalOwnerDetails[1],1,0,'C');
        $pdf->Cell(40,6,$rentalOwnerDetails[2],1,0,'C');
        $pdf->Cell(40,6,$rentalOwnerDetails[3],1,1,'C');
        
        $pdf->Cell(40,6,"",0,1,'C');
    }

    $pdf->Output();
?>