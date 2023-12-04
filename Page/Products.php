<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Slider</title>
   <link rel="stylesheet" href="../css/ProductsCss.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>


</head>

<body>
<?php include 'navbar.php';?>
<?php
include '../Model/load_categories.php';
include '../Control/process_filter.php';
?>

<div class="Shirt Section">
<div class="filter-container">
<div class="filter-container">
<form action="all_products copy.php" method="GET">
        <label for="category">Category:</label>
        <select name="category" id="category">
            <option value="">All Categories</option>
            <option value="1">Shoes</option>
            <option value="2">Shirts</option>
            <option value="3">Shorts</option>
            <option value="4">Stocks</option>
        </select>

        <label for="min_price">Min Price:</label>
        <input type="number" name="min_price" id="min_price" placeholder="Min Price">

        <label for="max_price">Max Price:</label>
        <input type="number" name="max_price" id="max_price" placeholder="Max Price">

        <button type="submit">Filter</button>
    </form>
</div>
</div>
  
        <div class="Wrap_Products">
        <div class="Title-Container">
    <h1>Shirt</h1>
    </div>
<!-- Nội dung của slider -->
<div class="slider-container">
<?php include '../Control/ShirtSlider.php'; ?>

    </div>
        <div class="product-grid">
        <?php include '../Control/ShirtGrid.php'; ?>
             </div>
             <div class="see-all-container">
            <a href="./all_products.php?category=2" class="see-all-link">See All</a>
     
        </div>
        </div>

    <!-- Kịch bản JavaScript để khởi tạo Slick Carousel -->
  

</div>

<div class="Short Section">
   
    
        <div class="Wrap_Products">
        <div class="Title-Container">
    <h1>Short</h1>
    </div>
<!-- Nội dung của slider -->
<div class="slider-container">
<?php include '../Control/ShortSlide.php'; ?>

    </div>
        <div class="product-grid">
        <?php include '../Control/ShortGrid.php'; ?>
             </div>
             <div class="see-all-container">
            <a href="./all_products.php?category=6" class="see-all-link">See All</a>
     
        </div>
        </div>

    <!-- Kịch bản JavaScript để khởi tạo Slick Carousel -->
  

</div>

<div class="Shoes Section">
    
        <div class="Wrap_Products">
        <div class="Title-Container">
    <h1>Shoes</h1>
    </div>
<!-- Nội dung của slider -->
<div class="slider-container">
<?php include '../Control/product_slider.php'; ?>

    </div>
    
        <div class="product-grid">
        <?php include '../Control/product_grid.php'; ?>
             </div>
             <div class="see-all-container">
            <a href="./all_products.php?category=1" class="see-all-link">See All</a>
     
        </div>
        </div>
    

    <!-- Kịch bản JavaScript để khởi tạo Slick Carousel -->
  

</div>

<div class="Explore Section">
    
        <div class="Wrap_Products">
        <div class="Title-Container">
    <h1>Explore</h1>
    </div>
<!-- Nội dung của slider -->
    
        <div class="product-grid">
        <?php include '../Control/ExplorerGrid.php'; ?>
             </div>
             <div class="see-all-container">
            <a href="./all_products.php" class="see-all-link">See All</a>
     
        </div>
        </div>
    

    <!-- Kịch bản JavaScript để khởi tạo Slick Carousel -->
  

</div>

</body>

<?php include 'footer.php'; ?>

</html>