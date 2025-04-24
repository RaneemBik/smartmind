<?php
session_start();
include 'inc/connection.php'; // Connect to your DB

// Check if the user is logged in or not
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user'];
$rating = intval($_POST['rating']);
$comment = mysqli_real_escape_string($con, $_POST['comment']);

// Check the IP address
$ip_address = $_SERVER['REMOTE_ADDR'];
if ($ip_address === '::1') {
    $ip_address = '127.0.0.1'; // Normalize IPv6 loopback
}

// Get the existing rating (if any)
$query = "SELECT * FROM ratings WHERE user_id = $user_id";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con)); // Debugging line
}

if (mysqli_num_rows($result) > 0) {
    // Update the rating if it already exists
    $row = mysqli_fetch_assoc($result);
    $last_updated = strtotime($row['updated_at']);
    $now = time();
    $diff = $now - $last_updated;

    if ($diff >= 3600) { // Allow update after 1 hour
        // Update the rating, comment, and update the updated_at field
        $update_query = "UPDATE ratings 
                 SET rating = $rating, comment = '$comment', updated_at = NOW() 
                 WHERE user_id = $user_id";

        // Debugging output: show the query before executing
        echo "UPDATE QUERY: $update_query <br>";

        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('Rating updated successfully!'); window.location.href='thank_you.php';</script>";
        } else {
            echo "Error updating rating: " . mysqli_error($con); // Show MySQL error
        }
    } else {
        // Notify the user if they have to wait to update the rating
        $minutes_left = ceil((3600 - $diff) / 60);
        echo "<script>alert('You can update your rating after $minutes_left minutes.'); window.location.href='rate.php';</script>";
    }
} else {
    // If no existing rating found, insert a new one
    $insert_query = "INSERT INTO ratings (user_id, rating, comment, ip_address) 
                     VALUES ($user_id, $rating, '$comment', '$ip_address')";

    // Debugging output: show the query before executing
    echo "INSERT QUERY: $insert_query <br>";

    if (mysqli_query($con, $insert_query)) {
        echo "<script>alert('Rating submitted successfully!'); window.location.href='thank_you.php';</script>";
    } else {
        echo "Error submitting rating: " . mysqli_error($con); // Show MySQL error
    }
}
?>
