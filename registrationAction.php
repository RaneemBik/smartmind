<?php
session_start();
include "inc/connection.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email, password, and date of birth from the form
    $email = mysqli_real_escape_string($con, $_POST['txtEmail']);
    $password = password_hash($_POST['txtPassword'], PASSWORD_DEFAULT); // Hash the password
    $dob = mysqli_real_escape_string($con, $_POST['txtDob']); // Get the date of birth

    // Check if the email already exists
    $checkEmail = "SELECT * FROM logintb WHERE db_email='$email'";
    $result = mysqli_query($con, $checkEmail);
    
    if (mysqli_num_rows($result) > 0) {
        // Email already exists
        header("location: signup.php?error=email_exists");
        exit();
    }

    // Insert the new user into the database
    $sql = "INSERT INTO logintb (db_email, db_password, db_dob) VALUES ('$email', '$password', '$dob')";
    if (mysqli_query($con, $sql)) {
        // Registration successful
        header("location: profile.php");
        exit();
    } else {
        // Handle error
        echo "Error: " . mysqli_error($con);
    }
}
?>