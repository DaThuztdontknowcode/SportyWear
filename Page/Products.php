<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Slider</title>
    <!-- Thêm các tệp CSS và JS của Slick Carousel -->
   <link rel="stylesheet" href="../css/ProductsCss.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
</head>

<body>
<?php include 'navbar.php'; ?>
<div class="Shoes Section">
    <div class="Title-Container">
    <h1>Hot</h1>
    </div>
<!-- Nội dung của slider -->
<div class="slider-container">
<?php include '../Control/product_slider.php'; ?>

    </div>
    <div class="Title-Container">
            <h1>Shoes</h1>
        </div>
        <div class="product-grid">
        <?php include '../Control/product_grid.php'; ?>
             </div>
             <div class="see-all-container">
            <a href="./all_products.php" class="see-all-link">See All</a>
     
        </div>
    

    <!-- Kịch bản JavaScript để khởi tạo Slick Carousel -->
  

</div>

</body>

<?php include 'footer.php'; ?>

</html>
