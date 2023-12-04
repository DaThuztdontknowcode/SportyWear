<?php
//viếc hàm xử lý với database
class UserCartModel
{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function AddCartUser($id_user)
    {

        $insert = "INSERT INTO cart(id_user) VALUES($id_user)";

        $result = mysqli_query($this->conn, $insert);

        return $result; // No error

    }

}
?>