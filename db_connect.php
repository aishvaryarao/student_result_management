<?php
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = "";     // default password is empty
$dbname = "studebt_result_db"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Optional: Log successful connection for debugging
    // echo "Database connected successfully.";
}
?>
