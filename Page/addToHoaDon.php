<?php
require_once '../config.php';
require_once '../Model/HoaDonModel.php';
require_once '../Model/DetailCartModel.php';

session_start();
$user_id = $_SESSION['user_id'];

$select_idCart = "SELECT id_cart FROM cart WHERE id_user = $user_id";
$result = mysqli_query($conn, $select_idCart);
$row = $result->fetch_assoc();
$id_Cart = $row["id_cart"];

global $conn;
$hoadon = new HoaDonModel($conn);
$hoadon->AddHoaDon($id_Cart);

header('location: viewCart.php');


?>