<?php
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $phoneNumber = $_POST["phone-number"];
    $confirmPassword = $_POST["confirm-password"];
    $email = $_POST["email"];
    
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
            $expiration = time() + (60 * 60 * 2); // Example: 30 days expiration time
            setcookie('confirmation_code', $confirmationCode, $expiration, '/', '', true, true); // Set the secure flag and httponly flag

            include "../Php/account-verification.php";
            echo "<script>alert('Email Sent Successfully');</script>";
        } else {
            echo "<script>alert('Email Not Sent. Please Check Your Internet Connectivity Then Try Again')</script>";
        }
    } catch (Exception $e) {
        // Exception occurred while sending email
        // Handle the error
    }
    
?>
