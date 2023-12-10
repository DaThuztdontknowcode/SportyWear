<!-- product_listing_view.php -->

<?php if (!empty($products)): ?>   
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= $product->img ?>" class="card-img-top" alt="<?= $product->ProductName ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->ProductName ?></h5>
                        <p class="card-text"><?= $product->Description ?></p>
                        <p class="card-text"> Price:  <?=$product->Price ?> </p>

                        <p class="card-text">Quanity sold: <?= $product->OrderQuan ?></p>
                    </div>
                    <a href="../Page/EditProduct.php?product_id=<?= $product->ProductID ?>" class="btn btn-primary">Edit</a>
                </div>
            </div>
        <?php endforeach; ?>
<?php else: ?>
    <div class="col-md-12 NoResult">
        <h1>No result for your search</h1>
    </div>
<?php endif; ?>
