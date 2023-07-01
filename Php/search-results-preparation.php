<?php
    $location = $_POST['location'];

    include "../Php/databaseConnector.php";

    // To Get All The Rentals In The Location Specified.

    $sqlquery = "SELECT * FROM hostels WHERE Location = '$location';";
    $resHostels = mysqli_query($connectionInitialisation, $sqlquery);
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    $sqlquery = "SELECT * FROM single_rooms WHERE Location = '$location';";
    $resSingleRooms = mysqli_query($connectionInitialisation, $sqlquery);
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    $sqlquery = "SELECT * FROM bedsitters WHERE Location = '$location';";
    $resBedsitters = mysqli_query($connectionInitialisation, $sqlquery);
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    $sqlquery = "SELECT * FROM suites WHERE Location = '$location';";
    $resSuites = mysqli_query($connectionInitialisation, $sqlquery);
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    $sqlquery = "SELECT * FROM apartments WHERE Location = '$location';";
    $resApartments = mysqli_query($connectionInitialisation, $sqlquery);
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    $sqlquery = "SELECT * FROM houses WHERE Location = '$location';";
    $resHouses = mysqli_query($connectionInitialisation, $sqlquery);
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    $sqlquery = "SELECT * FROM business_premises WHERE Location = '$location';";
    $resBusinessPremises = mysqli_query($connectionInitialisation, $sqlquery);
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

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
        
        $sqlquery = "SELECT * FROM properties_owners_details WHERE Rental_ID = '$retrievedRentalID[$i]';";
        $respropertiesOwnersDetails = mysqli_query($connectionInitialisation, $sqlquery);
        
        if (!mysqli_query($connectionInitialisation, $sqlquery)) {
            die("Update query failed: " . mysqli_error($connectionInitialisation));
        }

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

        $sqlquery = "SELECT * FROM property_owners WHERE Phone_Number = '$retrievedOwnersPhoneNumber[$i]' AND Email_Address='$retrievedOwnersEmailAddress[$i]';";
        $resPropertyOwnersName = mysqli_query($connectionInitialisation, $sqlquery);
        
        if (!mysqli_query($connectionInitialisation, $sqlquery)) {
            die("Update query failed: " . mysqli_error($connectionInitialisation));
        }

        if(mysqli_num_rows($resPropertyOwnersName) > 0) {
            while ($properties_owners = mysqli_fetch_assoc($resPropertyOwnersName)) {
                array_push($retrievedOwnersFirstName, $properties_owners['First_Name']);
                array_push($retrievedOwnersLastName, $properties_owners['Last_Name']);                
            }            
        }
    }

    include "../Php/search-results.php";

?>