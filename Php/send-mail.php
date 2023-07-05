<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/SMTP.php';
    
    try {
        $token = bin2hex(random_bytes(32));
        $resetLink = "https://housesearchke-1.000webhostapp.com/Php/reset-password-preparation.php?token=" . urlencode($token);
    
        $to = $email;
        $subject = "Password Reset";
        $message = "Click the link below to reset your password:\n\n" . $resetLink;
        $headers = "From: housesearchke.com <danieltorrent001@gmail.com>";
    
        // Using PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'danieltorrent001@gmail.com';
        $mail->Password = 'yplazmvyehwbwpdc';
        $mail->SMTPSecure = 'ssl';
        $mail->setFrom('danieltorrent001@gmail.com', 'housesearchke.com');
        $mail->isHTML(true);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;
        
        if ($mail->send()) {
            $sqlquery = "UPDATE property_owners SET Password_Reset_Token = ? WHERE Email_Address = ? AND Phone_Number = ?";

            $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
            
            if (!$stmt) {
                die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
            }
            
            mysqli_stmt_bind_param($stmt, "sss", $token, $email, $phoneNumber);

            if (!mysqli_stmt_execute($stmt)) {
                die("Update query failed: " . mysqli_error($connectionInitialisation));
            }

            include "../Php/reset-link-sent.php";
        } else {
            echo "<script>alert('Email Not Sent. Please Check Your Internet Connectivity Then Try Again')</script>";
        }
    } catch (Exception $e) {
        // Exception occurred while sending email
        // Handle the error
    }
    
?>
