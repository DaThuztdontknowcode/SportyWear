<?php
include '../config.php';
include '../Control/profileController.php';

session_start();
$user_id = $_SESSION['user_id'];
$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
$profileController = new ProfileController($conn);

if (isset($_POST['update_image_btn'])) {
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];

    if (!empty($update_image)) {
        $update_image_query = $profileController->updateProfileImage($user_id, $update_image, $update_image_tmp_name);

        if ($update_image_query) {
            $message[] = 'Image updated successfully!';
        }
    }
}

if (isset($_POST['update_password_btn'])) {
    $old_pass = $_POST['old_pass'];
    $update_pass = md5($_POST['update_pass']);
    $new_pass = md5($_POST['new_pass']);
    $confirm_pass = md5($_POST['confirm_pass']);

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'Old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'Confirm password not matched!';
        } else {
            $profileController->updateProfilePassword($user_id, $confirm_pass);
            $message[] = 'Password updated successfully!';
        }
    }
}

if (isset($_POST['update_email_btn'])) {
    $update_email = $_POST['update_email'];

    if (!empty($update_email)) {
        $profileController->updateProfileEmail($user_id, $update_email);
        $message[] = 'Email updated successfully!';
    } else {
        $message[] = 'Email cannot be empty!';
    }
}

if (isset($_POST['update_name_btn'])) {
    $update_name = $_POST['update_name'];
    $profileController->updateProfileName($user_id, $update_name);
    $_SESSION['admin_name'] = $update_name; 
    $message[] = 'adminname updated successfully!';
}


$fetch = $profileController->getUserData($user_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="../css/style-update-profile.css">
</head>

<body>

<div class="update-profile">
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        if ($fetch['image'] == '') {
            echo '<img src="images/default-avatar.png">';
        } else {
            echo '<img src="uploaded_img/' . $fetch['image'] . '">';
        }
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="message">' . $msg . '</div>';
            }
        }
        ?>
        <div class="columns">
            <div class="column">
                <div class="inputBox">
                    <span>Adminname:</span>
                    <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
                    <input type="submit" value="Update adminname" name="update_name_btn" class="btn">
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                    <input type="submit" value="Update Email" name="update_email_btn" class="btn">
                </div>
            </div>
            <div class="column">
                <div class="inputBox">
                    <span>Update Profile Picture:</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                    <input type="submit" value="Update Image" name="update_image_btn" class="btn">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                    <span>Old Password:</span>
                    <input type="password" name="update_pass" placeholder="Enter previous password" class="box">
                    <span>New Password:</span>
                    <input type="password" name="new_pass" placeholder="Enter new password" class="box">
                    <span>Confirm Password:</span>
                    <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
                    <input type="submit" value="Update Password" name="update_password_btn" class="btn">
                </div>
            </div>
        </div>
        <a href="admin_page.php" class="delete-btn">Go Back</a>
    </form>
</div>

</body>

</html>