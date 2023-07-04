<?php
    include "../Php/databaseConnector.php";

    $email = $_POST["email"];
    $password = $_POST["passwordField"];

    $sqlquery = "SELECT Email_Address, Pass_Word FROM property_owners WHERE BINARY Email_Address = ?;";
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) > 0) {
        while ($property_owner = mysqli_fetch_assoc($res)) {
            $retrieved_email = $property_owner['Email_Address'];
            $retrieved_password = $property_owner['Pass_Word'];            
        }
        if (password_verify($password, $retrieved_password)) {
            include "../Php/correct-password.php";
        } else {
            include "../Php/incorrect-Password.php";            
        }

    } else {
        include "../Php/no-Such-Account.php";        
    }
?>
