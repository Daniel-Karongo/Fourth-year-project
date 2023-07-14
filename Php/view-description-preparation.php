<?php
    $rentalID = $_POST['rental-id'];
    $rentalType = $_POST['rental-type'];
    $rentalName = $_POST['rental-name'];
    $location = $_POST['rental-location'];
    $googleLocation = $_POST['rental-google-location'];
    $imageUrls = $_POST['rental-photos'];
    $ammenities = $_POST['rental-ammenities'];
    $numberOfSimilarUnits = $_POST['rental-units-available'];
    $numberOfBedsPerSuite = $_POST['rental-beds-per-suite'];
    $numberOfApartmentBedrooms = $_POST['rental-bedrooms-per-apartment'];
    $numberOfHouseBedrooms = $_POST['rental-bedrooms-per-house'];
    $typeOfBusinessBusiness = $_POST['rental-business-premise-type'];
    $ownersPhoneNumber = $_POST['rental-owners-phone-number'];
    $ownersEmailAddress = $_POST['rental-owners-email'];
    $rentalTerm = $_POST['rental-term'];
    $amountOfRent = $_POST['rental-amount-of-rent'];
    $description = $_POST['rental-description'];
    $preferences = $_POST['rental-tenant-preferences'];
    $maximumNumberOfOccupants = $_POST['rental-number-of-ocupants'];
    $rulesUrls = $_POST['rental-rules'];
    $interestedParties = $_POST['rental-interested-parties'];

    $rentalOwnersFirstName = $_POST['rental-owners-first-name'];
    $rentalOwnersLastName = $_POST['rental-owners-last-name'];
    $rentalOwnersFullName = $rentalOwnersFirstName . " " . $rentalOwnersLastName;
    
    $rentalPhotoPath = $_POST['rental-photos-path'];

    $images = explode(", ", $imageUrls);
    $rules = explode(", ", $rulesUrls);

    $rawAmmenities = explode(", ", $ammenities);
    $rawPreferences = explode(", ", $preferences);

    $refinedAmmenities = array();
    if(!empty($rawAmmenities)) {
        for($i=0; $i<count($rawAmmenities); $i++) {
            $refinedAmmenities[$i] = explode(": ", $rawAmmenities[$i]);
            unset($refinedAmmenities[$i][0]);
            if(!empty($refinedAmmenities[$i])) {
                $refinedAmmenities[$i] = $refinedAmmenities[$i][1];
            }                    
        }
    }

    $refinedPreferences = array();
    if(!empty($rawPreferences)) {
        for($i=0; $i<count($rawPreferences); $i++) {
            $refinedPreferences[$i] = explode(": ", $rawPreferences[$i]);
            unset($refinedPreferences[$i][0]);
            if(!empty($refinedPreferences[$i])) {
                $refinedPreferences[$i] = $refinedPreferences[$i][1];
            }            
        }
    }

    include "../Php/view-description.php";
?>