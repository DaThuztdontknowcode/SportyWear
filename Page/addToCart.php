<?php
session_start();

    require '../config.php';
    require '../Model/AddToCartModel.php';
    

if (isset($_POST['dathang']) && ($_POST['dathang'])) {

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $description = $_POST['description'];

    if (!isset($_SESSION['cart']))
        $_SESSION['cart'] = array();
    array_push($_SESSION['cart'], $productArr);
    header('location: viewCart.php');

    global $conn;    
    $cart = new AddToCartModel($conn);
    $cart->AddToCart($product_id, $product_name, $product_price, $description);
    
    
    
    try{
        mysqli_close($conn);
        mysqli_free_result($cart->AddToCart($product_id, $product_name, $product_price, $description));
    }catch (TypeError $e){
        
    }
}
?>