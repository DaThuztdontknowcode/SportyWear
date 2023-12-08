<?php
function displayProduct($product) {
    echo "<div class='product-item product-item-animate'>";
    echo "<div class='product-card'>";
    echo "<a href='./product_detail.php?product_id=" . $product->ProductID . "' class='product-link'>";
    echo "<img src='" . $product->img . "' alt='" . $product->ProductName . "' class='product-image'>";
    echo "<div class='product-info'>";
    echo "<h3 class='product-title'>" . $product->ProductName . "</h3>";
    //Thêm các thông tin sản phẩm khác nếu cần
    echo "</div>";
    echo "</a>";
    echo "</div>";
    echo "</div>";
}

function displayNoResult() {
    echo "0 kết quả";
}
?>
