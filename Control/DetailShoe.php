<?php
    // Nạp file config.php để có kết nối đến cơ sở dữ liệu
    require_once '../config.php';
    require_once '../Model/Product.php';

    // Kiểm tra xem có tham số product_id được truyền vào không
    if (isset($_GET['product_id'])) {
        // Lấy giá trị product_id từ tham số URL
        $product_id = $_GET['product_id'];

        // Truy vấn dữ liệu từ cơ sở dữ liệu để lấy thông tin chi tiết của sản phẩm
        $sql = "SELECT * FROM Products WHERE ProductID = $product_id";
        $result = $conn->query($sql);

        // Kiểm tra và hiển thị thông tin chi tiết sản phẩm
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product = new Product(
                $row["ProductID"],
                $row["ProductName"],
                $row["CategoryID"],
                $row["Price"],
                $row["Description"],
                $row["StockQuantity"],
                $row["image_url"],
                $row["BrandID"]
            );
            ?>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= $product->img ?>" alt="<?= $product->ProductName ?>" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1><?= $product->ProductName ?></h1>
                    <p class="lead">Price: $<?= $product->Price ?></p>
                    <p>Description: <?= $product->Description ?></p>
                    <!-- Các thông tin khác của sản phẩm có thể được hiển thị ở đây -->
                </div>
            </div>
            <?php
        } else {
            echo "Sản phẩm không tồn tại.";
        }
    } else {
        echo "Không có thông tin sản phẩm.";
    }

    // Đóng kết nối
  
    ?>