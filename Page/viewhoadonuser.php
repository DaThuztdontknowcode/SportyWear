<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/viewHoaDonuser.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
    session_start();  // Start a session if not already started
    <?php include 'navbar.php'; ?> 
    <?php
    require_once '../config.php';
    require_once '../Model/HoaDonModel.php';
    require_once '../Model/ChiTietHoaDon.php';
    if (isset($_GET['date'])) {
        $searchDate = $_GET['date'];
    } else {
        $searchDate = ""; // Nếu không có tham số ngày, mặc định là trống
    }
    // Retrieve the user ID from the session
    $userIDInSession = $_SESSION['user_id']; // Replace 'user_id' with your actual session variable name

    $select_viewhoadon = "SELECT ch.*, h.created_at
                      FROM chitiethoadon ch
                      JOIN hoadon h ON ch.id_hoadon = h.id_hoadon";
    if (!empty($searchDate)) {
        $select_viewhoadon .= " WHERE DATE(h.created_at) = '$searchDate'";
    }                  
    $result_viewhoadon = mysqli_query($conn, $select_viewhoadon);
    echo "
    <div class=".'viewHoadon'."> 
    <h1>Lịch sử mua hàng</h1>
    <button class=".'back'." onclick=".'back()'.">Quay lại giỏ hàng</button>

    <div class=".'search-container'.">
        <input type=".'text'." id=".'datepicker'." placeholder=".'Chọn ngày)'." autocomplete=".'off'.">
        </div>
    <table>
        <thead>
            <tr>
                <th>ID Hóa đơn</th>
                <th>ID product</th>
                <th>Name product</th>
                <th>Price product</th>
                <th>Số lượng đặt hàng</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>";
    while ($row = $result_viewhoadon->fetch_assoc()) {
        // select trường dữ liệu từ bảng hóa đơn
        $idHoaDon = $row["id_hoadon"];
        $productIdsString = $row["ProductIDs"];
        $quantities = $row["quantities"];
        $createdAt = $row["created_at"];

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
                // Compare the user ID from the database with the user ID from the session
                if ($id_user == $userIDInSession) {
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
                                            <td>$idHoaDon</td>
                                            <td>$productId</td>
                                            <td>$nameProduct</td>
                                            <td>$priceProduct</td>
                                            <td>$quantitiesArray[$count]</td>
                                            <td>$createdAt</td>
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
    }

    echo "
        </tbody>
        </table>
        </div>";
    ?>
    <?php include 'footer.php'; ?>
    <script>
        $(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function(dateText) {
                searchHistory(dateText);
            }
        });
    });

    function searchHistory(selectedDate) {
        // Redirect đến trang lịch sử mua hàng với tham số ngày
        window.location.href = "viewHoaDonuser.php?date=" + selectedDate;
    }
    function back(){
        window.location.href="viewCart.php"
    }
    </script>
</body>

</html>
