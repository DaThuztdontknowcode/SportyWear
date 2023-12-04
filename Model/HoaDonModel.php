<?php
class HoaDonModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function AddToHoaDon($id_cart)
    {

        $insert = "INSERT INTO hoadon(id_cart) VALUES ($id_cart)";

        $result = mysqli_query($this->conn, $insert);

        return $result;

    }


}
?>