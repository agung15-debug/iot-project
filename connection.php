<?php
// MySQL database credentials
$host = "localhost"; 
$username = "attend"; 
$password = "attend"; // Replace with your MySQL password
$database = "att_system"; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
