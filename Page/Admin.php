<!-- Trang all_products.php -->
<!DOCTYPE html>

<?php include 'navbar.php'; ?>
<?php include '../Control/Get.php'; ?>
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
        <div class="Title_container">
            <?php
            echo '<h1 class="category-title">Sales statistic</h1>';
            ?>
        </div>
        <div class="filter-container">
            <label for="categoryFilter">Category:</label>
            <select id="categoryFilter" onchange="filterProducts()">
                <option value="" disabled selected>Select Category</option>
                <option value="" selected>All Category</option>
                <?php
                // Assume you have a function to get categories from the database
                $categories = getCategories();
                foreach ($categories as $category) {
                    echo "<option value='" . $category['CategoryID'] . "'>" . $category['CategoryName'] . "</option>";
                }
                ?>
            </select>

            <label for="brandFilter">Brand:</label>
            <select id="brandFilter" onchange="filterProducts()">
                <option value="" disabled selected>Select Brand</option>
                <option value="" selected>All Brands</option>
                <?php
                // Assume you have a function to get brands from the database
                $brands = getBrands();

                foreach ($brands as $brand) {
                    echo "<option value='" . $brand['BrandID'] . "'>" . $brand['BrandName'] . "</option>";
                }
                ?>
            </select>

            <label for="priceFilter">Price Range:</label>
            <select id="priceFilter" onchange="filterProducts()">
                <option value="">All Prices</option>
                <option value="0-50">$0 - $50</option>
                <option value="50-100">$50 - $100</option>
                <!-- Thêm các khoảng giá khác cần thiết -->
            </select>
        </div>

        <div id="searchResultsContainer" class="row">
            <?php include '../Page/AjaxAdminFilter.php'; ?>
        </div>
    </div>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include 'footer.php'; ?>
</html>
<script>
        function filterProducts() {
            var category = document.getElementById('categoryFilter').value;
            var brand = document.getElementById('brandFilter').value;
            var price = document.getElementById('priceFilter').value;
            // Log filter values to console
            // Use AJAX to reload only the SearchControl
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Server Response:", this.responseText);
                    document.getElementById("searchResultsContainer").innerHTML = this.responseText;
                }
            };
            var encodedURL = encodeURI("../Page/AjaxAdminFilter.php?category=" + category + "&brand=" + brand + "&price=" + price);
            // Log the encoded URL to the console
            console.log("Encoded URL:", encodedURL);
            xhttp.open("GET", encodedURL, true);
            xhttp.send();
        }
    </script>