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

    $sqlquery = "INSERT INTO administrators (Phone_Number, Email_Address, Password, First_Name, Last_Name) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, 'sssss', $phoneNumber, $email, $hashedPassword, $firstName, $lastName);

    if (!mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Account Already Exists')</script>";
        unset($hashedPassword);

        $email = $_POST['retrieved-email'];
        $adminPhone_Number = $_POST['retrieved-phone-number'];
        $password = $_POST['passwordField'];
        $adminFirst_Name = $_POST['retrieved-admin-first-name'];
        $adminLast_Name = $_POST['retrieved-admin-last-name'];

        $property_owners = json_decode($_POST['property-owners'], true);
        $administrators = json_decode($_POST['administrators'], true);

        include "../Php/admin-dashboard.php";
        
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Account Created Successfully')</script>";
        unset($hashedPassword);

        $email = $_POST["retrieved-email"];
        $phoneNumber = $_POST["retrieved-phone-number"];
        $password = $_POST["retrieved-password"];       

        include "../Php/successful-admin-added.php";
    }
?>