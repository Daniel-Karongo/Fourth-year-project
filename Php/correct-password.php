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
    
    $retrieved_rentalID = array();
    $retrieved_rental_name = array();
    $rentalType = array();
    $retrieved_location = array();
    $retrieved_google_location = array();
    $retrieved_image_urls = array();
    $retrieved_ammenities = array();
    $retrieved_number_of_units = array();

    $apartments_retrieved_number_of_bedrooms = array();
    $business_premises_retrieved_type_of_premise = array();    
    $houses_retrieved_number_of_bedrooms = array();
    $suites_retrieved_number_of_beds = array();

    $retrieved_rental_term = array();
    $retrieved_amount_of_rent = array();
    $retrieved_description = array();
    $retrieved_tenant_preferences = array();

    $Hostel_retrieved_maximum_occupants = array();
    $Single_Room_retrieved_maximum_occupants = array();
    $Bedsitter_retrieved_maximum_occupants = array();
    $Suite_retrieved_maximum_occupants = array();

    $iteration = 0;
    
    foreach($rentalsOwned as $rentalID) {
        $rentalIDComponents = explode("_", $rentalID);
        $lastIndex = count($rentalIDComponents) - 1;
        array_push($rentalType, $rentalIDComponents[$lastIndex]);
        $tablename = '';
        
        switch($rentalType[$iteration]) {
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
                    array_push($retrieved_rentalID, $rentalID);
                    array_push($retrieved_rental_name, $table['Rental_Name']);
                    array_push($retrieved_location, $table['Location']);                    
                    array_push($retrieved_google_location, $table['Google_Location']);
                    array_push($retrieved_image_urls, $table['Image_Urls']);                    
                    array_push($retrieved_ammenities, $table['Ammenities']);
                    array_push($retrieved_number_of_units, $table['Number_Of_Similar_Units']);
        
                    switch($tablename) {
                        case "apartments":
                            array_push($apartments_retrieved_number_of_bedrooms, $table['Number_Of_Bedrooms']);
                            array_push($business_premises_retrieved_type_of_premise, null);
                            array_push($houses_retrieved_number_of_bedrooms, null);
                            array_push($suites_retrieved_number_of_beds, null);
                            break;
                        case "business_premises":
                            array_push($business_premises_retrieved_type_of_premise, $table['Type_Of_Premise']);
                            array_push($apartments_retrieved_number_of_bedrooms, null);
                            array_push($houses_retrieved_number_of_bedrooms, null);
                            array_push($suites_retrieved_number_of_beds, null);
                            break;
                        case "houses":
                            array_push($houses_retrieved_number_of_bedrooms, $table['Number_Of_Bedrooms']);
                            array_push($apartments_retrieved_number_of_bedrooms, null);
                            array_push($business_premises_retrieved_type_of_premise, null);
                            array_push($suites_retrieved_number_of_beds, null);
                            break;
                        case "suites":
                            array_push($suites_retrieved_number_of_beds, $table['Number_Of_Beds_Per_Suite']);
                            array_push($apartments_retrieved_number_of_bedrooms, null);
                            array_push($business_premises_retrieved_type_of_premise, null);
                            array_push($houses_retrieved_number_of_bedrooms, null);
                            break;
                        default:
                            array_push($suites_retrieved_number_of_beds, null);
                            array_push($apartments_retrieved_number_of_bedrooms, null);
                            array_push($business_premises_retrieved_type_of_premise, null);
                            array_push($houses_retrieved_number_of_bedrooms, null);
                            break;
                    }
                }
    
            }
        }
        
        $sqlquery = "SELECT * FROM properties_owners_details WHERE Rental_ID = '$rentalID';";
        $res = mysqli_query($connectionInitialisation, $sqlquery);

        if($res) {
            if (mysqli_num_rows($res) > 0) {

                while ($table = mysqli_fetch_assoc($res)) {
                    array_push($retrieved_rentalID, $rentalID);
                    array_push($retrieved_rental_term, $table['Rental_Term']);
                    array_push($retrieved_amount_of_rent, $table['Amount_of_Rent']);                    
                    array_push($retrieved_description, $table['Pitching']);
                    array_push($retrieved_tenant_preferences, $table['Preferred_Sorts_of_Applicants']);                  
        
                    switch($rentalType) {
                        case "Hostel":
                            array_push($Hostel_retrieved_maximum_occupants, $table['Maximum_Number_Of_Occupants']);
                            array_push($Single_Room_retrieved_maximum_occupants, null);
                            array_push($Bedsitter_retrieved_maximum_occupants, null);
                            array_push($Suite_retrieved_maximum_occupants, null);
                            break;
                        case "Single Room":
                            array_push($Single_Room_retrieved_maximum_occupants, $table['Maximum_Number_Of_Occupants']);
                            array_push($Hostel_retrieved_maximum_occupants, null);
                            array_push($Bedsitter_retrieved_maximum_occupants, null);
                            array_push($Suite_retrieved_maximum_occupants, null);
                            break;
                        case "Bedsitter":
                            array_push($Bedsitter_retrieved_maximum_occupants, $table['Maximum_Number_Of_Occupants']);
                            array_push($Hostel_retrieved_maximum_occupants, null);
                            array_push($Single_Room_retrieved_maximum_occupants, null);
                            array_push($Suite_retrieved_maximum_occupants, null);
                            break;
                        case "Suite":
                            array_push($Suite_retrieved_maximum_occupants, $table['Maximum_Number_Of_Occupants']);
                            array_push($Hostel_retrieved_maximum_occupants, null);
                            array_push($Single_Room_retrieved_maximum_occupants, null);
                            array_push($Bedsitter_retrieved_maximum_occupants, null);
                            break;
                        default:
                            array_push($Suite_retrieved_maximum_occupants, null);
                            array_push($Hostel_retrieved_maximum_occupants, null);
                            array_push($Single_Room_retrieved_maximum_occupants, null);
                            array_push($Bedsitter_retrieved_maximum_occupants, null);
                            break;
                    }                    
                }
    
            } 
        }
        $iteration++; 
    }

    include "../Php/dashboard.php";       
?>