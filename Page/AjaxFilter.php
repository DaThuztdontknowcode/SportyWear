<?php
require_once '../Model/Product.php';
require_once '../Control/ProductController.php';
// Create an instance of the controller
$productController = new ProductController($conn);

// Call the method to display products
$productController->displayProducts();
?>
