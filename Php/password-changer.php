<?php
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];
    $table = $_POST["table"];
    $password = $_POST["password-confirmation"];
    $confirmationCode = $_POST["confirm-code"];
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $passField = $table == "property_owners" ? "Pass_Word" : "Password";

    include "../Php/databaseConnector.php";
    
    $sqlquery = "UPDATE $table 
                    SET $passField = ?,
                    Password_Reset_Confirmation_Code = NULL 
                    WHERE Email_Address = ? AND Phone_Number = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, "sss", $hashedPassword, $email, $phoneNumber);

    if (!mysqli_stmt_execute($stmt)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }
    
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    $password = $_POST["password-confirmation"];

    if($table == "property_owners") {
        include "../Php/correct-password.php";
    } else {
        include "../Php/admin-dashboard-preparation.php";
    }
    
        
?>