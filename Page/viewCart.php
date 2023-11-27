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
                <th>STT</th>
                <th>Product_Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
            <?php
            // Mã PHP hiển thị toàn bộ sản phẩm
            require_once '../config.php';
            require_once '../Model/Cart.php';

            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    $product = new CartProduct(
                        $row["cartID"],
                        $row["productName"],
                        $row["productPrice"],
                        $row["description"],
                    ); ?>
            <tr>
                <td>
                    <?php echo $i ?>
                </td>
                <td>
                    <?php echo $product->id_cart ?>
                </td>
                <td>
                    <?php echo $product->ProductName ?>
                </td>
                <td>
                    <?php echo $product->Price ?>
                </td>
                <td>
                    <?php echo $product->Description ?>
                </td>


                <td><a href="">Update</a>|<a href="">Delete</a></td>
            </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>