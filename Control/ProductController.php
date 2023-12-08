<?php

require_once '../config.php';
require_once '../Model/Product.php';

class ProductController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function getProductsForSlider($categoryId) {
        $products = [];

        // Query data from the database
        $sql = "SELECT * FROM Products WHERE CategoryID = $categoryId";
        $result = $this->conn->query($sql);

        // Check and display data
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

                $products[] = $product;
            }
        }

        return $products;
    }
    public function getProductsByCategory($categoryId) {
        $products = [];

        // Query data from the database
        $sql = "SELECT * FROM Products WHERE CategoryID = $categoryId limit  6 ";
        $result = $this->conn->query($sql);

        // Check and display data
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

                $products[] = $product;
            }
        }

        return $products;
    }
    public function getExplore() {
        $products = [];

        // Query data from the database
        $sql = "SELECT * FROM Products  limit  12";
        $result = $this->conn->query($sql);

        // Check and display data
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

                $products[] = $product;
            }
        }

        return $products;
    }

    public function getRelatedProducts($currentProductID) {
        $relatedProducts = [];

        // Query to get the CategoryId of the current product
        $categoryQuery = "SELECT CategoryID FROM Products WHERE ProductID = $currentProductID";
        $categoryResult = $this->conn->query($categoryQuery);

        if ($categoryResult->num_rows > 0) {
            $categoryRow = $categoryResult->fetch_assoc();
            $currentCategoryId = $categoryRow['CategoryID'];

            // Query related products based on the current CategoryId
            $sql = "SELECT * FROM Products WHERE CategoryID = $currentCategoryId AND ProductID != $currentProductID LIMIT 6";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $relatedProduct = new Product(
                        $row["ProductID"],
                        $row["ProductName"],
                        $row["CategoryID"],
                        $row["Price"],
                        $row["Description"],
                        $row["StockQuantity"],
                        $row["image_url"],
                        $row["BrandID"]
                    );
                    $relatedProducts[] = $relatedProduct;
                }
            }
        }

        return $relatedProducts;
    }

    
    public function displayProducts() {
        // Check if category is set in the URL
        if (isset($_GET['category'])) {
            $selectedCategory = $_GET['category'];
            $brandFilter = isset($_GET['brand']) ? $_GET['brand'] : '';
            $priceFilter = isset($_GET['price']) ? $_GET['price'] : '';

            $sql = "SELECT * FROM Products WHERE CategoryID = '$selectedCategory'";
            
            // Add brand filter
            if (!empty($brandFilter)) {
                $sql .= " AND BrandID = '$brandFilter'";
            }

            // Add price filter
            if (!empty($priceFilter)) {
                $priceRange = explode('-', $priceFilter);
                $minPrice = $priceRange[0];
                $maxPrice = $priceRange[1];
                $sql .= " AND Price BETWEEN $minPrice AND $maxPrice";
            }

            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                // Include the view file
                include '../Page/Component/AllProductShoes.php';
            } else {
                echo '<div class="col-md-12 NoResult">';
                echo '<h1>No result for your search</h1>';
                echo '</div>';
            }
        } else {
            // Display all products if no category is set
            $brandFilter = isset($_GET['brand']) ? $_GET['brand'] : '';
            $priceFilter = isset($_GET['price']) ? $_GET['price'] : '';
            $count = 1;
            $sql = "SELECT * FROM Products ";

            // Add brand filter
            if (!empty($brandFilter)) {
                $count++;
                $sql = "SELECT * FROM Products WHERE BrandID = '$brandFilter' ";

                // Add price filter
                if (!empty($priceFilter)) {
                    $priceRange = explode('-', $priceFilter);
                    $minPrice = $priceRange[0];
                    $maxPrice = $priceRange[1];
                    $sql .= " AND Price BETWEEN $minPrice AND $maxPrice";
                }
            }

            // Add price filter if no brand filter is set
            if (!empty($priceFilter) && $count == 1) {
                $priceRange = explode('-', $priceFilter);
                $minPrice = $priceRange[0];
                $maxPrice = $priceRange[1];
                $sql = "SELECT * FROM Products WHERE Price BETWEEN $minPrice AND $maxPrice";
            }

            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                // Include the view file
                include '../Page/Component/AllProductShoes.php';
            } else {
                echo '<div class="col-md-12 NoResult">';
                echo '<h1>No result for your search</h1>';
                echo '</div>';
            }
        }
    }
    public function searchProducts($searchTerm, $categoryFilter, $brandFilter, $priceFilter) {
        $products = [];

        // SQL Query to search for products
        $sql = "SELECT * FROM Products WHERE (ProductName LIKE '%$searchTerm%' OR Description LIKE '%$searchTerm%')";

        // Add category filter
        if (!empty($categoryFilter)) {
            $sql .= " AND CategoryID = '$categoryFilter'";
        }

        // Add brand filter
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

        // Log the SQL query to the console
        echo "<script>console.log('SQL Query:', \"$sql\");</script>";

        $result = $this->conn->query($sql);

        // Fetch and return products
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
                $products[] = $product;
            }
        }

        return $products;
    }
    public function getProducts($categoryFilter, $brandFilter, $priceFilter) {
        $products = [];

        $sql = "SELECT * FROM Products ";

        if (!empty($categoryFilter) || !empty($brandFilter) || !empty($priceFilter)) {
            $sql .= "WHERE ";

            // Add category filter
            if (!empty($categoryFilter)) {
                $sql .= "CategoryID = '$categoryFilter' ";
            }

            // Add brand filter
            if (!empty($brandFilter)) {
                if (!empty($categoryFilter)) {
                    $sql .= "AND ";
                }
                $sql .= "BrandID = '$brandFilter' ";
            }

            // Add price filter
            if (!empty($priceFilter)) {
                if (!empty($categoryFilter) || !empty($brandFilter)) {
                    $sql .= "AND ";
                }
                // Extract min and max prices from the selected range
                $priceRange = explode('-', $priceFilter);
                $minPrice = $priceRange[0];
                $maxPrice = $priceRange[1];
                $sql .= "Price BETWEEN $minPrice AND $maxPrice";
            }
        }

        // Log the SQL query to the console
        echo "<script>console.log('SQL Query:', \"$sql\");</script>";

        $result = $this->conn->query($sql);

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
                    $row["BrandID"],
                    $row["OrderQuanity"]
                );
                $products[] = $product;
            }
        }

        return $products;
    }

    public function getProductDetails($product_id) {
        $product = null;

        // Truy vấn dữ liệu từ cơ sở dữ liệu để lấy thông tin chi tiết của sản phẩm
        $sql = "SELECT * FROM Products WHERE ProductID = $product_id";
        $result = $this->conn->query($sql);

        // Kiểm tra và trả về thông tin chi tiết sản phẩm
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
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
        }

        return $product;
    }

}

?>
