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
<body onload="textareaSizor()" onresize="textareaSizor()">
    <div class="container">
        <nav>
            <h3><?php echo $retrieved_first_name . " " . $retrieved_last_name;?></h3>
            <a class="sign-out-button" href="../Html/index.html" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Sign Out</a>
        </nav>
        <div class="main-body">
            <div class="buttons">
                <a href="../Php/uploadPreparation.php?
                    first-name=<?php echo $retrieved_first_name; ?>&
                    last-name=<?php echo $retrieved_last_name; ?>&
                    email=<?php echo $email; ?>&
                    phone_number=<?php echo $retrieved_phone_number; ?>&
                    password=<?php echo $password; ?>&
                    rentals_owned=<?php echo $retrieved_rentals_owned; ?>" class="button-link" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="highlightClicked(this)">Advertise a new Rental</a>
                <form action="../Php/landlord-account-deleter.php" method="post" onsubmit="verifyDeleteAccount(event)" id="account-deleter">
                    <input type="hidden" name="email" value="<?php echo $email;?>">
                    <input type="hidden" name="phone-number" value="<?php echo $retrieved_phone_number;?>">
                    <button type="submit" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="highlightClicked(this)">Delete Account</button>
                </form>
            </div>
            <div class="panel">
                <div class="panel-buttons">
                    <button onclick="wrapperFunction('.my-rentals', '.contact-information, .parties-interested-div', null, '#rentals-button')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" id="rentals-button"> My Rentals</button>
                    <button onclick="wrapperFunction('.contact-information', '.my-rentals, .parties-interested-div', null, '#contacts-button')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" id="contacts-button"> My Contact Information</button>
                    <button onclick="wrapperFunction('.parties-interested-div', '.my-rentals, .contact-information', null, '#parties-interested-button')" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" id="parties-interested-button">View Interested Parties</button>
                </div>                
                <div class="my-rentals">
                    <div class="view-buttons">
                        <button onclick="viewDefaultView()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" id="default-view-button">Default View</button>
                        <button onclick="viewTableView()" id="table-view-button" onmouseleave="unzoomDiv(this)" id="table-view-button">Table View</button>
                    </div>
                    <div class="normal-view">
                        <?php 
                            if(($res) && (mysqli_num_rows($res) > 0)) {
                                
                                $uniqueLocations = array_values(array_unique($retrieved_location));
                                echo '
                                    <div class="filters">
                                        <h4>Filter By:</h4>
                                        <select class="type-of-rental" id="type-of-rental" name="type-of-rental" onchange="filterRentalsToBeDisplayedByType()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="highlightClicked(this)">
                                            <option value="no-value" selected>Type Of Rental</option>
                                            <option value="Hostel">Hostel</option>
                                            <option value="Single Room">Single Room</option>
                                            <option value="Bedsitter">Bedsitter</option>
                                            <option value="Apartment">Apartment</option>
                                            <option value="Business Premise">Business Premise</option>
                                            <option value="House">House</option> 
                                            <option value="Suite">Suite/ Motel</option>
                                        </select>
                                        <select class="propects" id="prospects" name="prospects" onchange="filterRentalsToBeDisplayedByProspects()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="highlightClicked(this)">
                                            <option value="no-value" selected>Prospects</option>
                                            <option value="showing-prospects">Showing Prospects</option>
                                            <option value="no-prospects">Not Interested In Yet</option>
                                        </select>
                                        <select class="location-filter" id="location-filter" name="location-filter" onchange="filterRentalsToBeDisplayedByLocation()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="highlightClicked(this)">
                                            <option value="no-value" selected>Location</option>';
                                        foreach($uniqueLocations as $uniqueLocation) {
                                            echo '<option value="'. $uniqueLocation .'">'. ucwords($uniqueLocation) .'</option>';
                                        }
                                        echo '</select>
                                    </div>';
                                
                                for($i=0; $i<count($rentalsOwned); $i++) {
                                                                        
                                    $imageUrlsComponents = explode(", ", $retrieved_image_urls[$i]);
                                    $imageToDisplay = $imageUrlsComponents[0];
                                    
                                    $finalFolder = "";

                                    switch($rentalType[$i]) {
                                        case "Business Premise":
                                            $finalFolder = $rentalType[$i] . "s/" . $business_premises_retrieved_type_of_premise[$i] . "/";
                                            break;

                                        case "Apartment":                                                    
                                            if(($apartments_retrieved_number_of_bedrooms[$i] == 1) || ($apartments_retrieved_number_of_bedrooms[$i] == 2) || ($apartments_retrieved_number_of_bedrooms[$i] == 3)) {
                                                $finalFolder = $rentalType[$i] . "s/" . $apartments_retrieved_number_of_bedrooms[$i]. "-Bedroom/";
                                            } else {
                                                $finalFolder = $rentalType[$i] . "s/More Bedrooms/" . $apartments_retrieved_number_of_bedrooms[$i]. "-Bedrooms/";
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
                                    '   <div class="rental-template" id="rental-template-' . ($i+1) . '" ondblclick="activateAnchor(event)" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">
                                            <h4 class="rental-tally">'.($i + 1).'</h4>
                                            <div class="title">
                                                <h3>' . $retrieved_rental_name[$i] . '</h3>' .
                                            '</div>' .
                                            '<div class="main-section">' . 
                                                '<div class="top-section">' .
                                                    '<div class="image-div">'.
                                                        '<img src="../Image_Data/' . $finalFolder . $imageToDisplay . '" ' . 'alt="Rental-' . ($i + 1) . '">' .
                                                    '</div>' .

                                                    '<div class="payment">' .
                                                        '<h4 class="amount">Ksh.' . $retrieved_amount_of_rent[$i] . '</h4>' .
                                                        '<h5 class="rental-term">Per ' . $termDisplay . '</h5>' .
                                                    '</div>' .
                                                '</div>' .
                                                '<div class="bottom-section">' .
                                                    '<div class="rental-details">' .
                                                        '<div class="rental-type-div">' .
                                                            '<label for="rental-template-rental-type-' . ($i+1) .'">Type Of Rental: </label>' .
                                                            '<input type="text" name="rental-template-rental-type-' . ($i+1) .'" id="rental-template-rental-type-' . ($i+1) .'" value="';

                                                            if($rentalType[$i] === "Business Premise"){
                                                                echo $business_premises_retrieved_type_of_premise[$i];
                                                            } else{
                                                                echo $rentalType[$i];
                                                            }

                                                            echo '" disabled>' .
                                                        '</div>' .
                                                        '<div class="number-of-units-div">' .
                                                            '<label for="rental-template-similar-units-' . ($i+1) .'">Number Of Similar Units: </label>' .
                                                            '<input type="text" name="rental-template-similar-units-' . (($i+1)) .'" id="rental-template-similar-units-' . (($i+1)) .'" value="' . $retrieved_number_of_units[$i] . '" disabled>' .
                                                        '</div>' .
                                                        '<div class="number-of-units-remaining-div">' .
                                                            '<label for="rental-template-similar-units-remaining-' . ($i+1) .'">Number Of Units Remaining: </label>' .
                                                            '<input type="text" name="rental-template-similar-units-remaining-' . (($i+1)) .'" id="rental-template-similar-units-remaining-' . (($i+1)) .'" value="' . $retrieved_number_of_remaining_units[$i] . '" disabled>' .
                                                        '</div>';
                                                        if(($rentalType[$i] === "Hostel") || ($rentalType[$i] === "Single Room") || ($rentalType[$i] === "Bedsitter")){

                                                            echo 
                                                            '<div class="maximum-occupants-div">' .
                                                                '<label for="rental-template-maximum-occupants-' . (($i+1)) .'">Maximum Number Of Occupants: </label>' .
                                                                '<input type="number" name="rental-template-maximum-occupants-' . ($i+1) .'" id="rental-template-maximum-occupants-' . ($i+1) .'" value="';
                                                                if($rentalType[$i] === "Hostel"){
                                                                    echo $Hostel_retrieved_maximum_occupants[$i];
                                                                } else if ($rentalType[$i] === "Bedsitter") {
                                                                    echo $Bedsitter_retrieved_maximum_occupants[$i];
                                                                } else {
                                                                    echo $Single_Room_retrieved_maximum_occupants[$i];
                                                                }

                                                                echo '" disabled>' .
                                                            '</div>';                                                        

                                                        } else if ($rentalType[$i] === "Suite") {
                                                            echo 
                                                            '<div class="number-of-bedrooms-div">' .
                                                                '<label for="rental-template-suite-beds-' . ($i+1) .'">NumberOf Beds: </label>' .
                                                                '<input type="number" name="rental-template-suite-beds-' . ($i+1) .'" id="rental-template-suite-beds-' . ($i+1) .'" value="' . $suites_retrieved_number_of_beds[$i] . '" disabled>' .
                                                            '</div>';

                                                        } else if (($rentalType[$i] === "Apartment") || ($rentalType[$i] === "House")){
                                                            echo 
                                                            '<div class="apartment-bedrooms-div">' .
                                                                '<label for="rental-template-bedrooms-' . ($i+1) .'">Number Of Bedrooms: </label>' .
                                                                '<input type="number" name="rental-template-bedrooms-' . ($i+1) .'" id="rental-template-bedrooms-' . ($i+1) .'" value="';
                                                                
                                                                if($rentalType[$i] === "Apartment"){
                                                                    echo $apartments_retrieved_number_of_bedrooms[$i];
                                                                } else {
                                                                    echo $houses_retrieved_number_of_bedrooms[$i];
                                                                }

                                                                echo '" disabled>' .
                                                            '</div>';
                                                        }

                                                        echo 
                                                        '<div class="location-div">' .
                                                            '<label for="rental-template-location-' . ($i+1) .'">Location: </label>' .
                                                            '<input type="text" name="rental-template-location-' . ($i+1) .'" id="rental-template-location-' . ($i+1) .'" value="' . $retrieved_location[$i] .'" disabled>' .
                                                        '</div>' .
                                                        
                                                        '<div class="google-location-div">' .
                                                            '<label for="rental-template-google-location-' . ($i+1) .'">Google Location: </label>' .
                                                            '<input type="text" name="rental-template-google-location-' . ($i+1) .'" id="rental-template-google-location-' . ($i+1) .'" value="' . $retrieved_google_location[$i] .'" disabled>' .
                                                        '</div>' .
                                                        
                                                        '<div class="description-div">' .
                                                            '<label for="rental-template-description-' . ($i+1) .'">Description: </label>' .
                                                            '<textarea name="rental-template-description-' . ($i+1) .'" class="rental-template-description" id="rental-template-description-' . ($i+1) .'" oninput="textareaSizor()" disabled>' .  $retrieved_description[$i] . '</textarea>' .
                                                        '</div>' .                                                     
                                                    '</div>'; 

                                                    echo '<div class="template-buttons"> 
                                                        <form class="template-submit-buttons" id="delete-rental-' . ($i+1) . '" action="../Php/rentalDelete.php" method="post" enctype="multipart/form-data" onsubmit="validateDeletion(event)">
                                                            <button type="submit" class="remove-rental" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"> Remove Rental </button>
                                                            <input type="hidden" name="rentalID" class="rentalID" value="' . $rentalID . '">
                                                            <input type="hidden" name="tableName" class="tableName" value="' . $tableName . '">
                                                            <input type="hidden" name="user-email" class="user-email" value="' . $email . '">
                                                            <input type="hidden" name="phone-number" class="phone-number" value="' . $retrieved_phone_number . '">
                                                            <input type="hidden" name="rentals-owned" class="rentals-owned" value="' . $retrieved_rentals_owned . '">
                                                            <input type="hidden" name="image-urls" class="image-urls" value="' . $retrieved_image_urls[$i] . '">
                                                            <input type="hidden" name="image-paths" class="image-paths" value="../Image_Data/' . $finalFolder . '">
                                                            <input type="hidden" name="rules-urls" class="rules-urls" value="' .$retrieved_rules_urls[$i] . '">
                                                            <input type="hidden" id="password-for-delete-' . ($i+1) . '" name="password-for-delete" value="' . $password . '">
                                                        </form>

                                                        <form class="template-submit-buttons edit-details-form" id="template-edit-details-' . ($i+1) . '" action="../Php/edit-rental-preparation.php" method="post" enctype="multipart/form-data">                               
                                                            <button type="submit" class="edit-rental" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)"> Edit Rental Details </button>

                                                            <input type="hidden" name="email" class="email" value="' . $email . '">
                                                            <input type="hidden" id="password-for-edit-' . ($i+1) . '" name="password-for-edit" value="' . $password . '">
                                                            
                                                            <input type="hidden" name="rental-ID" class="rental-ID" value="' .$rentalID . '">
                                                            <input type="hidden" name="table-name" class="table-name" value="' .$tablenames[$i] . '">
                                                            <input type="hidden" name="rules-urls-edit" class="rules-urls-edit" value="' .$retrieved_rules_urls[$i] . '">
                                                            <input type="hidden" name="rental-name" class="rental-name" value="' .$retrieved_rental_name[$i] . '">
                                                            <input type="hidden" name="rental-type" class="rental-type" value="' .$rentalType[$i] . '">
                                                            <input type="hidden" name="location" class="location" value="' .$retrieved_location[$i] . '">
                                                            <input type="hidden" name="googlelocation" class="googlelocation" value="' .$retrieved_google_location[$i] . '">
                                                            <input type="hidden" name="plot-photos" class="plot-photos" value="' .$retrieved_image_urls[$i] . '">
                                                            <input type="hidden" name="ammenties" class="ammenties" value="' .$retrieved_ammenities[$i] . '">
                                                            <input type="hidden" name="number-of-units" class="number-of-units" value="' .$retrieved_number_of_units[$i] . '">
                                                            <input type="hidden" name="number-of-units-remaining" class="number-of-units-remaining" value="' .$retrieved_number_of_remaining_units[$i] . '">
                                                            <input type="hidden" name="interested-parties" class="interested-parties" value="' .$retrieved_interested_parties[$i] . '">
                                                            <input type="hidden" name="apartment-bedrooms" class="apartment-bedrooms" value="' . $apartments_retrieved_number_of_bedrooms[$i] . '">
                                                            <input type="hidden" name="type-of-business-premise" class="type-of-business-premise" value="' . $business_premises_retrieved_type_of_premise[$i] . '">
                                                            <input type="hidden" name="house-bedrooms" class="house-bedrooms" value="' . $houses_retrieved_number_of_bedrooms[$i] . '">
                                                            <input type="hidden" name="suite-beds" class="suite-beds" value="' . $suites_retrieved_number_of_beds[$i] . '">
                                                            <input type="hidden" name="rental-term" class="rental-term" value="' . $retrieved_rental_term[$i] . '">
                                                            <input type="hidden" name="rent-amount" class="rent-amount" value="' . $retrieved_amount_of_rent[$i] . '">
                                                            <input type="hidden" name="description" class="description" value="' . $retrieved_description[$i] . '">
                                                            <input type="hidden" name="tenant-preferences" class="tenant-preferences" value="' . $retrieved_tenant_preferences[$i] . '">
                                                            <input type="hidden" name="hostel-maximum-occupants" class="hostel-maximum-occupants" value="' . $Hostel_retrieved_maximum_occupants[$i] . '">
                                                            <input type="hidden" name="single-room-maximum-occupants" class="single-room-maximum-occupants" value="' . $Single_Room_retrieved_maximum_occupants[$i] . '">
                                                            <input type="hidden" name="bedsitter-maximum-occupants" class="bedsitter-maximum-occupants" value="' . $Bedsitter_retrieved_maximum_occupants[$i] . '">
                                                            <input type="hidden" name="image-paths" class="image-paths" value="../Image_Data/' . $finalFolder . '">
                                                            <input type="hidden" name="term-display" class="term-display" value="'. $termDisplay . '">
                                                            <input type="hidden" name="plot-photos-paths" class="plot-photos-paths" value="../Image_Data/' . $finalFolder . '">

                                                        </form>                           
                                                    </div>' .
                                                '</div>' .
                                            '</div>' .                                        
                                        '</div>'
                                    ; 
                                } 
                            } else {
                                echo '<div class="template-error">
                                        <p>Upload Rentals</p> 
                                    </div>';
                            } 
                        ?>
                    </div>
                    <div class="table-view" style="display: none; <?php if(!(($res) && (mysqli_num_rows($res) > 0))) {echo 'overflow: hidden;';}?>">
                        <?php 
                            if(($res) && (mysqli_num_rows($res) > 0)) {
                                echo '
                                    <form action="../Php/print-table-of-rentals.php" method="post" id="table-view-form">
                                    <div class="table-view-filters">
                                        <h4>Filter By:</h4>
                                        <select class="table-view-type-of-rental" id="table-view-type-of-rental" name="table-view-type-of-rental" onchange="filterRentalsToBeDisplayedByTypeFormTableView()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="highlightClicked(this)">
                                            <option value="no-value" selected>Type Of Rental</option>
                                            <option value="Hostel">Hostel</option>
                                            <option value="Single Room">Single Room</option>
                                            <option value="Bedsitter">Bedsitter</option>
                                            <option value="Apartment">Apartment</option>
                                            <option value="Business Premise">Business Premise</option>
                                            <option value="House">House</option> 
                                            <option value="Suite">Suite/ Motel</option>
                                        </select>
                                        <select class="table-view-propects" id="table-view-prospects" name="table-view-prospects" onchange="filterRentalsToBeDisplayedByProspectsFromTableView()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="highlightClicked(this)">
                                            <option value="no-value" selected>Prospects</option>
                                            <option value="showing-prospects">Showing Prospects</option>
                                            <option value="no-prospects">Not Interested In Yet</option>
                                        </select>
                                        <select class="table-view-location-filter" id="table-view-location-filter" name="location-filter" onchange="filterRentalsToBeDisplayedByLocationFromTableView()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="highlightClicked(this)">
                                            <option value="no-value" selected>Location</option>';
                                            foreach($uniqueLocations as $uniqueLocation) {
                                                echo '<option value="'. $uniqueLocation .'">'. ucwords($uniqueLocation) .'</option>';
                                            } 
                                    echo'    
                                        </select>
                                    </div>
                                    <div class="table">
                                        <table class="rentals-table">
                                            <thead>
                                                <tr>
                                                    <th colspan="11" class="rentals-table-title"> My Rentals </th>
                                                </tr>
                                                <tr>
                                                    <th class="rentals-table-column-heads">Rental Name</th>
                                                    <th class="rentals-table-column-heads">Rental Type</th>
                                                    <th class="rentals-table-column-heads">Type Of Premise</th>
                                                    <th class="rentals-table-column-heads">Location</th>
                                                    <th class="rentals-table-column-heads">Google Location</th>
                                                    <th class="rentals-table-column-heads">Ammenities</th>
                                                    <th class="rentals-table-column-heads">Preferences</th>
                                                    <th class="rentals-table-column-heads">Number Of Beds/ Bedrooms</th>
                                                    <th class="rentals-table-column-heads">Number Of Similar Units</th>
                                                    <th class="rentals-table-column-heads">Number Of Units Remaining</th>
                                                    <th class="rentals-table-column-heads">Interested Parties</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            for($i=0; $i<count($rentalsOwned); $i++) {

                                                // Ammenities

                                                $outputAmmenities="";

                                                if(!empty($retrieved_ammenities[$i])) {
                                                    $individualAmmenities = explode(", ", $retrieved_ammenities[$i]);
    
                                                    $individualAmmenitiesRefined = array();

                                                    for($j=0; $j<count($individualAmmenities); $j++) {
                                                        $individualAmmenitiesRefined[$j] = explode(": ", $individualAmmenities[$j]);
                                                        unset($individualAmmenitiesRefined[$j][0]);
                                                        if(!empty($individualAmmenitiesRefined[$j])) {
                                                            $individualAmmenitiesRefined[$j] = $individualAmmenitiesRefined[$j][1];
                                                        }                    
                                                    }
                                                    $outputAmmenities = implode(", ", $individualAmmenitiesRefined);
                                                } 
                                                
                                                // Preferences

                                                $outputPreferences="";

                                                if(!empty($retrieved_tenant_preferences[$i])) {
                                                    $individualPreferences = explode(", ", $retrieved_tenant_preferences[$i]);
    
                                                    $individualPreferencesRefined = array();

                                                    for($j=0; $j<count($individualPreferences); $j++) {
                                                        $individualPreferencesRefined[$j] = explode(": ", $individualPreferences[$j]);
                                                        unset($individualPreferencesRefined[$j][0]);
                                                        if(!empty($individualPreferencesRefined[$j])) {
                                                            $individualPreferencesRefined[$j] = $individualPreferencesRefined[$j][1];
                                                        }                    
                                                    }
                                                    $outputPreferences = implode(", ", $individualPreferencesRefined);
                                                }

                                            echo'
                                                <tr>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-rental-name" name="name" value="'.$retrieved_rental_name[$i].'"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-rental-type" name="type" value="'.$rentalType[$i].'"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-premise-type" name="" value="'.$business_premises_retrieved_type_of_premise[$i].'"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-location" name="location" value="'.$retrieved_location[$i].'"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-google-location" name="google-location" value="'.$retrieved_google_location[$i].'"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-ammenities" name="ammenities" value="'.$outputAmmenities.'"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-preferences" name="preferences" value="'.$outputPreferences.'"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-bedrooms" name="bedrooms" value="';
                                                    switch($rentalType[$i]) {
                                                        case "Apartment":
                                                            echo $apartments_retrieved_number_of_bedrooms[$i];
                                                            break;
                                                        case "House":
                                                            echo $houses_retrieved_number_of_bedrooms[$i];
                                                            break;
                                                        case "Suite":
                                                            echo $suites_retrieved_number_of_beds[$i];
                                                            break;
                                                        default:
                                                        echo "";
                                                    }
                                                    echo '"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-units" name="units" value="'.$retrieved_number_of_units[$i].'"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-units-remaining" name="remaining-units" value="'.$retrieved_number_of_remaining_units[$i].'"></td>
                                                    <td><input readonly type="text" onfocus="showInputInField(this)" class="table-view-parties" name="interested-parties" value="'.$retrieved_interested_parties[$i].'"></td>
                                                </tr>'; 
                                                }
                                        echo'    
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="view-input-div">
                                        <input type="text" id="view-input-details-clearly" readonly> 
                                    </div>
                                </form>';
                            } else {
                                echo '<div class="template-error">
                                        <p>Upload Rentals</p> 
                                    </div>';
                            }
                        ?>
                    </div>

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
                            <input type="text" id="email" name="modified-email" value="<?php echo $email;?>" disabled onblur="validateField('email', 'Please Specify An Email that will be Associated With Your Rentals')">
                            <div class="error"></div>
                        </div>

                        <div class="password">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" value="<?php echo $password;?>" disabled onblur="validateField('password', 'Please Enter A Password To Secure Your Account')">
                            <div class="error"></div>
                        </div>

                        <input type="hidden" name="retrieved-email" value="<?php echo $email;?>">
                        <input type="hidden" name="retrieved-phone-number" value="<?php echo $retrieved_phone_number;?>">

                        <input type="checkbox" id="show-pass" tabindex="0" onclick="toggleShowPassword()">
                        <label for="show-pass">Show Password</label>

                        <div class="edit-details">
                            <button type="button" tabindex="0" onclick="toggleEnabled()" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Edit Details</button>
                        </div>

                        <input type="hidden" name="email" value="<?php echo $email;?>">
                        <input type="hidden" name="passwordField" value="<?php echo $password;?>">
                        
                        <div class="confirm-button">
                            <button type="submit" tabindex="0" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Confirm Details</button>
                        </div>                       
                    </form>                       
                </div>
                <div class="parties-interested-div" style="display: none">
                <?php 
                    if(($res) && (mysqli_num_rows($res) > 0)) {
                    echo '    
                        <button id="view-all-interested-parties-button" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)" onclick="printWholeList()" style="margin: 20px;">Print The Whole List Of Interested Parties</button>';  
                        
                        $tableNamesToQuery = array("business_premises", "hostels", "apartments", "houses", "suites", "bedsitters", "single_rooms");
                        $tableNamesToDisplay = array();

                        $cummulativeTable = array();


                        // To Get All The Interested-In Rentals From Each Class
                        for($i=0; $i<count($tableNamesToQuery); $i++) {

                            include "../Php/databaseConnector.php";

                            $sqlQuery = "select $tableNamesToQuery[$i].Interested_Parties, $tableNamesToQuery[$i].Location, $tableNamesToQuery[$i].Rental_Name
                            from $tableNamesToQuery[$i]  
                            inner join properties_owners_details on $tableNamesToQuery[$i].Rental_ID = properties_owners_details.Rental_ID AND properties_owners_details.Owners_Phone_Number = ? AND properties_owners_details.Email_Address = ? AND $tableNamesToQuery[$i].Interested_Parties != ?;";

                            $interestedParties = "";

                            $stmt = mysqli_prepare($connectionInitialisation, $sqlQuery);
                            
                            if (!$stmt) {
                                die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
                            }
                            
                            mysqli_stmt_bind_param($stmt, 'sss', $retrieved_phone_number, $email, $interestedParties);
                            
                            if (!mysqli_stmt_execute($stmt)) {
                                die("Query execution failed: " . mysqli_error($connectionInitialisation));
                            }
                            
                            $res = mysqli_stmt_get_result($stmt);
                            
                            if (!$res) {
                                die("Result retrieval failed: " . mysqli_error($connectionInitialisation));
                            }

                            if (mysqli_num_rows($res) > 0) {
                                
                                $tableTitle = '';
                                
                                switch($tableNamesToQuery[$i]) {
                                    case "business_premises":
                                        $tableTitle = "Business Premises";
                                        break;
                                    case "hostels":
                                        $tableTitle = "Hostels";
                                        break;
                                    case "apartments":
                                        $tableTitle = "Apartments";
                                        break;
                                    case "houses":
                                        $tableTitle = "Houses";
                                        break;
                                    case "suites":
                                        $tableTitle = "Suites";
                                        break;
                                    case "bedsitters":
                                        $tableTitle = "Bedsitters";
                                        break;
                                    case "single_rooms":
                                        $tableTitle = "Single Rooms";
                                        break;
                                        
                                }
                                $tableNamesToDisplay[] = $tableTitle;
                            echo '
                                <form action="../Php/print-interested-party.php" class="interested-parties-table-form" method="post">
                                    <table class="interested-parties-table">
                                        <thead>
                                            <tr>
                                                <th colspan="6" class="interested-parties-table-title">'. $tableTitle .'</th>
                                            </tr>
                                            <tr>
                                                <th class="interested-parties-table-column-heads">Rental Name</th>
                                                <th class="interested-parties-table-column-heads">Location</th>
                                                <th class="interested-parties-table-column-heads">Name</th>
                                                <th class="interested-parties-table-column-heads">Phone Number</th>
                                                <th class="interested-parties-table-column-heads">Email Address</th>
                                                <th class="interested-parties-table-column-heads">Date Of Booking</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                    
                                    $detailsToSubmit = array();

                                    while ($rental = mysqli_fetch_assoc($res)) {
                                        // To Store All The Details Of One Rental In The Class
                                        $interestedParties = $rental['Interested_Parties'];     // [hgjhg_jkhkjhjh], [ghgjhgjhgjhg_hjkhjkhj]
                                        $individualParties = explode(", ", $interestedParties);     // [kllkj_kljl]   [jkhjkh_ghjhg]

                                        for($j=0; $j<count($individualParties); $j++) {         // 2 - 2 Rows For Two Tenants
                                            $cleanString = str_replace(array('[', ']'), '', $individualParties[$j]);    //  jhgjh_jkhkjh
                                            $cleanString = explode("_", $cleanString);      //  jhjkhjk     jkhjkhkj
                                            echo'
                                            <tr>
                                                <td>' . $rental['Rental_Name'] . '</td>
                                                <td>' . $rental['Location'] . '</td>
                                                <td>' . $cleanString[0] . '</td>
                                                <td>' . $cleanString[1] . '</td>
                                                <td>' . $cleanString[2] . '</td>
                                                <td>' . $cleanString[3] . '</td>
                                            </tr>';
                                            $detailsToSubmit[] = $rental['Rental_Name'] . ", " . $rental['Location'] . ", " . $cleanString[0] . ", " . $cleanString[1] . ", " . $cleanString[2] . ", " . $cleanString[3];
                                        }
                                    }
                                    echo '    
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="table-details" value="' .htmlspecialchars(json_encode($detailsToSubmit)) .'">
                                    <input type="hidden" name="table-name" value="'. $tableTitle .'">
                                    <button type="submit" onclick="highlightClicked(this)" onmouseenter="zoomDiv(this)" onmouseleave="unzoomDiv(this)">Print Table</button>
                                </form>';
                                $cummulativeTable[] = $detailsToSubmit;
                            }
                            mysqli_stmt_close($stmt);
                        }

                        echo '
                            <form action="../Php/print-all-interested-parties.php" class="all-interested-parties-table-form" method="post" style="display: none;">
                                <input type="hidden" name="table-details" value="' .htmlspecialchars(json_encode($cummulativeTable)) .'">
                                <input type="hidden" name="tables" value="' .htmlspecialchars(json_encode($tableNamesToDisplay)) .'">
                            </form>
                        ';
                    } else {
                        echo '<div class="template-error">
                                <p>Upload Rentals</p> 
                            </div>';
                    }
                ?>  
                </div>               
            </div>            
        </div>
    </div>
</body>
</html>