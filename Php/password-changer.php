<?php
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];
    $password = $_POST["password-confirmation"];
    $token = $_POST["token"];
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    include "../Php/databaseConnector.php";
    
    $query = "SELECT Password_Reset_Token FROM property_owners WHERE Email_Address = ? AND Phone_Number = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $phoneNumber);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    if (!$res) {
        die("Query failed: " . mysqli_error($connectionInitialisation));
    }
    
    if(mysqli_num_rows($res) > 0) {
        while ($user = mysqli_fetch_assoc($res)) {
            $retrieved_token = $user['Password_Reset_Token'];
        }            
    }
    
    if($retrieved_token === $token) {
        $sqlquery = "UPDATE property_owners 
                        SET Pass_Word = ?,
                            Password_Reset_Token = NULL 
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
        include "../Php/correct-password.php";
    }
        
?>