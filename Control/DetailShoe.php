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
        <h1>
            <?= $product->ProductName ?>
        </h1>
        <p class="lead">Price: $
            <?= $product->Price ?>
        </p>
        <p>Description:
            <?= $product->Description ?>
        </p>

        <!-- Các thông tin khác của sản phẩm có thể được hiển thị ở đây -->

        <!-- Thêm button "Add to Cart" -->
        <form action="addToCart.php" method="post">
            <input type="hidden" name="product_id" value="<?= $product->ProductID ?>">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            <label for="size">Size:</label>
            <select name="size" id="size">
                <?php
                        for ($size = 36.5; $size <= 46; $size += 0.5) {
                            echo "<option value='$size'>$size</option>";
                        }
                        ?>
            </select>
            <input type="number" name="quantity" min="1" value="1">
            <input type="submit" value="Add to Cart" name="dathang" class="btn btn-primary Cart_Button">
        </form>
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