<?php
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $confirmPassword = $_POST["confirm-password"];
    $confirmationCode = $_POST['confirmation-code'];
    $email = $_POST['email'];

    if (isset($_COOKIE['confirmation_code'])) {
        $confirmationCodeCookie = $_COOKIE['confirmation_code'];

        if($confirmationCode === $confirmationCodeCookie) {
            include "../Php/create-account-form-handler.php";
        } else {
            include "../Php/account-verification.php";
            echo '<script>alert("Wrong Code. Please Confirm Then Try Again")</script>';
        }

    } else {
        header("Location: ../Html/create-Account.html");
        exit;
    }
?>