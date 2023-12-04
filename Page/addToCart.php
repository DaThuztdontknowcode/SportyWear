<?php
session_start();

require '../config.php';
require '../Model/DetailCartModel.php';



if (isset($_POST['dathang']) && ($_POST['dathang'])) {

    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $quantity = $_POST['quantity'];

    $select_existCartDetail = "SELECT * FROM cartdetail WHERE ProductID = $product_id";
    $result_existCartDetail = mysqli_query($conn, $select_existCartDetail);
    $row_CartDetail = $result_existCartDetail->fetch_assoc();
    $id_ProductID = $row_CartDetail["ProductID"];


    if ($id_ProductID == null) {

        // Lấy id_cart thông qua id_user
        $select_idCart = "SELECT id_cart FROM cart WHERE id_user = $user_id";
        $result = mysqli_query($conn, $select_idCart);
        $row = $result->fetch_assoc();
        $id_Cart = $row["id_cart"];

        if (!isset($_SESSION['cart']))
            $_SESSION['cart'] = array();
        array_push($_SESSION['cart'], $productArr);
        header('location: viewCart.php');


        global $conn;
        $cart = new DetailCartModel($conn);
        $cart->AddToCartDetail($id_Cart, $product_id, $quantity);


        try {
            mysqli_close($conn);
            mysqli_free_result($cart->AddToCartDetail($id_Cart, $product_id, $quantity));
        } catch (TypeError $e) {
        }
    } else {
        // Lấy id_cart thông qua id_user
        $select_idCart = "SELECT id_cart FROM cart WHERE id_user = $user_id";
        $result = mysqli_query($conn, $select_idCart);
        $row = $result->fetch_assoc();
        $id_Cart = $row["id_cart"];


        $select_cartdetail = "SELECT * FROM cartdetail WHERE ProductID = $product_id";
        $result_cartdetail = mysqli_query($conn, $select_cartdetail);
        $row_cartdetail = $result_cartdetail->fetch_assoc();

        $old_quantity = $row_cartdetail["quantity"];
        $new_quantity = $old_quantity + $quantity;

        header('location: viewCart.php');

        global $conn;
        $cart = new DetailCartModel($conn);
        $cart->UpdateCartDetail($id_Cart, $product_id, $new_quantity);

        try {
            mysqli_close($conn);
            mysqli_free_result($cart->UpdateCartDetail($id_Cart, $product_id, $new_quantity));
        } catch (TypeError $e) {
        }

    }
}