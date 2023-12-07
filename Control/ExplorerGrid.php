<?php
            // ... Mã PHP truy vấn dữ liệu từ cơ sở dữ liệu ...
            $sql = "SELECT * FROM Products LIMIT 12"; // Chỉ lấy tối đa 5 sản phẩm
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

                    echo "<div class='product-item product-item-animate'>";
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
