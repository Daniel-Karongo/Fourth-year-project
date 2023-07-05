<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Housesearchke</title>
    <link href= "../Css/style-forgot-password.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/forgot-password.js"></script>
</head>
<body>
    <div class="container">
        <h1>housesearchke</h1>
        <h3>Account Recovery</h3>
        <form action="../Php/phone-number-validation.php" method="post" onsubmit="validateForm(event)">
            <div class="email">
                <label for="email">To Reset The Password To Account: </label>
                <input type="text" name="email" id="email" value="<?php echo $inputValue;?>" readonly>
            </div>
            <div class="phone-number">
                <label for="phone-number">We need to guarantee that really you who created the account. Therefore, please specify the phone number you had given when creating the account.</label>
                <input type="text" name="phone-number" id="phone-number" placeholder="0700000000" onfocus="zoomDiv(this)" onblur="unzoomDiv(this)">
                <div class="error"></div>

                <p>An Email Will Then Be Sent To You Prompting You To Change Your Email</p>
            </div>
            <div class="submit-button">
                <button onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>