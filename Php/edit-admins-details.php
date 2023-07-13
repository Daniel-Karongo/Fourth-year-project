<?php
    include '../Php/databaseConnector.php';

    $retrieved_email = $_POST["retrieved-email"];
    $retrieved_phone_number = $_POST["retrieved-phone-number"];

    $firstName = $_POST["admin-first-name"];
    $lastName = $_POST["admin-last-name"];
    $phoneNumber = $_POST["admin-phone-number"];
    $email = $_POST["admin-modified-email"];
    $password = $_POST["admin-password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update property_owners table
    $sqlquery = "UPDATE administrators 
                 SET Phone_Number = ?, 
                     Email_Address = ?, 
                     Password = ?, 
                     First_Name = ?, 
                     Last_Name = ? 
                 WHERE Email_Address = ? 
                     AND Phone_Number = ?";
    
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
    mysqli_stmt_bind_param($stmt, "sssssss", $phoneNumber, $email, $hashedPassword, $firstName, $lastName, $retrieved_email, $retrieved_phone_number);
    
    if (!mysqli_stmt_execute($stmt)) {
        $email = $_POST["retrieved-email"];
        $adminPhone_Number = $_POST["retrieved-phone-number"];
        
        $password = $_POST["passwordField"];
        $administrators = json_decode($_POST['administrators'], true);
        $property_owners = json_decode($_POST['property-owners'], true);
        $hostels = json_decode($_POST['hostels'], true);
        $singlerooms = json_decode($_POST['single-rooms'], true);
        $bedsitters = json_decode($_POST['bedsitters'], true);
        $apartments = json_decode($_POST['apartments'], true);
        $houses = json_decode($_POST['houses'], true);
        $businesspremises = json_decode($_POST['business-premises'], true);
        $suites = json_decode($_POST['suites'], true);
        
        $adminFirst_Name = $_POST["retrieved-admin-first-name"];
        $adminLast_Name = $_POST["retrieved-admin-last-name"];
        unset($hashedPassword);

        include "../Php/admin-dashboard.php";
        echo "<script>alert('An Administrator Account With The Same Phone Number And Email Exists. Please Use Some Other Details')</script>";
    } else {
        unset($hashedPassword);
        include "../Php/successful-admin-details-change.php";
        echo "<script>alert('Updates Made Successfully');</script>";
    }

    mysqli_stmt_close($stmt);
?>
