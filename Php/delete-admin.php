<?php
    $phoneNumber = $_POST['admin-phone-number'];
    $email = $_POST['admin-modified-email'];

    include "../Php/databaseConnector.php";

    $sqlquery = "DELETE FROM administrators WHERE Email_Address = ? AND Phone_Number = ?";
    
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
    
    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $email, $phoneNumber);

    if (!mysqli_stmt_execute($stmt)) {
        die("Delete query failed: " . mysqli_error($connectionInitialisation));
    }

    include "../Html/index.html";
?>