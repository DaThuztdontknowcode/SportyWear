<?php
include_once '../Model/profileModel.php';

class ProfileController {
    private $profileModel;

    public function __construct($conn) {
        $this->profileModel = new ProfileModel($conn);
    }

    public function updateProfileImage($user_id, $update_image, $update_image_tmp_name) {
        return $this->profileModel->updateProfileImage($user_id, $update_image, $update_image_tmp_name);
    }

    public function updateProfilePassword($user_id, $confirm_pass) {
        $this->profileModel->updateProfilePassword($user_id, $confirm_pass);
    }

    public function updateProfileEmail($user_id, $update_email) {
        $this->profileModel->updateProfileEmail($user_id, $update_email);
    }

    public function updateProfileName($user_id, $update_name) {
        $this->profileModel->updateProfileName($user_id, $update_name);
    }

    public function getUserData($user_id) {
        return $this->profileModel->getUserData($user_id);
    }
}
?>
