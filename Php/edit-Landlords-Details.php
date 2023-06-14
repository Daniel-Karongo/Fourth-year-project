<?php
    include '../Php/databaseConnector.php';

    $retrieved_email = $_POST["retrieved-email"];
    $retrieved_phone_number = $_POST["retrieved-phone-number"];
    
    $firstName = $_POST["first-name"]; 
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sqlquery = "UPDATE property_owners 
                 SET Phone_Number = '$phoneNumber', 
                     Email_Address = '$email', 
                     Pass_word = '$hashedPassword', 
                     First_Name = '$firstName', 
                     Last_Name = '$lastName' 
                 WHERE Email_Address = '$retrieved_email' 
                     AND Phone_Number = '$retrieved_phone_number'";
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    $sqlquery = "UPDATE properties_owners_details 
                 SET Owners_Phone_Number = '$phoneNumber', 
                     Email_Address = '$email'                      
                 WHERE Email_Address = '$retrieved_email' 
                     AND Owners_Phone_Number = '$retrieved_phone_number'";
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }
    
    $retrieved_phone_number = $phoneNumber;
    $retrieved_first_name = $firstName;                    
    $retrieved_last_name = $lastName;
    
    $sqlquery = "SELECT * FROM property_owners 
                 WHERE Email_Address = '$email'
                 AND Phone_Number = '$phoneNumber'";
    
    $res = mysqli_query($connectionInitialisation, $sqlquery);
    if (!$res) {
        die("Select query failed: " . mysqli_error($connectionInitialisation));
    }
    
    while ($property_owner = mysqli_fetch_assoc($res)) {
        $retrieved_rentals_owned = $property_owner['Rentals_Owned'];                    
    }
    
    include "../Php/correct-password.php";
    
?>