<?php

    grabBasicInformation();

    function preferredSortsOfTenants() {
        
        $preferences = array();

        $gender = isset($_POST["gender"]) ? $_POST["gender"] : null; 
        $students = isset($_POST["students"]) ? $_POST["students"] : null; 
        $family = isset($_POST["family"]) ? $_POST["family"] : null;
        $vehicles = isset($_POST["vehicles"]) ? $_POST["vehicles"] : null;

        $Christianity = isset($_POST["Christianity"]) ? $_POST["Christianity"] : null;
        $islam = isset($_POST["islam"]) ? $_POST["islam"] : null;
        $hinduism = isset($_POST["hinduism"]) ? $_POST["hinduism"] : null;
        $specified_religion = empty($_POST["specified-religion"]) ? null : $_POST["specified-religion"];        
        $anyReligion = isset($_POST["any-religion"]) ? $_POST["any-religion"] : null;

        if ($gender !== null) {  
            array_push($preferences, "Gender: ".$gender);  
        }
        if ($students !== null) {  
            array_push($preferences, "Students: ".$students);  
        }
        if ($family !== null) {  
            array_push($preferences, "Family: ".$family);  
        }
        if ($vehicles !== null) {  
            array_push($preferences, "Vehicles: ".$vehicles);  
        }
        if ($Christianity !== null) {  
            array_push($preferences, "Christianity: ".$Christianity);  
        }
        if ($islam !== null) {  
            array_push($preferences, "Islam: ".$islam);  
        }
        if ($hinduism !== null) {  
            array_push($preferences, "Hinduism: ".$hinduism);  
        }
        if ($specified_religion !== null) {  
            array_push($preferences, "Specified Religion: ".$specified_religion);  
        }
        if ($anyReligion !== null) {  
            array_push($preferences, "Any Religion: ".$anyReligion);  
        }

        return $preferences;
    }

    function ammenities() {
        $ammenities = array();
        
        $cleanWater = isset($_POST["clean-water"]) ? $_POST["clean-water"] : null; 
        $token = isset($_POST["token"]) ? $_POST["token"] : null; 
        $meter = isset($_POST["meter"]) ? $_POST["meter"] : null;
        $securityGuard = isset($_POST["security-guard"]) ? $_POST["security-guard"] : null; 
        $cctv = isset($_POST["cctv"]) ? $_POST["cctv"] : null; 
        $securityLights = isset($_POST["security-lights"]) ? $_POST["security-lights"] : null; 
        $pitLatrine = isset($_POST["pit-latrine"]) ? $_POST["pit-latrine"] : null; 
        $automaticToilet = isset($_POST["automatic-toilet"]) ? $_POST["automatic-toilet"] : null; 
        $garbageCollection = isset($_POST["garbage-collection"]) ? $_POST["garbage-collection"] : null; 
        $cleaner = isset($_POST["cleaner"]) ? $_POST["cleaner"] : null; 
        $sink = isset($_POST["sink"]) ? $_POST["sink"] : null; 
        $handicapAccess = isset($_POST["handicap-access"]) ? $_POST["handicap-access"] : null; 
        $packing = isset($_POST["packing"]) ? $_POST["packing"] : null; 
        $tiles = isset($_POST["tiles"]) ? $_POST["tiles"] : null; 
        $ceiling = isset($_POST["ceiling"]) ? $_POST["ceiling"] : null; 
        $balcony = isset($_POST["balcony"]) ? $_POST["balcony"] : null; 
        $wifi = isset($_POST["wi-fi"]) ? $_POST["wi-fi"] : null; 
        $jointTvSubscription = isset($_POST["joint-tv-subscription"]) ? $_POST["joint-tv-subscription"] : null; 
        $airConditioning = isset($_POST["air-conditioning"]) ? $_POST["air-conditioning"] : null; 
        $furnished = isset($_POST["furnished"]) ? $_POST["furnished"] : null; 
        $swimmingPool = isset($_POST["swimming-pool"]) ? $_POST["swimming-pool"] : null; 
        $gym = isset($_POST["gym"]) ? $_POST["gym"] : null;

        if ($cleanWater !== null) {  
            array_push($ammenities, "Clean Water: ".$cleanWater);  
        }
        if ($token !== null) {  
            array_push($ammenities, "Token: ".$token);  
        }
        if ($meter !== null) {  
            array_push($ammenities, "Meter: ".$meter);  
        }
        if ($securityGuard !== null) {  
            array_push($ammenities, "Security Guard: ".$securityGuard);  
        }
        if ($cctv !== null) {  
            array_push($ammenities, "Cctv: ".$cctv);  
        }
        if ($securityLights !== null) {  
            array_push($ammenities, "Security Lights: ".$securityLights);  
        }
        if ($pitLatrine !== null) {  
            array_push($ammenities, "Pit Latrine: ".$pitLatrine);  
        }
        if ($automaticToilet !== null) {  
            array_push($ammenities, "Automatic Toilet: ".$automaticToilet);  
        }
        if ($garbageCollection !== null) {  
            array_push($ammenities, "Garbage Collection: ".$garbageCollection);  
        }
        if ($cleaner !== null) {  
            array_push($ammenities, "cleaner: ".$cleaner);  
        }
        if ($sink !== null) {  
            array_push($ammenities, "sink: ".$sink);  
        }        
        if ($handicapAccess !== null) {  
            array_push($ammenities, "handicap-access: ".$handicapAccess);  
        }
        if ($packing !== null) {  
            array_push($ammenities, "packing: ".$packing);  
        }
        if ($tiles !== null) {  
            array_push($ammenities, "tiles: ".$tiles);  
        }
        if ($ceiling !== null) {  
            array_push($ammenities, "ceiling: ".$ceiling);  
        }
        if ($balcony !== null) {  
            array_push($ammenities, "balcony: ".$balcony);  
        }
        if ($wifi !== null) {  
            array_push($ammenities, "wi-fi: ".$wifi);  
        }
        if ($jointTvSubscription !== null) {  
            array_push($ammenities, "joint-tv-subscription: ".$jointTvSubscription);  
        }
        if ($airConditioning !== null) {  
            array_push($ammenities, "air-conditioning: ".$airConditioning);  
        }
        if ($furnished !== null) {  
            array_push($ammenities, "furnished: ".$furnished);  
        }
        if ($swimmingPool !== null) {  
            array_push($ammenities, "swimming-pool: ".$swimmingPool);  
        }
        if ($gym !== null) {  
            array_push($ammenities, "gym: ".$gym);  
        }
        return $ammenities;
    }

    function grabPhotographs() {

        $typeOfRental = $_POST['premise-type'];
        $imagesToUpload = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_FILES['plot-photos'])){
                $files = $_FILES['plot-photos']['name'];
                $fileCount = count($_FILES['plot-photos']['name']);
                $files = array_filter($files);

                for ($i = 0; $i < $fileCount; $i++) {
                    if (empty($files[$i])) {
                        continue;
                    }
                    $imageName = $files[$i];
                    $imageTemporaryName = $_FILES['plot-photos']['tmp_name'][$i];
                    
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $imageExtensionInLowerCase = strtolower($imageExtension);
    
                    $newImageName = uniqid("IMG-", true).".".$imageExtensionInLowerCase;
                    
                    array_push($imagesToUpload, $newImageName);

                    if(($typeOfRental === "Stall") || ($typeOfRental === "Shop") || ($typeOfRental === "Stall") || ($typeOfRental === "Event Hall") || ($typeOfRental === "Warehouse") || ($typeOfRental === "Office") || ($typeOfRental === "Industrial")) {
                        $typeOfRental = $_POST['premise-type'];
                        $imageUploadPath = "../Image_Data/Business Premises/" . $typeOfRental . "/" . $newImageName;
                        move_uploaded_file($imageTemporaryName, $imageUploadPath);

                    } else if($typeOfRental === "Apartment") {
                        $apartmentBedrooms = $_POST['number-of-apartment-bedrooms'];
                        if($apartmentBedrooms < 4) {
                            $imageUploadPath = "../Image_Data/Apartments/" . $apartmentBedrooms . "-Bedroom/" . $newImageName;
                            move_uploaded_file($imageTemporaryName, $imageUploadPath);
                        } else {
                            $imageUploadPath = "../Image_Data/Apartments/More Bedrooms/" . $apartmentBedrooms . "-Bedrooms/" . $newImageName;
                            if (!is_dir(dirname($imageUploadPath))) {
                                mkdir(dirname($imageUploadPath), 0777, true);
                            }                            
                            move_uploaded_file($imageTemporaryName, $imageUploadPath);
                        }                        
                    } else if($typeOfRental === "House") {
                        $houseBedrooms = $_POST['number-of-house-bedrooms'];
                        if($houseBedrooms < 4) {
                            $imageUploadPath = "../Image_Data/Houses/" . $houseBedrooms . "-Bedroom/" . $newImageName;
                            move_uploaded_file($imageTemporaryName, $imageUploadPath);
                        } else {
                            $imageUploadPath = "../Image_Data/Houses/More Bedrooms/" . $houseBedrooms . "-Bedrooms/" . $newImageName;
                            if (!is_dir(dirname($imageUploadPath))) {
                                mkdir(dirname($imageUploadPath), 0777, true);
                            }                            
                            move_uploaded_file($imageTemporaryName, $imageUploadPath);
                        }
                    } else {
                        $imageUploadPath = "../Image_Data/" . $typeOfRental . "s/" . $newImageName;
                        move_uploaded_file($imageTemporaryName, $imageUploadPath);
                    }                            
                }
                return $imagesToUpload;
            }
        }
    }

    function grabBasicInformation() {

        $rentalID = $_POST['rental-ID'];
        $nameOfRental = $_POST['rental-name'];
        $amountOfRent = $_POST['rent-amount'];
        $rentalTerm = $_POST['rent-term'];
        $description = $_POST['description'];
        $typeOfRental = $_POST['premise-type'];
        $availableUnits = $_POST['number-of-units'];
        
        $suiteBeds = isset($_POST['number-of-beds']);
        $apartmentBedrooms = isset($_POST['number-of-apartment-bedrooms']);
        $houseBedrooms = isset($_POST['number-of-house-bedrooms']);
        $maximumHostelOccupants = isset($_POST['maximum-number-of-Hostel-occupants']);
        $maximumBedsitterOccupants = isset($_POST['maximum-number-of-bedsitter-occupants']);
        $maximumSingleRoomOccupants = isset($_POST['maximum-number-of-single-room-occupants']);

        $location = $_POST['location'];
        $googleLocation = $_POST['google-location'];

        $oldPlotPhotosPaths = $_POST['old-plot-photos-paths'];
        
        $plotPhotos = grabPhotographs();
        $rulesPhotos = grabRules();
        $preferences = preferredSortsOfTenants();
        $ammenities = ammenities();
        

        $plotNames = "";        
        foreach($plotPhotos as $plotPhoto) {
            if($plotNames !== '') {
                $plotNames = $plotNames  . ", " . $plotPhoto;
            } else {
                $plotNames = $plotPhoto;
            }
        }

        $rulesFiles = "";        
        foreach($rulesPhotos as $rulesPhoto) {
            if($rulesFiles !== '') {
                $rulesFiles = $rulesFiles  . ", " . $rulesPhoto;
            } else {
                $rulesFiles = $rulesPhoto;
            }
        }

        $preferencesCollection = "";        
        foreach($preferences as $preference) {
            if($preferencesCollection !== '') {
                $preferencesCollection = $preferencesCollection  . ", " . $preference;
            } else {
                $preferencesCollection = $preference;
            }
        }

        $ammenitiesCollection = "";        
        foreach($ammenities as $ammenity) {
            if($ammenitiesCollection !== '') {
                $ammenitiesCollection = $ammenitiesCollection  . ", " . $ammenity;
            } else {
                $ammenitiesCollection = $ammenity;
            }
        }
        
        $rentalID = $_POST['rental-ID'];
        
        $oldPlotPhotos = $_POST['old-plot-photos'];
        $individualOldPhotos = explode(", ", $oldPlotPhotos);
        for($i=0; $i<count($individualOldPhotos); $i++) {
            $filePath = $oldPlotPhotosPaths . $individualOldPhotos[$i];
            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                } else {
                }
            } else {
            }
        }

        $oldRulesPhotos = $_POST['old-rules-photos'];
        $individualOldRulesPhotos = explode(", ", $oldRulesPhotos);
        for($i=0; $i<count($individualOldRulesPhotos); $i++) {
            $filePath = "../Image_Data/Rules/" . $individualOldRulesPhotos[$i];
            if (is_file($filePath)) {
                if (file_exists($filePath)) {
                    if (unlink($filePath)) {
                    } else {
                    }
                } else {
                }
            }            
        }

        
        include '../Php/databaseConnector.php';

        switch($typeOfRental){
            case 'Hostel':
                $tableName = "Hostels";

                otherTablesPopulator($tableName, $rentalID, $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $availableUnits, $connectionInitialisation);

                properties_owners_detailsTablePopulator($rentalID, $rentalTerm, $amountOfRent, $description, $preferencesCollection, $maximumHostelOccupants, $rulesFiles, $connectionInitialisation);
                
                break;

            case "Single Room":
                $tableName = "single_rooms";

                otherTablesPopulator($tableName, $rentalID, $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $availableUnits, $connectionInitialisation);

                properties_owners_detailsTablePopulator($rentalID, $rentalTerm, $amountOfRent, $description, $preferencesCollection, $maximumSingleRoomOccupants, $rulesFiles, $connectionInitialisation);
                
                break;
            
            case "Bedsitter":
                $tableName = "bedsitters";

                otherTablesPopulator($tableName, $rentalID, $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $availableUnits, $connectionInitialisation);

                properties_owners_detailsTablePopulator($rentalID, $rentalTerm, $amountOfRent, $description, $preferencesCollection, $maximumBedsitterOccupants, $rulesFiles, $connectionInitialisation);

                break;
            
            case "Suite":
                $tableName = "suites";
                $extraColumn = "Number_Of_Beds_Per_Suite";

                eightColumnTablesPopulator($tableName, $extraColumn, $rentalID, $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $suiteBeds, $availableUnits, $connectionInitialisation);

                properties_owners_detailsTablePopulator($rentalID, $rentalTerm, $amountOfRent, $description, $preferencesCollection, "", $rulesFiles, $connectionInitialisation);

                break;
            
            case "Apartment":
                $tableName = "apartments";
                $extraColumn = "Number_Of_Bedrooms";

                eightColumnTablesPopulator($tableName, $extraColumn, $rentalID, $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $apartmentBedrooms, $availableUnits, $connectionInitialisation);
                                
                properties_owners_detailsTablePopulator($rentalID, $rentalTerm, $amountOfRent, $description, $preferencesCollection, "", $rulesFiles, $connectionInitialisation);

                break;
            
            case "House":
                $tableName = "houses";
                $extraColumn = "Number_Of_Bedrooms";

                eightColumnTablesPopulator($tableName, $extraColumn, $rentalID, $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $houseBedrooms, $availableUnits, $connectionInitialisation);
                
                properties_owners_detailsTablePopulator($rentalID, $rentalTerm, $amountOfRent, $description, $preferencesCollection, "", $rulesFiles, $connectionInitialisation);

                break;
            
            default:
                $sqlQuery = "UPDATE business_premises 
                                SET Rental_Name = ?, 
                                    Type_Of_Premise = ?, 
                                    Location = ?, 
                                    Google_Location = ?, 
                                    Image_Urls = ?, 
                                    Ammenities = ?, 
                                    Number_Of_Similar_Units = ?                
                                WHERE Rental_ID = ?";

                $stmt = mysqli_prepare($connectionInitialisation, $sqlQuery);

                if (!$stmt) {
                die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
                }

                mysqli_stmt_bind_param($stmt, 'ssssssis', $nameOfRental, $typeOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $availableUnits, $rentalID);

                if (!mysqli_stmt_execute($stmt)) {
                die("Update query failed: " . mysqli_error($connectionInitialisation));
                }

                mysqli_stmt_close($stmt);

                properties_owners_detailsTablePopulator($rentalID, $rentalTerm, $amountOfRent, $description, $preferencesCollection, "", $rulesFiles, $connectionInitialisation);

        }

        $email = $_POST["email"];
        $password = $_POST['password'];
        
        include "../Php/correct-password.php";
    
    }

    function grabRules() {
        $imagesToUpload = array();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_FILES['rules-photos'])){
            
                $files = $_FILES['rules-photos']['name'];
                $fileCount = count($_FILES['rules-photos']['name']);
                $files = array_filter($files);
                
                for ($i = 0; $i < $fileCount; $i++) {
                    if(empty($files[$i])) {
                        continue;
                    }
                    $imageName = $files[$i];
                    $imageTemporaryName = $_FILES['rules-photos']['tmp_name'][$i];
                    
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $imageExtensionInLowerCase = strtolower($imageExtension);
    
                    $newImageName = uniqid("IMG-", true).".".$imageExtensionInLowerCase;

                    array_push($imagesToUpload, $newImageName);
                
                    $imageUploadPath = "../Image_Data/Rules/" . $newImageName;
                    move_uploaded_file($imageTemporaryName, $imageUploadPath);                      
                                   
                }
                return $imagesToUpload;
            }
        }
    }

    function otherTablesPopulator($tableName, $rentalID, $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $availableUnits, $connectionInitialisation) {
        include '../Php/databaseConnector.php';

        // Prepare the SQL statement with placeholders
        $sqlQuery = "UPDATE $tableName 
                        SET Rental_Name = ?, 
                            Location = ?, 
                            Google_Location = ?, 
                            Image_Urls = ?, 
                            Ammenities = ?, 
                            Number_Of_Similar_Units = ?                
                        WHERE Rental_ID = ?";

        // Create a prepared statement
        $stmt = mysqli_prepare($connectionInitialisation, $sqlQuery);

        // Check if the prepared statement was created successfully
        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        // Bind the parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, 'sssssis', $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $availableUnits, $rentalID);

        // Execute the prepared statement
        if (!mysqli_stmt_execute($stmt)) {
            die("Update query failed: " . mysqli_error($connectionInitialisation));
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);

    }

    function eightColumnTablesPopulator($tableName, $extraColumn, $rentalID, $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $numberOfOccupants, $availableUnits, $connectionInitialisation) {
        include '../Php/databaseConnector.php';

        $sqlQuery = "UPDATE $tableName 
                        SET Rental_Name = ?, 
                            Location = ?, 
                            Google_Location = ?, 
                            Image_Urls = ?, 
                            Ammenities = ?, 
                            $extraColumn = ?, 
                            Number_Of_Similar_Units = ?                
                        WHERE Rental_ID = ?";

        $stmt = mysqli_prepare($connectionInitialisation, $sqlQuery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        mysqli_stmt_bind_param($stmt, 'sssssiis', $nameOfRental, $location, $googleLocation, $plotNames, $ammenitiesCollection, $numberOfOccupants, $availableUnits, $rentalID);

        if (!mysqli_stmt_execute($stmt)) {
            die("Update query failed: " . mysqli_error($connectionInitialisation));
        }

        mysqli_stmt_close($stmt);
            
    }

    function properties_owners_detailsTablePopulator($rentalID, $rentalTerm, $amountOfRent, $description, $preferencesCollection, $numberOfOccupants, $rulesFiles, $connectionInitialisation) {

        include '../Php/databaseConnector.php';

        $sqlQuery = "UPDATE properties_owners_details
                        SET Rental_Term = ?, 
                            Amount_of_Rent = ?, 
                            Pitching = ?, 
                            Preferred_Sorts_of_Applicants = ?, 
                            Maximum_Number_Of_Occupants = ?, 
                            Rules_Urls = ?                
                        WHERE Rental_ID = ?";

        $stmt = mysqli_prepare($connectionInitialisation, $sqlQuery);

        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }

        mysqli_stmt_bind_param($stmt, 'sississ', $rentalTerm, $amountOfRent, $description, $preferencesCollection, $numberOfOccupants, $rulesFiles, $rentalID);

        if (!mysqli_stmt_execute($stmt)) {
            die("Update query failed: " . mysqli_error($connectionInitialisation));
        }

        mysqli_stmt_close($stmt);
                
    }
?>