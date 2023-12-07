<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Slider</title>
    <link rel="stylesheet" href="../css/ProductsCss.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>


</head>
<?php include './NavBar.php'; ?>

<body>


    <div class="Shirt Section">

        <div class="Wrap_Products">
            <div class="Title-Container">
                <h1>Shirt</h1>
            </div>
            <!-- Nội dung của slider -->
            <div class="slider-container">

                <?php
                require_once '../config.php';
                require_once '../Model/Product.php';
                require_once '../Control/ProductController.php';

                // Instantiate ProductSliderController
                $productController = new ProductController($conn);

                // Get products for the slider
                $categoryID = 2; // Update with your category ID
                $sliderProducts = $productController->getProductsForSlider($categoryID);

                // Include the view
                include '../Page/Component/ShortSlide.php';
                ?>

                <script>
                    $(document).ready(function() {
                        $('.Shirt_Slider').slick({
                            // Slick Carousel options
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            variableWidth: true,
                            prevArrow: $('.Prev_Shirt'),
                            nextArrow: $('.Next_Shirt')
                        });
                    });

                    $(window).on('load', function() {
                        // Find the maximum height
                        var maxHeight = 0;
                        $(".product-card").each(function() {
                            var currentHeight = $(this).height();
                            maxHeight = Math.max(maxHeight, currentHeight);
                        });

                        // Set the height for all cards
                        $(".product-card").height(maxHeight);
                    });
                </script>

            </div>
            <div class="product-grid">
                <?php
                // Include ProductController and product_view
                include('../Page/Component/Grid.php');



                // Get products for CategoryId = 6
                $productsGird = $productController->getProductsByCategory(2);

                // Display products or no result
                if (!empty($productsGird)) {
                    foreach ($productsGird as $product) {
                        displayProduct($product);
                    }
                } else {
                    displayNoResult();
                }
                ?>

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
                <?php
                require_once '../config.php';
                require_once '../Model/Product.php';
                require_once '../Control/ProductController.php';

                // Instantiate ProductSliderController
                $productController = new ProductController($conn);

                // Get products for the slider
                $categoryID = 6; // Update with your category ID
                $sliderProducts = $productController->getProductsForSlider($categoryID);

                // Include the view
                include '../Page/Component/ShortSlide.php';
                ?>
                <script>
                    $(document).ready(function() {
                        $('.Short_Slider').slick({
                            // Slick Carousel options
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            variableWidth: true,
                            prevArrow: $('.prev_Short'),
                            nextArrow: $('.next_Short')
                        });
                    });

                    $(window).on('load', function() {
                        // Find the maximum height
                        var maxHeight = 0;
                        $(".product-card").each(function() {
                            var currentHeight = $(this).height();
                            maxHeight = Math.max(maxHeight, currentHeight);
                        });

                        // Set the height for all cards
                        $(".product-card").height(maxHeight);
                    });
                </script>

            </div>
            <div class="product-grid">
                <?php
                // Include ProductController and product_view




                // Get products for CategoryId = 6
                $productsGird = $productController->getProductsByCategory(6);

                // Display products or no result
                if (!empty($productsGird)) {
                    foreach ($productsGird as $product) {
                        displayProduct($product);
                    }
                } else {
                    displayNoResult();
                }
                ?>

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
                <?php
                require_once '../config.php';
                require_once '../Model/Product.php';
                require_once '../Control/ProductController.php';

                // Instantiate ProductSliderController
                $productController = new ProductController($conn);

                // Get products for the slider
                $categoryID = 1; // Update with your category ID
                $sliderProducts = $productController->getProductsForSlider($categoryID);

                // Include the view
                include '../Page/Component/product_slider.php';
                ?>
                <script>
                    $(document).ready(function() {
                        $('.Shoe_Slider').slick({
                            // Slick Carousel options
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            variableWidth: true,
                            prevArrow: $('.Prev_Shoe'),
                            nextArrow: $('.Next_Shoe')
                        });
                    });

                    $(window).on('load', function() {
                        // Find the maximum height
                        var maxHeight = 0;
                        $(".product-card").each(function() {
                            var currentHeight = $(this).height();
                            maxHeight = Math.max(maxHeight, currentHeight);
                        });

                        // Set the height for all cards
                        $(".product-card").height(maxHeight);
                    });
                </script>


            </div>

            <div class="product-grid">
                <?php
                // Include ProductController and product_view




                // Get products for CategoryId = 6
                $productsGird = $productController->getProductsByCategory(1);

                // Display products or no result
                if (!empty($productsGird)) {
                    foreach ($productsGird as $product) {
                        displayProduct($product);
                    }
                } else {
                    displayNoResult();
                }
                ?>
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
                <?php
                // Include ProductController and product_view




                // Get products for CategoryId = 6
                $productsGird = $productController->getExplore(1);

                // Display products or no result
                if (!empty($productsGird)) {
                    foreach ($productsGird as $product) {
                        displayProduct($product);
                    }
                } else {
                    displayNoResult();
                }
                ?>
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