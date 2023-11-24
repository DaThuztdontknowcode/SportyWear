<?php
include_once '../Model/userModel.php';

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function registerUser($name, $email, $password, $userType, $image) {
        return $this->userModel->registerUser($name, $email, $password, $userType, $image);
    }
    
}
?>
