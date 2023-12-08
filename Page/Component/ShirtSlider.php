<!-- shirt_slider_view.php -->

<div class='slider-wrapper'>
    <div class='slider Shirt_Slider'>
        <?php foreach ($shirtSliderProducts as $product): ?>
            <a href='./product_detail.php?product_id=<?= $product->ProductID ?>' class='product-item'>
                <img src='<?= $product->img ?>' alt='<?= $product->ProductName ?>'>
                <h3 class='Product_Name'><?= $product->ProductName ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<div class='Button-Container'>
    <button class='prev Prev_Shirt'>Previous</button>
    <button class='next Next_Shirt'>Next</button>
</div>
