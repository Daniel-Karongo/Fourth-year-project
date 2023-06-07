<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "4181";
    $databaseName = "housesearchke";
    $port = 3307;

    $connectionInitialisation = mysqli_connect($serverName, $userName, $password, $databaseName, $port);

    if(!$connectionInitialisation) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    } 
?>