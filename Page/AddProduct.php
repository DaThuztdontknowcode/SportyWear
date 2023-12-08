<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
     <!-- ... Các thẻ khác ... -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/EditProduct.css">
</head>

<?php include '../Page/NavBar.php'; ?>

<?php include '../Control/Get.php'; ?>
<body>


    <div class="container mt-5  Container-animate Section">
    <h2 class="mb-4"><p>Add product</p></h2>
        <form action="../Control/Add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="stockQuantity">Stock Quantity:</label>
                <input type="number" class="form-control" id="stockQuantity" name="stockQuantity" required>
            </div>
         
        <div class="form-group">
    <label for="categoryId">Category:</label>
    <select class="form-control" id="categoryId" name="categoryId" required>
        <option value="" disabled selected>Select Category</option>
        <?php
        // Assume you have a function to get categories from the database
        $categories = getCategories();

        foreach ($categories as $category) {
            echo "<option value='" . $category['CategoryID'] . "'>" . $category['CategoryName'] . "</option>";
        }
        ?>
    </select>
</div>

<!-- Dropdown for Brand -->
<div class="form-group">
    <label for="brandId">Brand:</label>
    <select class="form-control" id="brandId" name="brandId" required>
        <option value="" disabled selected>Select Brand</option>
        <?php
        // Assume you have a function to get brands from the database
        $brands = getBrands();

        foreach ($brands as $brand) {
            echo "<option value='" . $brand['BrandID'] . "'>" . $brand['BrandName'] . "</option>";
        }
        ?>
    </select>
</div>
            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <script>
    function submitForm() {
        // Lấy giá trị categoryId và brandId từ các trường trong form
        var categoryId = document.getElementById('categoryId').value;
        var brandId = document.getElementById('brandId').value;

        // In giá trị vào console để kiểm tra
        console.log('CategoryId:', categoryId);
        console.log('BrandId:', brandId);
    }
</script>
            <button type="submit" class="btn btn-primary btn-block" >Add Product</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
<?php include '../Page/footer.php'; ?>
</html>