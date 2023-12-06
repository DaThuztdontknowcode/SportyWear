<?php
class chitiethoadon
{
    // thiếu thuộc tính
    public $id_chitiethoadon;

    public $id_hoadon;

    public $Products;

    public $Quantities;

    public function __construct($id_chitiethoadon, $id_hoadon, $Products, $Quantities)
    {
        $this->id_chitiethoadon = $id_chitiethoadon;
        $this->id_hoadon = $id_hoadon;
        $this->Products = $Products;
        $this->Quantities = $Quantities;
    }
}
?>