<?php 

session_start();
require "connection.php";

$email = $_SESSION["u"]["email"];

$name = $_POST["n"];
$category = $_POST["ca"];
$brand = $_POST["b"];
$model = $_POST["m"];
$size = $_POST["s"];
$desc = $_POST["d"];
$image_file = $_FILES["i"];

// Validate input fields
if (empty($name)) {
    echo ("Please Enter a name");
} else if ($category == "0") {
    echo ("Please select a Category");
} else if ($brand == "0") {
    echo ("Please select a Brand");
} else if ($model == "0") {
    echo ("Please select a Model");
} else if ($size == "0") {
    echo ("Please select a size");
} else if (empty($desc)) {
    echo ("Please Enter a Description.");
} else if ($image_file["error"] != UPLOAD_ERR_OK) {
    echo ("Please select an image.");
} else {
    // Check if the product name is already used
    $rs = Database::search("SELECT * FROM `product` WHERE `p_name`='" . $name . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("Product name already used");
    } else {
        // Generate a unique file path for the uploaded image
        $path = "resource/product/" . uniqid() . ".png";

        // Move the uploaded file to the server
        if (move_uploaded_file($image_file['tmp_name'], $path)) {
            // Insert product details into the database
            Database::iud("INSERT INTO `product` (`p_name`, `description`, `category_id`, `brand_id`, `model_id`, `size_id`)
                VALUES ('" . $name . "', '" . $desc . "', '" . $category . "', '" . $brand . "', '" . $model . "', '" . $size . "')");

            // Get the newly inserted product ID
            $productid = Database::$connection->insert_id;

            // Insert the image path into the product_image table
            Database::iud("INSERT INTO `product_image` (`code`, `product_p_id`)
                VALUES ('" . $path . "', '" . $productid . "')");

            echo ("success");
        } else {
            echo ("Failed to upload image.");
        }
    }
}


