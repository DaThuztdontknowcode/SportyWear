<!-- Trang all_products.php -->
<!DOCTYPE html>
<?php include '../Control/Get.php'; ?>
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
    <php>

        <div class="container mt-5 Section">
            <div class="Title_container">
                <?php
                if (isset($_GET['category'])) {
                    $selectedCategory = $_GET['category'];

                    // Display the category title based on the selected category
                    switch ($selectedCategory) {
                        case 1:
                            echo '<h1 class="category-title">Shoes</h1>';
                            break;
                        case 2:
                            echo '<h1 class="category-title">T-Shirt</h1>';
                            break;
                        case 3:
                            echo '<h1 class="category-title">Tops</h1>';
                            break;
                        case 4:
                            echo '<h1 class="category-title">Socks</h1>';
                            break;
                        case 5:
                            echo '<h1 class="category-title">Tights</h1>';
                            break;

                        case 6:
                            echo '<h1 class="category-title">Short</h1>';
                            break;
                        case 7:
                            echo '<h1 class="category-title">Jackets</h1>';
                            break;
                        case 8:
                            echo '<h1 class="category-title">Headwear</h1>';
                            break;
                        case 9:
                            echo '<h1 class="category-title">Bra</h1>';
                            break;
                        case 10:
                            echo '<h1 class="category-title">Skirt Dresses</h1>';
                            break;
                        case 11:
                            echo '<h1 class="category-title">Polo</h1>';
                            break;

                        case 12:
                            echo '<h1 class="category-title">Sandals/Slippers</h1>';
                            break;
                        case 13:
                            echo '<h1 class="category-title">Sweatshirt</h1>';
                            break;
                        case 14:
                            echo '<h1 class="category-title">Accessories</h1>';
                            break;


                        default:
                            // Handle other categories as needed
                            break;
                    }
                } else {
                    echo '<h1 class="category-title">All products</h1>';
                }




                ?>
            </div>
            <div class="filter-container">



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


                <select id="priceFilter" onchange="filterProducts()">
                    <option value="">All Prices</option>
                    <option value="0-50">$0 - $50</option>
                    <option value="50-100">$50 - $100</option>
                    <!-- Thêm các khoảng giá khác cần thiết -->
                </select>
            </div>

            <div id="searchResultsContainer" class="row">
                <?php include '../Control/AllProductShoes.php'; ?>

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
        var encodedURL = '';

        <?php
        if (isset($_GET['category'])) {
            $selectedCategory = $_GET['category'];
            echo 'encodedURL = encodeURI("../Control/AllProductShoes.php?category=" + ' . $selectedCategory . ' + "&brand=" + brand + "&price=" + price);';
        } else {
            echo 'encodedURL = encodeURI("../Control/AllProductShoes.php?brand=" + brand + "&price=" + price);';
        }
        ?>

        // Log the encoded URL to the console
        console.log("Encoded URL:", encodedURL);

        xhttp.open("GET", encodedURL, true);
        xhttp.send();
    }
</script>