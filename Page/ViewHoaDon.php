<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/viewHoaDon.css">
</head>

<body>
<?php include 'navbar.php'; ?>
    <?php
    require_once '../config.php';
    require_once '../Model/HoaDonModel.php';
    require_once '../Model/ChiTietHoaDon.php';

    $select_viewhoadon = "SELECT * FROM chitiethoadon";
    $result_viewhoadon = mysqli_query($conn, $select_viewhoadon);
    echo "
    <h1>Danh Sách Đơn Hàng</h1>
    <table>
        <thead>
            <tr>
                <th>ID User</th>
                <th>ID Hóa đơn</th>
                <th>ID giỏ hàng</th>
                <th>ID product</th>
                <th>Name product</th>
                <th>Price product</th>
                <th>Số lượng đặt hàng</th>
            </tr>
        </thead>
        <tbody>";
    while ($row = $result_viewhoadon->fetch_assoc()) {
        // select trường dữ liệu từ bảng hóa đơn 
        $idHoaDon = $row["id_hoadon"];
        $productIdsString = $row["ProductIDs"];
        $quantities = $row["quantities"];

        // select all id_cart từ bảng hóa đơn 
        $select_idCarts = "SELECT * FROM hoadon WHERE id_hoadon = $idHoaDon";
        $result_idCarts = mysqli_query($conn, $select_idCarts);
        while ($row_idCarts = $result_idCarts->fetch_assoc()) {
            $id_cart = $row_idCarts["id_cart"];
            // select all id_user từ bảng user
            $select_idUsers = "SELECT * FROM cart WHERE id_cart = $id_cart";
            $result_idUsers = mysqli_query($conn, $select_idUsers);

            while ($row_idUsers = $result_idUsers->fetch_assoc()) {
                $id_user = $row_idUsers["id_user"];
                $productIdsArray = explode(",", $productIdsString);
                $count = 0;
                $quantitiesArray = explode(",", $quantities);
                foreach ($productIdsArray as $productId) {
                    if ($productId != "") {
                        // Select thông tin sản phẩm từ bảng Product
                        if ($productId != "") {
                            $select_infoProduct = "SELECT * FROM products WHERE ProductID = $productId";
                            $result_infoProduct = mysqli_query($conn, $select_infoProduct);
                            while ($row_infoProduct = $result_infoProduct->fetch_assoc()) {
                                $nameProduct = $row_infoProduct["ProductName"];
                                $priceProduct = $row_infoProduct["Price"];
                                if ($quantitiesArray[$count] != "") {
                                    echo " 
                                    <tr>
                                        <td>$id_user</td>
                                        <td>$idHoaDon</td>
                                        <td>$id_cart</td>
                                        <td>$productId</td>
                                        <td>$nameProduct</td>
                                        <td>$priceProduct</td>
                                        <td>$quantitiesArray[$count]</td>
                                    </tr>
                                    ";
                                    $count = $count + 1;
                                }
                            }

                        }
                    }
                }
            }
        }
    }

    echo "
</tbody>
</table>";
    ?>
    <?php include 'footer.php'; ?>

</body>

</html>