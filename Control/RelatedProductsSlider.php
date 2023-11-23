<?php
require_once '../config.php';
require_once '../Model/Product.php';

// Assume $currentProductID is the ID of the current product being viewed
if (isset($_GET['product_id'])) {
    // Lấy giá trị product_id từ tham số URL
    $currentProductID = $_GET['product_id'];
}
// Query related products (you may customize this query based on your criteria)
$sql = "SELECT * FROM Products WHERE CategoryId = 1 AND ProductID != $currentProductID LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Related Products</h2>";
    echo "<div class='related-products-grid'>";
    echo "<div class='grid-container'>";
    
    while ($row = $result->fetch_assoc()) {
        $relatedProduct = new Product(
            $row["ProductID"],
            $row["ProductName"],
            $row["CategoryID"],
            $row["Price"],
            $row["Description"],
            $row["StockQuantity"],
            $row["image_url"],
            $row["BrandID"]
        );

        echo "<div class='grid-item'>";
        echo "<a href='./product_detail.php?product_id=" . $relatedProduct->ProductID . "' class='product-item'>";
        echo "<img src='" . $relatedProduct->img . "' alt='" . $relatedProduct->ProductName . "'>";
        echo "<div class='grid-content'>";
        echo "<h3>" . $relatedProduct->ProductName . "</h3>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
    }

    echo "</div>";
    echo "</div>";
}
?>
