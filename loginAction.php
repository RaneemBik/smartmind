<?php
session_start();
include "inc/connection.php";

$email = mysqli_real_escape_string($con, $_POST['txtEmail']);
$password = $_POST['txtPassword'];

// Fetch user data
$sql = "SELECT * FROM logintb WHERE db_email='$email'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['db_password'])) {
        $_SESSION['user'] = $email;
        $_SESSION['username'] = $row['db_username']; // Store username
        header("location: profile.php"); 
    } else {
        header("location: login.php?error=1"); 
    }
} else {
    header("location: login.php?error=1"); 
}
?>
