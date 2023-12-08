<!-- related_products_view.php -->

<div class='Related_Wrap'>
    <h2 class='Title'>Related Products</h2>
    <div class='related-products-grid'>
        <div class='grid-container'>
            <?php foreach ($relatedProducts as $relatedProduct): ?>
                <div class='grid-item product-details'>
                    <a href='./product_detail.php?product_id=<?= $relatedProduct->ProductID ?>' class='product-item'>
                        <img src='<?= $relatedProduct->img ?>' alt='<?= $relatedProduct->ProductName ?>'>
                        <div class='grid-content'>
                            <h3><?= $relatedProduct->ProductName ?></h3>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
