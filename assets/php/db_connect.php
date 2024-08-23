<?php
// db_connect.php

// Database credentials
$host = 'localhost';
$username = 'root';
$password = 'Minga3winy_3';
$database = 'jpcs2425';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set
$conn->set_charset('utf8');
?>
