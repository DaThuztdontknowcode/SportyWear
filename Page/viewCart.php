<?php
require_once '../config.php';
require_once '../Model/DetailCartModel.php';
global $conn;
$cartDetail = new DetailCartModel($conn);


if (isset($_GET["product-id"]) && isset($_GET["cart-id"])) {
    $product_id = $_GET["product-id"];
    $cart_id = $_GET["cart-id"];
    $cartDetail->RemoveCartDetail($cart_id, $product_id);
}

if (isset($_POST["update_quantity"]) && $_POST["update_quantity"]) {
    $cartID = $_POST["id-cart"];
    $productID = $_POST["product-id"];
    $newQuantity = $_POST["new-quantity"];
    $cartDetail->UpdateCartDetail($cartID, $productID, $newQuantity);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9406821d13.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <div class="container-fluid">
        <div class="row cart ">
            <div class="cart-container col-lg-8 pe-5">
                <div class="cart-title">Your Cart</div>
                <?php
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
                $total = 0;
                if ($result->num_rows > 0) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        $product = new CartDetail(
                            $row["id_cartDetail"],
                            $row["id_cart"],
                            $row["ProductID"],
                            $row["quantity"],
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
                            $total = $total + ($product->Quantity * $productDetail->Price);
                        }
                        ?>
                <div class="cart-view">
                    <div class="cart-item">
                        <img src='<?php echo $productDetail->img ?>' width="200px" heighth="200px"
                            class="cart-item-img">
                        <div class="cart-item-detail">
                            <div class="cart-item-info">
                                <div class="cart-item-name">
                                    <?php echo $productDetail->ProductName ?>
                                </div>
                                <div class="cart-quantity">
                                    <div>Quantity</div>
                                    <form class="edit-quantity" action="viewCart.php" method="post">
                                        <!-- <input class="quantity" type="number" name="new-quantity" min="1"
                                                value="<?php echo $product->Quantity ?>"> -->
                                        <select name="new-quantity" id="" class="quantity">
                                            <option <?php echo $product->Quantity ?>>
                                                <?php echo $product->Quantity ?>
                                            </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <input type="hidden" name="id-cart" value="<?php echo $product->id_cart ?>">
                                        <input type="hidden" name="product-id"
                                            value="<?php echo $product->ProductID ?>">
                                        <input class="btn-update" type="submit" value="Update" name="update_quantity">
                                    </form>
                                </div>

                                <a
                                    href="viewCart.php?product-id=<?php echo $product->ProductID ?>&cart-id=<?php echo $product->id_cart ?>">
                                    <i class="fa-solid fa-trash remove"></i>
                                </a>
                            </div>
                            <div class="cart-item-price">
                                <?php echo $productDetail->Price ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>

            <!-- SUMMARY -->
            <div class="cart-total col-lg-4">
                <div class="cart-total-title">Summary</div>
                <div class="cart-total-detail">
                    <div class="cart-total-subtotal">
                        <div>Subtotal</div>
                        <div class="cart-total-price">
                            <?php echo $total ?>
                        </div>
                    </div>
                    <div class="cart-total-subtotal">
                        <div>Delivery Fee</div>
                        <div>Free</div>
                    </div>
                </div>
                <div class="cart-total-sum">
                    <div>Total</div>
                    <div class="cart-total-price">
                        <?php echo $total ?>
                    </div>
                </div>
                <div class=" d-flex justify-content-center w-100 mt-4">
                    <button class="btn-backToShop"><a href="./Products.php">Back To Shop</a></button>
                </div>

                <div class=" d-flex justify-content-center w-100 mt-4">
                    <button class="btn-checkout"><a class="checkout" href="#">Check Out</a></button>
                </div>
            </div>

        </div>

    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkout = document.querySelector(".btn-checkout a");
        if (checkout) {
            checkout.addEventListener("click", function(event) {
                event.preventDefault();
                // <?php

                //     require_once '../config.php';
                //     require_once '../Model/HoaDonModel.php';

                //     global $conn;
                //     $hoadon = new HoaDonModel($conn);
                //     $user_id = $_SESSION['user_id'];
                //     $hoadon->AddToHoaDon($product->id_cart);



                //     ?>
            });
        }
    });
    </script>


    </script>
</body>

</html>