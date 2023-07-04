<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>housesearchke</h1>
        <h3>Account Recovery</h3>
        <form action="../Php/phone-number-validation.php" method="post">
            <label for="phone-number" value="<?php echo $email;?>">To Reset The Password To Account: </label>
            <input type="text" name="email" id="email" value="<?php echo $email;?>">
            <label for="">Please Specify The Phone Number To Guarantee That It is Really You Who Created The Account. An Email Will Then Be Sent To You Prompting You To Change Your Email</label>
            <input type="text" name="phone-number" id="phone-number" value="<?php echo $phoneNumber;?>">
            <button>Submit</button>
        </form>
    </div>
</body>
</html>