<?php

$host = "localhost";
$dbname = "hospital system";
$username = "root";
$password = "";

$connection = new PDO("mysql:host=localhost;dbname=hospital system", "root", "");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
