<?php
    $location = $_POST['location'];

    include "../Php/databaseConnector.php";

    // To Get All The Rentals In The Location Specified.

    $query = "SELECT * FROM hostels WHERE Location = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $query);
    mysqli_stmt_bind_param($stmt, 's', $location);
    mysqli_stmt_execute($stmt);
    $resHostels = mysqli_stmt_get_result($stmt);

    if (!$resHostels) {
        die("Query failed: " . mysqli_error($connectionInitialisation));
    }

    $query = "SELECT * FROM single_rooms WHERE Location = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $query);
    mysqli_stmt_bind_param($stmt, 's', $location);
    mysqli_stmt_execute($stmt);
    $resSingleRooms = mysqli_stmt_get_result($stmt);

    if (!$resSingleRooms) {
        die("Query failed: " . mysqli_error($connectionInitialisation));
    }

    $query = "SELECT * FROM bedsitters WHERE Location = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $query);
    mysqli_stmt_bind_param($stmt, 's', $location);
    mysqli_stmt_execute($stmt);
    $resBedsitters = mysqli_stmt_get_result($stmt);

    if (!$resBedsitters) {
        die("Query failed: " . mysqli_error($connectionInitialisation));
    }

    $query = "SELECT * FROM suites WHERE Location = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $query);
    mysqli_stmt_bind_param($stmt, 's', $location);
    mysqli_stmt_execute($stmt);
    $resSuites = mysqli_stmt_get_result($stmt);

    if (!$resSuites) {
        die("Query failed: " . mysqli_error($connectionInitialisation));
    }

    $query = "SELECT * FROM apartments WHERE Location = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $query);
    mysqli_stmt_bind_param($stmt, 's', $location);
    mysqli_stmt_execute($stmt);
    $resApartments = mysqli_stmt_get_result($stmt);

    if (!$resApartments) {
        die("Query failed: " . mysqli_error($connectionInitialisation));
    }

    $query = "SELECT * FROM houses WHERE Location = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $query);
    mysqli_stmt_bind_param($stmt, 's', $location);
    mysqli_stmt_execute($stmt);
    $resHouses = mysqli_stmt_get_result($stmt);

    if (!$resHouses) {
        die("Query failed: " . mysqli_error($connectionInitialisation));
    }

    $query = "SELECT * FROM business_premises WHERE Location = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $query);
    mysqli_stmt_bind_param($stmt, 's', $location);
    mysqli_stmt_execute($stmt);
    $resBusinessPremises = mysqli_stmt_get_result($stmt);

    if (!$resBusinessPremises) {
        die("Query failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // To Store All The Details Of The Rentals Retrieved.

    $retrievedRentalType = array();

    $retrievedRentalID = array();
    $retrievedrentalName = array();
    $retrievedLocation = array();
    $retrievedGoogleLocation = array();
    $retrievedImageUrls = array();
    $retrievedAmmenities = array();
    $retrievedNumberOfSimilarUnits = array();

    $retrievedNumberOfBedsPerSuite = array();
    $retrievedNumberOfApartmentBedrooms = array();
    $retrievedNumberOfHouseBedrooms = array();
    $retrievedTypeOfBusinessBusiness = array();

    $retrievedOwnersFirstName = array();
    $retrievedOwnersLastName = array();
    $retrievedOwnersPhoneNumber = array();
    $retrievedOwnersEmailAddress = array();
    $retrievedRentalTerm = array();
    $retrievedAmountOfRent = array();
    $retrievedDescription = array();
    $retrievedPreferences = array();
    $retrievedMaximumNumberOfOccupants = array();
    $retrievedRulesUrls = array();

    // To Assign This Retrieved Details To The Arrays.
    
    if(mysqli_num_rows($resHostels) > 0) {
        while ($hostels = mysqli_fetch_assoc($resHostels)) {
            array_push($retrievedRentalID, $hostels['Rental_ID']);
            array_push($retrievedrentalName, $hostels['Rental_Name']);
            array_push($retrievedLocation, $hostels['Location']);
            array_push($retrievedGoogleLocation, $hostels['Google_Location']);
            array_push($retrievedImageUrls, $hostels['Image_Urls']);
            array_push($retrievedAmmenities, $hostels['Ammenities']);
            array_push($retrievedNumberOfSimilarUnits, $hostels['Number_Of_Similar_Units']);
            
            array_push($retrievedRentalType, "Hostel");
            array_push($retrievedNumberOfBedsPerSuite, null);
            array_push($retrievedNumberOfApartmentBedrooms, null);
            array_push($retrievedNumberOfHouseBedrooms, null);
            array_push($retrievedTypeOfBusinessBusiness, null);
        }            
    }

    if(mysqli_num_rows($resSingleRooms) > 0) {
        while ($singlerooms = mysqli_fetch_assoc($resSingleRooms)) {
            array_push($retrievedRentalID, $singlerooms['Rental_ID']);
            array_push($retrievedrentalName, $singlerooms['Rental_Name']);
            array_push($retrievedLocation, $singlerooms['Location']);
            array_push($retrievedGoogleLocation, $singlerooms['Google_Location']);
            array_push($retrievedImageUrls, $singlerooms['Image_Urls']);
            array_push($retrievedAmmenities, $singlerooms['Ammenities']);
            array_push($retrievedNumberOfSimilarUnits, $singlerooms['Number_Of_Similar_Units']);
            
            array_push($retrievedRentalType, "Single Room");
            array_push($retrievedNumberOfBedsPerSuite, null);
            array_push($retrievedNumberOfApartmentBedrooms, null);
            array_push($retrievedNumberOfHouseBedrooms, null);
            array_push($retrievedTypeOfBusinessBusiness, null);
        }            
    }

    if(mysqli_num_rows($resBedsitters) > 0) {
        while ($bedsitters = mysqli_fetch_assoc($resBedsitters)) {
            array_push($retrievedRentalID, $bedsitters['Rental_ID']);
            array_push($retrievedrentalName, $bedsitters['Rental_Name']);
            array_push($retrievedLocation, $bedsitters['Location']);
            array_push($retrievedGoogleLocation, $bedsitters['Google_Location']);
            array_push($retrievedImageUrls, $bedsitters['Image_Urls']);
            array_push($retrievedAmmenities, $bedsitters['Ammenities']);
            array_push($retrievedNumberOfSimilarUnits, $bedsitters['Number_Of_Similar_Units']);
            
            array_push($retrievedRentalType, "Bedsitter");
            array_push($retrievedNumberOfBedsPerSuite, null);
            array_push($retrievedNumberOfApartmentBedrooms, null);
            array_push($retrievedNumberOfHouseBedrooms, null);
            array_push($retrievedTypeOfBusinessBusiness, null);
        }            
    }

    if(mysqli_num_rows($resSuites) > 0) {
        while ($suites = mysqli_fetch_assoc($resSuites)) {
            array_push($retrievedRentalID, $suites['Rental_ID']);
            array_push($retrievedrentalName, $suites['Rental_Name']);
            array_push($retrievedLocation, $suites['Location']);
            array_push($retrievedGoogleLocation, $suites['Google_Location']);
            array_push($retrievedImageUrls, $suites['Image_Urls']);
            array_push($retrievedAmmenities, $suites['Ammenities']);
            array_push($retrievedNumberOfBedsPerSuite, $suites['Number_Of_Beds_Per_Suite']);
            array_push($retrievedNumberOfSimilarUnits, $suites['Number_Of_Similar_Units']);

            
            array_push($retrievedRentalType, "Suite");
            array_push($retrievedNumberOfApartmentBedrooms, null);
            array_push($retrievedNumberOfHouseBedrooms, null);
            array_push($retrievedTypeOfBusinessBusiness, null);
        }            
    }

    if(mysqli_num_rows($resApartments) > 0) {
        while ($apartments = mysqli_fetch_assoc($resApartments)) {
            array_push($retrievedRentalID, $apartments['Rental_ID']);
            array_push($retrievedrentalName, $apartments['Rental_Name']);
            array_push($retrievedLocation, $apartments['Location']);
            array_push($retrievedGoogleLocation, $apartments['Google_Location']);
            array_push($retrievedImageUrls, $apartments['Image_Urls']);
            array_push($retrievedAmmenities, $apartments['Ammenities']);
            array_push($retrievedNumberOfApartmentBedrooms, $apartments['Number_Of_Bedrooms']);
            array_push($retrievedNumberOfSimilarUnits, $apartments['Number_Of_Similar_Units']);

            
            array_push($retrievedRentalType, "Apartment");
            array_push($retrievedNumberOfBedsPerSuite, null);
            array_push($retrievedNumberOfHouseBedrooms, null);
            array_push($retrievedTypeOfBusinessBusiness, null);
        }            
    }

    if(mysqli_num_rows($resHouses) > 0) {
        while ($houses = mysqli_fetch_assoc($resHouses)) {
            array_push($retrievedRentalID, $houses['Rental_ID']);
            array_push($retrievedrentalName, $houses['Rental_Name']);
            array_push($retrievedLocation, $houses['Location']);
            array_push($retrievedGoogleLocation, $houses['Google_Location']);
            array_push($retrievedImageUrls, $houses['Image_Urls']);
            array_push($retrievedAmmenities, $houses['Ammenities']);
            array_push($retrievedNumberOfHouseBedrooms, $houses['Number_Of_Bedrooms']);
            array_push($retrievedNumberOfSimilarUnits, $houses['Number_Of_Similar_Units']);

            
            array_push($retrievedRentalType, "House");
            array_push($retrievedNumberOfBedsPerSuite, null);
            array_push($retrievedNumberOfApartmentBedrooms, null);
            array_push($retrievedTypeOfBusinessBusiness, null);
        }            
    }

    if(mysqli_num_rows($resBusinessPremises) > 0) {
        while ($businesspremises = mysqli_fetch_assoc($resBusinessPremises)) {
            array_push($retrievedRentalID, $businesspremises['Rental_ID']);
            array_push($retrievedrentalName, $businesspremises['Rental_Name']);
            array_push($retrievedTypeOfBusinessBusiness, $businesspremises['Type_Of_Premise']);
            array_push($retrievedLocation, $businesspremises['Location']);
            array_push($retrievedGoogleLocation, $businesspremises['Google_Location']);
            array_push($retrievedImageUrls, $businesspremises['Image_Urls']);
            array_push($retrievedAmmenities, $businesspremises['Ammenities']);
            array_push($retrievedNumberOfSimilarUnits, $businesspremises['Number_Of_Similar_Units']);

            
            array_push($retrievedRentalType, "Business Premise");
            array_push($retrievedNumberOfBedsPerSuite, null);
            array_push($retrievedNumberOfApartmentBedrooms, null);
            array_push($retrievedNumberOfHouseBedrooms, null);
        }            
    }

    // To Get And Assign All The Details About The Rentals, From The Common Table, To The Arrays.
    
    for($i=0; $i<count($retrievedRentalID); $i++) {
        
        $sqlquery = "SELECT * FROM properties_owners_details WHERE Rental_ID = ?";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepared statement preparation failed: " . mysqli_error($connectionInitialisation));
        }

        mysqli_stmt_bind_param($stmt, "s", $retrievedRentalID[$i]);

        if (!mysqli_stmt_execute($stmt)) {
            die("Prepared statement execution failed: " . mysqli_error($connectionInitialisation));
        }

        $respropertiesOwnersDetails = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($respropertiesOwnersDetails) > 0) {
            while ($properties_owners_details = mysqli_fetch_assoc($respropertiesOwnersDetails)) {
                array_push($retrievedOwnersPhoneNumber, $properties_owners_details['Owners_Phone_Number']);
                array_push($retrievedOwnersEmailAddress, $properties_owners_details['Email_Address']);
                array_push($retrievedRentalTerm, $properties_owners_details['Rental_Term']);
                array_push($retrievedAmountOfRent, $properties_owners_details['Amount_of_Rent']);
                array_push($retrievedDescription, $properties_owners_details['Pitching']);
                array_push($retrievedPreferences, $properties_owners_details['Preferred_Sorts_of_Applicants']);
                array_push($retrievedMaximumNumberOfOccupants, $properties_owners_details['Maximum_Number_Of_Occupants']);
                array_push($retrievedRulesUrls, $properties_owners_details['Rules_Urls']);
            }            
        }
        mysqli_stmt_close($stmt);

        $sqlquery = "SELECT * FROM property_owners WHERE Phone_Number = ? AND Email_Address = ?";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepared statement preparation failed: " . mysqli_error($connectionInitialisation));
        }

        mysqli_stmt_bind_param($stmt, "ss", $retrievedOwnersPhoneNumber[$i], $retrievedOwnersEmailAddress[$i]);

        if (!mysqli_stmt_execute($stmt)) {
            die("Prepared statement execution failed: " . mysqli_error($connectionInitialisation));
        }

        $resPropertyOwnersName = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resPropertyOwnersName) > 0) {
            while ($properties_owners = mysqli_fetch_assoc($resPropertyOwnersName)) {
                array_push($retrievedOwnersFirstName, $properties_owners['First_Name']);
                array_push($retrievedOwnersLastName, $properties_owners['Last_Name']);                
            }            
        }

        mysqli_stmt_close($stmt);

    }

    include "../Php/search-results.php";

?>