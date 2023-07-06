<?php
    include '../Php/databaseConnector.php';

    $firstName = $_POST["first-name"]; 
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];
    $confirmPassword = $_POST["confirm-password"];
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
        $password = $_POST["confirm-password"];
        include '../Php/correct-password.php';
    }
?>
