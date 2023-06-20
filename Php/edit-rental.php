<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseSearchKE</title>
    <link rel="stylesheet" href="../Css/style-edit-rentals.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/edit-rental.js"></script>
</head>
<body onload="textareaSizor()" onresize="textareaSizor()">
    <div class="container">
    <?php ?>
        <nav>
            <h1>HousesearchKE.com</h1>
            <button id="back-button" onclick="history.back()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Back</button>
        </nav>
        <div class="plot-name">
                <h3> <?php echo $rentalName; ?> </h3>
            </div>
        <section>            
            <div class="buttons left plot-images">
                <button type="button" onclick="viewLeft('.images img.viewimage', '.tally #tally-paragraph')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"><img src="../Images/left button.png" alt="left-button"></button>
            </div>
            <div class="images">
                <?php
                    for($i=0; $i<count($IndividualPlotPhotos); $i++) {
                        echo '<img class="viewimage" id="image' . ($i+1) . '" src="'. $imagePaths . $IndividualPlotPhotos[$i] .'" alt="image"' . $i . '>';
                    }
                ?>                
            </div>             
            <div class="buttons right plot-images">
                <button type="button" onclick="viewRight('.images img.viewimage', '.tally #tally-paragraph')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"><img src="../Images/right button.png" alt="right-button"></button>
            </div>            
        </section>
        <div class="tally">
            <p id="tally-paragraph"> 1 of <?php echo count($IndividualPlotPhotos); ?> </p>
        </div>        
        <main>
            <form action="../Php/submit-editted-rental-details.php" class="overall-form" method="post" enctype="multipart/form-data">
                <div class="rental-description">
                    <h2>Rental Details</h2>
                    
                    <input type="hidden" name="email" class="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="rental-ID" value="<?php echo $rentalID; ?>">
                    <input type="hidden" name="old-plot-photos" value="<?php echo $plotPhotos; ?>">
                    <input type="hidden" name="old-plot-photos-paths" value="<?php echo $oldPlotPhotosPaths; ?>">
                    <input type="hidden" name="old-rules-photos" value="<?php echo $rulesUrls; ?>">
                    <input type="hidden" id="password" name="password" value="<?php echo $password; ?>">
                    
                    <label for="rental-name" class="rental-description-labels">Rental Name </label>
                    <input type="text" class="rental-description-input" name="rental-name" id="rental-name" value="<?php echo $rentalName; ?>">
                    <label for="rent-amount" class="rental-description-labels">Amount Of Rent </label>
                    <input type="number" class="rental-description-input" name="rent-amount" id="rent-amount" value="<?php echo $rentAmount; ?>">
                    <label for="rent-term" class="rental-description-labels">Per  </label>
                    <select class="rental-description-input" name="rent-term" id="rent-term">
                        <option value="daily" <?php if($termDisplay === "Day"){echo "selected";}?>>Day</option>
                        <option value="weekly" <?php if($termDisplay === "Week"){echo "selected";}?>>Week</option>
                        <option value="monthly" <?php if($termDisplay === "Month"){echo "selected";}?>>Month</option>
                        <option value="yearly" <?php if($termDisplay === "Year"){echo "selected";}?>>Year</option>
                        <option value="quarterly" <?php if($termDisplay === "3 Months"){echo "selected";}?>>3 Months</option>option>
                        <option value="bi-annually" <?php if($termDisplay === "6 Months"){echo "selected";}?>>6 Months</option>                
                    </select>
                    <label for="premise-type" class="rental-description-labels">Type Of Rental </label>
                    <input type="text" class="rental-description-input" name="premise-type" id="premise-type" value="<?php 
                        switch($rentalType) {
                            case "Business Premise":
                                echo $typeOfBusinessPremise;
                                break;
                            default:
                                echo $rentalType;
                        }
                    ?>">
                    <label for="number-of-unit" class="rental-description-labels">Number Of <?php 
                        switch($rentalType) {
                            case "Business Premise":
                                echo $typeOfBusinessPremise;
                                break;
                            default:
                                echo $rentalType;
                        }
                    ?>s</label>  
                    <input type="number" class="rental-description-input" name="number-of-units" id="number-of-units" value="<?php echo $numberOfUnits; ?>">
                    <?php
                        switch($rentalType) {
                            case "Suite":
                                echo '<label for="number-of-beds" class="rental-description-labels"> Number Of Beds Per Suite </label>
                                <input type="number" class="rental-description-input" value="' . $suiteBeds . '" id="number-of-beds" name="number-of-beds">';
                                break;
                            case "Apartment":
                                echo '<label for="number-of-apartment-bedrooms" class="rental-description-labels"> Number Of Bedrooms Per Apartment </label>
                                <input type="number" class="rental-description-input" value="' . $apartmentBedrooms . '" id="number-of-apartment-bedrooms" name="number-of-apartment-bedrooms">';
                                break;
                            case "House":
                                echo '<label for="number-of-house-bedrooms" class="rental-description-labels"> Number Of Bedrooms Per House </label>
                                <input type="number" class="rental-description-input" value="' . $houseBedrooms . '" id="number-of-house-bedrooms" name="number-of-house-bedrooms">';
                                break;
                            case "Hostel":
                               echo '<label for="maximum-number-of-Hostel-occupants" class="rental-description-labels"> Maximum Number Of Occupants </label>
                                <input type="number" class="rental-description-input" value="' . $hostelMaximumOccupants . '" id="maximum-number-of-Hostel-occupants" name="maximum-number-of-Hostel-occupants">';
                                break;
                            case "Bedsitter":
                                echo '<label for="maximum-number-of-bedsitter-occupants" class="rental-description-labels"> Maximum Number Of Occupants </label>
                                <input type="number" class="rental-description-input" value="' . $bedsitterMaximumOccupants . '" id="maximum-number-of-bedsitter-occupants" name="maximum-number-of-bedsitter-occupants">';
                                break;
                            case "Single Room":
                                echo '<label for="maximum-number-of-single-room-occupants" class="rental-description-labels"> Maximum Number Of Occupants </label>
                                <input type="number" class="rental-description-input" value="' . $singleRoomMaximumOccupants . '" id="maximum-number-of-single-room-occupants" name="maximum-number-of-single-room-occupants">';
                                break;
                            case "Single Room":
                                echo '<label for="maximum-number-of-single-room-occupants" class="rental-description-labels"> Maximum Number Of Occupants </label>
                                <input type="number" class="rental-description-input" value="' . $singleRoomMaximumOccupants . '" id="maximum-number-of-single-room-occupants" name="maximum-number-of-single-room-occupants">';
                                break;
                        }
                    ?>
                    <label for="location" class="rental-description-labels">Location:</label>
                    <input type="text" class="rental-description-input" name="location" id="location" value="<?php echo $location; ?>">
                    <label for="google-location" class="rental-description-labels"> Google Location </label>
                    <input type="text" class="rental-description-input" name="google-location" id="google-location" value="<?php echo $googlelocation; ?>">
                    <label for="description" class="rental-description-labels">Description</label>
                    <textarea id="description" class="rental-description-input" name="description" oninput="textareaSizor()"><?php echo $description; ?> </textarea>
                    <label for="plot-photos" class="rental-description-labels"> Re-Upload Photos Of Your Rental </label>
                    <input type="file" class="rental-description-input" name="plot-photos[]" id="plot-photos" value="" multiple required>
                </div>            
                
                <div class="ammenities-and-preferences">
                    <div class="actual-ammenities-and-preferences">
                        <h3>Ammenities</h3>
                        <div class="ammenities">                      

                            <div class="basic-ammenities">
                                <h5>Water</h5>
                                <div class="rental-ammenities basic water">
                                    <input type="checkbox"  name="tap-water" id="tap-water" value="Tap Water" <?php if(in_array("Tap Water", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="tap-water">Tap Water</label>

                                    <input type="checkbox"  name="water-tank" id="water-tank" value="Water Tank" <?php if(in_array("Water Tank", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="water-tank">Water Tank</label>

                                    <input type="checkbox"  name="borehole" id="borehole" value="Borehole" <?php if(in_array("Borehole", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="borehole">Borehole</label>
                                </div>
                                                
                                <h5>Electricity</h5>
                                <div class="rental-ammenities basic electricity">
                                    <input type="checkbox" name="token" id="token" value="Token" <?php if(in_array("Token", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="token"> Individual Token</label>
                                    <input type="checkbox" name="meter" id="meter" value="Meter" <?php if(in_array("Meter", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="meter"> Shared Meter</label>
                                </div>                            

                                <h5>Security</h5>
                                <div class="rental-ammenities basic security">
                                    <input type="checkbox" name="security-guard" id="security-guard" value="Security Guard" <?php if(in_array("Security Guard", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="security-guard"> Security Guard</label>
                                    <input type="checkbox" name="cctv" id="cctv" value="Cctv" <?php if(in_array("Cctv", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="cctv"> CCTV</label>
                                    <input type="checkbox" name="security-lights" id="security-lights" value="Security Lights" <?php if(in_array("Security Lights", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="security-lights"> Security Lights</label>
                                </div>                            

                                <h5>Washrooms</h5>
                                <div class="rental-ammenities basic toilets">
                                    <input type="checkbox" name="pit-latrine" id="pit-latrine" value="Pit Latrine" <?php if(in_array("Pit Latrine", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="pit-latrine"> Shared Pit Latrine</label>
                                    <input type="checkbox" name="automatic-toilet" id="automatic-toilet" value="Automatic Toilet" <?php if(in_array("Automatic Toilet", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="automatic-toilet"> Shared Flashing Toilets</label>
                                </div>                              
                                
                            </div>
                            <div class="bonus-ammenities">

                                <h5>Cleaning</h5>
                                <div class="rental-ammenities bonus cleaning">
                                    <input type="checkbox" name="garbage-collection" id="garbage-collection"value="Garbage Collection" <?php if(in_array("Garbage Collection", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="garbage-collection"> Garbage Collection</label>
                                    <input type="checkbox" name="cleaner" id="cleaner"value="Cleaner" <?php if(in_array("Cleaner", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="cleaner"> Cleaner for the shared spaces (e.g toilets/ablution block)</label>
                                    <input type="checkbox" name="sink" id="sink"value="Sink" <?php if(in_array("Sink", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="sink"> Sink</label>
                                </div>                            

                                <h5>Accessibility</h5>
                                <div class="rental-ammenities bonus accessibility">
                                    <input type="checkbox" name="handicap-access" id="handicap-access"value="Handicap Access" <?php if(in_array("Handicap Access", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="handicap-access"></label>Handicap/ WheelChair Access</label>
                                    <input type="checkbox" name="packing" id="packing"value="Packing" <?php if(in_array("Packing", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="packing"></label>Packing</label>
                                </div>

                                <h5> Finishing</h5>
                                <div class="rental-ammenities bonus finishing">
                                    <input type="checkbox" name="tiles" id="tiles"value="Tiles" <?php if(in_array("Tiles", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="tiles" class="tiles"> Tiles</label>
                                    <input type="checkbox" class="ceiling" name="ceiling" id="ceiling"value="Ceiling" <?php if(in_array("Ceiling", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="ceiling"> Ceiling</label>
                                    <input type="checkbox" name="balcony" id="balcony"value="Balcony" <?php if(in_array("Balcony", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="balcony"></label>Balcony</label>
                                </div>                            

                                <h5>luxury</h5>
                                <div class="rental-ammenities bonus luxury">
                                    <input type="checkbox" name="wi-fi" id="wi-fi" value="Wi-Fi" <?php if(in_array("Wi-Fi", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="wi-fi"> Wi-Fi</label>
                                    <input type="checkbox" name="joint-tv-subscription" id="joint-tv-subscription" value="Joint TV Subscription" <?php if(in_array("Joint TV Subscription", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="joint-tv-subscription"> Joint TV Subscription</label>
                                    <input type="checkbox"  name="air-conditioning" id="air-conditioning" value="Air Conditioning" <?php if(in_array("Air Conditioning", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="air-conditioning"></label>Air Conditioning</label>
                                    <input type="checkbox" name="furnished" id="furnished" value="Furnished" <?php if(in_array("Furnished", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="furnished"></label>Furnished</label>
                                    <input type="checkbox" name="swimming-pool" id="swimming-pool" value="Swimming Pool" <?php if(in_array("Swimming Pool", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="swimming-pool"></label>Swimming Pool</label>
                                    <input type="checkbox" name="gym" id="gym" value="Gym" <?php if(in_array("Gym", $individualAmmenitiesRefined)) {echo "checked";}                                                        
                                    ?>>
                                    <label for="gym"></label>Gym</label>
                                </div>
                                
                            </div>

                        </div>
                        <h3>Preferred sorts of tenants</h3>
                        <div class="preferences">                        

                            <h5>Gender</h5>
                            <div class="parameters gender">
                                <input type="radio" name="gender" id="male" value="Males" <?php if(in_array("Males", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="male">Males</label>
                                <input type="radio" name="gender" id="female" value="Females" <?php if(in_array("Females", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="female">Females</label>
                                <input type="radio" name="gender" id="any-gender" value="Any Gender" <?php if(in_array("Any Gender", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="any-gender">Any gender</label>
                            </div>
                                        
                            <h5>Students: </h5>
                            <div class="parameters students">
                                <input type="radio" name="students" id="no-students" value="No Students" <?php if(in_array("No Students", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="students">No Students</label>
                                <input type="radio" name="students" id="students-welcome" value="Students Welcome" <?php if(in_array("Students Welcome", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="students">Students Welcome</label>
                            </div>                        

                            <h5>Families that are welcome: </h5>
                            <div class="parameters families">
                                <input type="radio" name="family" id="no-children" value="No Children" <?php if(in_array("No Children", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="no-children">Without small childen</label>
                                <input type="radio" name="family" id="any-welcome" value="Any Family Welcome" <?php if(in_array("Any Family Welcome", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="any-welcome">Any Family</label>
                            </div>                                                

                            <h5>Driving: </h5>
                            <div class="parameters driving">
                                <input type="radio" name="vehicles" id="having-vehicles" value="Vehicles Allowed" <?php if(in_array("Vehicles Allowed", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="having-vehicles">Having Vehicles</label>
                                <input type="radio" name="vehicles" id="not-having-vehicles" value="Vehicles Not Allowed" <?php if(in_array("Vehicles Not Allowed", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="not-having-vehicles">Not having vehicles (No packing)</label>
                            </div>
                                        
                            <h5> Practicing members of:</h5>
                            <div class="parameters faith">
                                <input type="checkbox" name="Christianity" id="christianity" value="Christianity" <?php if(in_array("Christianity", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="christianity">Christianity</label>
                                <input type="checkbox" name="islam" id="islam" value="Islam" <?php if(in_array("Islam", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="islam">Islam</label>
                                <input type="checkbox" name="hinduism" id="hinduism" value="Hinduism" <?php if(in_array("Hinduism", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="hinduism">Hinduism</label>
                                
                                <?php
                                    $otherReligion = "";
                                    for($i=0; $i<count($individualPreferencesRefined); $i++) {
                                        if(($individualPreferencesRefined[$i] !== "Males") && ($individualPreferencesRefined[$i] !== "Females") &&($individualPreferencesRefined[$i] !== "Any Gender") && ($individualPreferencesRefined[$i] !== "No Students") && ($individualPreferencesRefined[$i] !== "Students Welcome") &&($individualPreferencesRefined[$i] !== "No Children") && ($individualPreferencesRefined[$i] !== "Vehicles Allowed") && ($individualPreferencesRefined[$i] !== "Christianity") &&($individualPreferencesRefined[$i] !== "Islam") && ($individualPreferencesRefined[$i] !== "Hinduism") && ($individualPreferencesRefined[$i] !== "Any religion") && ($individualPreferencesRefined[$i] != "")) {
                                            if(!empty($individualPreferencesRefined[$i])) {
                                                $otherReligion = $individualPreferencesRefined[$i];
                                                echo '<input type="checkbox" name="specified-religion" id="specified-religion" value="' . $otherReligion . '" checked>';
                                                echo '<label for="specified-religion">' . $otherReligion .'</label>';
                                            }
                                        }
                                    }

                                    ?>

                                <input type="checkbox" name="any-religion" id="any-religion" value="Any religion" <?php if(in_array("Any religion", $individualPreferencesRefined)) {echo "checked";}                                                        
                                    ?>>
                                <label for="any-religion">Any Religion</label>
                            </div>                        

                        </div>
                    </div>
                    <div class="rules-title">
                        <h3>These are the rules you Uploaded</h3>
                    </div>
                    <div class="rules">
                        <div class="buttons left rules-images-buttons">
                            <button type="button" onclick="viewLeft('.rules-images img.viewimage-rules', '.tally #tally-paragraph-rules')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"><img src="../Images/left button.png" alt="left-button"></button>
                        </div>
                        <div class="rules-images">
                            <?php
                                for($j=0; $j<count($IndividualRules); $j++) {
                                    echo '<img class="viewimage-rules" id="rules-image' . ($j+1) . '" src="../Image_Data/Rules/' . $IndividualRules[$j] .'" alt="image"' . ($j+1) . '>';
                                }                                
                            ?>
                        </div>             
                        <div class="buttons right rules-images-buttons">
                            <button type="button" onclick="viewRight('.rules-images img.viewimage-rules', '.tally #tally-paragraph-rules')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"><img src="../Images/right button.png" alt="right-button"></button>
                        </div>
                    </div>
                    <div class="tally">
                        <p id="tally-paragraph-rules"> 1 of <?php echo count($IndividualRules); ?> </p>
                    </div>
                    <div class="input-rules-files">
                        <label for="rules-photos" class="rental-description-labels" id="rules-photos-label"> Re-Upload Photos Of Your Rules </label>
                        <input type="file" class="rental-description-input" name="rules-photos[]" id="rules-photos" value="" multiple>
                    </div>                                           
                </div>
                
                <div class="submit-button">
                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Submit Details</button>
                </div>
            </form>            
        </main>
    </div>
</body>
</html>