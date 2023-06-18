<?php
    include '../Php/databaseConnector.php';

    $rentalID = $_POST['rentalID'];
    $tablename = $_POST['tableName'];
    $email = $_POST['user-email'];
    $phoneNumber = $_POST['phone-number'];
    $rentalsOwned = $_POST['rentals-owned'];
    $images = $_POST['image-urls'];
    $imagepaths = $_POST['image-paths'];
    $rules = $_POST['rules-urls'];

    $rentalsOwnedSplit = array();
    $rentalsOwnedSplit = explode(", ", $rentalsOwned);
    $index = array_search($rentalID, $rentalsOwnedSplit);

    if ($index !== false) {
        unset($rentalsOwnedSplit[$index]);
    } 
    
    $rentalsOwnedRejoined = implode(", ", $rentalsOwnedSplit);
    $individualImages = explode(", ", $images);

    for($i=0; $i<count($individualImages); $i++) {
        $filePath = $imagepaths . $individualImages[$i];
        if (file_exists($filePath)) {
            if (unlink($filePath)) {
            } else {
            }
        } else {
        }
    }

    $individualrulesPhotos = explode(", ", $rules);

    for($i=0; $i<count($individualrulesPhotos); $i++) {
        $filePath = "../Image_Data/Rules/" . $individualrulesPhotos[$i];
        if (file_exists($filePath)) {
            if (unlink($filePath)) {
            } else {
            }
        } else {
        }
    }

    $sqlquery = "DELETE FROM $tablename WHERE Rental_ID = '$rentalID';";
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    } 
    
    $sqlquery = "DELETE FROM properties_owners_details WHERE Rental_ID = '$rentalID';";
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }
    
    $sqlquery = "UPDATE property_owners 
                 SET Rentals_Owned = '$rentalsOwnedRejoined'                      
                 WHERE Email_Address = '$email' 
                     AND Phone_Number = '$phoneNumber'";
    
    if (!mysqli_query($connectionInitialisation, $sqlquery)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }

    include '../Php/correct-password.php';
?>