<?php
// config.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Replace with your MySQL username
define('DB_PASS', ''); // Replace with your MySQL password
define('DB_NAME', 'auticonnect'); // Replace with your database name

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// index.php
include 'config.php';

// Example query to fetch data
$sql = "SELECT * FROM users"; // Replace with your actual table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>