<?php
class Customer {
    public $CustomerID;
    public $AvatarURL;
    public $FirstName;
    public $LastName;
    public $Email;

    public function __construct($CustomerID, $AvatarURL, $FirstName, $LastName, $Email) {
        $this->CustomerID = $CustomerID;
        $this->AvatarURL = $AvatarURL;
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Email = $Email;
    }
}
?>
