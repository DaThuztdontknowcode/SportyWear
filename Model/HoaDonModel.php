<?php
class HoaDonModel {

    private $conn;

    public function __construct($conn) {

        $this->conn = $conn;

    }

    public function AddHoaDon($id_cart, $totalprice) {

        $insert = "INSERT INTO hoadon(id_cart,totalprice) VALUES($id_cart,$totalprice)";

        $result = mysqli_query($this->conn, $insert);

        return $result; // No error

    }

    public function AddToHoaDonDetail($id_hoadon, $ProductIDs, $quantities) {

        $insert = "INSERT INTO chitiethoadon(id_hoadon, ProductIDs,quantities) VALUES ($id_hoadon, '".$ProductIDs."', '".$quantities."')";

        $result = mysqli_query($this->conn, $insert);

        return $result;

    }

}
?>