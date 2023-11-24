<?php
@include '../config.php';
include '../Control/LoginController.php';

session_start();

$userController = new UserController($conn);

if (isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $user = $userController->loginUser($email, $password);

    if ($user !== false) {
        if ($user['user_type'] == 'admin') {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['admin_name'] = $user['name'];
            header('location: admin_page.php');
        } else {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: user_page.php');
        }
    } else {
        $error[] = 'Incorrect email or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Login Now</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $errorMsg) {
                    echo '<span class="error-msg">' . $errorMsg . '</span>';
                }
            }
            ?>
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Login Now" class="form-btn">
            <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
