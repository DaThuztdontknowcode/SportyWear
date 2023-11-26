<?php
  

  // Nạp file config.php để có kết nối đến cơ sở dữ liệu
  require_once '../config.php';
  require_once '../Model/Product.php';

  // Truy vấn dữ liệu từ cơ sở dữ liệu
  $sql = "SELECT * FROM Products where CategoryId = 6";
  $result = $conn->query($sql);

  // Kiểm tra và hiển thị dữ liệu
  if ($result->num_rows > 0) {
      echo "<div class='slider-wrapper'>";
      // Nút mũi tên chuyển slide - Bên trái
     

      echo "<div class='slider Short_Slider'>";
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
          echo "<h3 class='Product_Name' >" . $product->ProductName . "</h3>";
          echo "</a>";
          
      }
      echo "</div>";
  

      echo "</div>";
        echo "<div class='Button-Container'>";


      echo "<button class='prev prev_Short'>Previous</button>";
      // Nút mũi tên chuyển slide - Bên phải
      echo "<button class='next next_Short'>Next</button>";
      echo "</div>";
      
  } else {
      echo "0 kết quả";
  }

 
 
  ?>
    <script>
        $(document).ready(function(){
            $('.Short_Slider').slick({
                // Các tùy chọn của Slick Carousel
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true, // Đưa slide hiện tại ra giữa
                variableWidth: true, // Tự động tính chiều rộng của slide
                prevArrow: $('.prev_Short'),
                nextArrow: $('.next_Short')
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