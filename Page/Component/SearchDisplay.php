<!-- product_search_view.php -->

<?php if (!empty($products)): ?>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= $product->img ?>" class="card-img-top" alt="<?= $product->ProductName ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->ProductName ?></h5>
                        <p class="card-text"><?= $product->Description ?></p>
                        <p>Price: $<?= $product->Price ?></p>
                    </div>
                    <a href="./product_detail.php?product_id=<?= $product->ProductID ?>" class="btn btn-primary">View Details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="col-md-12 NoResult">
        <h1>No result for your search</h1>
    </div>
<?php endif; ?>
