<?php
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone-number'];
    $password = $_POST['passwordField'];

    include "../Php/databaseConnector.php";

    setcookie('remember_token', '', time() - 1, '/', '', true, true);

    $sqlquery = "UPDATE property_owners 
                    SET Remember_Me = NULL
                    WHERE Email_Address = ? AND Phone_Number = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $phoneNumber);

    if (!mysqli_stmt_execute($stmt)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }
    
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    
    include "../Php/correct-password.php";
    echo '<script>alert("The \"Remember Me\" Cookie Has Been Deleted");</script>';
    

?>