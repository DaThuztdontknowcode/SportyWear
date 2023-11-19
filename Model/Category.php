<?php
class Category {
    public $CategoryID;
    public $CategoryName;

    public function __construct($CategoryID, $CategoryName) {
        $this->CategoryID = $CategoryID;
        $this->CategoryName = $CategoryName;
    }
}
?>
