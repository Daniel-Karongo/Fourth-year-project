<?php
    $sqlquery = "SELECT * FROM property_owners WHERE Email_Address = '$email';";
    $res = mysqli_query($connectionInitialisation, $sqlquery);
    
    while ($property_owner = mysqli_fetch_assoc($res)) {
        $retrieved_phone_number = $property_owner['Phone_Number'];
        $retrieved_first_name = $property_owner['First_Name'];                    
        $retrieved_last_name = $property_owner['Last_Name'];
        $retrieved_rentals_owned = array();                    
        $retrieved_rentals_owned = $property_owner['Rentals_Owned'];                    
    }

    include "../Php/dashboard.php";       
?>