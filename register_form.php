<?php
@include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists';
   } else {
      if($pass != $cpass){
         $error[] = 'Confirm password not matched!';
      } elseif($image_size > 2000000){
         $error[] = 'Image size is too large!';
      } else {
         $insert = "INSERT INTO user_form(name, email, password, user_type, image) VALUES('$name','$email','$pass','$user_type', '$image')";
         mysqli_query($conn, $insert);
         move_uploaded_file($image_tmp_name, $image_folder);

         header('location:login_form.php');
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<div class="error-msg">'.$error.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Enter username" class="box" required>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
      <select name="user_type">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register Now" class="btn">
      <p>Already have an account? <a href="login_form.php">Login Now</a></p>
   </form>

</div>

</body>
</html>
