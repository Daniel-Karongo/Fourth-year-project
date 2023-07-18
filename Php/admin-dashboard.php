<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseSearchKE</title>
    <link href= "../Css/style-admin-dashboard.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600&family=PT+Sans&display=swap" rel="stylesheet">
    <script src="../Javascript/admin-dashboard.js"></script>
</head>
<body onload="textareaSizorbody()">
    <div class="container">
        <div class="nav">
            <div class="website">
                <h1>HouseSearchKE.com</h1>
            </div>
            <div class="admin">
                <h3><?php echo $adminFirst_Name . " " . $adminLast_Name;?></h3>
                <a class="sign-out-button" href="../Html/index.html" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Sign Out</a>
            </div>
        </div>
        <div class="control-panel">
            <button id="my-contact-information-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#my-contact-information-button', '.control-panel button', '.contact-information', '.property-owners-container, .rentals, .administrators, .queries', 'flex', 'row')">My Contact Information</button>

            <button id="property-owners-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#property-owners-button', '.control-panel button', '.property-owners-container', '.contact-information, .rentals, .administrators, .queries', 'flex', null)">Property Owners</button>

            <button id="rentals-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#rentals-button', '.control-panel button', '.rentals', '.contact-information, .property-owners-container, .administrators, .queries', 'flex', null)">Rentals</button>

            <button id="administrators-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#administrators-button', '.control-panel button', '.administrators', '.contact-information, .property-owners-container, .rentals, .queries', 'flex', null)">Administrators</button>

            <button id="queries-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#queries-button', '.control-panel button', '.queries', '.contact-information, .property-owners-container, .rentals, .administrators', 'flex', null)">Queries</button>
        </div>
        <div class="property-owners-container">
            <div class="top-property-owners-section">
                <?php
                    if (gettype($property_owners) !== "NULL") {
                        echo '
                        <div class="property-owners-table-and-print">
                            <form action="../Php/editPropertyOwnerDetailsFromAdmin.php" method="post" onsubmit="confirmPropertyOwnerEdit(event)" id="property-owners-table-form">
                                <table class="property-owners-table">
                                    <thead>
                                        <tr>
                                            <th colspan="8" id="property-owners-table-title">Property Owners</th>
                                        </tr>
                                        <tr>
                                            <th id="property-owners-table-column-heads">Phone Number</th>
                                            <th id="property-owners-table-column-heads">Email Address</th>
                                            <th id="property-owners-table-column-heads">Password</th>
                                            <th id="property-owners-table-column-heads">First Name</th>
                                            <th id="property-owners-table-column-heads">Last Name</th>
                                            <th id="property-owners-table-column-heads">Rentals Owned</th>
                                            <th id="property-owners-table-column-heads">Password Reset Confirmation Codes</th>
                                            <th id="property-owners-table-column-heads">Remember Me Tokens</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    for ($i = 0; $i < count($property_owners); $i++) {
                                        echo '
                                            <tr>
                                                <td><input type="text" onfocus="showInputInField(this)" name="phone-number" value="' . $property_owners[$i][0] . '" readonly></td>
                                                <td><input type="text" onfocus="showInputInField(this)" name="email-address" value="' . $property_owners[$i][1] . '" readonly></td>
                                                <td><input type="text" onfocus="showInputInField(this)" name="password" value="' . $property_owners[$i][2] . '" readonly></td>
                                                <td><input type="text" onfocus="showInputInField(this)" name="first-name" value="' . $property_owners[$i][3] . '" readonly></td>
                                                <td><input type="text" onfocus="showInputInField(this)" name="last-name" value="' . $property_owners[$i][4] . '" readonly></td>
                                                <td><input type="text" onfocus="showInputInField(this)" name="rentals-owned" value="' . $property_owners[$i][5] . '" readonly></td>
                                                <td><input type="text" onfocus="showInputInField(this)" name="password-reset-confirmation-code" value="' . $property_owners[$i][6] . '" readonly></td>
                                                <td><input type="text" onfocus="showInputInField(this)" name="remember-me-token" value="' . $property_owners[$i][7] . '" readonly></td>';
                                                if($property_owners[$i][5] != "") {
                                                    echo '
                                                    <td class="view-landlord-details" id="view-landlord-details-'.($i+1).'">
                                                        <button type="button" class="property-owners-table-view-extra-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="viewLandlordRentals(event)">
                                                            <img src="../Images/more-details.png" alt="submit details">
                                                        </button>
                                                    </td>
                                                    ';
                                                }
                                                echo'
                                                <td class="edit-details">
                                                    <button class="property-owners-table-edit-details-button" onclick="editDetails(event, \'.property-owners-table input[type=text]\', \'.property-owners-table .submit-details\', \'.property-owners-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                        <img src="../Images/edit.png" alt="edit-button">
                                                    </button>
                                                </td>
                                                <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                    <input type="hidden" name="original-phone-number" value="' . $property_owners[$i][0] . '" disabled>
                                                    <input type="hidden" name="original-email-address" value="' . $property_owners[$i][1] . '" disabled>
                                                    <input type="hidden" name="original-password" value="' . $property_owners[$i][2] . '" disabled>
                                                    <input type="hidden" name="original-first-name" value="' . $property_owners[$i][3] . '" disabled>
                                                    <input type="hidden" name="original-last-name" value="' . $property_owners[$i][4] . '" disabled>
                                                    <input type="hidden" name="original-rentals-owned" value="' . $property_owners[$i][5] . '" disabled>
                                                    <input type="hidden" name="original-password-reset-confirmation-code" value="' . $property_owners[$i][6] . '" disabled>
                                                    <input type="hidden" name="original-remember-me-token" value="' . $property_owners[$i][7] . '" disabled>
                                                    <input type="hidden" name="email" value="' . $email . '">
                                                    <input type="hidden" name="passwordField" value="' . $password . '">';

                                                    if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                    if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                    if(isset($propertyOwnersForEachRentals)){echo '<input type="hidden" name="property-owners-for-each-rental" value="' .htmlspecialchars(json_encode($propertyOwnersForEachRentals)) .'">';}


                                                    if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                    if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                    if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                    if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                    if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                    if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                    if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
                                                    

                                                echo '
                                                    <input type="hidden" name="email" value="' . $email . '">
                                                    <input type="hidden" name="passwordField" value="' . $password . '">
                                                    <input type="hidden" name="admin-first-name" value="' . $adminFirst_Name . '">
                                                    <input type="hidden" name="admin-last-name" value="' . $adminLast_Name . '">
                                                    <input type="hidden" name="admin-phone-number" value="' . $adminPhone_Number .'">

                                                    <td class="submit-details">
                                                        <button type="submit" class="property-owners-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/submit.png" alt="submit details">
                                                        </button>
                                                    </td>
                                                </td>
                                            </tr>';

                                            if($property_owners[$i][5] != "") {
                                            
                                            echo '<tr class="extra-landlord-details-of-rentals" id="extra-landlord-details-of-rentals-heading-'. ($i+1) .'">
                                                    <td colspan="11" class="rentals-table-title"> Rentals </th>
                                                </tr>
                                                <tr class="extra-landlord-details-of-rentals" id="extra-landlord-details-of-rentals-actual-'. ($i+1) .'">
                                                    <td class="rentals-table-column-heads">Rental Name</th>
                                                    <td class="rentals-table-column-heads">Rental Type</th>
                                                    <td class="rentals-table-column-heads">Type Of Premise</th>
                                                    <td class="rentals-table-column-heads">Location</th>
                                                    <td class="rentals-table-column-heads">Google Location</th>
                                                    <td class="rentals-table-column-heads">Ammenities</th>
                                                    <td class="rentals-table-column-heads">Preferences</th>
                                                    <td class="rentals-table-column-heads">Number Of Beds/ Bedrooms</th>
                                                    <td class="rentals-table-column-heads">Number Of Similar Units</th>
                                                    <td class="rentals-table-column-heads">Number Of Units Remaining</th>
                                                    <td class="rentals-table-column-heads">Interested Parties</th>
                                                </tr>';



                                                $rentalsOwned = array();
                                                $rentalsOwned = explode(", ", $property_owners[$i][5]);

                                                $tablenames = array();

                                                $retrieved_rentalID = array();
                                                $retrieved_rental_name = array();
                                                $rentalType = array();
                                                $retrieved_location = array();
                                                $retrieved_google_location = array();
                                                $retrieved_image_urls = array();
                                                $retrieved_rules_urls = array();
                                                $retrieved_ammenities = array();
                                                $retrieved_number_of_units = array();
                                                $retrieved_number_of_remaining_units = array();
                                                $retrieved_interested_parties = array();

                                                $apartments_retrieved_number_of_bedrooms = array();
                                                $business_premises_retrieved_type_of_premise = array();    
                                                $houses_retrieved_number_of_bedrooms = array();
                                                $suites_retrieved_number_of_beds = array();

                                                $retrieved_rental_term = array();
                                                $retrieved_amount_of_rent = array();
                                                $retrieved_description = array();
                                                $retrieved_tenant_preferences = array();

                                                $Hostel_retrieved_maximum_occupants = array();
                                                $Single_Room_retrieved_maximum_occupants = array();
                                                $Bedsitter_retrieved_maximum_occupants = array();
                                                $Suite_retrieved_maximum_occupants = array();

                                                $iteration = 0;
                                                
                                                foreach($rentalsOwned as $rentalID) {
                                                    $rentalIDComponents = explode("_", $rentalID);
                                                    $lastIndex = count($rentalIDComponents) - 1;
                                                    array_push($rentalType, $rentalIDComponents[$lastIndex]);
                                                    $tablename = '';
                                                    
                                                    switch($rentalType[$iteration]) {
                                                        case "Hostel":
                                                            $tablename = "hostels";
                                                            break;
                                                        case "Single Room":
                                                            $tablename = "single_rooms";
                                                            break;
                                                        case "Bedsitter":
                                                            $tablename = "bedsitters";
                                                            break;            
                                                        case "Apartment":
                                                            $tablename = "apartments";
                                                            break;
                                                        case "Business Premise":
                                                            $tablename = "business_premises";
                                                            break;
                                                        case "House":
                                                            $tablename = "houses";
                                                            break;
                                                        case "Suite":
                                                            $tablename = "suites";
                                                            break;
                                                    }
                                                    
                                                    $sqlquery = "SELECT * FROM $tablename WHERE Rental_ID = '$rentalID';";
                                                    $res = mysqli_query($connectionInitialisation, $sqlquery);

                                                    if($res) {
                                                        if (mysqli_num_rows($res) > 0) {

                                                            while ($table = mysqli_fetch_assoc($res)) {
                                                                array_push($retrieved_rentalID, $rentalID);
                                                                array_push($retrieved_rental_name, $table['Rental_Name']);
                                                                array_push($retrieved_location, $table['Location']);                    
                                                                array_push($retrieved_google_location, $table['Google_Location']);
                                                                array_push($retrieved_image_urls, $table['Image_Urls']);                    
                                                                array_push($retrieved_ammenities, $table['Ammenities']);
                                                                array_push($retrieved_number_of_units, $table['Number_Of_Similar_Units']);
                                                                array_push($retrieved_number_of_remaining_units, $table['Number_Of_Units_Remaining']);
                                                                array_push($retrieved_interested_parties, $table['Interested_Parties']);
                                                                
                                                                array_push($tablenames, $tablename);
                                                    
                                                                switch($tablename) {
                                                                    case "apartments":
                                                                        array_push($apartments_retrieved_number_of_bedrooms, $table['Number_Of_Bedrooms']);
                                                                        array_push($business_premises_retrieved_type_of_premise, null);
                                                                        array_push($houses_retrieved_number_of_bedrooms, null);
                                                                        array_push($suites_retrieved_number_of_beds, null);
                                                                        break;
                                                                    case "business_premises":
                                                                        array_push($business_premises_retrieved_type_of_premise, $table['Type_Of_Premise']);
                                                                        array_push($apartments_retrieved_number_of_bedrooms, null);
                                                                        array_push($houses_retrieved_number_of_bedrooms, null);
                                                                        array_push($suites_retrieved_number_of_beds, null);
                                                                        break;
                                                                    case "houses":
                                                                        array_push($houses_retrieved_number_of_bedrooms, $table['Number_Of_Bedrooms']);
                                                                        array_push($apartments_retrieved_number_of_bedrooms, null);
                                                                        array_push($business_premises_retrieved_type_of_premise, null);
                                                                        array_push($suites_retrieved_number_of_beds, null);
                                                                        break;
                                                                    case "suites":
                                                                        array_push($suites_retrieved_number_of_beds, $table['Number_Of_Beds_Per_Suite']);
                                                                        array_push($apartments_retrieved_number_of_bedrooms, null);
                                                                        array_push($business_premises_retrieved_type_of_premise, null);
                                                                        array_push($houses_retrieved_number_of_bedrooms, null);
                                                                        break;
                                                                    default:
                                                                        array_push($suites_retrieved_number_of_beds, null);
                                                                        array_push($apartments_retrieved_number_of_bedrooms, null);
                                                                        array_push($business_premises_retrieved_type_of_premise, null);
                                                                        array_push($houses_retrieved_number_of_bedrooms, null);
                                                                        break;
                                                                }
                                                            }
                                                
                                                        }
                                                    }
                                                    
                                                    $sqlquery = "SELECT * FROM properties_owners_details WHERE Rental_ID = '$rentalID';";
                                                    $res = mysqli_query($connectionInitialisation, $sqlquery);

                                                    if($res) {
                                                        if (mysqli_num_rows($res) > 0) {

                                                            while ($table = mysqli_fetch_assoc($res)) {
                                                                array_push($retrieved_rental_term, $table['Rental_Term']);
                                                                array_push($retrieved_amount_of_rent, $table['Amount_of_Rent']);                    
                                                                array_push($retrieved_description, $table['Pitching']);
                                                                array_push($retrieved_tenant_preferences, $table['Preferred_Sorts_of_Applicants']);
                                                                array_push($retrieved_rules_urls, $table['Rules_Urls']);
                                                                
                                                                switch($rentalType[$iteration]) {
                                                                    case "Hostel":
                                                                        array_push($Hostel_retrieved_maximum_occupants, $table['Maximum_Number_Of_Occupants']);
                                                                        array_push($Single_Room_retrieved_maximum_occupants, null);
                                                                        array_push($Bedsitter_retrieved_maximum_occupants, null);
                                                                        array_push($Suite_retrieved_maximum_occupants, null);
                                                                        break;
                                                                    case "Single Room":
                                                                        array_push($Single_Room_retrieved_maximum_occupants, $table['Maximum_Number_Of_Occupants']);
                                                                        array_push($Hostel_retrieved_maximum_occupants, null);
                                                                        array_push($Bedsitter_retrieved_maximum_occupants, null);
                                                                        array_push($Suite_retrieved_maximum_occupants, null);
                                                                        break;
                                                                    case "Bedsitter":
                                                                        array_push($Bedsitter_retrieved_maximum_occupants, $table['Maximum_Number_Of_Occupants']);
                                                                        array_push($Hostel_retrieved_maximum_occupants, null);
                                                                        array_push($Single_Room_retrieved_maximum_occupants, null);
                                                                        array_push($Suite_retrieved_maximum_occupants, null);
                                                                        break;
                                                                    case "Suite":
                                                                        array_push($Suite_retrieved_maximum_occupants, $table['Maximum_Number_Of_Occupants']);
                                                                        array_push($Hostel_retrieved_maximum_occupants, null);
                                                                        array_push($Single_Room_retrieved_maximum_occupants, null);
                                                                        array_push($Bedsitter_retrieved_maximum_occupants, null);
                                                                        break;
                                                                    default:
                                                                        array_push($Suite_retrieved_maximum_occupants, null);
                                                                        array_push($Hostel_retrieved_maximum_occupants, null);
                                                                        array_push($Single_Room_retrieved_maximum_occupants, null);
                                                                        array_push($Bedsitter_retrieved_maximum_occupants, null);
                                                                        break;
                                                                }                    
                                                            }
                                                
                                                        } 
                                                    }
                                                    $iteration++; 
                                                }

                                                for($j=0; $j<count($rentalsOwned); $j++) {

                                                    // Ammenities

                                                    $outputAmmenities="";

                                                    if(!empty($retrieved_ammenities[$j])) {
                                                        $individualAmmenities = explode(", ", $retrieved_ammenities[$j]);
        
                                                        $individualAmmenitiesRefined = array();

                                                        for($k=0; $k<count($individualAmmenities); $k++) {
                                                            $individualAmmenitiesRefined[$k] = explode(": ", $individualAmmenities[$k]);
                                                            unset($individualAmmenitiesRefined[$k][0]);
                                                            if(!empty($individualAmmenitiesRefined[$k])) {
                                                                $individualAmmenitiesRefined[$k] = $individualAmmenitiesRefined[$k][1];
                                                            }                    
                                                        }
                                                        $outputAmmenities = implode(", ", $individualAmmenitiesRefined);
                                                    } 
                                                    
                                                    // Preferences

                                                    $outputPreferences="";

                                                    if(!empty($retrieved_tenant_preferences[$j])) {
                                                        $individualPreferences = explode(", ", $retrieved_tenant_preferences[$j]);
        
                                                        $individualPreferencesRefined = array();

                                                        for($k=0; $k<count($individualPreferences); $k++) {
                                                            $individualPreferencesRefined[$k] = explode(": ", $individualPreferences[$k]);
                                                            unset($individualPreferencesRefined[$k][0]);
                                                            if(!empty($individualPreferencesRefined[$k])) {
                                                                $individualPreferencesRefined[$k] = $individualPreferencesRefined[$k][1];
                                                            }                    
                                                        }
                                                        $outputPreferences = implode(", ", $individualPreferencesRefined);
                                                    }
                                                
                                                echo'
                                                    <tr class="extra-landlord-details-of-rentals" id="extra-landlord-details-of-rentals-actual-'. ($i+1) .'">
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-rental-name" name="name" value="'.$retrieved_rental_name[$j].'"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-rental-type" name="type" value="'.$rentalType[$j].'"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-premise-type" name="" value="'.$business_premises_retrieved_type_of_premise[$j].'"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-location" name="location" value="'.$retrieved_location[$j].'"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-google-location" name="google-location" value="'.$retrieved_google_location[$j].'"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-ammenities" name="ammenities" value="'.$outputAmmenities.'"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-preferences" name="preferences" value="'.$outputPreferences.'"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-bedrooms" name="bedrooms" value="';
                                                        switch($rentalType[$j]) {
                                                            case "Apartment":
                                                                echo $apartments_retrieved_number_of_bedrooms[$j];
                                                                break;
                                                            case "House":
                                                                echo $houses_retrieved_number_of_bedrooms[$j];
                                                                break;
                                                            case "Suite":
                                                                echo $suites_retrieved_number_of_beds[$j];
                                                                break;
                                                            default:
                                                            echo "";
                                                        }
                                                        echo '"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-units" name="units" value="'.$retrieved_number_of_units[$j].'"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-units-remaining" name="remaining-units" value="'.$retrieved_number_of_remaining_units[$j].'"></td>
                                                        <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-parties" name="interested-parties" value="'.$retrieved_interested_parties[$j].'"></td>
                                                    </tr>'; 
                                                    }
                                            }
                                    }
                        echo '
                                    </tbody>
                                </table>
                            </form>
                              
                            <div class="view-input-div">
                                <input type="text" id="view-input-details-clearly" readonly> 
                            </div>

                            <form class="print-property-owners-table" action="../Php/table-pdf.php" method="post">
                                <input type="hidden" name="property-owners" value="' . htmlspecialchars(json_encode($property_owners)) . '">
                                <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                            </form>
                        </div>';

                        echo '
                        <div class="password-hasher-form-div">
                            <form class="password-hasher" action="../Php/password-hasher.php" method="post">
                                <div class="password-hasher-title">
                                    <h4>Password Hasher</h4>
                                </div>
                                <div class="password-input">
                                    <label for="password-to-hash-property-owner">Password</label>
                                    <input type="text" oninput="textareaSizor(\'#hashed-password-return-property-owner\', \'#password-to-hash-property-owner\')" name="password-to-hash" id="password-to-hash-property-owner"';
                        if (isset($newPassword)) {
                            echo 'value="' . $newPassword . '">';
                        } else {
                            echo '>';
                        }
                        echo '
                                </div>
                                <div class="hashed-password">
                                    <label for="">Hashed Password</label>
                                    <input type="text" name="hashed-password-return" id="hashed-password-return-property-owner"';
                        if (isset($hashedPassword)) {
                            echo 'value="' . $hashedPassword . '">';
                        } else {
                            echo 'disabled>';
                        }
                        echo '
                                </div>
                                <div class="hash-button">';

                                    if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                    if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                    if(isset($propertyOwnersForEachRentals)){echo '<input type="hidden" name="property-owners-for-each-rental" value="' .htmlspecialchars(json_encode($propertyOwnersForEachRentals)) .'">';}

                                    if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                    if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                    if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                    if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                    if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                    if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                    if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}

                            echo '

                                    <input type="hidden" name="email" value="' . $email . '">
                                    <input type="hidden" name="passwordField" value="' . $password . '">
                                    <input type="hidden" name="admin-first-name" value="' . $adminFirst_Name . '">
                                    <input type="hidden" name="admin-last-name" value="' . $adminLast_Name . '">
                                    <input type="hidden" name="admin-phone-number" value="' . $adminPhone_Number .'">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Hash Password</button>
                                </div>
                            </form>
                        </div>';

                    } else {
                        echo "<h3>No One Has Registered As A Property Owner</h3>";
                    }
                ?>
            </div>
            <div class="add-new-property-owner">
                <form id="add-new-property-owner-form" action="../Php/add-new-property-owner.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event, 'add-new-property-owner-form', '#add-new-property-owner-form')">
                    <div class="add-new-property-owner-title">
                        <h4>Add A New Property Owner</h4>
                    </div>
                    
                    <div class="first-name">
                        <label for="new-property-owner-first-name">First Name:</label>
                        <input type="text" id="new-property-owner-first-name" name="new-property-owner-first-name" onblur="validateField('new-property-owner-first-name', 'Please Specify The New Admin\'s First Name', null, 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password')">
                        <div class="error"></div>
                    </div>
                    <div class="last-name">
                        <label for="new-property-owner-last-name">Last Name:</label>
                        <input type="text" id="new-property-owner-last-name" name="new-property-owner-last-name" onblur="validateField('new-property-owner-last-name', 'Please Specify The New Admin\'s Last Name', null, 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password')">
                        <div class="error"></div>
                    </div>

                    <div class="phone-number">
                        <label for="new-property-owner-phone">Phone Number:</label>
                        <input type="number" id="new-property-owner-phone" name="new-property-owner-phone" onblur="validatePhoneNumber('submit', 'new-property-owner-phone', 'Please Enter A Phone Number That Will Be Associated With The New Admin\'s Account')">
                        <div class="error"></div>
                    </div>
                    
                    <div class="email">
                        <label for="new-property-owner-email">Email Address:</label>
                        <input type="text" id="new-property-owner-email" name="new-property-owner-email" onblur="validateField('new-property-owner-email', 'Please Specify An Email that will be Associated With The New Admin\'s Rentals', null, 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password')">
                        <div class="error"></div>
                    </div>

                    <div class="password">
                        <label for="new-property-owner-password">Password:</label>
                        <input type="password" id="new-property-owner-password" name="new-property-owner-password" onblur="validateField('new-property-owner-password', 'Please Enter A Password To Secure The New Admin\'s Account', null, 'new-property-owner-first-name', 'new-property-owner-last-name', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-email', 'new-property-owner-password', 'new-property-owner-password', 'new-property-owner-password')" placeholder="Un-encrypted Password">
                        <div class="error"></div>
                    </div>

                    <div class="show-pass">
                        <input type="checkbox" id="new-property-owner-show-pass" tabindex="0" onclick="toggleShowPassword('new-property-owner-show-pass', 'new-property-owner-password')">
                        <label for="new-property-owner-show-pass">Show Password</label>
                    </div>
                    
                    <input type="hidden" name="retrieved-admin-first-name" value="<?php echo $adminFirst_Name;?>">
                    <input type="hidden" name="retrieved-admin-last-name" value="<?php echo $adminLast_Name;?>">
                    <input type="hidden" name="retrieved-email" value="<?php echo $email;?>">
                    <input type="hidden" name="retrieved-phone-number" value="<?php echo $adminPhone_Number;?>">
                    <input type="hidden" name="retrieved-password" value="<?php echo $password;?>">
                    <input type="hidden" name="passwordField" value="<?php echo $password;?>">

                    <?php if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}?>
                    <?php if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}?>
                    <?php if(isset($propertyOwnersForEachRentals)){echo '<input type="hidden" name="property-owners-for-each-rental" value="' .htmlspecialchars(json_encode($propertyOwnersForEachRentals)) .'">';} ?>

                    <?php if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}?>
                    <?php if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}?>
                    <?php if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}?>
                    <?php if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}?>
                    <?php if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}?>
                    <?php if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}?>
                    <?php if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}?>

                    <div class="add-new-property-owner-confirm-button">
                        <button type="submit" tabindex="0" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Confirm Details</button>
                    </div>                       
                </form> 
            </div>
        </div>
        <div class="rentals">
            <div class="rental-buttons">
                <button id="hostels-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#hostels-button', '.rental-buttons button', '.hostels', '.single-rooms, .bedsitters, .apartments, .houses, .business-premises, .suites', 'flex', null)">Hostels</button>

                <button id="single-rooms-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#single-rooms-button', '.rental-buttons button', '.single-rooms', '.hostels, .bedsitters, .apartments, .houses, .business-premises, .suites', 'flex', null)">Single Rooms</button>

                <button id="bedsitters-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#bedsitters-button', '.rental-buttons button', '.bedsitters', '.hostels, .single-rooms, .apartments, .houses, .business-premises, .suites', 'flex', null)">Bedsitters</button>

                <button id="apartments-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#apartments-button', '.rental-buttons button', '.apartments', '.hostels, .single-rooms, .bedsitters, .houses, .business-premises, .suites', 'flex', null)">Apartments</button>

                <button id="houses-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#houses-button', '.rental-buttons button', '.houses', '.hostels, .single-rooms, .bedsitters, .apartments, .business-premises, .suites', 'flex', null)">Houses</button>

                <button id="business-premises-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#business-premises-button', '.rental-buttons button', '.business-premises', '.hostels, .single-rooms, .bedsitters, .apartments, .houses, .suites', 'flex', null)">Business Premises</button>

                <button id="suites-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="toViewAndHide('#suites-button', '.rental-buttons button', '.suites', '.hostels, .single-rooms, .bedsitters, .apartments, .houses, .business-premises', 'flex', null)">Suites</button>
            </div>
            <div class="actual-rentals">
                <div class="hostels">
                    <?php
                        if (gettype($hostels) !== "NULL") {
                            echo '
                            <div class="hostels-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="hostels-table">
                                        <thead>
                                            <tr>
                                                <th colspan="7" id="hostels-table-title">Hostels</th>
                                            </tr>
                                            <tr>
                                                <th id="hostels-table-column-heads">Rental ID</th>
                                                <th id="hostels-table-column-heads">Rental Name</th>
                                                <th id="hostels-table-column-heads">Location</th>
                                                <th id="hostels-table-column-heads">Google Location</th>
                                                <th id="hostels-table-column-heads">Image Urls</th>
                                                <th id="hostels-table-column-heads">Ammenities</th>
                                                <th id="hostels-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($hostels); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $hostels[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $hostels[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $hostels[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $hostels[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $hostels[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $hostels[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $hostels[$i][6] . '" disabled></td>
                                                    <td class="view-owner-details" id="view-hostel-owner-details-'. ($i+1) .'">
                                                        <button class="hostels-view-owner-details-button" onclick="viewOwnerDetails(event, \'hostel\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/more-details.png" alt="more-details-button">
                                                        </button>
                                                    </td>
                                                </tr>';

                                                $rentalId = $hostels[$i][0];
                                                
                                                $ownerPhoneNumber = "";
                                                $ownerEmail = "";
                                                $ownerFirstName = "";
                                                $ownerLastName = "";
                                                
                                                for($j=0; $j < count($propertyOwnersForEachRentals); $j++) {
                                                    if($rentalId === $propertyOwnersForEachRentals[$j][0]) {
                                                        $ownerPhoneNumber = $propertyOwnersForEachRentals[$j][1];
                                                        $ownerEmail = $propertyOwnersForEachRentals[$j][2];

                                                        $rentalTerm = $propertyOwnersForEachRentals[$j][3];
                                                        $rentAmount = $propertyOwnersForEachRentals[$j][4];
                                                        $preferences = $propertyOwnersForEachRentals[$j][6];
                                                        $maximumOcupants = $propertyOwnersForEachRentals[$j][7];
                                                    }
                                                }

                                                for($j=0; $j < count($property_owners); $j++) {
                                                    if(($property_owners[$j][0] == $ownerPhoneNumber) && ($property_owners[$j][1] == $ownerEmail)) {
                                                        $ownerFirstName = $property_owners[$j][3];
                                                        $ownerLastName = $property_owners[$j][4];
                                                    }
                                                }

                                            echo'<tr class="extra-details rental-details" id="hostel-extra-details-heading-'. ($i+1) .'">
                                                    <th colspan="1">Rental Term</th>
                                                    <th colspan="1">Rent</th>
                                                    <th colspan="3">Preferences</th>
                                                    <th colspan="1">Maximum Number Of Occupants</th>
                                                </tr>
                                                <tr class="extra-details rental-details" id="hostel-extra-details-'. ($i+1) .'">
                                                    <td colspan="1"><input type="text" value="' . $rentalTerm . '" disabled></td>
                                                    <td colspan="1"><input type="text" value="' . $rentAmount . '" disabled></td>
                                                    <td colspan="3"><input type="text" value="' . $preferences . '" disabled></td>
                                                    <td colspan="1"><input type="text" value="' . $maximumOcupants . '" disabled></td>
                                                </tr>
                                                <tr class="extra-details owner-details" id="hostel-owner-heading-'. ($i+1) .'">
                                                    <th colspan="2" id="property-owners-table-column-heads">Phone Number</th>
                                                    <th colspan="2" id="property-owners-table-column-heads">Email Address</th>
                                                    <th id="property-owners-table-column-heads">First Name</th>
                                                    <th id="property-owners-table-column-heads">Last Name</th>
                                                </tr>
                                                <tr class="extra-details owner-details" id="hostel-owner-details-'. ($i+1) .'">
                                                    <td colspan="2"><input type="text" value="' . $ownerPhoneNumber . '" disabled></td>
                                                    <td colspan="2"><input type="text" value="' . $ownerEmail . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerFirstName . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerLastName . '" disabled></td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-hostels-table" action="../Php/hostels-table-pdf.php" method="post">
                                    <input type="hidden" name="hostels" value="' . htmlspecialchars(json_encode($hostels)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No Hostels Have Been Registered</h3>";
                        }
                    ?>
                </div>
                <div class="single-rooms">
                    <?php
                        if (gettype($singlerooms) !== "NULL") {
                            echo '
                            <div class="single-rooms-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="single-rooms-table">
                                        <thead>
                                            <tr>
                                                <th colspan="7" id="single-rooms-table-title">Single Rooms</th>
                                            </tr>
                                            <tr>
                                                <th id="single-rooms-table-column-heads">Rental ID</th>
                                                <th id="single-rooms-table-column-heads">Rental Name</th>
                                                <th id="single-rooms-table-column-heads">Location</th>
                                                <th id="single-rooms-table-column-heads">Google Location</th>
                                                <th id="single-rooms-table-column-heads">Image Urls</th>
                                                <th id="single-rooms-table-column-heads">Ammenities</th>
                                                <th id="single-rooms-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($singlerooms); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $singlerooms[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $singlerooms[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $singlerooms[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $singlerooms[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $singlerooms[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $singlerooms[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $singlerooms[$i][6] . '" disabled></td>
                                                    <td class="view-owner-details" id="view-single-room-owner-details-'. ($i+1) .'">
                                                        <button class="single-rooms-view-owner-details-button" onclick="viewOwnerDetails(event, \'single\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/more-details.png" alt="more-details-button">
                                                        </button>
                                                    </td>
                                                </tr>';
                                                $rentalId = $singlerooms[$i][0];
                                                
                                                $ownerPhoneNumber = "";
                                                $ownerEmail = "";
                                                $ownerFirstName = "";
                                                $ownerLastName = "";
                                                
                                                for($j=0; $j < count($propertyOwnersForEachRentals); $j++) {
                                                    if($rentalId === $propertyOwnersForEachRentals[$j][0]) {
                                                        $ownerPhoneNumber = $propertyOwnersForEachRentals[$j][1];
                                                        $ownerEmail = $propertyOwnersForEachRentals[$j][2];

                                                        $rentalTerm = $propertyOwnersForEachRentals[$j][3];
                                                        $rentAmount = $propertyOwnersForEachRentals[$j][4];
                                                        $preferences = $propertyOwnersForEachRentals[$j][6];
                                                        $maximumOcupants = $propertyOwnersForEachRentals[$j][7];
                                                    }
                                                }

                                                for($j=0; $j < count($property_owners); $j++) {
                                                    if(($property_owners[$j][0] == $ownerPhoneNumber) && ($property_owners[$j][1] == $ownerEmail)) {
                                                        $ownerFirstName = $property_owners[$j][3];
                                                        $ownerLastName = $property_owners[$j][4];
                                                    }
                                                }

                                            echo'<tr class="extra-details rental-details" id="single-room-extra-details-heading-'. ($i+1) .'">
                                                    <th colspan="1">Rental Term</th>
                                                    <th colspan="1">Rent</th>
                                                    <th colspan="3">Preferences</th>
                                                    <th colspan="1">Maximum Number Of Occupants</th>
                                                </tr>
                                                <tr class="extra-details rental-details" id="single-room-extra-details-'. ($i+1) .'">
                                                    <td colspan="1"><input type="text" value="' . $rentalTerm . '" disabled></td>
                                                    <td colspan="1"><input type="text" value="' . $rentAmount . '" disabled></td>
                                                    <td colspan="3"><input type="text" value="' . $preferences . '" disabled></td>
                                                    <td colspan="1"><input type="text" value="' . $maximumOcupants . '" disabled></td>
                                                </tr>
                                                <tr class="extra-details owner-details" id="single-room-owner-heading-'. ($i+1) .'">
                                                    <th colspan="2" id="property-owners-table-column-heads">Phone Number</th>
                                                    <th colspan="2" id="property-owners-table-column-heads">Email Address</th>
                                                    <th id="property-owners-table-column-heads">First Name</th>
                                                    <th id="property-owners-table-column-heads">Last Name</th>
                                                </tr>
                                                <tr class="extra-details owner-details" id="single-room-owner-details-'. ($i+1) .'">
                                                    <td colspan="2"><input type="text" value="' . $ownerPhoneNumber . '" disabled></td>
                                                    <td colspan="2"><input type="text" value="' . $ownerEmail . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerFirstName . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerLastName . '" disabled></td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-single-rooms-table" action="../Php/single-rooms-table-pdf.php" method="post">
                                    <input type="hidden" name="single-rooms" value="' . htmlspecialchars(json_encode($singlerooms)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No Single Rooms Have Been Registered</h3>";
                        }
                    ?>
                </div>
                <div class="bedsitters">
                    <?php
                        if (gettype($bedsitters) !== "NULL") {
                            echo '
                            <div class="bedsitters-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="bedsitters-table">
                                        <thead>
                                            <tr>
                                                <th colspan="7" id="bedsitters-table-title">Bedsitters</th>
                                            </tr>
                                            <tr>
                                                <th id="bedsitters-table-column-heads">Rental ID</th>
                                                <th id="bedsitters-table-column-heads">Rental Name</th>
                                                <th id="bedsitters-table-column-heads">Location</th>
                                                <th id="bedsitters-table-column-heads">Google Location</th>
                                                <th id="bedsitters-table-column-heads">Image Urls</th>
                                                <th id="bedsitters-table-column-heads">Ammenities</th>
                                                <th id="bedsitters-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($bedsitters); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $bedsitters[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $bedsitters[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $bedsitters[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $bedsitters[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $bedsitters[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $bedsitters[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $bedsitters[$i][6] . '" disabled></td>
                                                    <td class="view-owner-details" id="view-bedsitter-owner-details-'. ($i+1) .'">
                                                        <button class="bedsitters-view-owner-details-button" onclick="viewOwnerDetails(event, \'bedsitter\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/more-details.png" alt="more-details-button">
                                                        </button>
                                                    </td>
                                                </tr>';
                                                $rentalId = $bedsitters[$i][0];
                                                
                                                $ownerPhoneNumber = "";
                                                $ownerEmail = "";
                                                $ownerFirstName = "";
                                                $ownerLastName = "";
                                                
                                                for($j=0; $j < count($propertyOwnersForEachRentals); $j++) {
                                                    if($rentalId === $propertyOwnersForEachRentals[$j][0]) {
                                                        $ownerPhoneNumber = $propertyOwnersForEachRentals[$j][1];
                                                        $ownerEmail = $propertyOwnersForEachRentals[$j][2];

                                                        $rentalTerm = $propertyOwnersForEachRentals[$j][3];
                                                        $rentAmount = $propertyOwnersForEachRentals[$j][4];
                                                        $preferences = $propertyOwnersForEachRentals[$j][6];
                                                        $maximumOcupants = $propertyOwnersForEachRentals[$j][7];
                                                    }
                                                }

                                                for($j=0; $j < count($property_owners); $j++) {
                                                    if(($property_owners[$j][0] == $ownerPhoneNumber) && ($property_owners[$j][1] == $ownerEmail)) {
                                                        $ownerFirstName = $property_owners[$j][3];
                                                        $ownerLastName = $property_owners[$j][4];
                                                    }
                                                }

                                            echo'<tr class="extra-details rental-details" id="bedsitter-extra-details-heading-'. ($i+1) .'">
                                                    <th colspan="1">Rental Term</th>
                                                    <th colspan="1">Rent</th>
                                                    <th colspan="3">Preferences</th>
                                                    <th colspan="1">Maximum Number Of Occupants</th>
                                                </tr>
                                                <tr class="extra-details rental-details" id="bedsitter-extra-details-'. ($i+1) .'">
                                                    <td colspan="1"><input type="text" value="' . $rentalTerm . '" disabled></td>
                                                    <td colspan="1"><input type="text" value="' . $rentAmount . '" disabled></td>
                                                    <td colspan="3"><input type="text" value="' . $preferences . '" disabled></td>
                                                    <td colspan="1"><input type="text" value="' . $maximumOcupants . '" disabled></td>
                                                </tr>
                                                <tr class="extra-details owner-details" id="bedsitter-owner-heading-'. ($i+1) .'">
                                                    <th colspan="2" id="property-owners-table-column-heads">Phone Number</th>
                                                    <th colspan="2" id="property-owners-table-column-heads">Email Address</th>
                                                    <th id="property-owners-table-column-heads">First Name</th>
                                                    <th id="property-owners-table-column-heads">Last Name</th>
                                                </tr>
                                                <tr class="extra-details owner-details" id="bedsitter-owner-details-'. ($i+1) .'">
                                                    <td colspan="2"><input type="text" value="' . $ownerPhoneNumber . '" disabled></td>
                                                    <td colspan="2"><input type="text" value="' . $ownerEmail . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerFirstName . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerLastName . '" disabled></td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-bedsitters-table" action="../Php/bedsitters-table-pdf.php" method="post">
                                    <input type="hidden" name="bedsitters" value="' . htmlspecialchars(json_encode($bedsitters)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No Beditters Have Been Registered</h3>";
                        }
                    ?>
                </div>
                <div class="apartments">
                    <?php
                        if (gettype($apartments) !== "NULL") {
                            echo '
                            <div class="apartments-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="apartments-table">
                                        <thead>
                                            <tr>
                                                <th colspan="8" id="apartments-table-title">Apartments</th>
                                            </tr>
                                            <tr>
                                                <th id="apartments-table-column-heads">Rental ID</th>
                                                <th id="apartments-table-column-heads">Rental Name</th>
                                                <th id="apartments-table-column-heads">Location</th>
                                                <th id="apartments-table-column-heads">Google Location</th>
                                                <th id="apartments-table-column-heads">Image Urls</th>
                                                <th id="apartments-table-column-heads">Ammenities</th>
                                                <th id="apartments-table-column-heads">Number Of Bedrooms</th>
                                                <th id="apartments-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($apartments); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $apartments[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $apartments[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $apartments[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $apartments[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $apartments[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $apartments[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-bedrooms" value="' . $apartments[$i][6] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $apartments[$i][7] . '" disabled></td>
                                                    <td class="view-owner-details" id="view-apartment-owner-details-'. ($i+1) .'">
                                                        <button class="apartments-view-owner-details-button" onclick="viewOwnerDetails(event, \'apartment\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/more-details.png" alt="more-details-button">
                                                        </button>
                                                    </td>
                                                </tr>';
                                                $rentalId = $apartments[$i][0];
                                                
                                                $ownerPhoneNumber = "";
                                                $ownerEmail = "";
                                                $ownerFirstName = "";
                                                $ownerLastName = "";
                                                
                                                for($j=0; $j < count($propertyOwnersForEachRentals); $j++) {
                                                    if($rentalId === $propertyOwnersForEachRentals[$j][0]) {
                                                        $ownerPhoneNumber = $propertyOwnersForEachRentals[$j][1];
                                                        $ownerEmail = $propertyOwnersForEachRentals[$j][2];

                                                        $rentalTerm = $propertyOwnersForEachRentals[$j][3];
                                                        $rentAmount = $propertyOwnersForEachRentals[$j][4];
                                                        $preferences = $propertyOwnersForEachRentals[$j][6];
                                                    }
                                                }

                                                for($j=0; $j < count($property_owners); $j++) {
                                                    if(($property_owners[$j][0] == $ownerPhoneNumber) && ($property_owners[$j][1] == $ownerEmail)) {
                                                        $ownerFirstName = $property_owners[$j][3];
                                                        $ownerLastName = $property_owners[$j][4];
                                                    }
                                                }

                                            echo'<tr class="extra-details rental-details" id="apartment-extra-details-heading-'. ($i+1) .'">
                                                    <th colspan="1" id="property-owners-table-column-heads">Rental Term</th>
                                                    <th colspan="1" id="property-owners-table-column-heads">Rent</th>
                                                    <th colspan="3" id="property-owners-table-column-heads">Preferences</th>
                                                </tr>
                                                <tr class="extra-details rental-details" id="apartment-extra-details-'. ($i+1) .'">
                                                    <td colspan="1"><input type="text" value="' . $rentalTerm . '" disabled></td>
                                                    <td colspan="1"><input type="text" value="' . $rentAmount . '" disabled></td>
                                                    <td colspan="3"><input type="text" value="' . $preferences . '" disabled></td>
                                                </tr>
                                                <tr class="extra-details owner-details" id="apartment-owner-heading-'. ($i+1) .'">
                                                    <th colspan="2" id="property-owners-table-column-heads">Phone Number</th>
                                                    <th colspan="2" id="property-owners-table-column-heads">Email Address</th>
                                                    <th id="property-owners-table-column-heads">First Name</th>
                                                    <th id="property-owners-table-column-heads">Last Name</th>
                                                </tr>
                                                <tr class="extra-details owner-details" id="apartment-owner-details-'. ($i+1) .'">
                                                    <td colspan="2"><input type="text" value="' . $ownerPhoneNumber . '" disabled></td>
                                                    <td colspan="2"><input type="text" value="' . $ownerEmail . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerFirstName . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerLastName . '" disabled></td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-apartments-table" action="../Php/apartments-table-pdf.php" method="post">
                                    <input type="hidden" name="apartments" value="' . htmlspecialchars(json_encode($apartments)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No Apartments Have Been Registered</h3>";
                        }
                    ?>
                </div>
                <div class="houses">
                    <?php
                        if (gettype($houses) !== "NULL") {
                            echo '
                            <div class="houses-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="houses-table">
                                        <thead>
                                            <tr>
                                                <th colspan="8" id="houses-table-title">Houses</th>
                                            </tr>
                                            <tr>
                                                <th id="houses-table-column-heads">Rental ID</th>
                                                <th id="houses-table-column-heads">Rental Name</th>
                                                <th id="houses-table-column-heads">Location</th>
                                                <th id="houses-table-column-heads">Google Location</th>
                                                <th id="houses-table-column-heads">Image Urls</th>
                                                <th id="houses-table-column-heads">Ammenities</th>
                                                <th id="houses-table-column-heads">Number Of Bedrooms</th>
                                                <th id="houses-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($houses); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $houses[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $houses[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $houses[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $houses[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $houses[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $houses[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-bedrooms" value="' . $houses[$i][6] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $houses[$i][7] . '" disabled></td>
                                                    <td class="view-owner-details" id="view-house-owner-details-'. ($i+1) .'">
                                                        <button class="houses-view-owner-details-button" onclick="viewOwnerDetails(event, \'house\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/more-details.png" alt="more-details-button">
                                                        </button>
                                                    </td>
                                                </tr>';
                                                $rentalId = $houses[$i][0];
                                                
                                                $ownerPhoneNumber = "";
                                                $ownerEmail = "";
                                                $ownerFirstName = "";
                                                $ownerLastName = "";
                                                
                                                for($j=0; $j < count($propertyOwnersForEachRentals); $j++) {
                                                    if($rentalId === $propertyOwnersForEachRentals[$j][0]) {
                                                        $ownerPhoneNumber = $propertyOwnersForEachRentals[$j][1];
                                                        $ownerEmail = $propertyOwnersForEachRentals[$j][2];

                                                        $rentalTerm = $propertyOwnersForEachRentals[$j][3];
                                                        $rentAmount = $propertyOwnersForEachRentals[$j][4];
                                                        $preferences = $propertyOwnersForEachRentals[$j][6];
                                                    }
                                                }

                                                for($j=0; $j < count($property_owners); $j++) {
                                                    if(($property_owners[$j][0] == $ownerPhoneNumber) && ($property_owners[$j][1] == $ownerEmail)) {
                                                        $ownerFirstName = $property_owners[$j][3];
                                                        $ownerLastName = $property_owners[$j][4];
                                                    }
                                                }

                                            echo'<tr class="extra-details rental-details" id="house-extra-details-heading-'. ($i+1) .'">
                                                    <th colspan="1" id="property-owners-table-column-heads">Rental Term</th>
                                                    <th colspan="1" id="property-owners-table-column-heads">Rent</th>
                                                    <th colspan="3" id="property-owners-table-column-heads">Preferences</th>
                                                </tr>
                                                <tr class="extra-details rental-details" id="house-extra-details-'. ($i+1) .'">
                                                    <td colspan="1"><input type="text" value="' . $rentalTerm . '" disabled></td>
                                                    <td colspan="1"><input type="text" value="' . $rentAmount . '" disabled></td>
                                                    <td colspan="3"><input type="text" value="' . $preferences . '" disabled></td>
                                                </tr>
                                                <tr class="extra-details owner-details" id="house-owner-heading-'. ($i+1) .'">
                                                    <th colspan="2" id="property-owners-table-column-heads">Phone Number</th>
                                                    <th colspan="2" id="property-owners-table-column-heads">Email Address</th>
                                                    <th id="property-owners-table-column-heads">First Name</th>
                                                    <th id="property-owners-table-column-heads">Last Name</th>
                                                </tr>
                                                <tr class="extra-details owner-details" id="house-owner-details-'. ($i+1) .'">
                                                    <td colspan="2"><input type="text" value="' . $ownerPhoneNumber . '" disabled></td>
                                                    <td colspan="2"><input type="text" value="' . $ownerEmail . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerFirstName . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerLastName . '" disabled></td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-houses-table" action="../Php/houses-table-pdf.php" method="post">
                                    <input type="hidden" name="houses" value="' . htmlspecialchars(json_encode($houses)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No Houses Have Been Registered</h3>";
                        }
                    ?>
                </div>
                <div class="business-premises">
                    <?php
                        if (gettype($businesspremises) !== "NULL") {
                            echo '
                            <div class="business-premises-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="business-premises-table">
                                        <thead>
                                            <tr>
                                                <th colspan="8" id="business-premises-table-title">Business Premises</th>
                                            </tr>
                                            <tr>
                                                <th id="business-premises-table-column-heads">Rental ID</th>
                                                <th id="business-premises-table-column-heads">Rental Name</th>
                                                <th id="business-premises-table-column-heads">Type_Of_Premise</th>
                                                <th id="business-premises-table-column-heads">Location</th>
                                                <th id="business-premises-table-column-heads">Google Location</th>
                                                <th id="business-premises-table-column-heads">Image Urls</th>
                                                <th id="business-premises-table-column-heads">Ammenities</th>
                                                <th id="business-premises-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($businesspremises); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $businesspremises[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $businesspremises[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="type-of-premise" value="' . $businesspremises[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $businesspremises[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $businesspremises[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $businesspremises[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $businesspremises[$i][6] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $businesspremises[$i][7] . '" disabled></td>
                                                    <td class="view-owner-details" id="view-business-premise-owner-details-'. ($i+1) .'">
                                                        <button class="business-premises-view-owner-details-button" onclick="viewOwnerDetails(event, \'business\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/more-details.png" alt="more-details-button">
                                                        </button>
                                                    </td>
                                                </tr>';
                                                $rentalId = $businesspremises[$i][0];
                                                
                                                $ownerPhoneNumber = "";
                                                $ownerEmail = "";
                                                $ownerFirstName = "";
                                                $ownerLastName = "";
                                                
                                                for($j=0; $j < count($propertyOwnersForEachRentals); $j++) {
                                                    if($rentalId === $propertyOwnersForEachRentals[$j][0]) {
                                                        $ownerPhoneNumber = $propertyOwnersForEachRentals[$j][1];
                                                        $ownerEmail = $propertyOwnersForEachRentals[$j][2];

                                                        $rentalTerm = $propertyOwnersForEachRentals[$j][3];
                                                        $rentAmount = $propertyOwnersForEachRentals[$j][4];
                                                        $preferences = $propertyOwnersForEachRentals[$j][6];
                                                    }
                                                }

                                                for($j=0; $j < count($property_owners); $j++) {
                                                    if(($property_owners[$j][0] == $ownerPhoneNumber) && ($property_owners[$j][1] == $ownerEmail)) {
                                                        $ownerFirstName = $property_owners[$j][3];
                                                        $ownerLastName = $property_owners[$j][4];
                                                    }
                                                }

                                            echo'<tr class="extra-details rental-details" id="business-premise-extra-details-heading-'. ($i+1) .'">
                                                    <th colspan="1" id="property-owners-table-column-heads">Rental Term</th>
                                                    <th colspan="1" id="property-owners-table-column-heads">Rent</th>
                                                    <th colspan="3" id="property-owners-table-column-heads">Preferences</th>
                                                </tr>
                                                <tr class="extra-details rental-details" id="business-premise-extra-details-'. ($i+1) .'">
                                                    <td colspan="1" id="property-owners-table-column-heads"><input type="text" value="' . $rentalTerm . '" disabled></td>
                                                    <td colspan="1" id="property-owners-table-column-heads"><input type="text" value="' . $rentAmount . '" disabled></td>
                                                    <td colspan="3" id="property-owners-table-column-heads"><input type="text" value="' . $preferences . '" disabled></td>
                                                </tr>
                                                <tr class="extra-details owner-details" id="business-premise-owner-heading-'. ($i+1) .'">
                                                    <th colspan="2" id="property-owners-table-column-heads">Phone Number</th>
                                                    <th colspan="2" id="property-owners-table-column-heads">Email Address</th>
                                                    <th id="property-owners-table-column-heads">First Name</th>
                                                    <th id="property-owners-table-column-heads">Last Name</th>
                                                </tr>
                                                <tr class="extra-details owner-details" id="business-premise-owner-details-'. ($i+1) .'">
                                                    <td colspan="2"><input type="text" value="' . $ownerPhoneNumber . '" disabled></td>
                                                    <td colspan="2"><input type="text" value="' . $ownerEmail . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerFirstName . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerLastName . '" disabled></td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-business-premises-table" action="../Php/business-premises-table-pdf.php" method="post">
                                    <input type="hidden" name="business-premises" value="' . htmlspecialchars(json_encode($businesspremises)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No Business Premises Have Been Registered</h3>";
                        }
                    ?>
                </div>
                <div class="suites">
                    <?php
                        if (gettype($suites) !== "NULL") {
                            echo '
                            <div class="suites-table-and-print">
                                <form action="" method="post" onsubmit="confirmAdministratorEdit(event)">
                                    <table class="suites-table">
                                        <thead>
                                            <tr>
                                                <th colspan="8" id="suites-table-title">Suites</th>
                                            </tr>
                                            <tr>
                                                <th id="suites-table-column-heads">Rental ID</th>
                                                <th id="suites-table-column-heads">Rental Name</th>
                                                <th id="suites-table-column-heads">Location</th>
                                                <th id="suites-table-column-heads">Google Location</th>
                                                <th id="suites-table-column-heads">Image Urls</th>
                                                <th id="suites-table-column-heads">Ammenities</th>
                                                <th id="suites-table-column-heads">Number Of Beds</th>
                                                <th id="suites-table-column-heads">Number Of Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        for ($i = 0; $i < count($suites); $i++) {
                                            echo '
                                                <tr>
                                                    <td><input type="text" name="rental-id" value="' . $suites[$i][0] . '" disabled></td>
                                                    <td><input type="text" name="rental-name" value="' . $suites[$i][1] . '" disabled></td>
                                                    <td><input type="text" name="location" value="' . $suites[$i][2] . '" disabled></td>
                                                    <td><input type="text" name="google-location" value="' . $suites[$i][3] . '" disabled></td>
                                                    <td><input type="text" name="image-urls" value="' . $suites[$i][4] . '" disabled></td>
                                                    <td><input type="text" name="ammenities" value="' . $suites[$i][5] . '" disabled></td>
                                                    <td><input type="text" name="number-of-beds" value="' . $suites[$i][6] . '" disabled></td>
                                                    <td><input type="text" name="number-of-units" value="' . $suites[$i][7] . '" disabled></td>
                                                    <td class="view-owner-details" id="view-suite-owner-details-'. ($i+1) .'">
                                                        <button class="suites-view-owner-details-button" onclick="viewOwnerDetails(event, \'suite\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/more-details.png" alt="more-details-button">
                                                        </button>
                                                    </td>
                                                </tr>';
                                                $rentalId = $businesspremises[$i][0];
                                                
                                                $ownerPhoneNumber = "";
                                                $ownerEmail = "";
                                                $ownerFirstName = "";
                                                $ownerLastName = "";
                                                
                                                for($j=0; $j < count($propertyOwnersForEachRentals); $j++) {
                                                    if($rentalId === $propertyOwnersForEachRentals[$j][0]) {
                                                        $ownerPhoneNumber = $propertyOwnersForEachRentals[$j][1];
                                                        $ownerEmail = $propertyOwnersForEachRentals[$j][2];

                                                        $rentalTerm = $propertyOwnersForEachRentals[$j][3];
                                                        $rentAmount = $propertyOwnersForEachRentals[$j][4];
                                                        $preferences = $propertyOwnersForEachRentals[$j][6];
                                                    }
                                                }

                                                for($j=0; $j < count($property_owners); $j++) {
                                                    if(($property_owners[$j][0] == $ownerPhoneNumber) && ($property_owners[$j][1] == $ownerEmail)) {
                                                        $ownerFirstName = $property_owners[$j][3];
                                                        $ownerLastName = $property_owners[$j][4];
                                                    }
                                                }

                                            echo'<tr class="extra-details rental-details" id="suite-extra-details-heading-'. ($i+1) .'">
                                                    <th colspan="1" id="property-owners-table-column-heads">Rental Term</th>
                                                    <th colspan="1" id="property-owners-table-column-heads">Rent</th>
                                                    <th colspan="3" id="property-owners-table-column-heads">Preferences</th>
                                                </tr>
                                                <tr class="extra-details rental-details" id="suite-extra-details-'. ($i+1) .'">
                                                    <td colspan="1" id="property-owners-table-column-heads"><input type="text" value="' . $rentalTerm . '" disabled></td>
                                                    <td colspan="1" id="property-owners-table-column-heads"><input type="text" value="' . $rentAmount . '" disabled></td>
                                                    <td colspan="3" id="property-owners-table-column-heads"><input type="text" value="' . $preferences . '" disabled></td>
                                                </tr>
                                                <tr class="extra-details owner-details" id="suite-owner-heading-'. ($i+1) .'">
                                                    <th colspan="2" id="property-owners-table-column-heads">Phone Number</th>
                                                    <th colspan="2" id="property-owners-table-column-heads">Email Address</th>
                                                    <th id="property-owners-table-column-heads">First Name</th>
                                                    <th id="property-owners-table-column-heads">Last Name</th>
                                                </tr>
                                                <tr class="extra-details owner-details" id="suite-owner-details-'. ($i+1) .'">
                                                    <td colspan="2"><input type="text" value="' . $ownerPhoneNumber . '" disabled></td>
                                                    <td colspan="2"><input type="text" value="' . $ownerEmail . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerFirstName . '" disabled></td>
                                                    <td><input type="text" value="' . $ownerLastName . '" disabled></td>
                                                </tr>';
                                        }
                            echo '
                                        </tbody>
                                    </table>
                                </form>

                            
                                <form class="print-suites-table" action="../Php/suites-table-pdf.php" method="post">
                                    <input type="hidden" name="suites" value="' . htmlspecialchars(json_encode($suites)) . '">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>
                            </div>';
                        } else {
                            echo "<h3>No Suites Have Been Registered</h3>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="administrators">
            <div class="top-administrators-section">
                <?php
                    if (gettype($administrators) !== "NULL") {
                        echo '
                        <div class="admins-table-and-print">
                            <form action="../Php/editAdministratorDetailsFromAdmin.php" method="post" onsubmit="confirmAdministratorEdit(event)">
                                <table class="administrators-table">
                                    <thead>
                                        <tr>
                                            <th colspan="7" id="administrators-table-title">Administrators</th>
                                        </tr>
                                        <tr>
                                            <th id="administrators-table-column-heads">Phone Number</th>
                                            <th id="administrators-table-column-heads">Email Address</th>
                                            <th id="administrators-table-column-heads">Password</th>
                                            <th id="administrators-table-column-heads">First Name</th>
                                            <th id="administrators-table-column-heads">Last Name</th>
                                            <th id="administrators-table-column-heads">Password Reset Confirmation Codes</th>
                                            <th id="administrators-table-column-heads">Remember Me Tokens</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    for ($i = 0; $i < count($administrators); $i++) {
                                        echo '
                                            <tr>
                                                <td><input type="text" name="phone-number" value="' . $administrators[$i][0] . '" disabled></td>
                                                <td><input type="text" name="email-address" value="' . $administrators[$i][1] . '" disabled></td>
                                                <td><input type="text" name="password" value="' . $administrators[$i][2] . '" disabled></td>
                                                <td><input type="text" name="first-name" value="' . $administrators[$i][3] . '" disabled></td>
                                                <td><input type="text" name="last-name" value="' . $administrators[$i][4] . '" disabled></td>
                                                <td><input type="text" name="password-reset-confirmation-code" value="' . $administrators[$i][5] . '" disabled></td>
                                                <td><input type="text" name="remember-me-token" value="' . $administrators[$i][6] . '" disabled></td>
                                                <td class="edit-details">
                                                    <button class="administrators-table-edit-details-button" onclick="editDetails(event, \'.administrators-table input[type=text]\', \'.administrators-table .submit-details\', \'.administrators-table .edit-details\')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                        <img src="../Images/edit.png" alt="edit-button">
                                                    </button>
                                                </td>
                                                <td class="submit-details" id="submit-details-' . ($i + 1) . '">
                                                    <input type="hidden" name="original-phone-number" value="' . $administrators[$i][0] . '" disabled>
                                                    <input type="hidden" name="original-email-address" value="' . $administrators[$i][1] . '" disabled>
                                                    <input type="hidden" name="original-password" value="' . $administrators[$i][2] . '" disabled>
                                                    <input type="hidden" name="original-first-name" value="' . $administrators[$i][3] . '" disabled>
                                                    <input type="hidden" name="original-last-name" value="' . $administrators[$i][4] . '" disabled>
                                                    <input type="hidden" name="original-password-reset-confirmation-code" value="' . $administrators[$i][5] . '" disabled>
                                                    <input type="hidden" name="original-remember-me-token" value="' . $administrators[$i][6] . '" disabled>
                                                    <input type="hidden" name="email" value="' . $email . '">
                                                    <input type="hidden" name="passwordField" value="' . $password . '">';

                                                    if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                                    if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                                    if(isset($propertyOwnersForEachRentals)){echo '<input type="hidden" name="property-owners-for-each-rental" value="' .htmlspecialchars(json_encode($propertyOwnersForEachRentals)) .'">';}

                                                    if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                                    if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                                    if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                                    if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                                    if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                                    if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                                    if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}

                                                echo '
                                                    <input type="hidden" name="email" value="' . $email . '">
                                                    <input type="hidden" name="passwordField" value="' . $password . '">
                                                    <input type="hidden" name="admin-first-name" value="' . $adminFirst_Name . '">
                                                    <input type="hidden" name="admin-last-name" value="' . $adminLast_Name . '">
                                                    <input type="hidden" name="admin-phone-number" value="' . $adminPhone_Number .'">
                                                    
                                                    <td class="submit-details">
                                                        <button type="submit" class="administrators-table-submit-details-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                                            <img src="../Images/submit.png" alt="submit details">
                                                        </button>
                                                    </td>
                                                </td>
                                            </tr>';
                                    }
                        echo '
                                    </tbody>
                                </table>
                            </form>

                        
                            <form class="print-administrators-table" action="../Php/administrators-table-pdf.php" method="post">
                                <input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) . '">
                                <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                            </form>
                        </div>';
                            
                        echo '
                        <div class="password-hasher-form-div">
                            <form class="password-hasher" action="../Php/password-hasher.php" method="post">
                                <div class="password-hasher-title">
                                    <h4>Password Hasher</h4>
                                </div>
                                <div class="password-input">
                                    <label for="password-to-hash-admin">Password</label>
                                    <input type="text" id="password-to-hash-admin" oninput="textareaSizor(\'#hashed-password-return-admin\', \'#password-to-hash-admin\')" name="password-to-hash"';
                        if (isset($newPassword)) {
                            echo 'value="' . $newPassword . '">';
                        } else {
                            echo '>';
                        }
                        echo '
                                </div>
                                <div class="hashed-password">
                                    <label for="">Hashed Password</label>
                                    <input type="text" name="hashed-password-return" id="hashed-password-return-admin"';
                        if (isset($hashedPassword)) {
                            echo 'value="' . $hashedPassword . '">';
                        } else {
                            echo 'disabled>';
                        }
                        echo '
                                </div>
                                <div class="hash-button">';
                                    if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                    if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                    if(isset($propertyOwnersForEachRentals)){echo '<input type="hidden" name="property-owners-for-each-rental" value="' .htmlspecialchars(json_encode($propertyOwnersForEachRentals)) .'">';}

                                    if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                    if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                    if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                    if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                    if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                    if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                    if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
                                echo '

                                    <input type="hidden" name="email" value="' . $email . '">
                                    <input type="hidden" name="passwordField" value="' . $password . '">
                                    <input type="hidden" name="admin-first-name" value="' . $adminFirst_Name . '">
                                    <input type="hidden" name="admin-last-name" value="' . $adminLast_Name . '">
                                    <input type="hidden" name="admin-phone-number" value="' . $adminPhone_Number .'">
                                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Hash Password</button>
                                </div>
                            </form>
                        </div>';

                    } else {
                        echo "<h3>No One Has Been Registered As An Administrator</h3>";
                    }
                ?>
            </div>
            <div class="add-new-admin">
                <form id="add-new-admin-form" action="../Php/add-new-admin.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event, 'add-new-admin-form', '#add-new-admin-form')">
                    <div class="add-new-admin-title">
                        <h4>Add A New Administrator</h4>
                    </div>
                    
                    <div class="first-name">
                        <label for="new-admin-first-name">First Name:</label>
                        <input type="text" id="new-admin-first-name" name="admin-first-name" onblur="validateField('new-admin-first-name', 'Please Specify The New Admin\'s First Name', null, 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password')">
                        <div class="error"></div>
                    </div>
                    <div class="last-name">
                        <label for="new-admin-last-name">Last Name:</label>
                        <input type="text" id="new-admin-last-name" name="admin-last-name" onblur="validateField('new-admin-last-name', 'Please Specify The New Admin\'s Last Name', null, 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password')">
                        <div class="error"></div>
                    </div>

                    <div class="phone-number">
                        <label for="new-admin-phone">Phone Number:</label>
                        <input type="number" id="new-admin-phone" name="admin-phone-number" onblur="validatePhoneNumber('submit', 'new-admin-phone', 'Please Enter A Phone Number That Will Be Associated With The New Admin\'s Account')">
                        <div class="error"></div>
                    </div>
                    
                    <div class="email">
                        <label for="new-admin-email">Email Address:</label>
                        <input type="text" id="new-admin-email" name="admin-modified-email" onblur="validateField('new-admin-email', 'Please Specify An Email that will be Associated With The New Admin\'s Rentals', null, 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password')">
                        <div class="error"></div>
                    </div>

                    <div class="password">
                        <label for="new-admin-password">Password:</label>
                        <input type="password" id="new-admin-password" name="admin-password" onblur="validateField('new-admin-password', 'Please Enter A Password To Secure The New Admin\'s Account', null, 'new-admin-first-name', 'new-admin-last-name', 'new-admin-email', 'new-admin-email', 'new-admin-email', 'new-admin-password', 'new-admin-password', 'new-admin-password')" placeholder="Un-encrypted Password">
                        <div class="error"></div>
                    </div>

                    <div class="show-pass">
                        <input type="checkbox" id="new-admin-show-pass" tabindex="0" onclick="toggleShowPassword('new-admin-show-pass', 'new-admin-password')">
                        <label for="new-admin-show-pass">Show Password</label>
                    </div>
                    
                    <input type="hidden" name="retrieved-email" value="<?php echo $email;?>">
                    <input type="hidden" name="retrieved-phone-number" value="<?php echo $adminPhone_Number;?>">
                    <input type="hidden" name="retrieved-password" value="<?php echo $password;?>">
                    <input type="hidden" name="passwordField" value="<?php echo $password;?>">
                    
                    <?php if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}?>
                    <?php if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}?>
                    <?php if(isset($propertyOwnersForEachRentals)){echo '<input type="hidden" name="property-owners-for-each-rental" value="' .htmlspecialchars(json_encode($propertyOwnersForEachRentals)) .'">';} ?>

                    <?php if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}?>
                    <?php if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}?>
                    <?php if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}?>
                    <?php if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}?>
                    <?php if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}?>
                    <?php if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}?>
                    <?php if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}?>

                    <input type="hidden" name="retrieved-admin-first-name" value="<?php echo $adminFirst_Name;?>">
                    <input type="hidden" name="retrieved-admin-last-name" value="<?php echo $adminLast_Name;?>">

                    <div class="add-new-admin-confirm-button">
                        <button type="submit" tabindex="0" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Confirm Details</button>
                    </div>                       
                </form> 
            </div>
        </div>
        <div class="contact-information">
            <div class="contact-information-account-operations">
                <div class="delete-admin-account-div">
                    <form id="delete-admin-account" action="../Php/delete-admin.php" method="post" onsubmit="confirmAdminDelete(event)">
                        <input type="hidden" name="admin-phone-number" value="<?php echo $adminPhone_Number;?>">
                        <input type="hidden" name="admin-modified-email" value="<?php echo $email;?>">

                        <button type="submit">Delete Account</button>
                    </form>
                </div>
                <?php 
                    if(isset($adminPasswordRememberMeToken) && ($adminPasswordRememberMeToken != "")) {
                        echo '
                            <div class="forget-admin-account-div">
                                <form id="forget-admin-account" action="../Php/forget-admin-account.php" method="post" onsubmit="confirmAdminForget(event)">
                                    <input type="hidden" name="admin-phone-number" value="'. $adminPhone_Number .'">
                                    <input type="hidden" name="admin-modified-email" value="'.$email.'">
                                    <input type="hidden" name="admin-first-name" value="'.$adminFirst_Name.'">
                                    <input type="hidden" name="admin-last-name" value="'.$adminLast_Name.'">
                                    <input type="hidden" name="admin-password" value="'.$password.'">
                                    ';
                                                
                                    if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}
                                    if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}
                                    if(isset($propertyOwnersForEachRentals)){echo '<input type="hidden" name="property-owners-for-each-rental" value="' .htmlspecialchars(json_encode($propertyOwnersForEachRentals)) .'">';}
            
                                    if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}
                                    if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}
                                    if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}
                                    if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}
                                    if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}
                                    if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}
                                    if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}
            
                                echo'<button type="submit">Undo "Remember Me"</button>
                                </form>
                            </div>
                        ';
                    }
                ?>
            </div>
            <div class="contact-information-form-div">
                <form id="contact-information-form" action="../Php/edit-admins-details.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event, 'contact-information-form', '#contact-information-form')">
                
                    <div class="first-name">
                        <label for="first-name">First Name:</label>
                        <input type="text" id="first-name" name="admin-first-name" value="<?php echo $adminFirst_Name;?>"  onblur="validateField('first-name', 'Please Specify Your First Name', null, 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password')" disabled>
                        <div class="error"></div>
                    </div>
                    <div class="last-name">
                        <label for="last-name">Last Name:</label>
                        <input type="text" id="last-name" name="admin-last-name" value="<?php echo $adminLast_Name;?>"  onblur="validateField('last-name', 'Please Specify Your Last Name', null, 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password')" disabled>
                        <div class="error"></div>
                    </div>

                    <div class="phone-number">
                        <label for="phone">Phone Number:</label>
                        <input type="number" id="phone" name="admin-phone-number" value="<?php echo $adminPhone_Number;?>"  onblur="validatePhoneNumber(null, 'phone', 'Please Enter A Phone Number That Will Be Associated With Your Account')" disabled>
                        <div class="error"></div>
                    </div>
                    
                    <div class="email">
                        <label for="email">Email Address:</label>
                        <input type="text" id="email" name="admin-modified-email" value="<?php echo $email;?>"  onblur="validateField('email', 'Please Specify An Email that will be Associated With Your Rentals', null, 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password')" disabled>
                        <div class="error"></div>
                    </div>

                    <div class="password">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="admin-password" value="<?php echo $password;?>"  onblur="validateField('password', 'Please Enter A Password To Secure Your Account', null, 'first-name', 'last-name', 'email', 'email', 'email', 'password', 'password', 'password')" disabled>
                        <div class="error"></div>
                    </div>

                    <input type="hidden" name="retrieved-email" value="<?php echo $email;?>">
                    <input type="hidden" name="retrieved-phone-number" value="<?php echo $adminPhone_Number;?>">

                    <input type="checkbox" id="show-pass" tabindex="0" onclick="toggleShowPassword('show-pass', 'password')">
                    <label for="show-pass">Show Password</label>

                    <div class="edit-details">
                        <button type="button" tabindex="0" onclick="toggleEnabled()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Edit Details</button>
                    </div>

                    <?php if(isset($administrators)){echo '<input type="hidden" name="administrators" value="' . htmlspecialchars(json_encode($administrators)) .'">';}?>
                    <?php if(isset($property_owners)){echo '<input type="hidden" name="property-owners" value="' .htmlspecialchars(json_encode($property_owners)) .'">';}?>
                    <?php if(isset($propertyOwnersForEachRentals)){echo '<input type="hidden" name="property-owners-for-each-rental" value="' .htmlspecialchars(json_encode($propertyOwnersForEachRentals)) .'">';} ?>

                    <?php if(isset($hostels)){echo '<input type="hidden" name="hostels" value="' .htmlspecialchars(json_encode($hostels)) .'">';}?>
                    <?php if(isset($singlerooms)){echo '<input type="hidden" name="single-rooms" value="' .htmlspecialchars(json_encode($singlerooms)) .'">';}?>
                    <?php if(isset($bedsitters)){echo '<input type="hidden" name="bedsitters" value="' .htmlspecialchars(json_encode($bedsitters)) .'">';}?>
                    <?php if(isset($apartments)){echo '<input type="hidden" name="apartments" value="' .htmlspecialchars(json_encode($apartments)) .'">';}?>
                    <?php if(isset($houses)){echo '<input type="hidden" name="houses" value="' .htmlspecialchars(json_encode($houses)) .'">';}?>
                    <?php if(isset($businesspremises)){echo '<input type="hidden" name="business-premises" value="' .htmlspecialchars(json_encode($businesspremises)) .'">';}?>
                    <?php if(isset($suites)){echo '<input type="hidden" name="suites" value="' .htmlspecialchars(json_encode($suites)) .'">';}?>

                    <input type="hidden" name="passwordField" value="<?php echo $password;?>">
                    <input type="hidden" name="administrators" value="<?php echo htmlspecialchars(json_encode($administrators)); ?>">
                    <input type="hidden" name="property-owners" value="<?php echo htmlspecialchars(json_encode($property_owners)); ?>">
                    <input type="hidden" name="retrieved-admin-first-name" value="<?php echo $adminFirst_Name; ?>">
                    <input type="hidden" name="retrieved-admin-last-name" value="<?php echo $adminLast_Name; ?>">
                    
                    
                    <div class="confirm-button">
                        <button type="submit" tabindex="0" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Confirm Details</button>
                    </div>                       
                </form> 
            </div>
        </div>
    </div>
</body>
</html>