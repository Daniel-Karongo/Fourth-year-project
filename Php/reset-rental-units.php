<?php
    include '../Php/databaseConnector.php';

    $rentalType = $_POST['rental-type'];
    $rentalID = $_POST['rental-ID'];
    $originalNumberOfUnits = $_POST['original-number-of-units'];
    
    $tableName= "";
    $interestedParties = "";

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
    
    $sqlquery = "UPDATE `$tableName` SET `Number_Of_Units_Remaining` = ?, `Interested_Parties` = ? WHERE `Rental_ID` = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, 'iss', $originalNumberOfUnits, $interestedParties, $rentalID);

    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
    } else {
        echo 'The Number Of Remaining Units Set Back To ' . $originalNumberOfUnits . '. You Will Have To Reload The Previous Page (The Dashboard) To See The Change.'; ;
    }
?>