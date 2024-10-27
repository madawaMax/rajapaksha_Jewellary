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
        <title>Add Product</title>
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
                <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                    <div class="position-sticky">
                        <h2 class="text-center text-white py-3">Jewelry Admin</h2>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="admindashbord.php">
                                    <i class="bi bi-house-door-fill"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="stockmanage.php">
                                    <i class="bi bi-bag-fill"></i> Stock Manage
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Add New Product</h1>
                    </div>

                    <!-- Add Product Form -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title bg-info">Product Details</h5>
                                </div>
                                <div class="card-body">
                                    <form enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label bg-success">Product Name</label>
                                            <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productCategory" class="form-label bg-success">Category</label>
                                            <select class="form-select" id="productCategory">
                                                <option value="0">Select category</option>
                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `category`");
                                                $c_num = $c_rs->num_rows;

                                                for ($a = 0; $a < $c_num; $a++) {
                                                    $c_data = $c_rs->fetch_assoc();
                                                ?>

                                                    <option value="<?php echo $c_data["c_id"]; ?>"><?php echo $c_data["c_name"]; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="productCategory" class="form-label bg-success">Brand</label>
                                            <select class="form-select" id="productbrand">
                                                <option value="0">Select Brand</option>
                                                <?php

                                                $b_rs = Database::search("SELECT * FROM `brand`");
                                                $b_num = $b_rs->num_rows;

                                                for ($a = 0; $a < $b_num; $a++) {
                                                    $b_data = $b_rs->fetch_assoc();
                                                ?>

                                                    <option value="<?php echo $b_data["b_id"]; ?>"><?php echo $b_data["b_name"]; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="productCategory" class="form-label bg-success">Model</label>
                                            <select class="form-select" id="productmodel">
                                                <option value="0">Select Model</option>
                                                <?php

                                                $m_rs = Database::search("SELECT * FROM `model`");
                                                $m_num = $m_rs->num_rows;

                                                for ($a = 0; $a < $m_num; $a++) {
                                                    $m_data = $m_rs->fetch_assoc();
                                                ?>

                                                    <option value="<?php echo $m_data["m_id"]; ?>"><?php echo $m_data["m_name"]; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="productCategory" class="form-label bg-success">Size</label>
                                            <select class="form-select" id="productsize">
                                                <option value="0">Select Size</option>
                                                <?php

                                                $s_rs = Database::search("SELECT * FROM `size`");
                                                $s_num = $s_rs->num_rows;

                                                for ($a = 0; $a < $s_num; $a++) {
                                                    $s_data = $s_rs->fetch_assoc();
                                                ?>

                                                    <option value="<?php echo $s_data["s_id"]; ?>"><?php echo $s_data["s_name"]; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="productPrice" class="form-label bg-success">Price</label>
                                            <input type="number" class="form-control" id="productPrice" placeholder="Enter product price">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productStock" class="form-label bg-success" >Stock Quantity</label>
                                            <input type="number" class="form-control" id="productStock" placeholder="Enter stock quantity">
                                        </div> -->
                                        <div class="mb-3">
                                            <label for="productDescription" class="form-label bg-success">Description</label>
                                            <textarea class="form-control" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="image">Image</label>
                                            <input type="file" class="form-control" multiple id="image" />
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="productImage" class="form-label bg-success">Product Image</label>
                                            <div class="offset-lg-3 col-12 col-lg-6">
                                                <div class="row">
                                                    <div class="col-4 border border-primary rounded p-3">
                                                        <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i0" />
                                                    </div>
                                                    <div class="col-4 border border-primary rounded ">
                                                        <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i1" />
                                                    </div>
                                                    <div class="col-4 border border-primary rounded">
                                                        <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i2" />
                                                    </div>
                                                </div> -->

                                        <!-- <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                                    <input type="file" class="d-none" id="imageuploader" multiple />
                                                    <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeProductImage();">Upload Images</label>
                                                </div> -->
                                        <!-- <button type="submit" class="btn btn-primary mt-2">Upload Product Image</button> -->
                                        <!-- </div> -->
                                        <!-- <input class="form-control" type="file" id="productImage"> -->
                                        <!-- </div> -->



                                        <button type="button" class="btn btn-primary" onclick="addProduct();">Add Product</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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