`<?php
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone-number'];

    // To Get The Rentals Owned

    include "../Php/databaseConnector.php";

    $sqlQuery = "SELECT * FROM property_owners WHERE Email_Address = ? AND Phone_Number = ?";

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
    
    // If The Record Of The Landlord Exists
    if (mysqli_num_rows($res) > 0) {
        while ($property_owner = mysqli_fetch_assoc($res)) {
            $retrieved_rentals_owned = $property_owner['Rentals_Owned']; 
        }
        
        // If The Landlord Has Rentals

        if($retrieved_rentals_owned !== null) {
            $rentalsOwnedSplit = array();
            $rentalsOwnedSplit = explode(", ", $retrieved_rentals_owned);
            
            // For Each Rental Owned
    
            for($i = 0; $i < count($rentalsOwnedSplit); $i++) {
                $rentalDetails = array();
                $rentalDetails = explode("_", $rentalsOwnedSplit[$i]);
    
                $table = $rentalDetails[4];
                $tableName = "";
                switch($table) {
                    case "Hostel": $tableName = "hostels";  break;
                    case "Single Room": $tableName = "single_rooms";  break;
                    case "Bedsitter": $tableName = "bedsitters";  break;
                    case "Apartment": $tableName = "apartments";  break;
                    case "Business Premise": $tableName = "business_premises";  break;
                    case "House": $tableName = "houses";  break;
                    case "Suite": $tableName = "suites"; break; 
                }

                deleteRentalImages($tableName, $rentalsOwnedSplit[$i]);
                deleteRentalInTypesTable($tableName, $rentalsOwnedSplit[$i]);
                
            }

            deleteRentalRules($email, $phoneNumber);
            deleteRentalOwnerDetails($email, $phoneNumber);
        }

        deleteActualAccount($email, $phoneNumber);
        
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.location.href = '../Html/index.html';</script>";
        exit;
        

    } else {
        // If The Record Of The Landlord Does Not Exists

        header("Location: ../Html/index.html");
        exit;
    }


    function deleteRentalImages($tableName, $rentalID) {
        // To Get The Rental Images
    
        include "../Php/databaseConnector.php";
    
        $sqlQuery = "SELECT * FROM $tableName WHERE Rental_ID = ?";

        $stmt = mysqli_prepare($connectionInitialisation, $sqlQuery);
        
        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }
        
        mysqli_stmt_bind_param($stmt, 's', $rentalID);
        
        if (!mysqli_stmt_execute($stmt)) {
            die("Query execution failed: " . mysqli_error($connectionInitialisation));
        }
        
        $res = mysqli_stmt_get_result($stmt);
        
        if (!$res) {
            die("Result retrieval failed: " . mysqli_error($connectionInitialisation));
        }
        
        while ($typeOfRental = mysqli_fetch_assoc($res)) {
            $retrieved_images = $typeOfRental['Image_Urls'];
            switch($tableName) {
                case "apartments": 
                    $retrieved_apartment_bedrooms = $typeOfRental['Number_Of_Bedrooms'];
                    break;
                case "business_premises": 
                    $retrieved_premise_type = $typeOfRental['Type_Of_Premise'];
                    break;
                case "houses": 
                    $retrieved_house_bedrooms = $typeOfRental['Number_Of_Bedrooms'];
                    break;
            }
        }

        $rentalImages = array();
        $rentalImages = explode(", ", $retrieved_images);

        // For Each Image

        $ImageFilePath = "";
        for($j=0; $j<count($rentalImages); $j++) {
            switch($tableName) {
                case "apartments": 
                    if($retrieved_apartment_bedrooms <= 3) {
                        $ImageFilePath = "../Image_Data/Apartments/" . $retrieved_apartment_bedrooms. "-Bedroom/". $rentalImages[$j];
                    } else {
                        $ImageFilePath = "../Image_Data/Apartments/More Bedrooms/" . $retrieved_apartment_bedrooms. "-Bedrooms/". $rentalImages[$j];
                    }
                    break;
                case "business_premises": 
                    switch($retrieved_premise_type) {
                        case "Stall":
                            $ImageFilePath = "../Image_Data/Business Premises/Stall/" . $rentalImages[$j];  
                            break;
                        case "Shop":
                            $ImageFilePath = "../Image_Data/Business Premises/Shop/" . $rentalImages[$j];  
                            break;
                        case "Event Hall":
                            $ImageFilePath = "../Image_Data/Business Premises/Event Hall/" . $rentalImages[$j];  
                            break;
                        case "Warehouse":
                            $ImageFilePath = "../Image_Data/Business Premises/Warehouse/" . $rentalImages[$j];  
                            break;
                        case "Office":
                            $ImageFilePath = "../Image_Data/Business Premises/Office/" . $rentalImages[$j];  
                            break;
                        case "Industrial":
                            $ImageFilePath = "../Image_Data/Business Premises/Industrial/" . $rentalImages[$j];  
                            break;
                    }
                    break;
                case "houses": 
                    if($retrieved_house_bedrooms <= 3) {
                        $ImageFilePath = "../Image_Data/Houses/" . $retrieved_house_bedrooms. "-Bedroom/". $rentalImages[$j];
                    } else {
                        $ImageFilePath = "../Image_Data/Houses/More Bedrooms/" . $retrieved_house_bedrooms. "-Bedrooms/". $rentalImages[$j];
                    }
                    break;
                case "hostels": 
                    $ImageFilePath = "../Image_Data/Hostels/" . $rentalImages[$j];  
                    break;
                case "single_rooms": 
                    $ImageFilePath = "../Image_Data/Single Rooms/" . $rentalImages[$j];  
                    break;
                case "bedsitters": 
                    $ImageFilePath = "../Image_Data/Bedsitters/" . $rentalImages[$j];  
                    break;
                case "suites": 
                    $ImageFilePath = "../Image_Data/Suites/" . $rentalImages[$j];
                    break;  
            }

            // To Delete The Rental Images

            if (is_file($ImageFilePath)) {
                if (file_exists($ImageFilePath)) {
                    if (file_exists($ImageFilePath)) {
                        if (unlink($ImageFilePath)) {
                        } else {
                        }
                    }
                } else {
                }
            }
        }
    }

    function deleteRentalRules($email, $phoneNumber) {
        // To Get The Rental Rules
    
        include "../Php/databaseConnector.php";
        
        $sqlQuery = "SELECT * FROM properties_owners_details WHERE Email_Address = ? AND Owners_Phone_Number = ?";
    
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

        $retrieved_rules = array();
        while ($hybridTable = mysqli_fetch_assoc($res)) {
            array_push($retrieved_rules, $hybridTable['Rules_Urls']);
        }
        
        for ($j=0; $j<count($retrieved_rules); $j++) {
            
            $rentalRules = array();
            $rentalRules = explode(", ", $retrieved_rules[$j]);

            $ruleFilePath = "";

            // For Each Rules Image

            for($k=0; $k<count($rentalRules); $k++) {
                $ruleFilePath = "../Image_Data/Rules/" . $rentalRules[$k];
                
                // To Delete The Rules

                if (is_file($ruleFilePath)) {
                    if (file_exists($ruleFilePath)) {
                        if (file_exists($ruleFilePath)) {
                            if (unlink($ruleFilePath)) {
                            } else {
                            }
                        }
                    } else {
                    }
                }
            }
        }
    }

    function deleteRentalInTypesTable($tableName, $rentalID) {
        // To Delete Rental
                
        include "../Php/databaseConnector.php";
    
        $sqlquery = "DELETE FROM $tableName WHERE Rental_ID = ?";
        
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
        
        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }
        
        mysqli_stmt_bind_param($stmt, "s", $rentalID);
        // rentalsOwnedSplit[$i]

        if (!mysqli_stmt_execute($stmt)) {
            die("Delete query failed: " . mysqli_error($connectionInitialisation));
        }
    }

    function deleteRentalOwnerDetails($email, $phoneNumber) {
        // To Delete Landlord-Rental Relationship
                
        include "../Php/databaseConnector.php";
    
        $sqlquery = "DELETE FROM properties_owners_details WHERE Email_Address = ? AND Owners_Phone_Number = ?";
        
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
        
        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }
        
        mysqli_stmt_bind_param($stmt, "ss", $email, $phoneNumber);

        if (!mysqli_stmt_execute($stmt)) {
            die("Delete query failed: " . mysqli_error($connectionInitialisation));
        }
    }

    function deleteActualAccount($email, $phoneNumber) {
        // To Delete The Landlords Account

        include "../Php/databaseConnector.php";

        $sqlquery = "DELETE FROM property_owners WHERE Email_Address = ? AND Phone_Number = ?";
        
        $stmt = mysqli_prepare($connectionInitialisation, $sqlquery);
        
        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($connectionInitialisation));
        }
        
        mysqli_stmt_bind_param($stmt, "ss", $email, $phoneNumber);

        if (!mysqli_stmt_execute($stmt)) {
            die("Delete query failed: " . mysqli_error($connectionInitialisation));
        }
    }
?>`