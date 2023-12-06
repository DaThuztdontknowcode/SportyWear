<?php

@include '../config.php';
include_once '../Model/userModel.php';

session_start();
$name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<?php include 'navbar.php'; ?>   
<div class="container">
   <div class="content">
      <div class="img">
   <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="../images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      </div>
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $name; ?></span></h1><p>this is an user page</p>
      <a href="update_profile_page_user.php" class="btn">update profile</a>
      <a href="../Control/logout.php" class="btn"> 
      logout</a>
      </div>
   </div>

</div>

</body>
<?php include 'footer.php'; ?>

</html>