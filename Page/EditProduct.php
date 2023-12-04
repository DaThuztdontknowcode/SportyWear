<?php
require_once '../config.php';
require_once '../Model/Product.php';

// Check if the product ID is provided in the URL
if (isset($_GET['product_id'])) {
    $productID = $_GET['product_id'];

    // Fetch the product information based on the provided ID
    $sql = "SELECT * FROM Products WHERE ProductID = $productID";
    $result = $conn->query($sql);

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
            $row["BrandID"],
            $row["OrderQuanity"]
        );
    } else {
        echo '<p>Product not found.</p>';
        exit;
    }
} else {
    echo '<p>Product ID is missing.</p>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/EditProduct.css">
</head>
<?php include '../Page/NavBar.php'; ?>
<body>

<div class="container mt-5 Section">
<h2 class="mb-4"><p>Edit Product</p></h2>

    <form action="../Control/update_product.php" method="post" enctype="multipart/form-data">
        <!-- Include a hidden field to pass the ProductID to the update_product.php page -->
        <input type="hidden" name="product_id" value="<?php echo $product->ProductID; ?>">
 <!-- Include a hidden field for the existing image URL -->
        <input type="hidden" name="existing_image_url" value="<?php echo $product->img ?>">

        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $product->ProductName; ?>" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $product->Price; ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product->Description; ?></textarea>
        </div>

        <div class="form-group">
            <label for="stockQuantity">Stock Quantity:</label>
            <input type="number" class="form-control" id="stockQuantity" name="stockQuantity" value="<?php echo $product->StockQuantity; ?>" required>
        </div>

        <div class="form-group">
            <label for="image">Product Image:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary btn-block">Update Product</button>
        
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include '../Page/footer.php'; ?>
</body>
</html>
