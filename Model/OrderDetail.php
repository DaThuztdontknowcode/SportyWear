<?php
class OrderDetail {
    public $OrderDetailID;
    public $OrderID;
    public $ProductID;
    public $Quantity;
    public $TotalPrice;

    public function __construct($OrderDetailID, $OrderID, $ProductID, $Quantity, $TotalPrice) {
        $this->OrderDetailID = $OrderDetailID;
        $this->OrderID = $OrderID;
        $this->ProductID = $ProductID;
        $this->Quantity = $Quantity;
        $this->TotalPrice = $TotalPrice;
    }
}
?>
