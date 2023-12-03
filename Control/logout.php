<?php
@include './config.php';

// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Include the Drift reset JavaScript code
echo '<script>';
echo 'drift.reset();'; // or drift.load('NEW_USER_DRIFT_ID');
echo '</script>';

// Redirect to the login form
header('location:../Page/login_form.php');
?>
