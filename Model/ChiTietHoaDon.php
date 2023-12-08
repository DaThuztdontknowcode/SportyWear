<?php
class chitiethoadon
{
    public $id_chitiethoadon;

    public $id_hoadon;

    public $Products;

    public $quantities;


    public function __construct($id_chitiethoadon, $id_hoadon, $Products, $quantities)
    {

        $this->id_chitiethoadon = $id_chitiethoadon;
        $this->id_hoadon = $id_hoadon;
        $this->Products = $Products;
        $this->quantities = $quantities;

    }
}
?>