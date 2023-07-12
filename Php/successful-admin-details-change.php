<?php
    include "../Php/databaseConnector.php";

    $phoneNumber = $_POST["admin-phone-number"];
    $email = $_POST["admin-modified-email"];
    $password = $_POST["admin-password"];

    function getPropertyOwners() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM property_owners";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        $property_owners = array();

        if (mysqli_num_rows($res) > 0) {
            $i=0;
            while ($property_owner = mysqli_fetch_assoc($res)) {
                $property_owners[$i][0] = $property_owner['Phone_Number'];
                $property_owners[$i][1] = $property_owner['Email_Address'];
                $property_owners[$i][2] = $property_owner['Pass_Word'];
                $property_owners[$i][3] = $property_owner['First_Name'];
                $property_owners[$i][4] = $property_owner['Last_Name'];
                $property_owners[$i][5] = $property_owner['Rentals_Owned'];
                $property_owners[$i][6] = $property_owner['Password_Reset_Confirmation_Code'];
                $property_owners[$i][7] = $property_owner['Remember_Me'];
                
                $i++;
            }

            return $property_owners;
        }
    }

    $property_owners = getPropertyOwners();


    function getPropertyOwnersForEachRentals() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM properties_owners_details";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        $propertyownersforeachrentals = array();

        if (mysqli_num_rows($res) > 0) {
            $i=0;
            while ($propertyOwnerRental = mysqli_fetch_assoc($res)) {
                $propertyownersforeachrentals[$i][0] = $propertyOwnerRental['Rental_ID'];
                $propertyownersforeachrentals[$i][1] = $propertyOwnerRental['Owners_Phone_Number'];
                $propertyownersforeachrentals[$i][2] = $propertyOwnerRental['Email_Address'];
                $propertyownersforeachrentals[$i][3] = $propertyOwnerRental['Rental_Term'];
                $propertyownersforeachrentals[$i][4] = $propertyOwnerRental['Amount_of_Rent'];
                $propertyownersforeachrentals[$i][5] = $propertyOwnerRental['Pitching'];
                $propertyownersforeachrentals[$i][6] = $propertyOwnerRental['Preferred_Sorts_of_Applicants'];
                $propertyownersforeachrentals[$i][7] = $propertyOwnerRental['Maximum_Number_Of_Occupants'];
                $propertyownersforeachrentals[$i][8] = $propertyOwnerRental['Rules_Urls'];

                $i++;
            }

            return $propertyownersforeachrentals;
        }
    }

    $propertyOwnersForEachRentals = getPropertyOwnersForEachRentals();


    function getApartments() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM apartments";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        $apartments = array();

        if (mysqli_num_rows($res) > 0) {
            $i=0;
            while ($apartmentsRetrieved = mysqli_fetch_assoc($res)) {
                $apartments[$i][0] = $apartmentsRetrieved['Rental_ID'];
                $apartments[$i][1] = $apartmentsRetrieved['Rental_Name'];
                $apartments[$i][2] = $apartmentsRetrieved['Location'];
                $apartments[$i][3] = $apartmentsRetrieved['Google_Location'];
                $apartments[$i][4] = $apartmentsRetrieved['Image_Urls'];
                $apartments[$i][5] = $apartmentsRetrieved['Ammenities'];
                $apartments[$i][6] = $apartmentsRetrieved['Number_Of_Bedrooms'];
                $apartments[$i][7] = $apartmentsRetrieved['Number_Of_Similar_Units'];
                $i++;
            }

            return $apartments;
        }
    }

    $apartments = getApartments();


    function getBedsitters() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM bedsitters";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);
        
        $bedsitters = array();

        if (mysqli_num_rows($res) > 0) {
            
            $i=0;
            
            while ($bedsittersRetrieved = mysqli_fetch_assoc($res)) {
                $bedsitters[$i][0] = $bedsittersRetrieved['Rental_ID'];
                $bedsitters[$i][1] = $bedsittersRetrieved['Rental_Name'];
                $bedsitters[$i][2] = $bedsittersRetrieved['Location'];
                $bedsitters[$i][3] = $bedsittersRetrieved['Google_Location'];
                $bedsitters[$i][4] = $bedsittersRetrieved['Image_Urls'];
                $bedsitters[$i][5] = $bedsittersRetrieved['Ammenities'];
                $bedsitters[$i][6] = $bedsittersRetrieved['Number_Of_Similar_Units'];
                
                $i++;
            }

            return $bedsitters;
        }
    }

    $bedsitters = getBedsitters();


    function getBusinessPremises() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM business_premises";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        $businesspremises = array();

        if (mysqli_num_rows($res) > 0) {
            
            $i=0;
            while ($businesspremisesRetrieved = mysqli_fetch_assoc($res)) {
                $businesspremises[$i][0] = $businesspremisesRetrieved['Rental_ID'];
                $businesspremises[$i][1] = $businesspremisesRetrieved['Rental_Name'];
                $businesspremises[$i][2] = $businesspremisesRetrieved['Type_Of_Premise'];
                $businesspremises[$i][3] = $businesspremisesRetrieved['Location'];
                $businesspremises[$i][4] = $businesspremisesRetrieved['Google_Location'];
                $businesspremises[$i][5] = $businesspremisesRetrieved['Image_Urls'];
                $businesspremises[$i][6] = $businesspremisesRetrieved['Ammenities'];
                $businesspremises[$i][7] = $businesspremisesRetrieved['Number_Of_Similar_Units'];

                $i++;
            }

            return $businesspremises;
        }
    }

    $businesspremises = getBusinessPremises();


    function getHostels() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM hostels";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        $hostels = array();

        if (mysqli_num_rows($res) > 0) {
            while ($hostelsRetrieved = mysqli_fetch_assoc($res)) {
                $hostels[$i][0] = $hostelsRetrieved['Rental_ID'];
                $hostels[$i][1] = $hostelsRetrieved['Rental_Name'];
                $hostels[$i][2] = $hostelsRetrieved['Location'];
                $hostels[$i][3] = $hostelsRetrieved['Google_Location'];
                $hostels[$i][4] = $hostelsRetrieved['Image_Urls'];
                $hostels[$i][5] = $hostelsRetrieved['Ammenities'];
                $hostels[$i][6] = $hostelsRetrieved['Number_Of_Similar_Units'];

                $i++;
            }

            return $hostels;
        }
    }

    $hostels = getHostels();


    function getHouses() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM houses";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        $houses = array();

        if (mysqli_num_rows($res) > 0) {
            $i=0;
            while ($housesRetrieved = mysqli_fetch_assoc($res)) {
                $houses[$i][0] = $housesRetrieved['Rental_ID'];
                $houses[$i][1] = $housesRetrieved['Rental_Name'];
                $houses[$i][2] = $housesRetrieved['Location'];
                $houses[$i][3] = $housesRetrieved['Google_Location'];
                $houses[$i][4] = $housesRetrieved['Image_Urls'];
                $houses[$i][5] = $housesRetrieved['Ammenities'];
                $houses[$i][6] = $housesRetrieved['Number_Of_Bedrooms'];
                $houses[$i][7] = $housesRetrieved['Number_Of_Similar_Units'];

                $i++;
            }

            return $houses;
        }
    }

    $houses = getHouses();


    function getSingleRooms() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM single_rooms";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        $singlerooms = array();

        if (mysqli_num_rows($res) > 0) {

            $i=0;

            while ($singleroomsRetrieved = mysqli_fetch_assoc($res)) {
                $singlerooms[$i][0] = $singleroomsRetrieved['Rental_ID'];
                $singlerooms[$i][2] = $singleroomsRetrieved['Rental_Name'];
                $singlerooms[$i][3] = $singleroomsRetrieved['Location'];
                $singlerooms[$i][4] = $singleroomsRetrieved['Google_Location'];
                $singlerooms[$i][5] = $singleroomsRetrieved['Image_Urls'];
                $singlerooms[$i][6] = $singleroomsRetrieved['Ammenities'];
                $singlerooms[$i][7] = $singleroomsRetrieved['Number_Of_Similar_Units'];

                $i++;
            }

            return $singlerooms;
        }
    }

    $singlerooms = getSingleRooms();


    function getSuites() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM suites";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        $suites = array();

        if (mysqli_num_rows($res) > 0) {
            
            $i=0;
            
            while ($suitesRetrieved = mysqli_fetch_assoc($res)) {
                $suites[$i][0] = $suitesRetrieved['Rental_ID'];
                $suites[$i][1] = $suitesRetrieved['Rental_Name'];
                $suites[$i][2] = $suitesRetrieved['Location'];
                $suites[$i][3] = $suitesRetrieved['Google_Location'];
                $suites[$i][4] = $suitesRetrieved['Image_Urls'];
                $suites[$i][5] = $suitesRetrieved['Ammenities'];
                $suites[$i][6] = $suitesRetrieved['Number_Of_Beds_Per_Suite'];
                $suites[$i][7] = $suitesRetrieved['Number_Of_Similar_Units'];

                $i++;
            }

            return $suites;
        }
    }

    $suites = getSuites();


    function getAdministrators() {
        include "../Php/databaseConnector.php";

        $sqlquery = "SELECT * FROM administrators";
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }

        $res = mysqli_stmt_get_result($stmt);

        $administrators = array();

        if (mysqli_num_rows($res) > 0) {

            $i=0;

            while ($adminRetrieved = mysqli_fetch_assoc($res)) {
                $administrators[$i][0] = $adminRetrieved['Email_Address'];
                $administrators[$i][1] = $adminRetrieved['Phone_Number'];
                $administrators[$i][2] = $adminRetrieved['Password'];
                $administrators[$i][3] = $adminRetrieved['First_Name'];
                $administrators[$i][4] = $adminRetrieved['Last_Name'];
                $administrators[$i][5] = $adminRetrieved['Password_Reset_Confirmation_Code'];
                $administrators[$i][6] = $adminRetrieved['Remember_Me'];

                $i++;
            }

            return $administrators;
        }
    }

    $administrators = getAdministrators();


    include "../Php/databaseConnector.php";

    $sqlquery = "SELECT * FROM administrators WHERE BINARY Email_Address = ?;";
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
   
    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);

    if (!mysqli_stmt_execute($stmt)) {
        die("Query execution failed: " . mysqli_error($connectionInitialisation));
    }

    $res = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) > 0) {
        $email = $_POST["admin-modified-email"];
        $password = $_POST["admin-password"];

        while ($adminRetrieved = mysqli_fetch_assoc($res)) {
            $adminPhone_Number = $adminRetrieved['Phone_Number'];
            $adminFirst_Name = $adminRetrieved['First_Name'];
            $adminLast_Name = $adminRetrieved['Last_Name'];
            $adminPassword = $adminRetrieved['Password'];
            $adminPasswordResetCode = $adminRetrieved['Password_Reset_Confirmation_Code'];
            $adminPasswordRememberMeToken = $adminRetrieved['Remember_Me'];

            if(password_verify($password, $adminPassword)) {
                include "../Php/admin-dashboard.php";
                break;
            }
        }
    }

?>