<?php

include "connection.php";
session_start();

if (isset($_SESSION["au"])) {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons (optional, from Bootstrap Icons) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="resource/logo.png" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-success  text-white bg-opacity-75 sidebar">
                <div class="position-sticky">
                    <h2 class="text-center text-white py-3">Jewelry Admin</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="admindashbord.php">
                                <i class="bi bi-house-door-fill"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="orders.php">
                                <i class="bi bi-bag-fill"></i> Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="custormer.php">
                                <i class="bi bi-people-fill"></i> Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
                                <i class="bi bi-gem"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="analytics .php">
                                <i class="bi bi-graph-up"></i> Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="bi bi-gear-fill"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" onclick="adminsignout();" href="#">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Products</h1>
                    <a  class="btn btn-primary" href="addproduct.php">Add Product</a>
                </div>

                <!-- Product Metrics Section -->

                <?php 
              $rs =  Database::search("SELECT * FROM `product`");
             $num = $rs->num_rows;
                
                ?>
                <div class="row mb-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-info mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text"><?php echo $num?></p>
                            </div>
                        </div>
                    </div>

                    <?php 
              $irs =  Database::search("SELECT * FROM `stock` WHERE `product_status_id` = '1'");
             $inum = $irs->num_rows;
                
                ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-info mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">In Stock</h5>
                                <p class="card-text"><?php echo $inum ?></p>
                            </div>
                        </div>
                    </div>

                    <?php 
              $ors =  Database::search("SELECT * FROM `stock` WHERE `product_status_id` = '2'");
             $onum = $ors->num_rows;
                
                ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-info mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Out of Stock</h5>
                                <p class="card-text"><?php echo $onum ?></p>
                            </div>
                        </div>
                    </div>
                   
                </div>

                <!-- Product List Section -->
                <h2>Product List</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="ptb">
                           
                        <?php include "productmanagement.php"?>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>
            </main>

            <!-- Category -->
            <div class="col-12 col-md-6 mb-4 mt-2">
                <div class="card p-3">
                    <h5 class="card-title">Category Registration</h5>
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category" />
                    </div>
                    <div class="d-none">
                        <div class="alert alert-danger"></div>
                    </div>
                    <button class="btn btn-info" onclick="categoryregister();">Category Register</button>
                </div>
            </div>
            <!-- Category -->

            <!-- brand -->
            <div class="col-12 col-md-6 mb-4 mt-2">
                <div class="card p-3">
                    <h5 class="card-title">brand Registration</h5>
                    <div class="mb-3">
                        <label class="form-label">brand Name</label>
                        <input type="text" class="form-control" id="brand" />
                    </div>
                    <div class="d-none">
                        <div class="alert alert-danger"></div>
                    </div>
                    <button class="btn btn-info" onclick="brandregister();">brand Register</button>
                </div>
            </div>
            <!-- brand -->

             <!-- size -->
            <div class="col-12 col-md-6 mb-4 mt-2">
                <div class="card p-3">
                    <h5 class="card-title">size Registration</h5>
                    <div class="mb-3">
                        <label class="form-label">size Name</label>
                        <input type="text" class="form-control" id="size" />
                    </div>
                    <div class="d-none">
                        <div class="alert alert-danger"></div>
                    </div>
                    <button class="btn btn-info" onclick="sizeregister();">size Register</button>
                </div>
            </div>
            <!-- size -->

           


        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                        </div>
                        <div class="mb-3">
                            <label for="productCategory" class="form-label">Category</label>
                            <select class="form-select" id="productCategory">
                                <option selected>Select category</option>
                                <option value="1">Rings</option>
                                <option value="2">Necklaces</option>
                                <option value="3">Earrings</option>
                                <option value="4">Bracelets</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="productPrice" placeholder="Enter product price">
                        </div>
                        <div class="mb-3">
                            <label for="productStock" class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" id="productStock" placeholder="Enter stock quantity">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
} else {
    echo "Not valid admin";
}
?>