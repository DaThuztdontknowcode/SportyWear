<?php
// process_filter.php
@include '../config.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';

$sql = "SELECT * FROM products WHERE 1";

if (!empty($category)) {
    $sql .= " AND CategoryID = " . $category;
}
if (!empty($min_price)) {
    $sql .= " AND Price >= " . $min_price;
}
if (!empty($max_price)) {
    $sql .= " AND Price <= " . $max_price;
}

// Add code to execute the query and fetch results

?>