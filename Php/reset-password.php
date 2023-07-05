<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Housesearchke</title>
    <link href= "../Css/style-reset-password.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/reset-password.js"></script>
</head>
<body>
    <div class="container">
        <h1>housesearchke</h1>
        <h3>Account Recovery</h3>
        <form action="../Php/password-changer.php" method="post" onsubmit="validateForm(event)">
            <div class="password">
                <label for="password">Enter The New Password</label>
                <input type="text" name="password" id="password" onfocus="zoomDiv(this)" onblur="unzoomDiv(this)">
                <div class="error"></div>
            </div>
            
            <div class="passwordConfirmation">
                <label for="password-confirmation">Confirm Password</label>
                <input type="text" name="password-confirmation" id="password-confirmation" onfocus="zoomDiv(this)" onblur="unzoomDiv(this)">
                <div class="error"></div>
            </div>
            
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <input type="hidden" name="phone-number" value="<?php echo $phoneNumber;?>">
            <input type="hidden" name="token" value="<?php echo $token;?>">
            <button onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Submit</button>
        </form>
    </div>
</body>
</html>