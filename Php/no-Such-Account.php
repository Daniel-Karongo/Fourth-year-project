<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseSearchKE</title>
    <link rel="stylesheet" href="../Css/style-login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/login.js"></script>
</head>
<body>
    <div class="container">
        <nav>
            <h1>HouseSearchKE.com</h1>
            <div class="no-account">
                <p>Don't have an account?</p>
                <a href="../Html/create-Account.html">Create Account</a>
            </div>                        
        </nav>
        <div class="lower">
            <main>
                <form id="login-form" action="../Php/login-form-validator.php" method="post" onsubmit="validateForm(event)">
                    <h2>Login</h2>
                    <div class="user-name-div">
                        <label for="email"> Email</label>
                        <input type="text" name="email" id="email" onblur="forEmail()" value="<?php echo $email;?>">
                        <div class="error">There Is No Such Account. Please Check The Credentials Entered</div>
                    </div>

                    <div class="password-div">
                        <label for="password"> Password </label>
                        <input type="password" name="passwordField" id="passwordField" onblur="forPassword()">
                        <div class="error"></div>
                    </div> 

                    <div class="bottom-section" tabindex="-1">
                        <div class="show-password-checkbox" tabindex="-1">
                            <input type="checkbox" id="toggle-show-password" onclick="toggleBtwShowingAndHidingPassword()">
                            <label for="toggle-show-password">Show Password</label>
                        </div> 
    
                        <div class="remember" tabindex="-1">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    
                    <button type="submit">Login</button>

                    <a href="">Forgot Password</a>

                </form>                                
                <div class="no-account-b">
                    <p>Don't have an account?</p>
                    <a href="../Html/create-Account.html">Create Account</a>
                </div>
            </main>
        </div>        
    </div>
</body>
</html>