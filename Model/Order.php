<?php
class Order {
    public $OrderID;
    public $CustomerID;
    public $OrderDate;

    public function __construct($OrderID, $CustomerID, $OrderDate) {
        $this->OrderID = $OrderID;
        $this->CustomerID = $CustomerID;
        $this->OrderDate = $OrderDate;
    }
}
?>
