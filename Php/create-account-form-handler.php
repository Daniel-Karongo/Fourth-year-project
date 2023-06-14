<?php
    include '../Php/databaseConnector.php';

    $firstName = $_POST["first-name"]; 
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];
    $confirmPassword = $_POST["confirm-password"];
    $hashedPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);

    $sqlquery = "INSERT INTO property_owners (Phone_Number, Email_Address, Pass_word, First_Name, Last_Name) VALUES('$phoneNumber', '$email', '$hashedPassword', '$firstName', '$lastName');";
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }    

    include '../Php/correct-password.php';
?>