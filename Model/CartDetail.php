<?php
class CartDetail
{
    // thiếu thuộc tính
    public $id_cart;

    public $id_cartDetail;

    public $ProductID;

    public $Quantity;

    public function __construct($id_cartDetail, $id_cart, $ProductID, $Quantity)
    {
        $this->id_cartDetail = $id_cartDetail;
        $this->id_cart = $id_cart;
        $this->ProductID = $ProductID;
        $this->Quantity = $Quantity;
    }
}
?>