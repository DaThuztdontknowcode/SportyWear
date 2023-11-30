<?php
session_start();

require '../config.php';
require '../Model/DetailCartModel.php';



if (isset($_POST['dathang']) && ($_POST['dathang'])) {

    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];

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
    $cart->AddToCartDetail($id_Cart, $product_id);


    try {
        mysqli_close($conn);
        mysqli_free_result($cart->AddToCartDetail($id_Cart, $product_id));
    } catch (TypeError $e) {

    }
}
?>