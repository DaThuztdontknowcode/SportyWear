<?php
class CartProduct
{
    // thiếu thuộc tính
    public $id_cart;
    public $Description;
    public $ProductName;
    public $Price;

    public function __construct($id_cart, $ProductName, $Price, $Description)
    {
        $this->id_cart = $id_cart;
        $this->Description = $Description;
        $this->ProductName = $ProductName;
        $this->Price = $Price;
    }
}
?>