<?php
    if (isset($_COOKIE['remember_token']) && isset($_COOKIE['remember_password'])) {
        $token = $_COOKIE['remember_token'];
        $password = $_COOKIE['remember_password'];
        
        
        include "../Php/databaseConnector.php";
        
        $sqlquery = "SELECT * FROM property_owners WHERE Remember_Me = ?";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
        
        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }
        
        mysqli_stmt_bind_param($stmt, "s", $token);
        
        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }
        
        $res = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($res) > 0) {
            while ($property_owner = mysqli_fetch_assoc($res)) {
                $email = $property_owner['Email_Address'];
            }
            mysqli_stmt_close($stmt);
            include "../Php/correct-password.php";
        } else {
            $sqlquery = "SELECT * FROM administrators WHERE Remember_Me = ?";
            $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
            
            if (!$stmt) {
                die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
            }
            
            mysqli_stmt_bind_param($stmt, "s", $token);
            
            if (!mysqli_stmt_execute($stmt)) {
                die("Query execution failed: " . mysqli_error($connectionInitialisation));
            }
            
            $res = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($res) > 0) {
                while ($property_owner = mysqli_fetch_assoc($res)) {
                    $email = $property_owner['Email_Address'];
                }
                mysqli_stmt_close($stmt);
                include "../Php/admin-dashboard-preparation.php";
            } else {
                mysqli_stmt_close($stmt);
                header("Location: ../Html/login.html");
                exit;
            }
        }
    } else {
        header("Location: ../Html/login.html");
        exit;
    }
    
?>