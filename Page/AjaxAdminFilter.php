<?php
require_once '../config.php';
require_once '../Model/Product.php';
require_once '../Control/ProductController.php';

// Instantiate ProductListingController
$productListingController = new ProductController($conn);

// Get filters from the query string
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$brandFilter = isset($_GET['brand']) ? $_GET['brand'] : '';
$priceFilter = isset($_GET['price']) ? $_GET['price'] : '';

// Retrieve products
$products = $productListingController->getProducts($categoryFilter, $brandFilter, $priceFilter);

// Include the view
include '../Page/Component/ProductShowForAd.php';
?>
