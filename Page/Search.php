<!DOCTYPE html>
<?php include '../Control/Get.php'; ?>
<?php include 'navbar.php'; ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/AllShoes.css">
<<<<<<< HEAD
</head>

<body>
    <div class="container mt-5 Section">
        <div class="Title_container">
            <?php
            if (isset($_GET['query'])) {
                $SearchText = $_GET['query'];
                echo '<h1 class="category-title">Result for: ' . $SearchText . '</h1>';
            }
            ?>
=======
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    
</head>

<body>
<script>
$(document).ready(function () {
    // Gắn sự kiện "change" cho các trường lọc
    $('#category, #min_price, #max_price').change(function () {
        // Lấy giá trị các trường lọc
        var category = $('#category').val();
        var minPrice = $('#min_price').val();
        var maxPrice = $('#max_price').val();

        // Gửi yêu cầu Ajax đến trang search.php với các tham số lọc
        $.ajax({
            type: 'GET',
            url: 'search.php',
            data: {
                category: category,
                min_price: minPrice,
                max_price: maxPrice
            },
            success: function (response) {
                // Cập nhật nội dung kết quả tìm kiếm trên trang
                $('.row').html(response);
            }
        });
    });
});
</script>
<?php include 'navbar.php'; ?>

    <div class="container mt-5 Section">
        <div class="sort-container">
            <select id="sortPrice" onchange="sortProducts()">
                <option value="">Sort by</option>
                <option value="asc">Price Low to High</option>
                <option value="desc">Price High to Low</option>
            </select>
        </div>
        <div class="filter-container">
            <form action="search.php" method="GET">
            <input type="hidden" name="query" value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>">
                <label for="category">Category:</label>
                <select name="category" id="category">
                    <option value="">All Categories</option>
                    <option value="1">Shoes</option>
                    <option value="2">Shirts</option>
                    <option value="3">Shorts</option>
                    <option value="4">Socks</option>
                </select>

                <label for="min_price">Min Price:</label>
                <input type="number" name="min_price" id="min_price" placeholder="Min Price">

                <label for="max_price">Max Price:</label>
                <input type="number" name="max_price" id="max_price" placeholder="Max Price">

                <button type="submit">Filter</button>
            </form>
        </div>

        <script>
            function sortProducts() {
                var sortValue = document.getElementById('sortPrice').value;
                var currentUrl = window.location.href;
                var newUrl = new URL(currentUrl);
                newUrl.searchParams.set('sort', sortValue);
                window.location.href = newUrl.toString();
            }
        </script>
    <div class="container mt-5 Section">
        <div class="Title_container">
        <?php
        if (isset($_GET['query']) || isset($_GET['category']) || isset($_GET['min_price']) || isset($_GET['max_price'])) {
            $SearchText = $_GET['query'];

                    echo '<h1 class="category-title">Result for: '.$SearchText.'</h1>';
        }
        ?>
>>>>>>> 0c585b43524032d946d452a58b9cfb367a73a79d
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
            <?php include '../Control/SearchControl.php'; ?>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
            var encodedURL = encodeURI("../Control/SearchControl.php?query=<?php echo $SearchText; ?>&category=" + category + "&brand=" + brand + "&price=" + price);

            // Log the encoded URL to the console
            console.log("Encoded URL:", encodedURL);

            xhttp.open("GET", encodedURL, true);
            xhttp.send();
        }
    </script>
</body>

<?php include 'footer.php'; ?>

</html>