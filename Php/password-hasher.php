<?php
    $email = $_POST['email'];
    $password = $_POST['passwordField'];
    $newPassword = $_POST['password-to-hash'];

    $administrators = json_decode($_POST['administrators'], true);
    $property_owners = json_decode($_POST['property-owners'], true);
    $propertyOwnersForEachRentals = json_decode($_POST['property-owners-for-each-rental'], true);


    $hostels = isset($_POST['hostels']) ? json_decode($_POST['hostels'], true) : NULL ;
    $singlerooms = isset($_POST['single-rooms']) ? json_decode($_POST['single-rooms'], true) : NULL ;
    $bedsitters = isset($_POST['bedsitters']) ? json_decode($_POST['bedsitters'], true) : NULL ;
    $apartments = isset($_POST['apartments']) ? json_decode($_POST['apartments'], true) : NULL ;
    $houses = isset($_POST['houses']) ? json_decode($_POST['houses'], true) : NULL ;
    $businesspremises = isset($_POST['business-premises']) ? json_decode($_POST['business-premises'], true) : NULL ;
    $suites = isset($_POST['suites']) ? json_decode($_POST['suites'], true) : NULL ;


    $adminFirst_Name = $_POST['admin-first-name'];
    $adminLast_Name = $_POST['admin-last-name'];
    $adminPhone_Number = $_POST['admin-phone-number'];
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
    include "../Php/admin-dashboard.php";
    
?>