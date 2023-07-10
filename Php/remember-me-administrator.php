<?php
    $password = $_POST["passwordField"];
    $token = bin2hex(random_bytes(32));
    $expiration = time() + (60 * 60 * 24 * 30); // Example: 30 days expiration time
    setcookie('remember_token', $token, $expiration, '/', '', true, true); // Set the secure flag and httponly flag
    setcookie('remember_password', $password, $expiration, '/', '', true, true); // Set the secure flag and httponly flag
    
    $sqlquery = "UPDATE administrators SET Remember_Me = ? WHERE Email_Address = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
    
    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $token, $email);

    if (!mysqli_stmt_execute($stmt)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }
    
    include "../Php/admin-dashboard.php";

?>