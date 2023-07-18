<?php
    include '../Php/databaseConnector.php';

    $rentalID = $_POST['rentalID'];
    $tablename = $_POST['tableName'];
    $email = $_POST['user-email'];
    $phoneNumber = $_POST['phone-number'];
    $password = $_POST['password-for-delete'];
    // $rentalsOwned = $_POST['rentals-owned'];
    $images = $_POST['image-urls'];
    $imagepaths = $_POST['image-paths'];
    $rules = $_POST['rules-urls'];

    $sqlQuery = "SELECT Rentals_Owned FROM property_owners WHERE Email_Address = ? AND Phone_Number = ?";

    $stmt = mysqli_prepare($connectionInitialisation, $sqlQuery);
    
    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }
    
    mysqli_stmt_bind_param($stmt, 'ss', $email, $phoneNumber);
    
    if (!mysqli_stmt_execute($stmt)) {
        die("Query execution failed: " . mysqli_error($connectionInitialisation));
    }
    
    $res = mysqli_stmt_get_result($stmt);
    
    if (!$res) {
        die("Result retrieval failed: " . mysqli_error($connectionInitialisation));
    }
    
    while ($property_owner = mysqli_fetch_assoc($res)) {
        $retrieved_rentals_owned = $property_owner['Rentals_Owned'];
    }


    $rentalsOwnedSplit = array();
    $rentalsOwnedSplit = explode(", ", $retrieved_rentals_owned);
    $index = array_search($rentalID, $rentalsOwnedSplit);

    if ($index !== false) {
        unset($rentalsOwnedSplit[$index]);
    }

    
    $rentalsOwnedRejoined = implode(", ", $rentalsOwnedSplit);
    $individualImages = explode(", ", $images);

    for($i=0; $i<count($individualImages); $i++) {
        $filePath = $imagepaths . $individualImages[$i];
        if (is_file($filePath)) {
            if (file_exists($filePath)) {
                if (file_exists($filePath)) {
                    if (unlink($filePath)) {
                    } else {
                    }
                }
            } else {
            }
        }
    }

    $individualrulesPhotos = explode(", ", $rules);

    for($i=0; $i<count($individualrulesPhotos); $i++) {
        $filePath = "../Image_Data/Rules/" . $individualrulesPhotos[$i];
        if (file_exists($filePath)) {
            if (is_file($filePath)) {
                if (unlink($filePath)) {
                } else {
                }
            }
        } else {
        }
    }

    $sqlquery = "DELETE FROM $tablename WHERE Rental_ID = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
    
    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }
    
    mysqli_stmt_bind_param($stmt, "s", $rentalID);

    if (!mysqli_stmt_execute($stmt)) {
        die("Delete query failed: " . mysqli_error($connectionInitialisation));
    }

    $sqlquery = "DELETE FROM properties_owners_details WHERE Rental_ID = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
    
    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }
    
    mysqli_stmt_bind_param($stmt, "s", $rentalID);

    if (!mysqli_stmt_execute($stmt)) {
        die("Delete query failed: " . mysqli_error($connectionInitialisation));
    }

    $sqlquery = "UPDATE property_owners SET Rentals_Owned = ? WHERE Email_Address = ? AND Phone_Number = ?";
    $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
    
    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
    }
    
    mysqli_stmt_bind_param($stmt, "sss", $rentalsOwnedRejoined, $email, $phoneNumber);

    if (!mysqli_stmt_execute($stmt)) {
        die("Update query failed: " . mysqli_error($connectionInitialisation));
    }
    include '../Php/correct-password.php';
?>