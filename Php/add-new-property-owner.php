<?php
    include '../Php/databaseConnector.php';

    $firstName = $_POST["new-property-owner-first-name"];
    $lastName = $_POST["new-property-owner-last-name"];
    $phoneNumber = $_POST["new-property-owner-phone"];
    $email = $_POST["new-property-owner-email"];
    $password = $_POST["new-property-owner-password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sqlquery = "INSERT INTO property_owners (Phone_Number, Email_Address, Pass_word, First_Name, Last_Name) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, 'sssss', $phoneNumber, $email, $hashedPassword, $firstName, $lastName);

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
        echo "<script>alert('An Property-Owner-Account With The Same Phone Number And Email Exists. Please Use Some Other Details')</script>";
    } else {
        $email = $_POST["retrieved-email"];
        $adminPhone_Number = $_POST["retrieved-phone-number"];
        $password = $_POST["passwordField"];

        unset($hashedPassword);

        include "../Php/successful-property-owner-account-creation-from-admin.php";
        echo "<script>alert('Updates Made Successfully');</script>";
    }
?>
