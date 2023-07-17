<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Housesearchke</title>
    <link href= "../Css/style-reset-link-sent.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/reset-link-sent.js"></script>
</head>
<body>
    <div class="container">
        <button id="back-button" onclick="history.back()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Back</button>
        <br>
        <br>
        <br>
        <br>
        <h1>housesearchke</h1>
        <h3>Confirmation Code Sent</h3>
        <p>A Confirmation Code Has Been Sent To Your Email, <span><?php echo $email ?></span>.</br></br> Enter This Code To Change Your Account Password To A New One.</p>
        <form action="../Php/reset-password-preparation.php" onsubmit="validateForm(event)" method="post">
            <input type="text" name="confirmation-code" id="confirmation-code">
            <div class="error"></div>
            <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Submit</button>
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <input type="hidden" name="table" value="<?php echo $table;?>">
        </form>
    </div>
</body>
</html>