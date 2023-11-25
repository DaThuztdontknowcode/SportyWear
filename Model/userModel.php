<?php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registerUser($name, $email, $password, $userType, $image) {
        $pass = mysqli_real_escape_string($this->conn, md5($password));
        $image_folder = '../Page/uploaded_img/' . $image;

        $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";
        $result = mysqli_query($this->conn, $select);

        if (mysqli_num_rows($result) > 0) {
            return 'User already exists';
        } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type, image) VALUES('$name','$email','$pass','$userType', '$image')";
            mysqli_query($this->conn, $insert);
            move_uploaded_file($_FILES['image']['tmp_name'], $image_folder);

            return null; // No error
        }
    }
    public function loginUser($email, $password) {
        $pass = mysqli_real_escape_string($this->conn, md5($password));
        $select = mysqli_query($this->conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

        if (mysqli_num_rows($select) > 0) {
            $row = mysqli_fetch_assoc($select);
            return $row;
        } else {
            return false; // Incorrect email or password
        }
    }
}
?>
