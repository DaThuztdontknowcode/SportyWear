<?php
@include 'config.php';

session_start();
if(isset($_POST['submit'])){
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $pass = isset($_POST['password']) ? md5($_POST['password']) : '';
    $cpass = isset($_POST['password']) ? md5($_POST['password']) : '';
    $user_type = isset($_POST['user_type']) ? md5($_POST['user_type']) : '';
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        if($row['user_type'] == 'admin'){
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['name']; 
            header('location: index.php');
        } else {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name']; 
            header('Location: index.php');
        }
    } else {
        $error[] = 'Incorrect email or password';
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>Don't have any account? <a href="register_form.php">register now</a></p>
        </form>
    </div>
    <?php include 'Page/footer.php'; ?>
</body>
</html>