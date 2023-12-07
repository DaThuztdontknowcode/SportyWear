<?php
class HoaDon
{
    public $id_hoadon;

    public $id_cart;

    // public $totalprice;

    public function __construct($id_hoadon, $id_cart, $totalprice)
    {
        $this->id_hoadon = $id_hoadon;
        $this->id_cart = $id_cart;
        // $this->totalprice = $totalprice;
    }
}
?>