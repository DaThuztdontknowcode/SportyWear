<?php
// navbar.php
include_once '../Model/userModel.php';
// Assuming you have already started the session
session_start();
@include '../config.php';
// Function to get the user type based on user ID
function getUserType($userId, $conn) {
    $sql = "SELECT user_type FROM user_form WHERE id = '$userId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['user_type'];
    }

    return false; // User not found or no user type
}

// Check if the user is logged in

?>

