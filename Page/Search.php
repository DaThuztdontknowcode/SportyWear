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
        <div class="Title_container">
        <?php
        if (isset($_GET['query'])) {
            $SearchText = $_GET['query'];
        
                    echo '<h1 class="category-title">Result for: '.$SearchText.'</h1>';
        }
            
        
        
        
        
        ?>
        </div>
        
        <div class="row">
        <?php include '../Control/SearchControl.php'; ?>
        </div>
    </div>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<?php include 'footer.php'; ?>
</html>
