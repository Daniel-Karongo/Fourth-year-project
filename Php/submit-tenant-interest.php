<?php
    include '../Php/databaseConnector.php';

    $fullName = $_POST["tenants-name"]; 
    $phoneNumber = $_POST["tenants-phone-number"];
    $email = $_POST["tenants-email"];
    $rentalType = $_POST['rental-type'];
    $rentalID = $_POST['rental-ID'];
    $interestedParties = $_POST['interested-parties'];

    if($interestedParties == "") {
        $tableEntry = "[" .$fullName . "-". $phoneNumber . "-" . $email . "]";
    } else {
        $tableEntry = $interestedParties . ", " . "[" .$fullName . "-". $phoneNumber . "-" . $email . "]";
    }
    
    $tableName= "";

    switch($rentalType) {
        case 'Business Premise':
            $tableName = "business_premises";
            break;
        case 'Hostel':
            $tableName = "hostels";
            break;
        case 'Apartment':
            $tableName = "apartments";
            break;
        case 'House':
            $tableName = "houses";
            break;
        case 'Suite':
            $tableName = "suites";
            break;
        case 'Bedsitter':
            $tableName = "bedsitters";
            break;
        case 'Single Room':
            $tableName = "single_rooms";
            break;
    }
    
    $sqlquery = "UPDATE `$tableName` SET `Interested_Parties` = ? WHERE `Rental_ID` = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, 'ss', $tableEntry, $rentalID);

    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
    } else {
        echo 'Details Submitted Successfully. Thank You.';
    }
?>