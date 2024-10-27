<?php 

require "connection.php";

if(isset($_GET["id"])){

    $pid = $_GET["id"];

    // Check if the product exists
    $product_rs = Database::search("SELECT * FROM `product` WHERE `p_id`='".$pid."'");
    $product_num = $product_rs->num_rows;

    if($product_num == 1){

        // First, delete from the stock table where the product is referenced
        Database::iud("DELETE FROM `stock` WHERE `product_id` = '".$pid."'");

        // Then, delete from the product_image table (if any images are related)
        Database::iud("DELETE FROM `product_image` WHERE `product_p_id` = '".$pid."'");

        // Finally, delete the product from the product table
        Database::iud("DELETE FROM `product` WHERE `p_id` = '".$pid."'");

        echo "success";
    } else {
        echo "Cannot find the product. Please try again later.";
    }

} else {
    echo "Something went wrong.";
}


?>