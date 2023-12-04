<?php

class DetailCartModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function AddToCartDetail($id_cart, $ProductID, $quantity)
    {

        $insert = "INSERT INTO cartdetail(id_cart,ProductID,quantity) VALUES($id_cart,$ProductID,$quantity)";

        $result = mysqli_query($this->conn, $insert);

        return $result;

    }

    public function RemoveCartDetail($id_cart, $ProductID)
    {

        $remove = "DELETE FROM cartdetail WHERE id_cart = $id_cart AND ProductID = $ProductID";

        $result = mysqli_query($this->conn, $remove);

        return $result;

    }

    public function UpdateCartDetail($id_cart, $ProductID, $new_quantity)
    {
        $update = "UPDATE cartdetail SET quantity = $new_quantity WHERE id_cart = $id_cart AND ProductID = $ProductID";
        
        $result = mysqli_query($this->conn, $update);
 
        return $result;

    }

}

?>