<?php
session_start();
session_destroy(); // Destroy the session
header("location: index.php"); // Redirect to home page
exit();
?>
