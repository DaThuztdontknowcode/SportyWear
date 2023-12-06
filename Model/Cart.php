<?php
class Cart
{
    // thiếu thuộc tính
    public $id_cart;

    public $id_user;

    public function __construct($id_cart, $id_user)
    {
        $this->id_cart = $id_cart;
        $this->id_user = $id_user;
    }
}
?>