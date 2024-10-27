<?php

include "connection.php";
session_start();

if (isset($_SESSION["au"])) {

    if (isset($_GET['product_id'])) {
        $p_id = $_GET['product_id'];

        // Fetch product details with necessary joins
        $q = Database::search("
            SELECT * FROM `product` 
            INNER JOIN `stock` ON `product`.p_id = `stock`.product_id
            INNER JOIN `category` ON `product`.category_id = `category`.c_id
            INNER JOIN `model` ON `product`.model_id = `model`.m_id
            INNER JOIN `brand` ON `product`.brand_id = `brand`.b_id
            INNER JOIN `size` ON `product`.size_id = `size`.s_id 
            WHERE `p_id` = '".$p_id."'
        ");

        $n = $q->num_rows;
        $d = $q->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productName = $_POST['productName'];
            $productPrice = $_POST['productPrice'];
            $productStock = $_POST['productStock'];
            $productSize = $_POST['productSize'];
            $productDescription = $_POST['productDescription'];

            // Update the product details
            Database::iud("UPDATE `product` SET 
                `p_name` = '$productName', 
                
                `description` = '$productDescription' 
                WHERE `p_id` = '$p_id'");

            // Update stock quantity
            Database::iud("UPDATE `stock` SET 
             `price` = '$productPrice',
                `qty` = '$productStock' 
                WHERE `product_id` = '$p_id'");

            echo "<script>alert('Product updated successfully!'); window.location.href='product.php';</script>";
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="resource/logo.png" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky">
                    <h2 class="text-center text-white py-3">Jewelry Admin</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Products</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Update Product</h1>
                </div>

                <!-- Update Product Form -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Product Details</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">

                                    <div class="mb-3">
                                        <label for="productid" class="form-label">Product ID</label>
                                        <input type="text" class="form-control" id="productid" disabled value="<?php echo $p_id ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $d['p_name'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="productPrice" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="productPrice" name="productPrice" value="<?php echo $d['price'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="productStock" class="form-label">Stock Quantity</label>
                                        <input type="number" class="form-control" id="productStock" name="productStock" value="<?php echo $d['qty'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="productSize" class="form-label">Size</label>
                                        <select class="form-select" id="productSize" name="productSize">
                                            <option value="<?php echo $d['size_id']; ?>" selected><?php echo $d['s_name']; ?></option>
                                            <!-- Add other options here as needed -->
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="productDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="productDescription" name="productDescription" rows="3"><?php echo $d['description'] ?></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    } else {
        echo "Invalid product ID.";
    }

} else {
    echo "Unauthorized access.";
}
?>
