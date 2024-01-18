<?php

$hostname = "localhost";
$username = "root";
$password = "Rahul@6412";
$database = "demo";

// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
// You can perform database operations using the $conn object

// Remember to close the connection when done
//$conn->close();
?>
