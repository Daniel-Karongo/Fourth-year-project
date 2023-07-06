<?php
    include '../Php/databaseConnector.php';

    $retrieved_email = $_POST["retrieved-email"];
    $retrieved_phone_number = $_POST["retrieved-phone-number"];
    
    $firstName = $_POST["first-name"]; 
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["modified-email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Update property_owners table
    $sqlquery = "UPDATE property_owners 
                 SET Phone_Number = ?, 
                     Email_Address = ?, 
                     Pass_word = ?, 
                     First_Name = ?, 
                     Last_Name = ? 
                 WHERE Email_Address = ? 
                     AND Phone_Number = ?";
    
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
    mysqli_stmt_bind_param($stmt, "sssssss", $phoneNumber, $email, $hashedPassword, $firstName, $lastName, $retrieved_email, $retrieved_phone_number);
    
    if (!mysqli_stmt_execute($stmt)) {
        include "../Php/login-form-validator.php";
        echo "<script>alert('An Account With The Same Phone Number And Email Exists. Please Use Some Other Details')</script>";
    } else {
        // Update properties_owners_details table
        $sqlquery = "UPDATE properties_owners_details 
        SET Owners_Phone_Number = ?, 
            Email_Address = ?                      
        WHERE Email_Address = ? 
            AND Owners_Phone_Number = ?";

        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
        mysqli_stmt_bind_param($stmt, "ssss", $phoneNumber, $email, $retrieved_email, $retrieved_phone_number);

        if (!mysqli_stmt_execute($stmt)) {
        die("Update query failed: " . mysqli_stmt_error($stmt));
        }

        $retrieved_phone_number = $phoneNumber;
        $retrieved_first_name = $firstName;                    
        $retrieved_last_name = $lastName;

        // Fetch updated Rentals_Owned value
        $sqlquery = "SELECT Rentals_Owned FROM property_owners 
            WHERE Email_Address = ? 
            AND Phone_Number = ?";

        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
        mysqli_stmt_bind_param($stmt, "ss", $email, $phoneNumber);

        if (!mysqli_stmt_execute($stmt)) {
        die("Select query failed: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_bind_result($stmt, $retrieved_rentals_owned);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        include "../Php/correct-password.php";
        echo "<script>alert('Updates Made Successfully');</script>";
    }
?>
