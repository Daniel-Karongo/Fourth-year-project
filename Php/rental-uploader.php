<?php
    // include '../Php/databaseConnector.php';

    ammenities();
    preferredSortsOfTenants();
    grabPhotographs();    

    function generateRentalID() {
        $email = $_POST["email"];
        $phoneNumber = $_POST["phone-number"];
        $nameOfRental = $_POST["name-of-rental"];
        $typeOfRental = $_POST["type-of-rental"];
        $rentalID = time() . "_" . $email . "_" . $phoneNumber . "_" . $nameOfRental . "_" . $typeOfRental;
        return $rentalID;
    }

    function preferredSortsOfTenants() {
        $preferences = array();

        $gender = isset($_POST['gender']) ? $_POST["gender"] : null; 
        $students = isset($_POST['students']) ? $_POST["students"] : null; 
        $family = isset($_POST['family']) ? $_POST["family"] : null;
        $vehicles = isset($_POST['vehicles']) ? $_POST["vehicles"] : null;

        $Christianity = isset($_POST['Christianity']) ? $_POST["Christianity"] : null;
        $islam = isset($_POST['islam']) ? $_POST["islam"] : null;
        $hinduism = isset($_POST['hinduism']) ? $_POST["hinduism"] : null;
        $specified_religion = empty($_POST['specified-religion']) ? null : $_POST['specified-religion'];        
        $anyReligion = isset($_POST['any-religion']) ? $_POST["any-religion"] : null;

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
    }
    
    function grabPhotographs() {
        $typeOfRental = $_POST["type-of-rental"];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_FILES['images-upload'])){
                // include "./databaseConnector.php";                

                $fileCount = count($_FILES['images-upload']['name']);

                for ($i = 0; $i < $fileCount; $i++) {
                    $imageName = $_FILES['images-upload']['name'][$i];
                    $imageTemporaryName = $_FILES['images-upload']['tmp_name'][$i];
                    
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $imageExtensionInLowerCase = strtolower($imageExtension);
    
                    $newImageName = uniqid("IMG-", true).".".$imageExtensionInLowerCase;

                    if($typeOfRental === "Business Premise") {
                        $typeOfOfBusinessPremise = $_POST["type-of-premise"];
                        $imageUploadPath = "../Image_Data/Business Premises/" . $typeOfOfBusinessPremise . "/" . $newImageName;
                        move_uploaded_file($imageTemporaryName, $imageUploadPath);

                    } else if($typeOfRental === "Apartment") {
                        $typeOfApartment = $_POST["number-of-apartment-bedrooms"];
                        if($typeOfApartment !== "more") {
                            $imageUploadPath = "../Image_Data/Apartments/" . $typeOfApartment . "/" . $newImageName;
                            move_uploaded_file($imageTemporaryName, $imageUploadPath);
                        } else {
                            $moreApartmentBedrooms = $_POST["more-apartment-bedrooms"];
                            $imageUploadPath = "../Image_Data/Apartments/More Bedrooms/" . $moreApartmentBedrooms . "-Bedrooms/" . $newImageName;
                            if (!is_dir(dirname($imageUploadPath))) {
                                mkdir(dirname($imageUploadPath), 0777, true);
                            }                            
                            move_uploaded_file($imageTemporaryName, $imageUploadPath);
                        }                        
                    } else if($typeOfRental === "House") {
                        $typeOfHouse = $_POST["number-of-house-bedrooms"];
                        if($typeOfHouse !== "more") {
                            $imageUploadPath = "../Image_Data/Houses/" . $typeOfHouse . "/" . $newImageName;
                            move_uploaded_file($imageTemporaryName, $imageUploadPath);
                        } else {
                            $moreHouseBedrooms = $_POST["more-house-bedrooms"];
                            $imageUploadPath = "../Image_Data/Houses/More Bedrooms/" . $moreHouseBedrooms . "-Bedrooms/" . $newImageName;
                            if (!is_dir(dirname($imageUploadPath))) {
                                mkdir(dirname($imageUploadPath), 0777, true);
                            }                            
                            move_uploaded_file($imageTemporaryName, $imageUploadPath);
                        }
                    } else {
                        $imageUploadPath = "../Image_Data/" . $typeOfRental . "s/" . $newImageName;
                        move_uploaded_file($imageTemporaryName, $imageUploadPath);
                    }

                    
                    
                    // $sqlquery = "INSERT INTO images(image_url) VALUES('$newImageName');";
                    // mysqli_query($connectionInitialisation, $sqlquery);                        
                    // header("Location: view.php");                       
                                   
                }
            }
        }
    }

    function grabRules() {
        $rulesUpload = $_POST["rules-upload"]; 
    }

    function grabBasicInformation() {
        $numberOfApartmentBedrooms = $_POST["number-of-apartment-bedrooms"];
        $moreApartmentBedrooms = $_POST["more-apartment-bedrooms"];
        $typeOfOfBusinessPremise = $_POST["type-of-premise"];
        $numberOfHouseBedrooms = $_POST["number-of-house-bedrooms"];
        $moreHouseBedrooms = $_POST["more-house-bedrooms"];
        $typeOfRental = $_POST["type-of-rental"];

        $numberOfAvailableRentals = $_POST["number-of-available-rentals"];
        $numberOfOccupants = $_POST["maximum-occupants"];
        $location = $_POST["location"];
        $rentalTerm = $_POST["rental-term"];
        $amountOfRent = $_POST["rent"];
        $description = $_POST["description"];
    }

    function populatePropertiesDatabase() {
        
    }

    function populatePropertiesOwnersDatabase() {

    }

    // $sqlquery = "INSERT INTO property_owners (Phone_Number, Email_Address, Pass_word, First_Name, Last_Name) VALUES('$phoneNumber', '$email', '$hashedPassword', '$firstName', '$lastName');";
    // mysqli_query($connectionInitialisation, $sqlquery);

    // include '../Php/dashboard.php';
?>