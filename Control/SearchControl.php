<?php
require_once '../config.php';
require_once '../Model/Product.php';

if (isset($_GET['query'])) {
    $searchTerm = $_GET['query'];

    // Truy vấn cơ sở dữ liệu để tìm kiếm sản phẩm
    $sql = "SELECT * FROM Products WHERE ProductName LIKE '%$searchTerm%' OR Description LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    // Kiểm tra và hiển thị kết quả
    if ($result->num_rows > 0) {
        // Display search results
        while ($row = $result->fetch_assoc()) {
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
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<img src="' . $product->img . '" class="card-img-top" alt="' . $product->ProductName . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $product->ProductName . '</h5>';
            echo '<p class="card-text">' . $product->Description . '</p>';
            echo '</div>';
            echo '<a href="./product_detail.php?product_id=' . $product->ProductID . '" class="btn btn-primary">View Details</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // Display "No result" message with appropriate footer styling
        echo '<div class="col-md-12 NoResult">';
        echo '<h1>No result for your search</h1>';
        echo '</div>';
    }
} else {
    echo "<p>Please enter a search term.</p>";
}

// Đóng kết nối cơ sở dữ liệu
?>
