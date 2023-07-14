<?php

    $email = $_POST['email'];
    $password = $_POST['password-for-edit'];
    
    $rentalID = $_POST['rental-ID'];    
    $rentalName = $_POST['rental-name'];
    $rentalType = $_POST['rental-type'];
    $numberOfUnits = $_POST['number-of-units'];
    $numberOfUnitsRemaining = $_POST['number-of-units-remaining'];
    $interestedParties = $_POST['interested-parties'];
    
    $location = $_POST['location'];
    $googlelocation = $_POST['googlelocation'];    
    $rentalTerm = $_POST['rental-term'];
    $termDisplay =  $_POST['term-display'];
    $rentAmount = $_POST['rent-amount'];
    $description = $_POST['description'];
    $plotPhotos = $_POST['plot-photos'];
    $oldPlotPhotosPaths = $_POST['plot-photos-paths'];
    
    $rulesUrls = $_POST['rules-urls-edit'];    
    $ammenties = $_POST['ammenties'];
    $tenantPreferences = $_POST['tenant-preferences'];    
    
    $apartmentBedrooms = $_POST['apartment-bedrooms'];
    $typeOfBusinessPremise = $_POST['type-of-business-premise'];
    $houseBedrooms = $_POST['house-bedrooms'];
    $suiteBeds = $_POST['suite-beds'];   
    
    $hostelMaximumOccupants = $_POST['hostel-maximum-occupants'];
    $singleRoomMaximumOccupants = $_POST['single-room-maximum-occupants'];
    $bedsitterMaximumOccupants = $_POST['bedsitter-maximum-occupants'];
        
    $imagePaths = $_POST['image-paths'];
    $tableName = $_POST['table-name'];

    $IndividualPlotPhotos = explode(", ", $plotPhotos);
    $IndividualRules = explode(", ", $rulesUrls);
    $individualAmmenities = explode(", ", $ammenties);
    
    $individualAmmenitiesRefined = array();
    if(!empty($individualAmmenities)) {
        for($i=0; $i<count($individualAmmenities); $i++) {
            $individualAmmenitiesRefined[$i] = explode(": ", $individualAmmenities[$i]);
            unset($individualAmmenitiesRefined[$i][0]);
            if(!empty($individualAmmenitiesRefined[$i])) {
                $individualAmmenitiesRefined[$i] = $individualAmmenitiesRefined[$i][1];
            }                    
        }
    }    

    $individualPreferences = explode(", ", $tenantPreferences);
    
    $individualPreferencesRefined = array();

    if(!empty($individualPreferences)) {
        for($i=0; $i<count($individualPreferences); $i++) {
            $individualPreferencesRefined[$i] = explode(": ", $individualPreferences[$i]);
            unset($individualPreferencesRefined[$i][0]);
            if(!empty($individualPreferencesRefined[$i])) {
                $individualPreferencesRefined[$i] = $individualPreferencesRefined[$i][1];
            }            
        }
    }    

    $finalInterestedParties = array();

    $parties = explode(", ", $interestedParties);
    foreach ($parties as $party) {
        $cleanString = str_replace(array('[', ']'), '', $party);
        $cleanString = explode("-", $cleanString);
        $finalInterestedParties[] = $cleanString;
    }
    
    
    
    include "../Php/edit-rental.php";    
?>