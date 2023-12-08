<?php
class ProfileModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function updateProfileImage($user_id, $update_image, $update_image_tmp_name)
    {
        $update_image_folder = 'uploaded_img/' . $update_image;
        move_uploaded_file($update_image_tmp_name, $update_image_folder);

        $image_update_query = mysqli_query($this->conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
        return $image_update_query;
    }

    public function updateProfilePassword($user_id, $confirm_pass)
    {
        mysqli_query($this->conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
    }

    public function updateProfileEmail($user_id, $update_email)
    {
        mysqli_query($this->conn, "UPDATE `user_form` SET email = '$update_email' WHERE id = '$user_id'") or die('query failed');
    }

    // profileModel.php
    public function updateProfileName($user_id, $update_name)
    {
        mysqli_query($this->conn, "UPDATE `user_form` SET name = '$update_name' WHERE id = '$user_id'") or die('query failed');
    }

    public function getUserData($user_id)
    {
        $select = mysqli_query($this->conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
        return mysqli_fetch_assoc($select);
    }
}
?>