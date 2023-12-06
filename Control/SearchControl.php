<?php
require_once '../config.php';
require_once '../Model/Product.php';

<<<<<<< HEAD
if (isset($_GET['query'])) {
    $searchTerm = isset($_GET['query']) ? $_GET['query'] : '';
    $categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
    $brandFilter = isset($_GET['brand']) ? $_GET['brand'] : '';
    $priceFilter = isset($_GET['price']) ? $_GET['price'] : '';

    // Truy vấn cơ sở dữ liệu để tìm kiếm sản phẩm
    $sql = "SELECT * FROM Products WHERE (ProductName LIKE '%$searchTerm%' OR Description LIKE '%$searchTerm%')";
  
    // Add category filter
    if (!empty($categoryFilter)) {
        $sql .= " AND CategoryID = '$categoryFilter'";
    }

    // Add brand filter
    if (!empty($brandFilter)) {
        $sql .= " AND BrandID = '$brandFilter'";
    }

    // Add price filter
    if (!empty($priceFilter)) {
        // Extract min and max prices from the selected range
        $priceRange = explode('-', $priceFilter);
        $minPrice = $priceRange[0];
        $maxPrice = $priceRange[1];
        $sql .= " AND Price BETWEEN $minPrice AND $maxPrice";
    }

    // Log the SQL query to the console
    
    echo "<script>console.log('SQL Query:', \"$sql\");</script>";
   
    $result = $conn->query($sql);

    // Kiểm tra và hiển thị kết quả
=======
if (isset($_GET['query']) || isset($_GET['category']) || isset($_GET['min_price']) || isset($_GET['max_price'])) {
    $searchTerm = $_GET['query'];

    $sort_order = isset($_GET['sort']) ? $_GET['sort'] : '';

    $sql = "SELECT * FROM Products WHERE (ProductName LIKE '%$searchTerm%' OR Description LIKE '%$searchTerm%')";

if (isset($_GET['category']) && $_GET['category'] !== '') {
    $category = $_GET['category'];
    $sql .= " AND CategoryID = $category";
} else {
    $sql .= " AND CategoryID IS NOT NULL";
}

if (isset($_GET['min_price']) && $_GET['min_price'] !== '') {
    $min_price = $_GET['min_price'];
    $sql .= " AND (Price >= $min_price OR Price IS NULL)";
}

if (isset($_GET['max_price']) && $_GET['max_price'] !== '') {
    $max_price = $_GET['max_price'];
    $sql .= " AND (Price <= $max_price OR Price IS NULL)";
}

    if ($sort_order == 'asc') {
        $sql .= " ORDER BY Price ASC";
    } elseif ($sort_order == 'desc') {
        $sql .= " ORDER BY Price DESC";
    }

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

>>>>>>> 0c585b43524032d946d452a58b9cfb367a73a79d
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
        echo '<div class="col-md-12 NoResult">';
        echo '<h1>No result for your search</h1>';
        echo '</div>';
    }
} else {
    echo "<p>Please enter a search term.</p>";
}

<<<<<<< HEAD
// Đóng kết nối cơ sở dữ liệu
=======
$conn->close();
?>
>>>>>>> 0c585b43524032d946d452a58b9cfb367a73a79d
