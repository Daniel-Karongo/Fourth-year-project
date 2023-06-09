<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseSearchKE</title>
    <link href= "../Css/style-manage.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/manage.js"></script>
</head>
<body>
    <div class="container">
        <nav>
            <h3><?php echo $first_name . " " . $last_name;?></h3>
            <form action="../Html/index.html" class="sign-out-button"><button type="submit">Sign Out</button></form>
        </nav>
        <div class="main-body">
            <div class="buttons">
                <button><a href="../Html/Upload.html">Advertise a new Rental</a></button>
                <button>Settings</button>
            </div>
            <div class="panel">
                <div class="panel-buttons">
                    <button onclick="wrapperFunction('.my-rentals', '.contact-information', 'input')"> My Rentals</button>
                    <button onclick="wrapperFunction('.contact-information', '.my-rentals', null)"> My Contact Information</button>
                </div>                
                <div class="my-rentals">
                    <div class="rental-template">
                        <img src="../Images/cheap-accommodation-kerikeri.jpg" alt="Rental-1">
                        <p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                        <div class="template-buttons">
                            <button>Remove Rental</button> 
                            <button>Edit Rental Details</button> 
                        </div>  
                    </div>
                    <div class="rental-template">
                        <img src="../Images/mud-house.jpg" alt="Rental-2">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                        <div class="template-buttons">
                            <button>Remove Rental</button> 
                            <button>Edit Rental Details</button> 
                        </div>                        
                    </div>
                    <div class="rental-template">
                        <img src="../Images/apartment-housing-tripoli-lebanon-ATHN9J.jpg" alt="Rental-2">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                        <div class="template-buttons">
                            <button>Remove Rental</button> 
                            <button>Edit Rental Details</button> 
                        </div>                        
                    </div>
                    <div class="rental-template">
                        <img src="../Images/motel2.webp" alt="Rental-2">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                        <div class="template-buttons">
                            <button>Remove Rental</button> 
                            <button>Edit Rental Details</button> 
                        </div>                        
                    </div>
                    <div class="rental-template">
                        <img src="../Images/Plot Construction.jpg" alt="Rental-2">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                        <div class="template-buttons">
                            <button>Remove Rental</button> 
                            <button>Edit Rental Details</button> 
                        </div>                        
                    </div>
                </div>
                <div class="contact-information">
                    <form action="">
                        <label for="first-name">First Name:</label>
                        <input type="text" id="first-name" value="<?php echo $first_name;?>" disabled>
                        <p class="error"></p>

                        <label for="last-name">Last Name:</label>
                        <input type="text" id="last-name" value="<?php echo $last_name;?>" disabled>
                        <p class="error"></p>

                        <label for="phone">Phone Number:</label>
                        <input type="text" id="phone" value="<?php echo $phone_number;?>" disabled>
                        <p class="error"></p>

                        <label for="email">Email Address:</label>
                        <input type="text" id="email" value="<?php echo $email;?>" disabled>
                        <p class="error"></p>

                        <label for="password">Password:</label>
                        <input type="password" id="password" value="<?php echo $password;?>" disabled>
                        <p class="error"></p>

                        <input type="checkbox" id="show-pass" tabindex="0" onclick="toggleShowPassword()">
                        <label for="show-pass">Show Password</label>

                        <div class="edit-details">
                            <button type="button" tabindex="0" onclick="toggleEnabled()">Edit Details</button>
                        </div>
                        
                        <div class="confirm-button">
                            <button type="submit" tabindex="0">Confirm Details</button>
                        </div>                       
                    </form>                       
                </div>                
            </div>            
        </div>
    </div>
</body>
</html>

