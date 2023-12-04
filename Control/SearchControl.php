<?php
require_once '../config.php';
require_once '../Model/Product.php';

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

$conn->close();
?>
