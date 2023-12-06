<?php
class HoaDon
{
    public $id_hoadon;

    public $id_user;

    // public $totalprice;

    public function __construct($id_hoadon, $id_user)
    {
        $this->id_hoadon = $id_hoadon;
        $this->id_cart = $id_user;
        
    }
}
?>