<?php
    include '../Php/databaseConnector.php';

    $firstName = $_POST["new-property-owner-first-name"];
    $lastName = $_POST["new-property-owner-last-name"];
    $phoneNumber = $_POST["new-property-owner-phone"];
    $email = $_POST["new-property-owner-email"];
    $password = $_POST["new-property-owner-password"];
    $hashedPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);

    $sqlquery = "INSERT INTO property_owners (Phone_Number, Email_Address, Pass_word, First_Name, Last_Name) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, 'sssss', $phoneNumber, $email, $hashedPassword, $firstName, $lastName);

    if (!mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Account Already Exists')</script>";
        include "../Php/account-already-exists.php";
        mysqli_stmt_close($stmt);
    } else {
        $phoneNumber = $_POST["phone-number"];
        $email = $_POST["email"];
        $password = $_POST["confirm-password"];
        
        include '../Php/create-account-login.php';
    }
?>
