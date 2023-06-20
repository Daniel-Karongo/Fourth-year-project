<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseSearchKE</title>
    <link rel="stylesheet" href="../Css/style-viewdescription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/viewdescription.js"></script>
</head>
<body>
    <div class="container">
        <nav>
            <h1>HousesearchKE.com</h1>
            <button id="back-button" onclick="history.back()">Back</button>                                
        </nav>
        <section>
            <div class="buttons left">
                <button onclick="viewLeft()"><img src="../Images/left button.png" alt="left-button"></button>
            </div>
            <div class="images-and-tally">
                <?php
                    for($i=0; $i<count($images); $i++) {
                        echo '<img class="viewimage" id="image' . $i+1 . '" src="'. $rentalPhotoPath . $images[$i] . '" alt="image' . $i+1 . '"';
                    }
                ?>               
            </div>             
            <div class="buttons right">
                <button onclick="viewRight()"><img src="../Images/right button.png" alt="right-button"></button>
            </div>            
        </section>
        <div class="tally">
            <p id="tally-paragraph"> 1 of <?php echo count($images); ?></p>
        </div>
        <main>
            <div class="rental-description">
                <h2>Rental Description</h2>
                <h3>Ksh. <?php echo $amountOfRent; ?></h3>
                <h4>Per <?php echo $rentalTerm; ?></h4>
                <div class="details">
                    <p><?php echo "<span>Rental Type: </span>" . $rentalType; ?></p>
                    <p><?php echo "<span>Rental Name: </span>" . $rentalName; ?></p>
                    <p><?php echo "<span>Location: </span>" . $location; ?></p>
                    <p><?php echo "<span>Google Location: </span>" . $googleLocation; ?></p>
                    <p><?php echo "<span>Number Of Similar Units: </span>" . $numberOfSimilarUnits; ?></p>
                    <p><?php echo "<span>Number Of Beds Per Suite: </span>" . $numberOfBedsPerSuite; ?></p>
                    <p><?php echo "<span>Number Of Apartment Bedrooms: </span>" . $numberOfApartmentBedrooms; ?></p>
                    <p><?php echo "<span>Number Of House Bedrooms: </span>" . $numberOfHouseBedrooms; ?></p>
                    <p><?php echo "<span>Type of Business Premise: </span>" . $typeOfBusinessBusiness; ?></p>
                </div>
                <div class="description">
                    <h3>Description</h3>
                    <p><?php echo $description; ?></p>
                </div>                
            </div>
            <div class="contact-information">
                <h2>Contact Information</h2>
                <form action="" class="contacts">
                    <label for="landlords-name">Landlord's Name</label>
                    <input type="text" id="landlords-name" value="<?php echo $rentalOwnersFullName; ?>"disabled>
                    <label for="landlords-phone-number">Phone Number</label>
                    <input type="number" id="landlords-phone-number" value="<?php echo $ownersPhoneNumber; ?>"disabled>
                    <label for="landlords-email">Email Address</label>
                    <input type="text" id="landlords-email" value="<?php echo $ownersEmailAddress; ?>"disabled>
                </form>
            </div>                            
        </main>
        <div class="ammenities-and-preferences">
            <div class="ammenities">
                <?php
                    $nonNullAmmenities = 0;
                    for($i=0; $i<count($refinedAmmenities); $i++) {
                        if($refinedAmmenities[$i] != null) {
                            $nonNullAmmenities++;
                        }
                    }

                    if($nonNullAmmenities > 0) {
                        echo '<h3>Ammenities</h3>';
                        for($i=0; $i<count($refinedAmmenities); $i++) {
                            echo '<p>'. $refinedAmmenities[$i] . '</p>';
                        }   
                    }
                ?>
            </div>
            <div class="preferences">
                <?php
                    $nonNullPreference = 0;
                    for($i=0; $i<count($refinedPreferences); $i++) {
                        if($refinedPreferences[$i] != null) {
                            $nonNullPreference++;
                        }
                    }

                    if($nonNullPreference > 0) {
                        echo '<h3>Tenant Preferences</h3>';
                        for($i=0; $i<count($refinedPreferences); $i++) {
                            if($refinedPreferences[$i] != null) {
                                if($refinedPreferences[$i] === "Christianity") {
                                    echo '<p>Christians</p>';
                                } else if($refinedPreferences[$i] === "Buddhism") {
                                    echo '<p>Buddists</p>';
                                } else if($refinedPreferences[$i] === "Islam") {
                                    echo '<p>Muslims</p>';
                                } else if($refinedPreferences[$i] === "Hinduism") {
                                    echo '<p>Hindus</p>';
                                } else if($refinedPreferences[$i] === "Vehicles Allowed") {
                                    echo '<p>People With Vehicles Are Welcome (Parking Available)</p>';
                                } else {
                                    echo '<p>'. $refinedPreferences[$i] . '</p>';
                                }                            
                            }
                        }
                    } 
                    
                ?>
            </div>            
        </div>
        <div class="rules">
            <div class="rules-button left">
                <button onclick="viewLeft()"><img src="../Images/left button.png" alt="left-button"></button>
            </div>
            <div class="rules-images-and-tally">
                <?php
                    for($i=0; $i<count($rules); $i++) {
                        echo '
                        <img class="viewrulesimage" id="rules-image-' . $i+1 . '" src="../Image_Data/Rules/' . $rules[$i] . '" alt="image' . $i+1 . '">';
                    }
                ?>                   
            </div>             
            <div class="rules-button right">
                <button onclick="viewRight()"><img src="../Images/right button.png" alt="right-button"></button>
            </div>
        </div>
        <div class="rules-tally">
            <p id="rules-tally-paragraph"> 1 of <?php echo count($rules); ?></p>
        </div>

    </div>
</body>
</html>