<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseSearchKE</title>
    <link rel="stylesheet" href="../Css/style-viewlist.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/viewlist.js"></script>
</head>
<body>
    <div class="container">
        <nav>
            <div class="top">
                <h1>HousesearchKE.com</h1>
                <button class="advertise" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"><a href="../Html/login.html">Advertise</a></button>
            </div>
            <form action="../Php/search-results-preparation.php" method="post" class="search-bar">
                <input type="text" placeholder="Search location" id="location" name="location" value="<?php echo $location; ?>">
                <button onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"><img src="../Images/search.png" alt="seach-button-icon"></button>
            </form>
        </nav>
        <section>
           <select class="order-by" name="order-by" id="order-by" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onchange="orderFormSubmitter()">
                    <option value="no-value">Order By (Default: No Order)</option>
                    <option value="price-low-high">Price: Low - High</option>
                    <option value="price-high-low">Price: High - Low</option> 
            </select>
            <button onclick="showFilters()" class="button-filters" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">More Filters+</button>
            <form class="filter-form">
                <div class="actual-filters">
                    <div class="basic-information">
                        
                        <div class="rentalType" id="rentalType">
                            <div class="original-text-label">
                                <label class="type-of-rental" for="type-of-rental">Type of Rental</label>
                            </div>
                            <div class="original-text-input">
                                <select class="type-of-rental" id="type-of-rental" name="type-of-rental" onchange="displayParameters()">
                                    <option value="no-value" selected>Optional</option>
                                    <option value="Hostel">Hostel</option>
                                    <option value="Single Room">Single Room</option>
                                    <option value="Bedsitter">Bedsitter</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Business Premise">Business Premise</option>
                                    <option value="House">House</option> 
                                    <option value="Suite">Suite/ Motel</option>
                                </select>
                            </div>
                        </div> 
                    
                        <div class="businessPremiseType" id="businessPremiseType">
                            <div class="original-text-label">
                                <label class="type-of-business-premise" id="label-type-of-premise" for="type-of-premise">Type of business Premise</label>
                            </div>    
                            <div class="original-text-input">    
                                <select class="type-of-business-premise" name="type-of-premise" id="type-of-premise">
                                    <option value="no-value">Optional</option>
                                    <option value="Stall">Stall</option>
                                    <option value="Shop">Shop</option>
                                    <option value="Event Hall">Event Hall</option>
                                    <option value="Warehouse">Warehouse</option>
                                    <option value="Office">Office</option>
                                    <option value="Industrial">Industrial</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="moreBedrooms" id="moreBedrooms">
                            <div class="original-text-label">
                                <label class="more-bedrooms" id="label-more-bedrooms" for="more-bedrooms">Number Of Bedrooms</label>
                            </div>    
                            <div class="original-text-input">
                                <input type="number" class="more-bedrooms" name="more-bedrooms" id="more-bedrooms" placeholder="Optional" min="1" step="1">
                            </div>
                        </div>

                        <div class="rentalTerm" id="rentalTerm">
                            <div class="original-text-label">
                                <label class="rental-term" for="rental-term">Rental Term</label>
                            </div>   
                            <div class="original-text-input">   
                                <select class="rental-term" name="rental-term" id="rental-term">
                                    <option value="no-value">Optional</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="quarterly">Quarterly (Once every three months)</option>option>
                                    <option value="bi-annually">Bi-anually (Once every six months)</option>
                                    <option value="yearly">Yearly</option>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="other-ammenities-and-preferences">
                        <div class="ammenities-filters">
                            <h4>Ammenities</h4>
                            
                            <h5>Water</h5>
                            <input type="checkbox"  name="tap-water" id="tap-water" value="Tap Water">
                            <label for="tap-water"> Tap Water</label>
                            <input type="checkbox"  name="water-tank" id="water-tank" value="Water Tank">
                            <label for="water-tank"> Water Tank</label>
                            <input type="checkbox"  name="borehole" id="borehole" value="Borehole">
                            <label for="borehole">Borehole</label>
                                        
                            <h5>Electricity</h5>
                            <input type="checkbox" name="token" id="token" value="Token">
                            <label for="token"> Individual Token</label>
                            <input type="checkbox" name="meter" id="meter" value="Meter">
                            <label for="meter"> Shared Meter</label>
                
                            <h5>Security</h5>
                            <input type="checkbox" name="security-guard" id="security-guard" value="Security Guard">
                            <label for="security-guard"> Security Guard</label>
                            <input type="checkbox" name="cctv" id="cctv" value="Cctv">
                            <label for="cctv"> CCTV</label>
                            <input type="checkbox" name="security-lights" id="security-lights" value="Security Lights">
                            <label for="security-lights"> Security Lights</label>
                
                            <h5>Washrooms</h5>
                            <input type="checkbox" name="pit-latrine" id="pit-latrine" value="Pit Latrine">
                            <label for="pit-latrine"> Communal Pit Latrine</label>
                            <input type="checkbox" name="automatic-toilet" id="automatic-toilet" value="Flashing Toilet">
                            <label for="automatic-toilet"> Communal Automatic Toilets</label>
                
                            <h5>Cleaning</h5>
                            <input type="checkbox" name="garbage-collection" id="garbage-collection" value="Garbage Collection">
                            <label for="garbage-collection"> Garbage Collection</label>
                            <input type="checkbox" name="cleaner" id="cleaner" value="Cleaner">
                            <label for="cleaner"> Cleaner for the shared spaces (e.g toilets/ablution block)</label>
                            <input type="checkbox" name="sink" id="sink" value="Sink">
                            <label for="sink">Sink</label>
                
                            <h5>Accessibility</h5>
                            <input type="checkbox" name="handicap-access" id="handicap-access" value="Handicap Access">
                            <label for="handicap-access">Handicap/ WheelChair Access</label>
                            <input type="checkbox" name="packing" id="packing" value="Packing">
                            <label for="packing">Packing</label>
                
                            <h5> Finishing</h5>
                            <input type="checkbox" name="tiles" id="tiles" value="Tiles">
                            <label for="tiles" class="tiles"> Tiles</label>
                            <input type="checkbox" class="ceiling" name="ceiling" id="ceiling" value="Ceiling">
                            <label for="ceiling"> Ceiling</label>
                            <input type="checkbox" name="balcony" id="balcony" value="Balcony">
                            <label for="balcony">Balcony</label>
                
                            <h5>luxury</h5>
                            <input type="checkbox" name="wi-fi" id="wi-fi" value="Wi-Fi">
                            <label for="wi-fi"> Wi-Fi</label>
                            <input type="checkbox" name="joint-tv-subscription" id="joint-tv-subscription" value="Joint TV Subscription">
                            <label for="joint-tv-subscription"> Joint TV Subscription</label>
                            <input type="checkbox" name="air-conditioning" id="air-conditioning" value="Air Conditioning">
                            <label for="air-conditioning">Air Conditioning</label>
                            <input type="checkbox" name="furnished" id="furnished" value="Furnished">
                            <label for="furnished">Furnished</label>
                            <input type="checkbox" name="swimming-pool" id="swimming-pool" value="Swimming Pool">
                            <label for="swimming-pool">Swimming Pool</label>
                            <input type="checkbox" name="gym" id="gym" value="Gym">
                            <label for="gym">Gym</label>
                        </div>
                
                        <div class="preferences-filter">
                            <h4>Preferred sorts of tenants</h4>
                                
                            <h5>Gender</h5>
                            <input type="radio" name="gender" id="male" value="Males">
                            <label for="male">Males</label>
                            <input type="radio" name="gender" id="female" value="Female">
                            <label for="female">Females</label>
                            <input type="radio" name="gender" id="any-gender" value="Any Gender">
                            <label for="any-gender">Any gender</label>
                
                            <h5>Students: </h5>
                            <input type="radio" name="students" id="no-students" value="No Students">
                            <label for="no-students">No Students</label>
                            <input type="radio" name="students" id="students-welcome" value="Students Welcome">
                            <label for="students-welcome">Students Welcome</label>
                
                            <h5>Families that are welcome: </h5>                        
                            <input type="radio" name="family" id="no-children" value="No Children">
                            <label for="no-children">Without small childen</label>
                            <input type="radio" name="family" id="any-welcome" value="Any Family Welcome">
                            <label for="any-welcome">Any Family</label>
                
                            <h5>Driving: </h5>
                            <input type="radio" name="vehicles" id="having-vehicles" value="Vehicles Allowed">
                            <label for="having-vehicles">Having Vehicles</label>
                            <input type="radio" name="vehicles" id="not-having-vehicles" value="Vehicles Not Allowed">
                            <label for="not-having-vehicles">Not having vehicles (No packing)</label>
                
                            <h5> Practicing members of:</h5>
                            <input type="checkbox" name="Christianity" id="christianity" value="Christianity">
                            <label for="christianity">Christianity</label>
                            <input type="checkbox" name="islam" id="islam" value="Islam">
                            <label for="islam">Islam</label>
                            <input type="checkbox" name="hinduism" id="hinduism" value="Hinduism">
                            <label for="hinduism">Hinduism</label>
                            <input type="checkbox" name="buddhism" id="buddhism" value="Buddhism">
                            <label for="buddhism">Buddhism</label>
                            
                            <?php
                                echo "<br>";
                                $otherReligions = array();
                                for($i=0; $i<count($retrievedPreferences); $i++) {
                                    
                                    $individualRentalsPreferences = $retrievedPreferences[$i];
                                    if($individualRentalsPreferences != "") {
                                        $rawPreferences = explode(", ", $individualRentalsPreferences);
                                        $refinedPreferences = array();
                                        if(!empty($rawPreferences)) {
                                            for($j=0; $j<count($rawPreferences); $j++) {
                                                $refinedPreferences[$j] = explode(": ", $rawPreferences[$j]);
                                                unset($refinedPreferences[$j][0]);
                                                if(!empty($refinedPreferences[$j])) {
                                                    $refinedPreferences[$j] = $refinedPreferences[$j][1];
                                                }
                                            }
        
                                            for($k=0; $k<count($refinedPreferences); $k++) {
                                                if(($refinedPreferences[$k] !== "Males") && ($refinedPreferences[$k] !== "Females") && ($refinedPreferences[$k] !== "Any Gender") && ($refinedPreferences[$k] !== "No Students") && ($refinedPreferences[$k] !== "Students Welcome") && ($refinedPreferences[$k] !== "No Children") && ($refinedPreferences[$k] !== "Any Family Welcome") && ($refinedPreferences[$k] !== "Vehicles Allowed") && ($refinedPreferences[$k] !== "Vehicles Not Allowed") && ($refinedPreferences[$k] !== "Christianity") && ($refinedPreferences[$k] !== "Islam") && ($refinedPreferences[$k] !== "Hinduism") && ($refinedPreferences[$k] !== "Any religion") && ($refinedPreferences[$k] !== "Buddhism")) {
                                                    array_push($otherReligions, $refinedPreferences[$k]);
                                                }
                                            }
                                        }
                                    }
                                }
                                if(count($otherReligions) > 0) {
                                    $finalCollection = array_values(array_unique($otherReligions));
                                    
                                    $otherReligionsCollection = implode(", ", $finalCollection);
                                    for($i=0; $i<count($finalCollection); $i++) {
                                        echo '
                                        <input type="checkbox" name="' . $finalCollection[$i] . '" id="' . $finalCollection[$i] . '" value="' . $finalCollection[$i] . '">
                                        <label for="' . $finalCollection[$i] . '">' . $finalCollection[$i] . '</label>';
                                        echo '
                                        <input type="hidden" name="other-religions" id="other-religions" value="' . $otherReligionsCollection . '">';
                                    }
                                }
                            ?>

                            <input type="checkbox" name="any-religion" id="any-religion" value="Any Religion">
                            <label for="any-religion">Any Religion</label>
                
                        </div>
                    </div>                    
                </div>                
                <button onclick="wrapperFunction()" type="button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"> Filter </button>
            </form>                       
        </section>
        <main>
            <?php 
                if(count($retrievedRentalID) > 0) {
                    for($i=0; $i<count($retrievedRentalID); $i++){
                        
                        $rentalImages = explode(", ", $retrievedImageUrls[$i]);
                        $imageToDisplay = $rentalImages[0];
                                    
                        $finalFolder = "";
    
                        switch($retrievedRentalType[$i]) {
                            case "Business Premise":
                                $finalFolder = $retrievedRentalType[$i] . "s/" . $retrievedTypeOfBusinessBusiness[$i] . "/";
                                break;
    
                            case "Apartment":                                                    
                                if(($retrievedNumberOfApartmentBedrooms[$i] == 1) || ($retrievedNumberOfApartmentBedrooms[$i] == 2) || ($retrievedNumberOfApartmentBedrooms[$i] == 3)) {
                                    $finalFolder = $retrievedRentalType[$i] . "s/" . $retrievedNumberOfApartmentBedrooms[$i]. "-Bedroom/";
                                } else {
                                    $finalFolder = $retrievedRentalType[$i] . "s/More Bedrooms/" . $retrievedNumberOfApartmentBedrooms[$i]. "-Bedrooms/";
                                }                                                    
                                break;
    
                            case "House":
                                if(($retrievedNumberOfHouseBedrooms[$i] == 1) || ($retrievedNumberOfHouseBedrooms[$i] == 2) || ($retrievedNumberOfHouseBedrooms[$i] == 3)) {
                                    $finalFolder = $retrievedRentalType[$i] . "s/" . $retrievedNumberOfHouseBedrooms[$i]. "-Bedroom/";
                                } else {
                                    $finalFolder = $retrievedRentalType[$i] . "s/More Bedrooms/" . $retrievedNumberOfHouseBedrooms[$i] . "-Bedrooms/";
                                }
                                break;
                            
                            default:
                                $finalFolder = $retrievedRentalType[$i] . "s/";
                        }
    
                        $rentalTerm = $retrievedRentalTerm[$i];
                        $termToDisplay = "";
                        switch($rentalTerm) {
                            case "daily":
                                $termToDisplay = "Per Day";
                                break;
                            case "weekly":
                                $termToDisplay = "Per Week";
                                break;
                            case "monthly":
                                $termToDisplay = "Per Month";
                                break;
                            case "yearly":
                                $termToDisplay = "Per Year";
                                break;
                            case "quarterly":
                                $termToDisplay = "Every 3 Months";
                                break;
                            case "bi-annually":
                                $termToDisplay = "Every 6 Months";
                                break;
                        }
                        echo'
                        <div class="template" style="order: ' . $i+1 . ';">
                            <div class="rental-div" id="rental-' . $i+1 . '" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="activateAnchor(event)">
                                <div class="image" id="image' . $i+1 . '">
                                    <img src="../Image_Data/' . $finalFolder. $imageToDisplay. '" alt="Rental-' . $i+1 . '">              
                                </div>
                                <div class="description" id="description' . $i+1 . '">
                                    <h3 class="rent-amount">Ksh. ' . $retrievedAmountOfRent[$i] . '</h3>
                                    <h4 class="rent-term-display">' . $termToDisplay . '</h4>
                                    <br>' .
                                    '<h4 class="rental-type-display">';  
                                    if(($retrievedRentalType[$i] === "Hostel") || ($retrievedRentalType[$i] === "Bedsitter") || ($retrievedRentalType[$i] === "Single Room")) {
                                        echo $retrievedRentalType[$i];
                                    } else if ($retrievedRentalType[$i] === "Business Premise") {
                                        echo $retrievedTypeOfBusinessBusiness[$i];
                                    } else if ($retrievedRentalType[$i] === "Suite") {
                                        echo $retrievedNumberOfBedsPerSuite[$i] . '-Bed Suite';
                                    } else {
                                        if($retrievedRentalType[$i] === "Apartment") {
                                            echo $retrievedNumberOfApartmentBedrooms[$i] . '-Bedroom Apartment';
                                        } else {
                                            echo $retrievedNumberOfHouseBedrooms[$i] . '-Bedroom House';
                                        }
                                    }
                                    echo '</h4>';
                                echo '<h4 class="units-available-display">Number Of Units Available: ' . $retrievedNumberOfSimilarUnits[$i] . '</h4>
                                    <p class="description-display"> ' . $retrievedDescription[$i] . ' </p>
                                    <form class="template-more-details" id="template-more-details-' . $i+1 . '" action="../Php/view-description-preparation.php" method="post" enctype="multipart/form-data"> 
                                        <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">More details</button>
    
                                        <input type="hidden" name="rental-type" value="' . $retrievedRentalType[$i] . '">
                                        <input type="hidden" name="rental-name" value="' . $retrievedrentalName[$i] . '">
                                        <input type="hidden" name="rental-location" value="' . $retrievedLocation[$i] . '">
                                        <input type="hidden" name="rental-google-location" value="' . $retrievedGoogleLocation[$i] . '">
                                        <input type="hidden" name="rental-photos" value="' . $retrievedImageUrls[$i] . '">
                                        <input type="hidden" class="rental-ammenities" name="rental-ammenities" value="' . $retrievedAmmenities[$i] . '">
                                        <input type="hidden" name="rental-units-available" value="' . $retrievedNumberOfSimilarUnits[$i] . '">
                                        <input type="hidden" name="rental-beds-per-suite" value="' . $retrievedNumberOfBedsPerSuite[$i] . '">
                                        <input type="hidden" name="rental-bedrooms-per-apartment" value="' . $retrievedNumberOfApartmentBedrooms[$i] . '">
                                        <input type="hidden" name="rental-bedrooms-per-house" value="' . $retrievedNumberOfHouseBedrooms[$i] . '">
                                        <input type="hidden" name="rental-business-premise-type" value="' . $retrievedTypeOfBusinessBusiness[$i] . '">
                                        <input type="hidden" name="rental-owners-phone-number" value="' . $retrievedOwnersPhoneNumber[$i] . '">
                                        <input type="hidden" name="rental-owners-email" value="' . $retrievedOwnersEmailAddress[$i] . '">
                                        <input type="hidden" name="rental-term" value="' . $termToDisplay . '">
                                        <input type="hidden" name="rental-amount-of-rent" value="' . $retrievedAmountOfRent[$i] . '">
                                        <input type="hidden" name="rental-description" value="' . $retrievedDescription[$i] . '">
                                        <input type="hidden" class="rental-tenant-preferences" name="rental-tenant-preferences" value="' . $retrievedPreferences[$i] . '">
                                        <input type="hidden" name="rental-number-of-ocupants" value="' . $retrievedMaximumNumberOfOccupants[$i] . '">
                                        <input type="hidden" name="rental-rules" value="' . $retrievedRulesUrls[$i] . '">
                                        <input type="hidden" name="rental-photos-path" value="../Image_Data/' . $finalFolder . '">
                                        <input type="hidden" name="rental-owners-first-name" value="' . $retrievedOwnersFirstName[$i] . '">
                                        <input type="hidden" name="rental-owners-last-name" value="' . $retrievedOwnersLastName[$i] . '">                                                                       
                                    </form>
                                </div>                            
                            </div>
                        </div> 
                        ';
    
                    }
                } else {
                    echo '<div class="template-error">
                        <p>Sorry. No Rentals From ' . $location . ' Have Been Uploaded. Maybe Try Searching For Rentals In Another Location</p> 
                    </div>';
                }    
            ?>            
        </main>
    </div>    
</body>
</html>