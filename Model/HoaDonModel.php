<?php
class HoaDonModel {

    private $conn;

    public function __construct($conn) {

        $this->conn = $conn;

    }

    public function AddHoaDon($id_cart) {

        $insert = "INSERT INTO hoadon(id_cart) VALUES($id_cart)";

        $result = mysqli_query($this->conn, $insert);

        return $result; // No error

    }

    public function AddToHoaDonDetail($id_hoadon, $ProductID) {

        $insert = "INSERT INTO hoadon(id_hoadon, ProductID) VALUES ($id_hoadon, $ProductID)";

        $result = mysqli_query($this->conn, $insert);

        return $result;

    }

}
?>