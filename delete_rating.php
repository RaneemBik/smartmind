<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php"); // Redirect to home if not logged in
    exit();
}

// Database connection
$servername = "localhost"; // Your database server
$username = "your_username"; // Your database username
$password = "your_password"; // Your database password
$dbname = "your_database"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the rating ID from the POST request
$ratingId = isset($_POST['rating_id']) ? intval($_POST['rating_id']) : 0;

// Check if the rating exists and if it can be deleted
$sql = "SELECT created_at FROM ratings WHERE id = $ratingId AND user_id = {$_SESSION['user_id']}";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $createdAt = new DateTime($row['created_at']);
    $now = new DateTime();

    // Check if the rating was created within the last hour
    if ($now->diff($createdAt)->h < 1) {
        // Delete the rating
        $deleteSql = "DELETE FROM ratings WHERE id = $ratingId";
        if ($conn->query($deleteSql) === TRUE) {
            echo "Rating deleted successfully";
        } else {
            echo "Error deleting rating: " . $conn->error;
        }
    } else {
        echo "You can only delete your rating within one hour of submission.";
    }
} else {
    echo "Rating not found or you do not have permission to delete it.";
}

// Close the connection
$conn->close();
?>