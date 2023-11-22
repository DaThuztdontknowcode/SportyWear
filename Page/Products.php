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
<?php include 'navbar.php'; ?>

<body>
<div class="Shoes Section">
    <div class="Title-Container">
    <h1>Hot</h1>
    </div>
<!-- Nội dung của slider -->
<div class="slider-container">
    <?php
  

    // Nạp file config.php để có kết nối đến cơ sở dữ liệu
    require_once '../config.php';
    require_once '../Model/Product.php';

    // Truy vấn dữ liệu từ cơ sở dữ liệu
    $sql = "SELECT * FROM Products where CategoryId = 1";
    $result = $conn->query($sql);

    // Kiểm tra và hiển thị dữ liệu
    if ($result->num_rows > 0) {
        echo "<div class='slider-wrapper'>";
        // Nút mũi tên chuyển slide - Bên trái
       

        echo "<div class='slider'>";
        // Loop để hiển thị sản phẩm trong slider
        while($row = $result->fetch_assoc()) {
            $product = new Product(
                $row["ProductID"],
                $row["ProductName"],
                $row["CategoryID"],
                $row["Price"],
                $row["Description"],
                $row["StockQuantity"],
                $row["image_url"],
                $row["BrandID"]
            );

            
            echo "<a href='./product_detail.php?product_id=" . $product->ProductID . "' class='product-item'>";
            echo "<img src='" . $product->img . "' alt='" . $product->ProductName . "'>";
            echo "<h3>" . $product->ProductName . "</h3>";
            echo "</a>";
            
        }
        echo "</div>";
    

        echo "</div>";
          echo "<div class='Button-Container'>";


        echo "<button class='prev'>Previous</button>";
        // Nút mũi tên chuyển slide - Bên phải
        echo "<button class='next'>Next</button>";
        echo "</div>";
        
    } else {
        echo "0 kết quả";
    }

   
   
    ?>
    </div>
    <div class="Title-Container">
            <h1>Shoes</h1>
        </div>
        <div class="product-grid">
            <?php
            // ... Mã PHP truy vấn dữ liệu từ cơ sở dữ liệu ...
            $sql = "SELECT * FROM Products WHERE CategoryId = 1 LIMIT 6"; // Chỉ lấy tối đa 5 sản phẩm
            $result = $conn->query($sql);

            // Kiểm tra và hiển thị dữ liệu
            if ($result->num_rows > 0) {
                // Loop để hiển thị sản phẩm
                while($row = $result->fetch_assoc()) {
                    $product = new Product(
                        $row["ProductID"],
                        $row["ProductName"],
                        $row["CategoryID"],
                        $row["Price"],
                        $row["Description"],
                        $row["StockQuantity"],
                        $row["image_url"],
                        $row["BrandID"]
                    );

                    echo "<div class='product-item'>";
                    echo "<div class='product-card'>";
                    echo "<a href='./product_detail.php?product_id=" . $product->ProductID . "' class='product-link'>";
                    echo "<img src='" . $product->img . "' alt='" . $product->ProductName . "' class='product-image'>";
                    echo "<div class='product-info'>";
                    echo "<h3 class='product-title'>" . $product->ProductName . "</h3>";
                    //Thêm các thông tin sản phẩm khác nếu cần
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                    echo "</div>";
                    
                }
            } else {
                echo "0 kết quả";
            }
            ?>

             </div>
             <div class="see-all-container">
            <a href="./all_products.php" class="see-all-link">See All</a>
     
        </div>
    

    <!-- Kịch bản JavaScript để khởi tạo Slick Carousel -->
    <script>
        $(document).ready(function(){
            $('.slider').slick({
                // Các tùy chọn của Slick Carousel
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true, // Đưa slide hiện tại ra giữa
                variableWidth: true, // Tự động tính chiều rộng của slide
                prevArrow: $('.prev'),
                nextArrow: $('.next')
            });
        });

    
    $(window).on('load', function() {
        // Tìm chiều cao lớn nhất
        var maxHeight = 0;
        $(".product-card").each(function() {
            var currentHeight = $(this).height();
            maxHeight = Math.max(maxHeight, currentHeight);
        });

        // Đặt chiều cao cho tất cả các card
        $(".product-card").height(maxHeight);
    });


    </script>

</div>

</body>

<?php include 'footer.php'; ?>

</html>
