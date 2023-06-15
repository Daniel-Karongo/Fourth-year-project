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
            <h3><?php echo $retrieved_first_name . " " . $retrieved_last_name;?></h3>
            <a class="sign-out-button" href="../Html/index.html">Sign Out</a>
        </nav>
        <div class="main-body">
            <div class="buttons">
                <a href="../Php/uploadPreparation.php?
                    first-name=<?php echo $retrieved_first_name; ?>&
                    last-name=<?php echo $retrieved_last_name; ?>&
                    email=<?php echo $email; ?>&
                    phone_number=<?php echo $retrieved_phone_number; ?>&
                    password=<?php echo $password; ?>&
                    rentals_owned=<?php echo $retrieved_rentals_owned; ?>" class="button-link">Advertise a new Rental</a>
                <button>Settings</button>
            </div>
            <div class="panel">
                <div class="panel-buttons">
                    <button onclick="wrapperFunction('.my-rentals', '.contact-information', null)"> My Rentals</button>
                    <button onclick="wrapperFunction('.contact-information', '.my-rentals', null)"> My Contact Information</button>
                </div>                
                <div class="my-rentals">

                    <?php 
                        if(($res) && (mysqli_num_rows($res) > 0)) {
                            for($i=0; $i<count($rentalsOwned); $i++) {
                                                                    
                                $imageUrlsComponents = explode(", ", $retrieved_image_urls[$i]);
                                $imageToDisplay = $imageUrlsComponents[0];
                                
                                $finalFolder = "";

                                switch($rentalType[$i]) {
                                    case "Business Premise":
                                        $finalFolder = $rentalType[$i] . "s/" . $business_premises_retrieved_type_of_premise[$i] . "/";
                                        break;

                                    case "Apartment":                                                    
                                        if(($apartments_retrieved_number_of_bedrooms[$i] == 1) || ($apartments_retrieved_number_of_bedrooms[$i] == 2) || ($apartments_retrieved_number_of_bedrooms == 3)) {
                                            $finalFolder = $rentalType[$i] . "s/" . $apartments_retrieved_number_of_bedrooms[$i]. "-Bedroom/";
                                        } else {
                                            $finalFolder = $rentalType[$i] . "s/More Bedrooms/" . $apartments_retrieved_number_of_bedrooms. "-Bedrooms/";
                                        }                                                    
                                        break;

                                    case "House":
                                        if(($houses_retrieved_number_of_bedrooms[$i] == 1) || ($houses_retrieved_number_of_bedrooms[$i] == 2) || ($houses_retrieved_number_of_bedrooms[$i] == 3)) {
                                            $finalFolder = $rentalType[$i] . "s/" . $houses_retrieved_number_of_bedrooms[$i]. "-Bedroom/";
                                        } else {
                                            $finalFolder = $rentalType[$i] . "s/More Bedrooms/" . $houses_retrieved_number_of_bedrooms[$i] . "-Bedrooms/";
                                        }
                                        break;
                                    
                                    default:
                                        $finalFolder = $rentalType[$i] . "s/";
                                }
                                
                                $termDisplay = "";
                                switch($retrieved_rental_term[$i]) {
                                    case "daily":
                                        $termDisplay = "Day";
                                        break;
                                    case "weekly":
                                        $termDisplay = "Week";
                                        break;
                                    case "monthly":
                                        $termDisplay = "Month";
                                        break;
                                    case "yearly":
                                        $termDisplay = "Year";
                                        break;
                                    case "quarterly":
                                        $termDisplay = "3 Months";
                                        break;
                                    case "bi-annually":
                                        $termDisplay = "6 Months";
                                        break;
                                }

                                $rentalID = $retrieved_rentalID[$i];
                                $tableName = $tablenames[$i];

                                echo 
                                '   <div class="rental-template">
                                        <div class="title">
                                            <h3>' . $retrieved_rental_name[$i] . '</h3>' .
                                        '</div>' .
                                        '<div class="main-section">' . 
                                            '<div class="top-section">' .
                                                '<div class="image-div">'.
                                                    '<img src="../Image_Data/' . $finalFolder . $imageToDisplay . '" ' . 'alt="Rental-' . $i + 1 . '">' .
                                                '</div>' .                                
                                                '<div class="payment">' .
                                                    '<h4 class="amount">Ksh.' . $retrieved_amount_of_rent[$i] . '</h4>' .
                                                    '<h5 class="rental-term">Per' . $termDisplay . '</h5>' .
                                                '</div>' .
                                            '</div>' .
                                            '<div class="bottom-section">' .
                                                '<h4 class="description-title">Description</h4>' .
                                                '<p class="description">' . $retrieved_description[$i] . '</p>' .
                                                '<div class="template-buttons"> 
                                                    <form class="template-submit-buttons" action="../Php/rentalDelete.php" method="post" enctype="multipart/form-data" onsubmit="validateDeletion(event)">
                                                        <button type="submit" class="remove-rental"> Remove Rental </button> 
                                                        <button type="button" class="edit-rental"> Edit Rental Details </button>
                                                        <input type="hidden" name="rentalID" class="rentalID" value="' . $rentalID . '">
                                                        <input type="hidden" name="tableName" class="tableName" value="' . $tableName . '">
                                                        <input type="hidden" name="user-email" class="user-email" value="' . $email . '">
                                                        <input type="hidden" name="phone-number" class="phone-number" value="' . $retrieved_phone_number . '">
                                                        <input type="hidden" name="rentals-owned" class="rentals-owned" value="' . $retrieved_rentals_owned . '">
                                                        <input type="hidden" name="image-urls" class="image-urls" value="' . $retrieved_image_urls[$i] . '">
                                                        <input type="hidden" name="image-paths" class="image-paths" value="../Image_Data/' . $finalFolder . '">
                                                    </form>                           
                                                </div>' .
                                            '</div>' .
                                        '</div>' .                                        
                                    '</div>'
                                ; 
                            } 
                        } 
                    ?>

                </div>
                <div class="contact-information">
                    <form id="contact-information-form" action="../Php/edit-Landlords-Details.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event)">
                        <div class="first-name">
                            <label for="first-name">First Name:</label>
                            <input type="text" id="first-name" name="first-name" value="<?php echo $retrieved_first_name;?>" disabled onblur="validateField('first-name', 'Please Specify Your First Name')">
                            <div class="error"></div>
                        </div>
                        
                        <div class="last-name">
                            <label for="last-name">Last Name:</label>
                            <input type="text" id="last-name"  name="last-name" value="<?php echo $retrieved_last_name;?>" disabled onblur="validateField('last-name', 'Please Specify Your Last Name')">
                            <div class="error"></div>
                        </div>

                        <div class="phone-number">
                            <label for="phone">Phone Number:</label>
                            <input type="number" id="phone"  name="phone-number" value="<?php echo $retrieved_phone_number;?>" disabled onblur="validatePhoneNumber()">
                            <div class="error"></div>
                        </div>
                        
                        <div class="email">
                            <label for="email">Email Address:</label>
                            <input type="text" id="email" name="email" value="<?php echo $email;?>" disabled onblur="validateField('email', 'Please Specify An Email that will be Associated With Your Rentals')">
                            <div class="error"></div>
                        </div>

                        <div class="password">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" value="<?php echo $password;?>" disabled onblur="validateField('password', 'Please Confirm The Password')">
                            <div class="error"></div>
                        </div>

                        <input type="hidden" name="retrieved-email" value="<?php echo $email;?>">
                        <input type="hidden" name="retrieved-phone-number" value="<?php echo $retrieved_phone_number;?>">

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