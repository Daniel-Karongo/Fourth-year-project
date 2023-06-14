<?php
    $firstName = $_GET['first-name'];
    $lastName = $_GET['last-name'];
    $email = $_GET['email'];
    $phoneNumber = $_GET['phone_number'];
    $password = $_GET['password'];
    $retrieved_rentals_owned = $_GET['rentals_owned'];
    
    include "../Php/uploadRental.php";
?>