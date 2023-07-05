<?php
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT Email_Address, Phone_Number FROM property_owners WHERE Password_Reset_Token = ?;";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
        
        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        mysqli_stmt_bind_param($stmt, "s", $token);
        
        if (!mysqli_stmt_execute($stmt)) {
            die("Update query failed: " . mysqli_error($connectionInitialisation));
        }

        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($property_owner = mysqli_fetch_assoc($res)) {
                $email = $property_owner['Email_Address'];
                $phoneNumber = $property_owner['Phone_Number'];
            }
            include "../Php/reset-password.php";
    
        } else {
            include "../Php/no-Such-Account.php";        
        }
    } else {
        echo "Token Does Not Exist";
    }
?>