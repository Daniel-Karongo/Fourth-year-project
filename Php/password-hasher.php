<?php
    $email = $_POST['email'];
    $password = $_POST['passwordField'];
    $newPassword = $_POST['password-to-hash'];

    $administrators = json_decode($_POST['administrators'], true);
    $property_owners = json_decode($_POST['property-owners'], true);
    $propertyOwnersForEachRentals = json_decode($_POST['property-owners-for-each-rental'], true);


    $hostels = json_decode($_POST['hostels'], true);
    $singlerooms = json_decode($_POST['single-rooms'], true);
    $bedsitters = json_decode($_POST['bedsitters'], true);
    $apartments = json_decode($_POST['apartments'], true);
    $houses = json_decode($_POST['houses'], true);
    $businesspremises = json_decode($_POST['business-premises'], true);
    $suites = json_decode($_POST['suites'], true);


    $adminFirst_Name = $_POST['admin-first-name'];
    $adminLast_Name = $_POST['admin-last-name'];
    $adminPhone_Number = $_POST['admin-phone-number'];
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
    include "../Php/admin-dashboard.php";
    
?>