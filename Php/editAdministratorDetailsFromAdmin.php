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


    // echo $phonenumber;
    // echo "<br>";
    // echo $emailAddress;
    // echo "<br>";
    // echo $password;
    // echo "<br>";
    // echo $firstName;
    // echo "<br>";
    // echo $lastName;
    // echo "<br>";
    // echo $passwordResetConfirmationCode;
    // echo "<br>";
    // echo $rememberMeToken;
    // echo "<br>";
    // echo $originalPhonenumber;
    // echo "<br>";
    // echo $originalEmailAddress;
    // echo "<br>";
    // echo $originalPassword;
    // echo "<br>";
    // echo $originalFirstName;
    // echo "<br>";
    // echo $originalLastName;
    // echo "<br>";
    // echo $originalPasswordResetConfirmationCode;
    // echo "<br>";
    // echo $originalRememberMeToken;
    // echo "<br>";

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
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_close($stmt);
    echo '<script>alert("Details Updated Successfully");</script>';
    $email = $_POST['email'];
    $password = $_POST['passwordField'];
    
    include "../Php/admin-dashboard-preparation.php";
?>