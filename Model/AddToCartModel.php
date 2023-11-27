<?php
//viếc hàm xử lý với database
class AddToCartModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function AddToCart($product_id,$product_name, $product_price, $Description)
    {

        $insert = "INSERT INTO cart(cartID, description, productName, productPrice) VALUES($product_id,'$Description','$product_name', $product_price)";

        $result = mysqli_query($this->conn, $insert);

        return $result; // No error

    }

}
?>