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
    <?php include 'navbar.php';?>

    <div class="container mt-5 Section">
        <?php include '../Control/DetailShoe.php';?>

        <!-- Slider for Related Products -->
        <?php include '../Control/RelatedProductsSlider.php';?>
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
