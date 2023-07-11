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

    echo '<script>alert("Details Updated Successfully");</script>';

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
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_close($stmt);

    $email = $_POST['email'];
    $password = $_POST['passwordField'];
    
    include "../Php/admin-dashboard-preparation.php";
?>