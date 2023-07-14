<?php 
    include '../Php/databaseConnector.php';

    $rentalType = $_POST['rental-type'];
    $rentalID = $_POST['rental-ID'];
    $numberOfUnits = $_POST['number-of-units'];
    
    $numberOfUnits = $numberOfUnits - 1;

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

    $sqlquery = "UPDATE `$tableName` SET `Number_Of_Units_Remaining` = ? WHERE `Rental_ID` = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, 'is', $numberOfUnits, $rentalID);

    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
    }
?>