<?php

    $servername = "localhost";
    $username = "id18000165_nguyen";
    $password = "?sFi%}UpAW24uo6e";
    $dbname = "id18000165_iot";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 
?>