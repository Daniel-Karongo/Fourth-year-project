<?php
    include '../Php/databaseConnector.php';

    $firstName = $_POST["first-name"]; 
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];
    $Password = $_POST["password"];
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    $sqlquery = "INSERT INTO property_owners (Phone_Number, Email_Address, Pass_word, First_Name, Last_Name) VALUES('$phoneNumber', '$email', '$hashedPassword', '$firstName', '$lastName');";

    mysqli_query($connectionInitialisation, $sqlquery);

include '../Php/dashboard-After-Edit.php';
?>