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
    <div class="sort-container">
    <select id="sortPrice" onchange="sortProducts()">
        <option value="">Sort by</option>
        <option value="asc">Price Low to High</option>
        <option value="desc">Price High to Low</option>
    </select>
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
        if (isset($_GET['category'])) {
            $selectedCategory = $_GET['category'];
        
            // Display the category title based on the selected category
            switch ($selectedCategory) {
                case 1:
                    echo '<h1 class="category-title">Shoes</h1>';
                    break;
                case 2:
                    echo '<h1 class="category-title">Shirt</h1>';
                    break;
                case 3:
                    echo '<h1 class="category-title">Short</h1>';
                    break;
                default:
                    // Handle other categories as needed
                    break;
            }
        }else{
            echo '<h1 class="category-title">All products</h1>';
              
        }
        
        
        
        
        ?>
        </div>
        
        <div class="row">
        <?php include '../Page/filter_results.php';?>

        </div>
    </div>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<?php include 'footer.php'; ?>
</html>
