<?php
// load_categories.php
@include '../config.php';

$category_query = "SELECT * FROM categories";
$category_result = mysqli_query($conn, $category_query);

?>