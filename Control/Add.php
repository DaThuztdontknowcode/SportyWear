<?php
require_once '../config.php';
require_once '../Model/Product.php';
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are present
    if (isset($_POST['productName'], $_POST['price'], $_POST['description'], $_POST['stockQuantity'], $_POST['categoryId'], $_POST['brandId'])) {
        $productName = $_POST['productName'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $stockQuantity = $_POST['stockQuantity'];
        $categoryId = $_POST['categoryId'];
        $brandId = $_POST['brandId'];
        echo "<script>console.log('CategoryId:', '$categoryId');</script>";
        echo "<script>console.log('BrandId:', '$brandId');</script>";
    
        // Check if an image file was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            require '../vendor/autoload.php';

            Configuration::instance([
                'cloud' => [
                    'cloud_name' => 'dzhkro11j',
                    'api_key' => '282474656778965',
                    'api_secret' => 'iitf81LQpT8eInc6KMCjEM5QCRY'],
                'url' => [
                    'secure' => true]]);

            // Upload the new image to Cloudinary
            $uploadApi = new UploadApi();
            $uploadResult = $uploadApi->upload($_FILES['image']['tmp_name']);

            // Get the new image URL from Cloudinary
            $downloadUrl = $uploadResult['secure_url'];
        } else {
            // If no new image is uploaded, set a default image URL or handle as needed
            $downloadUrl = 'default_image_url.jpg';
        }

        // Insert the new product into the database
        $sql = "INSERT INTO Products (ProductName, Price, Description, StockQuantity, image_url, CategoryID, BrandID) 
        VALUES ('$productName', '$price', '$description', '$stockQuantity', '$downloadUrl', '$categoryId', '$brandId')";

        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully";
            header("Location: ../Page/Admin.php");
        } else {
            echo "Error adding product: " . $conn->error;
        }
    } else {
        echo "Missing required fields";
    }
} else {
    echo "Invalid request method";
}
?>
