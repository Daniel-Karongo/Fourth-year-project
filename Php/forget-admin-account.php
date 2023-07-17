<?php

    $adminPhone_Number = $_POST['admin-phone-number'];
    $email = $_POST['admin-modified-email'];
    $adminFirst_Name = $_POST['admin-first-name'];
    $adminLast_Name = $_POST['admin-last-name'];

    $administrators = json_decode($_POST['administrators'], true);
    $property_owners = json_decode($_POST['property-owners'], true);
    $propertyOwnersForEachRentals = json_decode($_POST['property-owners-for-each-rental'], true);


    $hostels = json_decode($_POST['hostels'], true);
    $singlerooms = json_decode($_POST['single-rooms'], true);
    $bedsitters = json_decode($_POST['bedsitters'], true);
    $apartments = json_decode($_POST['apartments'], true);
    $houses = json_decode($_POST['houses'], true);
    $businesspremises = json_decode($_POST['business-premises'], true);
    $suites = json_decode($_POST['suites'], true);

    include "../Php/databaseConnector.php";

    setcookie('remember_token', '', time() - 1, '/', '', true, true);

    $sqlquery = "UPDATE administrators 
                    SET Remember_Me = NULL
                    WHERE Email_Address = ? AND Phone_Number = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $adminPhone_Number);

    if (!mysqli_stmt_execute($stmt)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }
    
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    $password = $_POST['admin-password'];

    include "../Php/admin-dashboard.php";
    echo '<script>alert("The \"Remember Me\" Cookie Has Been Deleted")</script>';

?>