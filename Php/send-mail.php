<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/SMTP.php';
    
    try {
        $confirmationCode = rand(100000, 999999); // Replace with your own code to generate the confirmation code
    
        $to = $email;
        $subject = "Confirmation Code";
        $message = "Your confirmation code is: " . $confirmationCode;
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
            $sqlquery = "UPDATE $table SET Password_Reset_Confirmation_Code = ? WHERE Email_Address = ? AND Phone_Number = ?";

            $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
            
            if (!$stmt) {
                die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
            }
            
            mysqli_stmt_bind_param($stmt, "sss", $confirmationCode, $email, $phoneNumber);

            if (!mysqli_stmt_execute($stmt)) {
                die("Update query failed: " . mysqli_error($connectionInitialisation));
            }

            include "../Php/reset-link-sent.php";
            echo "<script>alert('Email Sent Successfully');</script>";
        } else {
            echo "<script>alert('Email Not Sent. Please Check Your Internet Connectivity Then Try Again. Also, Ensure That The Email Address You Have Entered Is Valid Gmail Account And That It Exists')</script>";
        }
    } catch (Exception $e) {
        // Exception occurred while sending email
        // Handle the error
    }
    
?>
