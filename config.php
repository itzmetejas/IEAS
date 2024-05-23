<?php
// Database configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = ''; // Replace with your actual password
$db_name = 'employeeapp';

// Create database connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




?>