<?php
    $confirmationCode = $_POST['confirmation-code'];
    $email = $_POST['email'];
    $table = $_POST['table'];

    include "../Php/databaseConnector.php";

    $sqlquery = "SELECT Email_Address, Phone_Number FROM $table WHERE Password_Reset_Confirmation_Code = ? AND Email_Address = ?;";
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
    
    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, "ss", $confirmationCode, $email);
    
    if (!mysqli_stmt_execute($stmt)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) > 0) {
        while ($property_owner = mysqli_fetch_assoc($res)) {
            $phoneNumber = $property_owner['Phone_Number'];
        }
        include "../Php/reset-password.php";

    } else {
        include "../Php/reset-link-sent.php";
        echo '<script>alert("Wrong Code. Please Confirm Then Try Again")</script>';
    }
?>