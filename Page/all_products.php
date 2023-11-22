<!-- Trang all_products.php -->
<!DOCTYPE html>

<?php include 'navbar.php'; ?>

<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Your custom CSS file -->
    <link rel="stylesheet" href="../css/AllShoes.css">
</head>

<body>
    <div class="container mt-5 Section">
        <h1>Shoes</h1>
        <div class="row">
            <?php
            // Mã PHP hiển thị toàn bộ sản phẩm
            require_once '../config.php';
            require_once '../Model/Product.php';

            $sql = "SELECT * FROM Products";
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
                    echo '<a href="./product_detail.php?product_id=' . $product->ProductID . '" class="btn btn-primary">View Details</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products available.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<?php include 'footer.php'; ?>
</html>
