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
                <th>Quantity</th>
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

                            <form class="edit-quantity" action="viewCart.php" method="post">
                                <input class="quantity" type="number" name="new-quantity" min="1"
                                    value="<?php echo $product->Quantity ?>">
                                <input type="hidden" name="id-cart" value="<?php echo $product->id_cart ?>">
                                <input type="hidden" name="product-id" value="<?php echo $product->ProductID ?>">
                                <input class="btn-update" type="submit" value="Update" name="update_quantity">
                            </form>

                        </td>
                        <td>
                            <?php echo $productDetail->Description ?>
                        </td>
                        <td>
                            <!-- <button class="btn edit-btn"><a
                                    href="editCartModel.php?id_cart=<?php echo $product->id_cart ?>">Edit</a></button> -->
                            <button class="btn delete-btn">
                                <a
                                    href="viewCart.php?product-id=<?php echo $product->ProductID ?>&cart-id=<?php echo $product->id_cart ?>">
                                    Remove
                                </a>
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>