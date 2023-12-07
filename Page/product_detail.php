<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <!-- Thêm liên kết Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Thêm liên kết Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <link rel="stylesheet" href="../css/RelatedProductSlide.css">
    <link rel="stylesheet" href="../css/DetailProduct.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container-fluid mt-5 Section">
        <?php
        require_once '../config.php';
        require_once '../Model/Product.php';
        require_once '../Control/ProductController.php';

        // Instantiate ProductDetailController
        $productDetailController = new ProductController($conn);

        // Kiểm tra xem có tham số product_id được truyền vào không
        if (isset($_GET['product_id'])) {
            // Lấy giá trị product_id từ tham số URL
            $product_id = $_GET['product_id'];

            // Lấy thông tin chi tiết sản phẩm
            $product = $productDetailController->getProductDetails($product_id);

            // Include the view
            include '../Page/Component/DetailShoe.php';
        } else {
            echo "Không có thông tin sản phẩm.";
        }

        // Đóng kết nối
        ?>


        <?php
        require_once '../Control/ProductController.php';

        // Instantiate ProductController
        $productController = new ProductController($conn);

        // Assume $currentProductID is the ID of the current product being viewed
        if (isset($_GET['product_id'])) {
            // Get the product_id from the URL parameter
            $currentProductID = $_GET['product_id'];

            // Call the function to get related products
            $relatedProducts = $productController->getRelatedProducts($currentProductID);

            // Include the related products view
            include '../Page/Component/RelatedProductsSlider.php';
        }
        ?>

    </div>

    <!-- Thêm liên kết Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Thêm liên kết Slick Carousel JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <?php include 'footer.php'; ?>
</body>

</html>