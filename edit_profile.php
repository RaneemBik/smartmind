<?php
session_start();
include('inc/connection.php'); // Include your DB connection file

// Variable to store success message
$success_message = "";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$user_id = $_SESSION['user_id']; // Get the logged-in user ID

// Fetch user data from the database
$query = "SELECT * FROM logintb WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize the form input
    $name = htmlspecialchars($_POST['name']);
    $dob = htmlspecialchars($_POST['dob']);
    
    // Handle profile picture upload
    $profile_pic = $user_data['profile_pic']; // Default to current picture
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
        if (getimagesize($_FILES["profile_pic"]["tmp_name"])) {
            // Move the uploaded file to the 'uploads' folder
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                $profile_pic = $target_file;
            }
        }
    }

    // Update the user data in the database
    $update_query = "UPDATE logintb SET name = ?, dob = ?, profile_pic = ? WHERE id = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("sssi", $name, $dob, $profile_pic, $user_id);
    
    if ($stmt->execute()) {
        $success_message = "Profile updated successfully!"; // Set the success message
    } else {
        $success_message = "Error updating profile."; // Set error message if any
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
   <style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f5;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Wrapper to center the form */
.wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

/* Form Container (Main content box) */
.form-container {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Success message */
.success-message {
    background-color: #4caf50;
    color: white;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
}

/* Heading */
h1 {
    font-size: 1.8rem;
    color: #6a1b9a;
    margin-bottom: 20px;
}

/* Form Elements */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    font-size: 1rem;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

input[type="text"], input[type="date"], input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    background-color: #f9f9f9;
    transition: border 0.3s ease;
}

/* Focus Styles */
input[type="text"]:focus, input[type="date"]:focus, input[type="file"]:focus {
    border-color: #6a1b9a;
    outline: none;
    background-color: #fafafa;
}

/* Profile Image Style */
img {
    margin-top: 10px;
    border-radius: 50%;
    border: 2px solid #ddd;
}

/* Submit Button */
button {
    background-color: #6a1b9a;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover and Active Effects on Button */
button:hover {
    background-color: #9c4dcc;
}

button:active {
    background-color: #4a148c;
}

/* File Input Style */
input[type="file"] {
    border: none;
    background-color: transparent;
}

input[type="file"]:focus {
    outline: none;
}

/* Mobile Responsiveness */
@media (max-width: 600px) {
    .form-container {
        padding: 20px;
    }

    h1 {
        font-size: 1.6rem;
    }

    button {
        width: 100%;
    }
}

   </style>
</head>
<body>
    <div class="wrapper">
        <div class="form-container">
            <!-- Success message -->
            <?php if ($success_message): ?>
                <div class="success-message"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <h1>Edit Profile</h1>
            <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $user_data['name']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $user_data['dob']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="profile_pic">Profile Picture</label>
                    <input type="file" id="profile_pic" name="profile_pic">
                    <?php if ($user_data['profile_pic']) { ?>
                        <img src="<?php echo $user_data['profile_pic']; ?>" alt="Profile Picture" width="100">
                    <?php } ?>
                </div>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>
