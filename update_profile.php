<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_image_btn'])) {
    // Code for updating the profile image
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image is too large';
        } else {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);

            $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
            if ($image_update_query) {
                $message[] = 'image updated successfully!';
            }
        }
    }
}

if (isset($_POST['update_password_btn'])) {
    // Code for updating the password
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'confirm password not matched!';
        } else {
            mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
            $message[] = 'password updated successfully!';
        }
    }
}
if (isset($_POST['update_email_btn'])) {
    // Code for updating the email
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    
    if (!empty($update_email)) {
        mysqli_query($conn, "UPDATE `user_form` SET email = '$update_email' WHERE id = '$user_id'") or die('query failed');
        $message[] = 'email updated successfully!';
    } else {
        $message[] = 'email cannot be empty!';
    }
}
if (isset($_POST['update_name_btn'])) {
    // Code for updating the username
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name' WHERE id = '$user_id'") or die('query failed');
    $message[] = 'username updated successfully!';
}

// Fetch user data after updates
$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="css/style-update-profile.css">
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
            foreach ($message as $message) {
                echo '<div class="message">' . $message . '</div>';
            }
        }
        ?>
        <div class="columns">
            <div class="column">
                <div class="inputBox">
                    <span>Username:</span>
                    <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
                    <input type="submit" value="Update Username" name="update_name_btn" class="btn">
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
        <a href="user_page.php" class="delete-btn">Go Back</a>
    </form>
</div>


</body>

</html>
