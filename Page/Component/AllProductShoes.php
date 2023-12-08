
<?php
// Your existing code for displaying products
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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

        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="' . $product->img . '" class="card-img-top" alt="' . $product->ProductName . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $product->ProductName . '</h5>';
        echo '<p class="card-text">' . $product->Description . '</p>';
        echo '</div>';
        echo '<a href="./product_detail.php?product_id=' . $product->ProductID . '" class="btn btn-primary">View Details</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="col-md-12 NoResult">';
    echo '<h1>No result for your search</h1>';
    echo '</div>';
}
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Find the maximum height among all card bodies
        var maxHeight = 0;

        $(".card-body").each(function () {
            var currentHeight = $(this).height();
            maxHeight = Math.max(maxHeight, currentHeight);
        });

        // Set the maximum height for all card bodies
        $(".card-body").height(maxHeight);
    });
</script>
