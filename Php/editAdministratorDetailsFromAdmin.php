<?php
    include '../Php/databaseConnector.php';

    $phonenumber = $_POST['phone-number'];
    $emailAddress = $_POST['email-address'];
    $password = $_POST['password'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $passwordResetConfirmationCode = $_POST['password-reset-confirmation-code'];
    $rememberMeToken = $_POST['remember-me-token'];

    $originalPhonenumber = $_POST['original-phone-number'];
    $originalEmailAddress = $_POST['original-email-address'];
    $originalPassword = $_POST['original-password'];
    $originalFirstName = $_POST['original-first-name'];
    $originalLastName = $_POST['original-last-name'];
    $originalPasswordResetConfirmationCode = $_POST['original-password-reset-confirmation-code'];
    $originalRememberMeToken = $_POST['original-remember-me-token'];

    $sqlQuery = "UPDATE administrators
                    SET Email_Address = ?, 
                        Phone_Number = ?, 
                        Password = ?, 
                        First_Name = ?, 
                        Last_Name = ?,                
                        Password_Reset_Confirmation_Code = ?,                
                        Remember_Me = ?                
                    WHERE Phone_Number = ? AND Email_Address = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlQuery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, 'sssssssss', $emailAddress, $phonenumber, $password, $firstName, $lastName, $passwordResetConfirmationCode, $rememberMeToken, $originalPhonenumber, $originalEmailAddress);
    
    if (!mysqli_stmt_execute($stmt)) {
        $administrators = json_decode($_POST['administrators'], true);
        $property_owners = json_decode($_POST['property-owners'], true);
        $hostels = json_decode($_POST['hostels'], true);
        $singlerooms = json_decode($_POST['single-rooms'], true);
        $bedsitters = json_decode($_POST['bedsitters'], true);
        $apartments = json_decode($_POST['apartments'], true);
        $houses = json_decode($_POST['houses'], true);
        $businesspremises = json_decode($_POST['business-premises'], true);
        $suites = json_decode($_POST['suites'], true);

        $adminFirst_Name = $_POST['admin-first-name'];
        $adminLast_Name = $_POST['admin-last-name'];
        $adminPhone_Number = $_POST['admin-phone-number'];
        $email = $_POST['email'];

        echo '<script>alert("An Account With The Same Phone Number And Email Address Already Exists. Please Try Using Different Credentials");</script>';

        include "../Php/admin-dashboard.php";
    } else {
        mysqli_stmt_close($stmt);
        echo '<script>alert("Details Updated Successfully");</script>';
        $email = $_POST['email'];
        $password = $_POST['passwordField'];
        
        include "../Php/admin-dashboard-preparation.php";
    }
?>