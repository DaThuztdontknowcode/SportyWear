<?php
require_once '../config.php';
require_once '../Model/Product.php';
require_once '../Control/ProductController.php';

// Instantiate ProductSearchController
$productSearchController = new ProductController($conn);

// Get search parameters from the query string
$searchTerm = isset($_GET['query']) ? $_GET['query'] : '';
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$brandFilter = isset($_GET['brand']) ? $_GET['brand'] : '';
$priceFilter = isset($_GET['price']) ? $_GET['price'] : '';

// Perform product search
$products = $productSearchController->searchProducts($searchTerm, $categoryFilter, $brandFilter, $priceFilter);

// Include the view
include '../Page/Component/SearchDisplay.php';
?>
