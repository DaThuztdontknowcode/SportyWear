<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="shopping-cart">
        <h1 class="heading">Your Cart</h1>
        <table>
            <tr>
                <th>ID Cart</th>
                <th>Product_Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>

            <?php
            // Mã PHP hiển thị toàn bộ sản phẩm
            require_once '../config.php';
            require_once '../Model/CartDetail.php';
            require_once '../Model/Cart.php';
            require_once '../Model/Product.php';

            session_start();
            $user_id = $_SESSION['user_id'];


            $select_cartID = "SELECT * FROM cart WHERE id_user = $user_id ";
            $result_cartID = $conn->query($select_cartID);
            while ($row_cartID = $result_cartID->fetch_assoc()) {
                $cartID = new Cart(
                    $row_cartID["id_cart"],
                    $row_cartID["id_user"]
                );
            }

            $sql = "SELECT * FROM cartdetail WHERE id_cart = $cartID->id_cart";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    $product = new CartDetail(
                        $row["id_cartDetail"],
                        $row["id_cart"],
                        $row["ProductID"],
                    );
                    $selectProduct = "SELECT * FROM products WHERE ProductID = '$product->ProductID'";
                    $resultProduct = $conn->query($selectProduct);
                    while ($row = $resultProduct->fetch_assoc()) {
                        $productDetail = new Product(
                            $row["ProductID"],
                            $row["ProductName"],
                            $row["CategoryID"],
                            $row["Price"],
                            $row["Description"],
                            $row["StockQuantity"],
                            $row["image_url"],
                            $row["BrandID"],
                        );
                    }
                    ?>




                    <tr class="row-product">
                        <td>
                            <?php echo $product->id_cart ?>
                        </td>
                        <td>
                            <?php echo $product->ProductID ?>
                        </td>
                        <td>
                            <img src='<?php echo $productDetail->img ?>' width="50px" heighth="50px">
                        </td>
                        <td>
                            <?php echo $productDetail->ProductName ?>
                        </td>
                        <td>
                            <?php echo $productDetail->Price ?>
                        </td>
                        <td>
                            <?php echo $productDetail->Description ?>
                        </td>
                        <td>
                            <button class="btn edit-btn"><a
                                    href="editCartModel.php?id_cart=<?php echo $product->id_cart ?>">Edit</a></button>
                            <button class="btn delete-btn" onclick="deleteProduct()">Remove</button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
    <script>
        function deleteProduct() {


            console.log("hello!");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector(".shopping-cart").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "viewCart.php", true);
            xhttp.send();
        }
    </script>
</body>

</html>