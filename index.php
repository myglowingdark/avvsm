<?php
// Database connection parameters
$servername = "localhost"; // or your database host name
$username = "u442300185_dashboard"; // your database username
$password = "u442300185_dashboard"; // your database password
$database = "Dashboard1!!@@##$$@1992"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Close connection
$conn->close();

