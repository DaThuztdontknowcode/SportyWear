<?php
include_once '../Model/userModel.php';

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function loginUser($email, $password) {
        return $this->userModel->loginUser($email, $password);
    }
}
?>
