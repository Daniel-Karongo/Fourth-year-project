<?php
    include '../Php/databaseConnector.php';

    $firstName = $_POST["first-name"]; 
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];
    $createPassword = $_POST["create-password"];
    $confirmPassword = $_POST["confirm-password"];

    $sqlquery = "INSERT INTO property_owners (Phone_Number, Email_Address, Pass_word, First_Name, Last_Name) VALUES('$phoneNumber', '$email', PASSWORD('$confirmPassword'), '$firstName', '$lastName');";

    mysqli_query($connectionInitialisation, $sqlquery);

    include '../Html/Manage.html';
?>