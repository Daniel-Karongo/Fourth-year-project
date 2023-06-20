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
                <div class="images">
                <?php
                    for($i=0; $i<count($images); $i++) {
                        echo '<img class="viewimage" id="image' . $i+1 . '" src="'. $rentalPhotoPath . $images[$i] . '" alt="image' . $i+1 . '"';
                    }
                ?>
                </div>
                <div class="tally">
                    <p id="tally-paragraph"> 1 of <?php echo count($images); ?></p>
                </div>
            </div>             
            <div class="buttons right">
                <button onclick="viewRight()"><img src="../Images/right button.png" alt="right-button"></button>
            </div>            
        </section>
        <main>
            <div class="rental-description">
                <h2>Rental Description</h2>
                <h3>Ksh. <?php echo $amountOfRent; ?></h3>
                <h4>Per <?php echo $rentalTerm; ?></h4>
                <p><?php echo $description; ?></p>
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
                <h3>Ammenities</h3>             
                <?php
                    if(!empty($refinedAmmenities)) {
                        if((in_array("Tap Water", $refinedAmmenities)) || (in_array("Water Tank", $refinedAmmenities)) || (in_array("Borehole", $refinedAmmenities))) {
                            echo '<h4>Water</h4>';
                            for($i=0; $i<count($refinedAmmenities); $i++) {
                                if(($refinedAmmenities[$i] === "Tap Water") || ($refinedAmmenities[$i] === "Water Tank") || ($refinedAmmenities[$i] === "Borehole")) {
                                    echo '<p>'. $refinedAmmenities[$i] . '</p>';
                                }   
                            }
                        } else if((in_array("Token", $refinedAmmenities)) || (in_array("Meter", $refinedAmmenities))) {
                            echo '<h4>Electricity</h4>';                        
                            for($i=0; $i<count($refinedAmmenities); $i++) {
                                if(($refinedAmmenities[$i] === "Token") || ($refinedAmmenities[$i] === "Meter")) {
                                    echo '<p>'. $refinedAmmenities[$i] . '</p>';
                                }   
                            }
                        } else if((in_array("Security Guard", $refinedAmmenities)) || (in_array("Cctv", $refinedAmmenities))) {
                            echo '<h4>Security</h4>';
                            for($i=0; $i<count($refinedAmmenities); $i++) {
                                if(($refinedAmmenities[$i] === "Security Guard") || ($refinedAmmenities[$i] === "Cctv")) {
                                    echo '<p>'. $refinedAmmenities[$i] . '</p>';
                                }   
                            }
                        } else if((in_array("Pit Latrine", $refinedAmmenities)) || (in_array("Flashing Toilet", $refinedAmmenities))) {
                            echo '<h4>Washrooms</h4>';
                            for($i=0; $i<count($refinedAmmenities); $i++) {
                                if(($refinedAmmenities[$i] === "Pit Latrine") || ($refinedAmmenities[$i] === "Flashing Toilet")) {
                                    echo '<p>'. $refinedAmmenities[$i] . '</p>';
                                }   
                            }
                        } else if((in_array("Garbage Collection", $refinedAmmenities)) || (in_array("Cleaner", $refinedAmmenities))) {
                            echo '<h4>Cleaning</h4>';
                            for($i=0; $i<count($refinedAmmenities); $i++) {
                                if(($refinedAmmenities[$i] === "Garbage Collection") || ($refinedAmmenities[$i] === "Cleaner")) {
                                    echo '<p>'. $refinedAmmenities[$i] . '</p>';
                                }   
                            }
                        } else if((in_array("Garbage Collection", $refinedAmmenities)) || (in_array("Cleaner", $refinedAmmenities)) || (in_array("Sink", $refinedAmmenities))) {
                            echo '<h4>Cleaning</h4>';
                            for($i=0; $i<count($refinedAmmenities); $i++) {
                                if(($refinedAmmenities[$i] === "Garbage Collection") || ($refinedAmmenities[$i] === "Cleaner") || ($refinedAmmenities[$i] === "Sink")) {
                                    echo '<p>'. $refinedAmmenities[$i] . '</p>';
                                }   
                            }
                        } else if((in_array("Handicap Access", $refinedAmmenities)) || (in_array("Packing", $refinedAmmenities))) {
                            echo '<h4>Accessibility</h4>';
                            for($i=0; $i<count($refinedAmmenities); $i++) {
                                if(($refinedAmmenities[$i] === "Handicap Access") || ($refinedAmmenities[$i] === "Packing")) {
                                    echo '<p>'. $refinedAmmenities[$i] . '</p>';
                                }   
                            }
                        } else if((in_array("Tiles", $refinedAmmenities)) || (in_array("Ceiling", $refinedAmmenities)) || (in_array("Balcony", $refinedAmmenities))) {
                            echo '<h4>Finishing</h4>';
                            for($i=0; $i<count($refinedAmmenities); $i++) {
                                if(($refinedAmmenities[$i] === "Tiles") || ($refinedAmmenities[$i] === "Ceiling") || ($refinedAmmenities[$i] === "Balcony")) {
                                    echo '<p>'. $refinedAmmenities[$i] . '</p>';
                                }   
                            }
                        } else if((in_array("Wi-Fi", $refinedAmmenities)) || (in_array("Joint TV Subscription", $refinedAmmenities)) || (in_array("Air Conditioning", $refinedAmmenities)) || (in_array("Furnished", $refinedAmmenities)) || (in_array("Swimming Pool", $refinedAmmenities)) || (in_array("Gym", $refinedAmmenities))) {
                            echo '<h4>Luxury</h4>';
                            for($i=0; $i<count($refinedAmmenities); $i++) {
                                if(($refinedAmmenities[$i] === "Wi-Fi") || ($refinedAmmenities[$i] === "Joint TV Subscription") || ($refinedAmmenities[$i] === "Air Conditioning") || ($refinedAmmenities[$i] === "Furnished") || ($refinedAmmenities[$i] === "Swimming Pool") || ($refinedAmmenities[$i] === "Gym")) {
                                    echo '<p>'. $refinedAmmenities[$i] . '</p>';
                                }   
                            }
                        }
                    }
                ?>
            </div>
            <div class="preferences">
                <h3>Tenant Preferences</h3>
                <?php 
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
                ?>
            </div>
            <div class="rules">
                <div class="buttons left">
                    <button onclick="viewLeft()"><img src="../Images/left button.png" alt="left-button"></button>
                </div>
                <div class="images-and-tally">
                    <div class="images">
                    <?php
                        for($i=0; $i<count($rules); $i++) {
                            echo '<img class="viewimage" id="rules-image-' . $i+1 . '" src="../Image_Data/Rules/' . $rules[$i] . '" alt="image' . $i+1 . '"';
                        }
                    ?>
                    </div>
                    <div class="tally">
                        <p id="tally-paragraph"> 1 of <?php echo count($rules); ?></p>
                    </div>
                </div>             
                <div class="buttons right">
                    <button onclick="viewRight()"><img src="../Images/right button.png" alt="right-button"></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>