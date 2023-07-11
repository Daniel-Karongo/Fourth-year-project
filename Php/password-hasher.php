<?php
    $email = $_POST['email'];
    $password = $_POST['passwordField'];
    $newPassword = $_POST['password-to-hash'];
    $property_owners = json_decode($_POST['property-owners'], true);
    $adminFirst_Name = $_POST['admin-first-name'];
    $adminLast_Name = $_POST['admin-last-name'];
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
    include "../Php/admin-dashboard.php";
    
?>