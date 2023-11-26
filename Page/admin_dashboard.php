<?php
@include '../config.php';
include_once '../Model/userModel.php';
session_start();
$name = $_SESSION['admin_name'];
$user_id = $_SESSION['user_id'];
if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin_style.css"> <!-- Include your custom CSS file -->
</head>
<body>

<!-- Navbar -->
<?php include 'AdminNavbar.php'; ?>   

<!-- Main Content -->
<div class="container">
    <h1>Welcome, <?php echo $name; ?>!</h1>
    <div class="dashboard-content">
        <div class="card">
            <h2>Total Users</h2>
            <p>100</p>
        </div>
        <div class="card">
            <h2>Total Orders</h2>
            <p>50</p>
        </div>
        <!-- Add more cards or content as needed -->
    </div>
</div>

<!-- Footer -->
<?php include 'footer.php'; ?>

</body>
</html>
