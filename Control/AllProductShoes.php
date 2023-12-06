<?php
require_once '../config.php';
require_once '../Model/Product.php';
?>




<?php
if (isset($_GET['category'])) {
    $selectedCategory = $_GET['category'];
    $brandFilter = isset($_GET['brand']) ? $_GET['brand'] : '';
    $priceFilter = isset($_GET['price']) ? $_GET['price'] : '';
    

    $sql = "SELECT * FROM Products WHERE CategoryID = '$selectedCategory'";
    if (!empty($brandFilter)) {
        $sql .= " AND BrandID = '$brandFilter'";
    }

    // Add price filter
    if (!empty($priceFilter)) {
        // Extract min and max prices from the selected range
        $priceRange = explode('-', $priceFilter);
        $minPrice = $priceRange[0];
        $maxPrice = $priceRange[1];
        $sql .= " AND Price BETWEEN $minPrice AND $maxPrice";
    }    
    echo "<script>console.log('SQL Query:', \"$sql\");</script>";
    $result = $conn->query($sql);

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
} else {
    
        
    $brandFilter = isset($_GET['brand']) ? $_GET['brand'] : '';
    $priceFilter = isset($_GET['price']) ? $_GET['price'] : '';
    $count =1 ;
    $sql = "SELECT * FROM Products ";
    if (!empty($brandFilter)) {
        $count++;
        $sql = "SELECT * FROM Products Where  BrandID = '$brandFilter' ";
        
        // Add price filter
        if (!empty($priceFilter)) {
            // Extract min and max prices from the selected range
            $priceRange = explode('-', $priceFilter);
            $minPrice = $priceRange[0];
            $maxPrice = $priceRange[1];
            $sql .= " AND Price BETWEEN $minPrice AND $maxPrice";
        }
    }
    if (!empty($priceFilter && $count==1)) {
        // Extract min and max prices from the selected range
        $priceRange = explode('-', $priceFilter);
        $minPrice = $priceRange[0];
        $maxPrice = $priceRange[1];
        $sql = "SELECT * FROM Products Where Price BETWEEN $minPrice AND $maxPrice";
    }
    $result = $conn->query($sql);

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
    } else {       echo '<div class="col-md-12 NoResult">';
        echo '<h1>No result for your search</h1>';
        echo '</div>';}
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