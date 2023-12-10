<?php
require_once '../config.php';
require_once '../Model/HoaDonModel.php';
require_once '../Model/DetailCartModel.php';
require_once '../Model/ChiTietHoaDon.php';


session_start();
$user_id = $_SESSION['user_id'];

$select_idCart = "SELECT id_cart FROM cart WHERE id_user = $user_id";
$result = mysqli_query($conn, $select_idCart);
$row = $result->fetch_assoc();
$id_Cart = $row["id_cart"];


global $conn;

//tính totalprice
$totalprice = 0;
$select_cartdetail = "SELECT * FROM cartdetail WHERE id_cart = $id_Cart";
$result_cartdetail = $conn->query($select_cartdetail);
while ($row = $result_cartdetail->fetch_assoc()) {

    $ProductID = $row["ProductID"];
    $select_price = "SELECT Price FROM products WHERE ProductID = $ProductID";
    $result_price = $conn->query($select_price);
    $row_price = $result_price->fetch_assoc();
    $price = $row_price["Price"];
    $quantity = $row["quantity"];
    $totalprice = $totalprice + ($price * $quantity);

}



$hoadon = new HoaDonModel($conn);
$hoadon->AddHoaDon($id_Cart, $totalprice);

$select_idHoaDon = "SELECT id_hoadon FROM hoadon WHERE id_cart = $id_Cart";
$result_idHoaDon = mysqli_query($conn, $select_idHoaDon);

//Lấy hóa đơn cuối cùng trong bảng hóa đơn với điều kiện id_cart 
$max_idHoaDon = 0;
while ($row = $result_idHoaDon->fetch_assoc()) {
    $id_hoadon = $row["id_hoadon"];
    if ($id_hoadon > $max_idHoaDon) {
        $max_idHoaDon = $id_hoadon;
    }
}

$select_cartdetail_sql = "SELECT * FROM cartdetail WHERE id_cart = $id_Cart";
$result_cartdetail_sql = $conn->query($select_cartdetail_sql);
$productIDs = "";
$quantities = "";

$deleteProduct = new DetailCartModel($conn);

while ($row = $result_cartdetail_sql->fetch_assoc()) {

    $ProductID = $row["ProductID"];
    $quantity = $row["quantity"];
    $productIDs = $productIDs . "$ProductID,";
    $quantities = $quantities . "$quantity,";

    $deleteProduct->RemoveCartDetail($id_Cart, $ProductID);
}

$result_add_chitiethoadon = $hoadon->AddToHoaDonDetail($max_idHoaDon, $productIDs, $quantities);

// if ($userType === 'admin') {
// header('location: ../Page/ViewHoaDon.php');} else {
//     header('location: ../Page/ViewCart.php');
// }

header('location: ../Page/viewhoadonuser.php?msg=thanhcong');
?>