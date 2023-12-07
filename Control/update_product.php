<?php
require_once '../config.php';
require_once '../Model/Product.php';
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are present
    if (isset($_POST['product_id'], $_POST['productName'], $_POST['price'], $_POST['description'], $_POST['stockQuantity'])) {
        $productID = $_POST['product_id'];
        $productName = $_POST['productName'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $stockQuantity = $_POST['stockQuantity'];
        $existingImageUrl = $_POST['existing_image_url'];

        // Check if an image file was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] ===UPLOAD_ERR_OK)  {
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
            echo "<script>console.log('In new img', '$downloadUrl');</script>";

        } else {
            // If no new image is uploaded, keep the existing image URL
           

            $downloadUrl = $existingImageUrl;
            echo "<script>console.log('In old img', '$downloadUrl');</script>";
        }

        // Update the product information in the database
        $sql = "UPDATE Products SET ProductName = '$productName', Price = '$price', Description = '$description', StockQuantity = '$stockQuantity', image_url = '$downloadUrl' WHERE ProductID = $productID";

        if ($conn->query($sql) === TRUE) {
           
            echo "Product updated successfully";
            header("Location: ../Page/Admin.php");
          
        } else {
            echo "Error updating product: " . $conn->error;
        }
    } else {
        echo "Missing required fields";
    }
} else {
    echo "Invalid request method";
}
?>
