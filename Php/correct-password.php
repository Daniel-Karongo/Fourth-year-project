<?php
    $sqlquery = "SELECT * FROM property_owners WHERE Email_Address = '$email';";
    $res = mysqli_query($connectionInitialisation, $sqlquery);
    
    while ($property_owner = mysqli_fetch_assoc($res)) {
        $retrieved_phone_number = $property_owner['Phone_Number'];
        $retrieved_first_name = $property_owner['First_Name'];                    
        $retrieved_last_name = $property_owner['Last_Name'];
        $retrieved_rentals_owned = $property_owner['Rentals_Owned'];                    
    }

    $rentalsOwned = array();
    $rentalsOwned = explode(", ", $retrieved_rentals_owned);
    
    foreach($rentalsOwned as $rentalID) {
        $rentalIDComponents = explode("_", $rentalID);
        $lastIndex = count($rentalIDComponents) - 1;
        $rentalType = $rentalIDComponents[$lastIndex];
        $tablename = '';
        
        switch($rentalType) {
            case "Hostel":
                $tablename = "hostels";
                break;
            case "Single Room":
                $tablename = "single_rooms";
                break;
            case "Bedsitter":
                $tablename = "bedsitters";
                break;            
            case "Apartment":
                $tablename = "apartments";
                break;
            case "Business Premise":
                $tablename = "business_premises";
                break;
            case "House":
                $tablename = "houses";
                break;
            case "Suite":
                $tablename = "suites";
                break;
        }
        
        $sqlquery = "SELECT * FROM $tablename WHERE Rental_ID = '$rentalID';";
        $res = mysqli_query($connectionInitialisation, $sqlquery);

        if($res) {
            if (mysqli_num_rows($res) > 0) {

                while ($table = mysqli_fetch_assoc($res)) {
                    $retrieved_rentalID = $rentalID;
                    $retrieved_rental_name = $table['Rental_Name'];
                    $retrieved_location = $table['Location'];                    
                    $retrieved_google_location = $table['Google_Location'];
                    $retrieved_image_urls = $table['Image_Urls'];                    
                    $retrieved_ammenities = $table['Ammenities'];
                    $retrieved_number_of_units = $table['Number_Of_Similar_Units'];
        
                    echo "ID: " . $retrieved_rentalID;
                    echo "<br>";
                    echo "Name: " . $retrieved_rental_name;
                    echo "<br>";
                    echo "Location: " . $retrieved_location;
                    echo "<br>";
                    echo "Google Location: " . $retrieved_google_location;
                    echo "<br>";
                    echo "Images: " . $retrieved_image_urls;
                    echo "<br>";
                    echo "Ammenities: " . $retrieved_ammenities;
                    echo "<br>";
                    echo "Units: " . $retrieved_number_of_units;
                    echo "<br>";
                    
                    switch($tablename) {
                        case "apartments":
                            $retrieved_number_of_bedrooms = $table['Number_Of_Bedrooms'];
                            echo "Bedrooms: " . $retrieved_number_of_bedrooms;
                            echo "<br>";
                            break;
                        case "business_premises":
                            $retrieved_type_of_premise = $table['Type_Of_Premise'];
                            echo "Type of Business Premise: " . $retrieved_type_of_premise;
                            echo "<br>";
                            break;
                        case "houses":
                            $retrieved_number_of_bedrooms = $table['Number_Of_Bedrooms'];
                            echo "Bedrooms: " . $retrieved_number_of_bedrooms;
                            echo "<br>";
                            break;
                        case "suites":
                            $retrieved_number_of_beds = $table['Number_Of_Beds_Per_Suite'];
                            echo "Beds: " . $retrieved_number_of_beds;
                            echo "<br>";
                            break;
                    }
                    echo "<br>";
                    echo "<br>";
                }
    
            } else {
                echo "No Rentals Owned";        
            }
        } 
        else {
            echo "The User Has No Rentals Uploaded";
        }
           
    }


    include "../Php/dashboard.php";       
?>