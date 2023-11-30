<?php

class DetailCartModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function AddToCartDetail($id_cart, $ProductID)
    {

        $insert = "INSERT INTO cartdetail(id_cart,ProductID) VALUES($id_cart,$ProductID)";

        $result = mysqli_query($this->conn, $insert);

        return $result;

    }

    public function RemoveCartDetail($id_cart, $ProductID)
    {

        $remove = "DELETE FROM cartdetail WHERE id_cart = $id_cart AND ProductID = $ProductID";

        $result = mysqli_query($this->conn, $remove);

        return $result;

    }

}

?>