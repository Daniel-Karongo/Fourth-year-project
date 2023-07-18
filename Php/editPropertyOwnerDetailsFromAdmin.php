<?php
    include '../Php/databaseConnector.php';

    $phonenumber = $_POST['phone-number'];
    $emailAddress = $_POST['email-address'];
    $password = $_POST['password'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $rentalsOwned = $_POST['rentals-owned'];
    $passwordResetConfirmationCode = $_POST['password-reset-confirmation-code'];
    $rememberMeToken = $_POST['remember-me-token'];

    $originalPhonenumber = $_POST['original-phone-number'];
    $originalEmailAddress = $_POST['original-email-address'];
    $originalPassword = $_POST['original-password'];
    $originalFirstName = $_POST['original-first-name'];
    $originalLastName = $_POST['original-last-name'];
    $originalRentalsOwned = $_POST['original-rentals-owned'];
    $originalPasswordResetConfirmationCode = $_POST['original-password-reset-confirmation-code'];
    $originalRememberMeToken = $_POST['original-remember-me-token'];

        
    $sqlQuery = "UPDATE property_owners
                    SET Phone_Number = ?, 
                        Email_Address = ?, 
                        Pass_Word = ?, 
                        First_Name = ?, 
                        Last_Name = ?, 
                        Rentals_Owned = ?,                
                        Password_Reset_Confirmation_Code = ?,                
                        Remember_Me = ?                
                    WHERE Phone_Number = ? AND Email_Address = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlQuery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, 'ssssssssss', $phonenumber, $emailAddress, $password, $firstName, $lastName, $rentalsOwned, $passwordResetConfirmationCode, $rememberMeToken, $originalPhonenumber, $originalEmailAddress);

    if (!mysqli_stmt_execute($stmt)) {
        $administrators = isset($_POST['administrators']) ? json_decode($_POST['administrators'], true) : NULL;
        $property_owners = isset($_POST['property-owners']) ? json_decode($_POST['property-owners'], true) : NULL;
        $propertyOwnersForEachRentals = isset($_POST['property-owners-for-each-rental']) ? json_decode($_POST['property-owners-for-each-rental'], true) : NULL;

        $hostels = isset($_POST['hostels']) ? json_decode($_POST['hostels'], true) : NULL;
        $singlerooms = isset($_POST['single-rooms']) ? json_decode($_POST['single-rooms'], true) : NULL;
        $bedsitters = isset($_POST['bedsitters']) ? json_decode($_POST['bedsitters'], true) : NULL;
        $apartments = isset($_POST['apartments']) ? json_decode($_POST['apartments'], true) : NULL;
        $houses = isset($_POST['houses']) ? json_decode($_POST['houses'], true) : NULL;
        $businesspremises = isset($_POST['business-premises']) ? json_decode($_POST['business-premises'], true) : NULL;
        $suites = isset($_POST['suites']) ? json_decode($_POST['suites'], true) : NULL;

        $adminFirst_Name = $_POST['admin-first-name'];
        $adminLast_Name = $_POST['admin-last-name'];
        $adminPhone_Number = $_POST['admin-phone-number'];
        $email = $_POST['email'];
        $password = $_POST['passwordField'];

        echo '<script>alert("An Account With The Same Phone Number And Email Address Already Exists. Please Try Using Different Credentials");</script>';

        include "../Php/admin-dashboard.php";
    } else {
        mysqli_stmt_close($stmt);
        echo '<script>alert("Details Updated Successfully")</script>';

        $administrators = isset($_POST['administrators']) ? json_decode($_POST['administrators'], true) : NULL;
        $property_owners = isset($_POST['property-owners']) ? json_decode($_POST['property-owners'], true) : NULL;
        $hostels = isset($_POST['hostels']) ? json_decode($_POST['hostels'], true) : NULL;
        $singlerooms = isset($_POST['single-rooms']) ? json_decode($_POST['single-rooms'], true) : NULL;
        $bedsitters = isset($_POST['bedsitters']) ? json_decode($_POST['bedsitters'], true) : NULL;
        $apartments = isset($_POST['apartments']) ? json_decode($_POST['apartments'], true) : NULL;
        $houses = isset($_POST['houses']) ? json_decode($_POST['houses'], true) : NULL;
        $businesspremises = isset($_POST['business-premises']) ? json_decode($_POST['business-premises'], true) : NULL;
        $suites = isset($_POST['suites']) ? json_decode($_POST['suites'], true) : NULL;

        $adminFirst_Name = $_POST['admin-first-name'];
        $adminLast_Name = $_POST['admin-last-name'];
        $adminPhone_Number = $_POST['admin-phone-number'];

        $email = $_POST['email'];
        $password = $_POST['passwordField'];
        
        include "../Php/admin-dashboard-preparation.php";
    }
?>