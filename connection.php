<?php
function Connect()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "A@#345_abcd1";
    $dbname = "carrental";
    
    //Create Database connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
    return $conn;
}
?>
