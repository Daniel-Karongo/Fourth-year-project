<?php
    // include '../Php/databaseConnector.php';

    $nameOfRental = $_POST["name-of-rental"];
    $typeOfRental = $_POST["type-of-rental"];
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

    echo $nameOfRental;
    echo "<br>";
    echo $typeOfRental;
    echo "<br>";
    echo $numberOfAvailableRentals;
    echo "<br>";
    echo $numberOfOccupants;
    echo "<br>";
    echo $location;
    echo "<br>";
    echo $rentalTerm;
    echo "<br>";
    echo $amountOfRent;
    echo "<br>";
    echo $description;
    echo "<br>";

    $ammenities = array();
    
    
    
$cleanWater = $_POST["clean-water"];
$token = $_POST["token"]; 
$meter = $_POST["meter"];
$securityGuard = $_POST["security-guard"]; 
$cctv = $_POST["cctv"]; 
$securityLights = $_POST["security-lights"]; 
$pitLatrine = $_POST["pit-latrine"]; 
$automaticToilet = $_POST["automatic-toilet"]; 
$garbageCollection = $_POST["garbage-collection"]; 
$cleaner = $_POST["cleaner"]; 
$sink = $_POST["sink"]; 
$handicapAccess = $_POST["handicap-access"]; 
$packing = $_POST["packing"]; 
$tiles = $_POST["tiles"]; 
$ceiling = $_POST["ceiling"]; 
$balcony = $_POST["balcony"]; 
$wifi = $_POST["wi-fi"]; 
$jointTvSubscription = $_POST["joint-tv-subscription"]; 
$airConditioning = $_POST["air-conditioning"]; 
$furnished = $_POST["furnished"]; 
$swimmingPool = $_POST["swimming-pool"]; 
$gym = $_POST["gym"]; 
$gender = $_POST["gender"]; 
$students = $_POST["students"]; 
$family = $_POST["family"]; 
$vehicles = $_POST["vehicles"]; 
$Christianity = $_POST["Christianity"]; 
$islam = $_POST["islam"]; 
$hinduism = $_POST["hinduism"]; 
$otherReligion = $_POST["other-religion"]; 
$specifiedReligion = $_POST["specified-religion"]; 
$anyReligion = $_POST["any-religion"]; 
$rulesUpload = $_POST["rules-upload"]; 

echo $cleanWater;
echo "<br>";
echo $meter;
echo "<br>";
echo $securityGuard;
echo "<br>";
echo $cctv;
echo "<br>";
echo $securityLights;
echo "<br>";
echo $pitLatrine;
echo "<br>";
echo $automaticToilet;
echo "<br>";
echo $garbageCollection;
echo "<br>";
echo $cleaner;
echo "<br>";
echo $sink;
echo "<br>";
echo $handicapAccess;
echo "<br>";
echo $packing;
echo "<br>";
echo $tiles;
echo "<br>";
echo $ceiling;
echo "<br>";
echo $balcony;
echo "<br>";
echo $wifi;
echo "<br>";
echo $jointTvSubscription;
echo "<br>";
echo $airConditioning;
echo "<br>";
echo $furnished;
echo "<br>";
echo $swimmingPool;
echo "<br>";
echo $gym;
echo "<br>";
echo $gender;
echo "<br>";
echo $students;
echo "<br>";
echo $family;
echo "<br>";
echo $vehicles;
echo "<br>";
echo $Christianity;
echo "<br>";
echo $islam;
echo "<br>";
echo $hinduism;
echo "<br>";
echo $otherReligion;
echo "<br>";
echo $specifiedReligion;
echo "<br>";
echo $anyReligion;
echo "<br>";
echo $rulesUpload;
echo "<br>";

    
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if(isset($_POST['submit']) && isset($_FILES['images-upload[]'])){
//         include "./databaseConnector.php";

//         $fileCount = count($_FILES['image']['name']);

//         for ($i = 0; $i < $fileCount; $i++) {
//             $imageName = $_FILES['image']['name'][$i];
//             $imageType = $_FILES['image']['type'][$i];
//             $imageTemporaryName = $_FILES['image']['tmp_name'][$i];
//             $imageSize = $_FILES['image']['size'][$i];
//             $imageError = $_FILES['image']['error'][$i];

//             if($imageError === 0) {
//                 if($imageSize > 125000) {
//                     $errorMessage = "Sorry, Your File is Too Large";
//                     header("Location: index.php?error=$errorMessage");
//                 } else {
//                     echo "Not More than 1mb";
//                     $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
//                     $imageExtensionInLowerCase = strtolower($imageExtension);
//                     $allowedExtensions = array("apng", "gif", "ico", "jpg", "jpeg", "png", "svg", "webp");
    
//                     if(in_array($imageExtensionInLowerCase, $allowedExtensions)) {
//                         $newImageName = uniqid("IMG-", true).".".$imageExtensionInLowerCase;
//                         $imageUploadPath = "./Uploaded Images/".$newImageName;
//                         move_uploaded_file($imageTemporaryName, $imageUploadPath);
                        
//                         $sqlquery = "INSERT INTO images(image_url) VALUES('$newImageName');";
//                         mysqli_query($connectionInitialisation, $sqlquery);                        
//                         header("Location: view.php");
//                     } else {
//                         $errorMessage = "You Cannot Upload Images Of This Type";
//                         header("Location: index.php?error=$errorMessage");
//                     }
//                 }
//             } else {
//                 $errorMessage = "Unknown Error Occured";
//                 header("Location: index.php?error=$errorMessage");
//             }                
//         }
//     } else {
//         header("Location: index.php?error=$errorMessage");
//     }
// }



    // $sqlquery = "INSERT INTO property_owners (Phone_Number, Email_Address, Pass_word, First_Name, Last_Name) VALUES('$phoneNumber', '$email', '$hashedPassword', '$firstName', '$lastName');";

    // mysqli_query($connectionInitialisation, $sqlquery);

    // include '../Html/Manage.html';
?>