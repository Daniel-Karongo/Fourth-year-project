<?php
    $serverName = "localhost";
    $userName = "id20997977_root";
    $password = "[Karongo] - [11207015005]";
    $databaseName = "id20997977_housesearchke";
    $port = 3306;

    $connectionInitialisation = mysqli_connect($serverName, $userName, $password, $databaseName, $port);

    if(!$connectionInitialisation) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    } 
?>