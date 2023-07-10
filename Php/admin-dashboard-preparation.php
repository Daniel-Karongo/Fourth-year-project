<?php
    function getPropertyOwners() {
        include "../Php/databaseConnector.php";

        $propertyOwnersPhoneNumber = array();
        $propertyOwnersEmail = array();
        $propertyOwnersPassword = array();
        $propertyOwnersFirstName = array();
        $propertyOwnersLastName = array();
        $propertyOwnersRentalsOwned = array();
        $propertyOwnersPassResetConfirmationCode = array();
        $propertyOwnersRememberMe = array();

        $sqlquery = "SELECT * FROM property_owners";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($property_owner = mysqli_fetch_assoc($res)) {
                $propertyOwnersPhoneNumber[] = $property_owner['Phone_Number'];
                $propertyOwnersEmail[] = $property_owner['Email_Address'];
                $propertyOwnersPassword[] = $property_owner['Pass_Word'];
                $propertyOwnersFirstName[] = $property_owner['First_Name'];
                $propertyOwnersLastName[] = $property_owner['Last_Name'];
                $propertyOwnersRentalsOwned[] = $property_owner['Rentals_Owned'];
                $propertyOwnersPassResetConfirmationCode[] = $property_owner['Password_Reset_Confirmation_Code'];
                $propertyOwnersRememberMe[] = $property_owner['Remember_Me'];
            }

            return array($propertyOwnersPhoneNumber, $propertyOwnersEmail, $propertyOwnersPassword, $propertyOwnersFirstName, $propertyOwnersLastName, $propertyOwnersRentalsOwned, $propertyOwnersPassResetConfirmationCode, $propertyOwnersRememberMe);
        }
    }

    $property_owners = getPropertyOwners();
    print_r($property_owners);
    echo "<br>";
    echo "<br>";
    echo gettype($property_owners);

    function getPropertyOwnersForEachRentals() {
        include "../Php/databaseConnector.php";

        $propertyOwnersForEachRentalsRentalID = array();
        $propertyOwnersForEachRentalsOwners_Phone_Number  = array();
        $propertyOwnersForEachRentalsEmail_Address  = array();
        $propertyOwnersForEachRentalsRental_Term = array();
        $propertyOwnersForEachRentalsAmount_of_Rent = array();
        $propertyOwnersForEachRentalsPitching = array();
        $propertyOwnersForEachRentalsPreferred_Sorts_of_Applicants = array();
        $propertyOwnersForEachRentalsMaximum_Number_Of_Occupants = array();
        $propertyOwnersForEachRentalsRules_Urls = array();

        $sqlquery = "SELECT * FROM properties_owners_details";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($propertyOwnerRental = mysqli_fetch_assoc($res)) {
                $propertyOwnersForEachRentalsRentalID[] = $propertyOwnerRental['RentalID'];
                $propertyOwnersForEachRentalsOwners_Phone_Number[] = $propertyOwnerRental['Owners_Phone_Number'];
                $propertyOwnersForEachRentalsEmail_Address[] = $propertyOwnerRental['Email_Address'];
                $propertyOwnersForEachRentalsRental_Term[] = $propertyOwnerRental['Rental_Term'];
                $propertyOwnersForEachRentalsAmount_of_Rent[] = $propertyOwnerRental['Amount_of_Rent'];
                $propertyOwnersForEachRentalsPitching[] = $propertyOwnerRental['Pitching'];
                $propertyOwnersForEachRentalsPreferred_Sorts_of_Applicants[] = $propertyOwnerRental['Preferred_Sorts_of_Applicants'];
                $propertyOwnersForEachRentalsMaximum_Number_Of_Occupants[] = $propertyOwnerRental['Maximum_Number_Of_Occupants'];
                $propertyOwnersForEachRentalsRules_Urls[] = $propertyOwnerRental['Rules_Urls'];
            }

            return array($propertyOwnersForEachRentalsRentalID, $propertyOwnersForEachRentalsOwners_Phone_Number, $propertyOwnersForEachRentalsEmail_Address, $propertyOwnersForEachRentalsRental_Term, $propertyOwnersForEachRentalsAmount_of_Rent, $propertyOwnersForEachRentalsPitching, $propertyOwnersForEachRentalsPreferred_Sorts_of_Applicants, $propertyOwnersForEachRentalsMaximum_Number_Of_Occupants, $propertyOwnersForEachRentalsRules_Urls);
        }
    }

    $propertyOwnersForEachRentals = getPropertyOwnersForEachRentals();
    print_r($propertyOwnersForEachRentals);
    echo "<br>";
    echo "<br>";
    
    echo gettype($propertyOwnersForEachRentals);

    function getApartments() {
        include "../Php/databaseConnector.php";

        $apartmentRentalID = array();
        $apartmentRental_Name  = array();
        $apartmentLocation = array();
        $apartmentGoogle_Location = array();
        $apartmentImage_Urls = array();
        $apartmentAmmenities = array();
        $apartmentNumber_Of_Bedrooms = array();
        $apartmentNumber_Of_Similar_Units = array();

        $sqlquery = "SELECT * FROM apartments";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($apartmentsRetrieved = mysqli_fetch_assoc($res)) {
                $apartmentRentalID[] = $apartmentsRetrieved['RentalID'];
                $apartmentRental_Name[] = $apartmentsRetrieved['Rental_Name'];
                $apartmentLocation[] = $apartmentsRetrieved['Location'];
                $apartmentGoogle_Location[] = $apartmentsRetrieved['Google_Location'];
                $apartmentImage_Urls[] = $apartmentsRetrieved['Image_Urls'];
                $apartmentAmmenities[] = $apartmentsRetrieved['Ammenities'];
                $apartmentNumber_Of_Bedrooms[] = $apartmentsRetrieved['Number_Of_Bedrooms'];
                $apartmentNumber_Of_Similar_Units[] = $apartmentsRetrieved['Number_Of_Similar_Units'];
            }

            return array($apartmentRentalID, $apartmentRental_Name, $apartmentLocation, $apartmentGoogle_Location, $apartmentImage_Urls, $apartmentAmmenities, $apartmentNumber_Of_Bedrooms, $apartmentNumber_Of_Similar_Units);
        }
    }

    $apartments = getApartments();
    print_r($apartments);
    echo "<br>";
    echo "<br>";
    echo gettype($apartments);

    function getBedsitters() {
        include "../Php/databaseConnector.php";

        $bedsitterRentalID = array();
        $bedsitterRental_Name  = array();
        $bedsitterLocation = array();
        $bedsitterGoogle_Location = array();
        $bedsitterImage_Urls = array();
        $bedsitterAmmenities = array();
        $bedsitterNumber_Of_Similar_Units = array();

        $sqlquery = "SELECT * FROM bedsitters";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($bedsittersRetrieved = mysqli_fetch_assoc($res)) {
                $bedsitterRentalID[] = $bedsittersRetrieved['RentalID'];
                $bedsitterRental_Name[] = $bedsittersRetrieved['Rental_Name'];
                $bedsitterLocation[] = $bedsittersRetrieved['Location'];
                $bedsitterGoogle_Location[] = $bedsittersRetrieved['Google_Location'];
                $bedsitterImage_Urls[] = $bedsittersRetrieved['Image_Urls'];
                $bedsitterAmmenities[] = $bedsittersRetrieved['Ammenities'];
                $bedsitterNumber_Of_Similar_Units[] = $bedsittersRetrieved['Number_Of_Similar_Units'];
            }

            return array($bedsitterRentalID, $bedsitterRental_Name, $bedsitterLocation, $bedsitterGoogle_Location, $bedsitterImage_Urls, $bedsitterAmmenities, $bedsitterNumber_Of_Similar_Units);
        }
    }

    $bedsitters = getBedsitters();
    print_r($bedsitters);
    echo "<br>";
    echo "<br>";
    echo gettype($bedsitters);

    function getBusinessPremises() {
        include "../Php/databaseConnector.php";

        $businesspremiseRentalID = array();
        $businesspremiseRental_Name  = array();
        $businesspremiseLocation = array();
        $businesspremiseGoogle_Location = array();
        $businesspremiseImage_Urls = array();
        $businesspremiseAmmenities = array();
        $businesspremiseNumber_Of_Similar_Units = array();

        $sqlquery = "SELECT * FROM business_premises";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($businesspremisesRetrieved = mysqli_fetch_assoc($res)) {
                $businesspremiseRentalID[] = $businesspremisesRetrieved['RentalID'];
                $businesspremiseRental_Name[] = $businesspremisesRetrieved['Rental_Name'];
                $businesspremiseTypeOfPremise[] = $businesspremisesRetrieved['Type_Of_Premise'];
                $businesspremiseLocation[] = $businesspremisesRetrieved['Location'];
                $businesspremiseGoogle_Location[] = $businesspremisesRetrieved['Google_Location'];
                $businesspremiseImage_Urls[] = $businesspremisesRetrieved['Image_Urls'];
                $businesspremiseAmmenities[] = $businesspremisesRetrieved['Ammenities'];
                $businesspremiseNumber_Of_Similar_Units[] = $businesspremisesRetrieved['Number_Of_Similar_Units'];
            }

            return array($businesspremiseRentalID, $businesspremiseRental_Name, $businesspremiseTypeOfPremise, $businesspremiseLocation, $businesspremiseGoogle_Location, $businesspremiseImage_Urls, $businesspremiseAmmenities, $businesspremiseNumber_Of_Similar_Units);
        }
    }

    $businesspremises = getBusinessPremises();
    print_r($businesspremises);
    echo "<br>";
    echo "<br>";
    echo gettype($businesspremises);

    function getHostels() {
        include "../Php/databaseConnector.php";

        $hostelRentalID = array();
        $hostelRental_Name  = array();
        $hostelLocation = array();
        $hostelGoogle_Location = array();
        $hostelImage_Urls = array();
        $hostelAmmenities = array();
        $hostelNumber_Of_Similar_Units = array();

        $sqlquery = "SELECT * FROM hostels";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($hostelsRetrieved = mysqli_fetch_assoc($res)) {
                $hostelRentalID[] = $hostelsRetrieved['RentalID'];
                $hostelRental_Name[] = $hostelsRetrieved['Rental_Name'];
                $hostelLocation[] = $hostelsRetrieved['Location'];
                $hostelGoogle_Location[] = $hostelsRetrieved['Google_Location'];
                $hostelImage_Urls[] = $hostelsRetrieved['Image_Urls'];
                $hostelAmmenities[] = $hostelsRetrieved['Ammenities'];
                $hostelNumber_Of_Similar_Units[] = $hostelsRetrieved['Number_Of_Similar_Units'];
            }

            return array($hostelRentalID, $hostelRental_Name, $hostelLocation, $hostelGoogle_Location, $hostelImage_Urls, $hostelAmmenities, $hostelNumber_Of_Similar_Units);
        }
    }

    $hostels = getHostels();
    print_r($hostels);
    echo "<br>";
    echo "<br>";
    echo gettype($hostels);

    function getHouses() {
        include "../Php/databaseConnector.php";

        $houseRentalID = array();
        $houseRental_Name  = array();
        $houseLocation = array();
        $houseGoogle_Location = array();
        $houseImage_Urls = array();
        $houseAmmenities = array();
        $houseNumber_Of_Bedrooms = array();
        $houseNumber_Of_Similar_Units = array();

        $sqlquery = "SELECT * FROM houses";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($housesRetrieved = mysqli_fetch_assoc($res)) {
                $houseRentalID[] = $housesRetrieved['RentalID'];
                $houseRental_Name[] = $housesRetrieved['Rental_Name'];
                $houseLocation[] = $housesRetrieved['Location'];
                $houseGoogle_Location[] = $housesRetrieved['Google_Location'];
                $houseImage_Urls[] = $housesRetrieved['Image_Urls'];
                $houseAmmenities[] = $housesRetrieved['Ammenities'];
                $houseNumber_Of_Bedrooms[] = $housesRetrieved['Number_Of_Bedrooms'];
                $houseNumber_Of_Similar_Units[] = $housesRetrieved['Number_Of_Similar_Units'];
            }

            return array($houseRentalID, $houseRental_Name, $houseLocation, $houseGoogle_Location, $houseImage_Urls, $houseAmmenities, $houseNumber_Of_Bedrooms, $houseNumber_Of_Similar_Units);
        }
    }

    $houses = getHouses();
    print_r($houses);
    echo "<br>";
    echo "<br>";
    echo gettype($houses);

    function getSingleRooms() {
        include "../Php/databaseConnector.php";

        $singleroomRentalID = array();
        $singleroomRental_Name  = array();
        $singleroomLocation = array();
        $singleroomGoogle_Location = array();
        $singleroomImage_Urls = array();
        $singleroomAmmenities = array();
        $singleroomNumber_Of_Similar_Units = array();

        $sqlquery = "SELECT * FROM single_rooms";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($singleroomsRetrieved = mysqli_fetch_assoc($res)) {
                $singleroomRentalID[] = $singleroomsRetrieved['RentalID'];
                $singleroomRental_Name[] = $singleroomsRetrieved['Rental_Name'];
                $singleroomLocation[] = $singleroomsRetrieved['Location'];
                $singleroomGoogle_Location[] = $singleroomsRetrieved['Google_Location'];
                $singleroomImage_Urls[] = $singleroomsRetrieved['Image_Urls'];
                $singleroomAmmenities[] = $singleroomsRetrieved['Ammenities'];
                $singleroomNumber_Of_Similar_Units[] = $singleroomsRetrieved['Number_Of_Similar_Units'];
            }

            return array($singleroomRentalID, $singleroomRental_Name, $singleroomLocation, $singleroomGoogle_Location, $singleroomImage_Urls, $singleroomAmmenities, $singleroomNumber_Of_Similar_Units);
        }
    }

    $singlerooms = getSingleRooms();
    print_r($singlerooms);
    echo "<br>";
    echo "<br>";
    echo gettype($singlerooms);

    function getSuites() {
        include "../Php/databaseConnector.php";

        $suiteRentalID = array();
        $suiteRental_Name  = array();
        $suiteLocation = array();
        $suiteGoogle_Location = array();
        $suiteImage_Urls = array();
        $suiteAmmenities = array();
        $suiteNumber_Of_Bedrooms = array();
        $suiteNumber_Of_Similar_Units = array();

        $sqlquery = "SELECT * FROM suites";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($suitesRetrieved = mysqli_fetch_assoc($res)) {
                $suiteRentalID[] = $suitesRetrieved['RentalID'];
                $suiteRental_Name[] = $suitesRetrieved['Rental_Name'];
                $suiteLocation[] = $suitesRetrieved['Location'];
                $suiteGoogle_Location[] = $suitesRetrieved['Google_Location'];
                $suiteImage_Urls[] = $suitesRetrieved['Image_Urls'];
                $suiteAmmenities[] = $suitesRetrieved['Ammenities'];
                $suiteNumber_Of_Bedrooms[] = $suitesRetrieved['Number_Of_Beds_Per_Suite'];
                $suiteNumber_Of_Similar_Units[] = $suitesRetrieved['Number_Of_Similar_Units'];
            }

            return array($suiteRentalID, $suiteRental_Name, $suiteLocation, $suiteGoogle_Location, $suiteImage_Urls, $suiteAmmenities, $suiteNumber_Of_Bedrooms, $suiteNumber_Of_Similar_Units);
        }
    }

    $suites = getSuites();
    print_r($suites);
    echo "<br>";
    echo "<br>";
    echo gettype($suites);

    include "../Php/admin-dashboard.php"
?>