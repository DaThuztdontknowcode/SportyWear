<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        var maxHeight = 0;

        $(".card-body").each(function () {
            var currentHeight = $(this).height();
            maxHeight = Math.max(maxHeight, currentHeight);
        });

        $(".card-body").height(maxHeight);
    });
</script>

<?php
// filter_results.php
@include '../config.php';
require_once '../Model/Product.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';
$sort_order = isset($_GET['sort']) ? $_GET['sort'] : '';
$sql = "SELECT * FROM products WHERE 1";    

if (!empty($category)) {
    $sql .= " AND CategoryID = " . $category;
}
if (!empty($min_price)) {
    $sql .= " AND Price >= " . $min_price;
}
if (!empty($max_price)) {
    $sql .= " AND Price <= " . $max_price;
}
if ($sort_order == 'asc') {
    $sql .= " ORDER BY Price ASC";
} elseif ($sort_order == 'desc') {
    $sql .= " ORDER BY Price DESC";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
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
            echo "<p>Price: $" . $row["Price"] . "</p>";
            echo '</div>';
            echo '<a href="./product_detail.php?product_id=' . $product->ProductID . '" class="btn btn-primary">View Details</a>';
            echo '</div>';
            echo '</div>';
    }
} else {
    echo "No products found";
}

$conn->close();

?>