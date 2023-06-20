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
                <input type="text" placeholder="Search location" id="location" name="location">
                <button onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"><img src="../Images/search.png" alt="seach-button-icon"></button>
            </form>
        </nav>
        <section>
            <select class="order-by" name="order-by" id="order-by" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                <option value="price-low-high">
                    <form action="../Php/order-by-low-to-high.php">
                        <button type="submit">Price: Low - High</button>
                    </form> 
                </option>
                <option value="price-high-low">
                    <form action="../Php/order-by-high-to-low.php">
                        <button type="submit">Price: High - Low</button>
                    </form>
                </option>                                        
            </select>
            <button onclick="showFilters()" class="button-filters" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">More Filters+</button>
            <div class="filters-ammenities-and-preferences">
                <div class="actual-filters">
                    <form action="" class="optional-ammenities">
                        <h4>Ammenities</h4>
                        
                        <input type="checkbox"  name="clean-water" id="clean-water">
                        <label for="clean-water"> Clean Tap Water/ Water Reserves (Tanks and/or Borehole)</label>
            
                        <h5>Electricity</h5>
                        <input type="checkbox" name="token" id="token">
                        <label for="token"> Individual Token</label>
                        <input type="checkbox" name="meter" id="meter">
                        <label for="meter"> Shared Meter</label>
            
                        <h5>Security</h5>
                        <input type="checkbox" name="security-guard" id="security-guard">
                        <label for="security-guard"> Security Guard</label>
                        <input type="checkbox" name="cctv" id="cctv">
                        <label for="cctv"> CCTV</label>
                        <input type="checkbox" name="security-lights" id="security-lights">
                        <label for="security-lights"> Security Lights</label>
            
                        <h5>Toilets</h5>
                        <input type="checkbox" name="pit-latrine" id="pit-latrine">
                        <label for="pit-latrine"> Communal Pit Latrine</label>
                        <input type="checkbox" name="automatic-toilet" id="automatic-toilet">
                        <label for="automatic-toilet"> Communal Automatic Toilets</label>
            
                        <h5>Cleaning</h5>
                        <input type="checkbox" name="garbage-collection" id="garbage-collection">
                        <label for="garbage-collection"> Garbage Collection</label>
                        <input type="checkbox" name="cleaner" id="cleaner">
                        <label for="cleaner"> Cleaner for the shared spaces (e.g toilets/ablution block)</label>
                        <input type="checkbox" name="sink" id="sink">
                        <label for="sink"> Sink</label>
            
                        <h5>Accessibility</h5>
                        <input type="checkbox" name="handicap-access" id="handicap-access">
                        <label for="handicap-access"></label>Handicap/ WheelChair Access</label>
                        <input type="checkbox" name="packing" id="packing">
                        <label for="packing"></label>Packing</label>
            
                        <h5> Finishing</h5>
                        <input type="checkbox" name="tiles" id="tiles">
                        <label for="tiles" class="tiles"> Tiles</label>
                        <input type="checkbox" class="ceiling" name="ceiling" id="ceiling">
                        <label for="ceiling"> Ceiling</label>
                        <input type="checkbox" name="balcony" id="balcony">
                        <label for="balcony"></label>Balcony</label>
            
                        <h5>luxury</h5>
                        <input type="checkbox" name="wi-fi" id="wi-fi">
                        <label for="wi-fi"> Wi-Fi</label>
                        <input type="checkbox" name="joint-tv-subscription" id="joint-tv-subscription">
                        <label for="joint-tv-subscription"> Joint TV Subscription</label>
                        <input type="checkbox"  name="air-conditioning" id="air-conditioning">
                        <label for="air-conditioning"></label>Air Conditioning</label>
                        <input type="checkbox" name="furnished" id="furnished">
                        <label for="furnished"></label>Furnished</label>
                        <input type="checkbox" name="swimming-pool" id="swimming-pool">
                        <label for="swimming-pool"></label>Swimming Pool</label>
                        <input type="checkbox" name="gym" id="gym">
                        <label for="gym"></label>Gym</label>
                    </form> 
            
                    <form action="" class="optional-preferences">
                        <h4>Preferred sorts of tenants</h4>
                            
                        <h5>Gender</h5>
                        <input type="radio" name="male" id="male">
                        <label for="male">Males</label>
                        <input type="radio" name="female" id="female">
                        <label for="female">Females</label>
                        <input type="radio" name="any-gender" id="any-gender">
                        <label for="any-gender">Any gender</label>
            
                        <h5>Students: </h5>
                        <input type="radio" name="no-students" id="no-students">
                        <label for="students">No Students</label>
                        <input type="radio" name="students-welcome" id="students-welcome">
                        <label for="students">Students Welcome</label>
            
                        <h5>Families that are welcome: </h5>                        
                        <input type="radio" name="no-children" id="no-children">
                        <label for="no-children">Without small childen</label>
                        <input type="radio" name="any-welcome" id="any-welcome">
                        <label for="any-welcome">Any Family</label>
            
                        <h5>Driving: </h5>
                        <input type="radio" name="having-vehicles" id="having-vehicles">
                        <label for="having-vehicles">Having Vehicles</label>
                        <input type="radio" name="not-having-vehicles" id="not-having-vehicles">
                        <label for="not-having-vehicles">Not having vehicles (No packing)</label>
            
                        <h5> Practicing members of:</h5>
                        <input type="checkbox" name="Christianity" id="christianity">
                        <label for="christianity">Christianity</label>
                        <input type="checkbox" name="islam" id="islam">
                        <label for="islam">Islam</label>
                        <input type="checkbox" name="hinduism" id="hinduism">
                        <label for="hinduism">Hinduism</label>
                        <input type="checkbox" name="any-religion" id="any-religion">
                        <label for="any-religion">Any Religion</label>
            
                    </form>
                </div>                
                <button onclick="hideFilters()" type="submit"> Filter </button>
            </div>                       
        </section>
        <main>
            <?php 
                for($i=0; $i<count($retrievedRentalID); $i++){
                    
                    $rentalImages = explode(", ", $retrievedImageUrls[$i]);
                    $imageToDisplay = $rentalImages[0];
                                
                    $finalFolder = "";

                    switch($retrievedRentalType[$i]) {
                        case "Business Premise":
                            $finalFolder = $retrievedRentalType[$i] . "s/" . $retrievedTypeOfBusinessBusiness[$i] . "/";
                            break;

                        case "Apartment":                                                    
                            if(($retrievednumberofapartmentbedrooms[$i] == 1) || ($retrievednumberofapartmentbedrooms[$i] == 2) || ($retrievednumberofapartmentbedrooms == 3)) {
                                $finalFolder = $retrievedRentalType[$i] . "s/" . $retrievednumberofapartmentbedrooms[$i]. "-Bedroom/";
                            } else {
                                $finalFolder = $retrievedRentalType[$i] . "s/More Bedrooms/" . $retrievednumberofapartmentbedrooms[$i]. "-Bedrooms/";
                            }                                                    
                            break;

                        case "House":
                            if(($retrievednumberofhousebedrooms[$i] == 1) || ($retrievednumberofhousebedrooms[$i] == 2) || ($retrievednumberofhousebedrooms[$i] == 3)) {
                                $finalFolder = $retrievedRentalType[$i] . "s/" . $retrievednumberofhousebedrooms[$i]. "-Bedroom/";
                            } else {
                                $finalFolder = $retrievedRentalType[$i] . "s/More Bedrooms/" . $retrievednumberofhousebedrooms[$i] . "-Bedrooms/";
                            }
                            break;
                        
                        default:
                            $finalFolder = $retrievedRentalType[$i] . "s/";
                    }

                    $rentalTerm = $retrievedRentalTerm[$i];
                    $termToDisplay = "";
                    switch($rentalTerm) {
                        case "daily":
                            $termToDisplay = "Day";
                            break;
                        case "weekly":
                            $termToDisplay = "Week";
                            break;
                        case "monthly":
                            $termToDisplay = "Month";
                            break;
                        case "yearly":
                            $termToDisplay = "Year";
                            break;
                        case "quarterly":
                            $termToDisplay = "3 Months";
                            break;
                        case "bi-annually":
                            $termToDisplay = "6 Months";
                            break;
                    }
                    echo'
                    <div class="template">
                        <div class="rental-div" id="rental-' . $i+1 . '" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="activateAnchor(event)">
                            <div class="image" id="image' . $i+1 . '">
                                <img src="../Image_Data/' . $finalFolder. $imageToDisplay. '" alt="Rental-' . $i+1 . '">              
                            </div>
                            <div class="description" id="description' . $i+1 . '">
                                <h3>Ksh. ' . $retrievedAmountOfRent[$i] . '</h3>
                                <h4>Per ' . $termToDisplay . '</h4>
                                <br>' .
                                '<h4>';  
                                if(($retrievedRentalType[$i] === "Hostel") || ($retrievedRentalType[$i] === "Bedsitter") || ($retrievedRentalType[$i] === "Single Room") || ($retrievedRentalType[$i] === "Suite")) {
                                    echo $retrievedRentalType[$i];
                                } else if (($retrievedRentalType[$i] === "Business Premise")) {
                                    echo $retrievedTypeOfBusinessBusiness[$i];
                                } else {
                                    if($retrievedRentalType[$i] === "Apartment") {
                                        echo $retrievedNumberOfApartmentBedrooms . '-Bedroom Apartment';
                                    } else {
                                        echo $retrievedNumberOfHouseBedrooms . '-Bedroom Apartment';
                                    }
                                }
                                echo '</h4>';
                            echo '<h4>Number Of Units Available: ' . $retrievedNumberOfSimilarUnits[$i] . '</h4>
                                <p> ' . $retrievedDescription[$i] . ' </p>
                                <form class="template-more-details" id="template-more-details-' . $i+1 . '" action="../Php/view-description-preparation.php" method="post" enctype="multipart/form-data"> 
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">More details</button>
                                    <input type="hidden" name="rental-type" value="' . $retrievedRentalType[$i] . '">
                                    <input type="hidden" name="rental-name" value="' . $retrievedrentalName[$i] . '">
                                    <input type="hidden" name="rental-location" value="' . $retrievedLocation[$i] . '">
                                    <input type="hidden" name="rental-google-location" value="' . $retrievedGoogleLocation[$i] . '">
                                    <input type="hidden" name="rental-photos" value="' . $retrievedImageUrls[$i] . '">
                                    <input type="hidden" name="rental-ammenities" value="' . $retrievedAmmenities[$i] . '">
                                    <input type="hidden" name="rental-units-available" value="' . $retrievedNumberOfSimilarUnits[$i] . '">
                                    <input type="hidden" name="rental-beds-per-suite" value="' . $retrievedNumberOfBedsPerSuite[$i] . '">
                                    <input type="hidden" name="rental-bedrooms-per-apartment" value="' . $retrievedNumberOfApartmentBedrooms[$i] . '">
                                    <input type="hidden" name="rental-bedrooms-per-house" value="' . $retrievedNumberOfHouseBedrooms[$i] . '">
                                    <input type="hidden" name="rental-business-premise-type" value="' . $retrievedTypeOfBusinessBusiness[$i] . '">
                                    <input type="hidden" name="rental-owners-phone-number" value="' . $retrievedOwnersPhoneNumber[$i] . '">
                                    <input type="hidden" name="rental-owners-email" value="' . $retrievedOwnersEmailAddress[$i] . '">
                                    <input type="hidden" name="rental-term" value="' . $retrievedRentalTerm[$i] . '">
                                    <input type="hidden" name="rental-amount-of-rent" value="' . $termToDisplay[$i] . '">
                                    <input type="hidden" name="rental-description" value="' . $retrievedDescription[$i] . '">
                                    <input type="hidden" name="rental-tenant-preferences" value="' . $retrievedPreferences[$i] . '">
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
            ?>            
        </main>
    </div>    
</body>
</html>