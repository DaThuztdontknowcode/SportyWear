<!-- product_detail_view.php -->

<?php if ($product !== null): ?>
    <div class="row product-details">
        <div class="col-md-6">
            <img src="<?= $product->img ?>" alt="<?= $product->ProductName ?>" class="img-fluid">
        </div>
        <div class="col-md-6 FormContain">
            <h1><?= $product->ProductName ?></h1>
            <p class="lead">Price: $<?= $product->Price ?></p>
            <p>Description: <?= $product->Description ?></p>
            <!-- Các thông tin khác của sản phẩm có thể được hiển thị ở đây -->

            <!-- Thêm form "Add to Cart" -->
            <form action="addToCart.php" method="post">
                <input type="hidden" name="product_id" value="<?= $product->ProductID ?>">
                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                <input type="number" name="quantity" min="1" value="1">
                <label for="size">Size:</label>
                <select name="size" id="size">
                    <?php
                    for ($size = 36.5; $size <= 46; $size += 0.5) {
                        echo "<option value='$size'>$size</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Add to Cart" name="dathang" class="btn btn-primary Cart_Button">
            </form>
        </div>
    </div>
<?php else: ?>
    <p>Sản phẩm không tồn tại.</p>
<?php endif; ?>
