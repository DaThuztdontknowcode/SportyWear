<?php
class Product {
    public $ProductID;
    public $ProductName;
    public $CategoryID;
    public $Price;
    public $Description;
    public $StockQuantity;
    public $img;
    public $brand;

    public function __construct($ProductID, $ProductName, $CategoryID, $Price, $Description, $StockQuantity,$img,$brand,$size = null) {
        $this->ProductID = $ProductID;
        $this->ProductName = $ProductName;
        $this->CategoryID = $CategoryID;
        $this->Price = $Price;
        $this->Description = $Description;
        $this->StockQuantity = $StockQuantity;
        $this->img=$img;
        $this->brand=$brand;
        $this->size = $size;
    }
}
?>
