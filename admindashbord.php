<?php 

include "connection.php";
session_start();
$user = $_SESSION["au"];

if (isset($_SESSION["au"])) {

    $rs = Database::search("SELECT * FROM `admin` WHERE `admin`.`ad_email` = '" . $user["ad_email"] . "'");
    $d = $rs->fetch_assoc();

    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admindashstyles.css">
    <link rel="icon" href="resource/logo.png" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-success  text-white bg-opacity-75 sidebar">
                <div class="position-sticky">
                    <h2 class="text-center text-white py-3">Rajapaksha Jewellery Admin</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
                                <i class="bi bi-house-door-fill"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="orders.php">
                                <i class="bi bi-bag-fill"></i> Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="product.php">
                                <i class="bi bi-gem"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="custormer.php">
                                <i class="bi bi-people-fill"></i> Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="analytics.php">
                                <i class="bi bi-graph-up"></i> Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="bi bi-gear-fill"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" onclick="adminsignout();">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1><h1 class="h4"><?php echo $d["ad_email"]; ?></h1>
                </div>

                <!-- Metrics Section -->
                <div class="row mb-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-info mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Sales</h5>
                                <p class="card-text">$34,500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Orders</h5>
                                <p class="card-text">150</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-info mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Customers</h5>
                                <p class="card-text">120</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Products</h5>
                                <p class="card-text">72</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders Section -->
                <h2>Recent Orders</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#1054</td>
                                <td>Alice Brown</td>
                                <td>Aug 8, 2024</td>
                                <td>Pending</td>
                                <td>$560</td>
                            </tr>
                            <tr>
                                <td>#1053</td>
                                <td>David Clark</td>
                                <td>Aug 8, 2024</td>
                                <td>Shipped</td>
                                <td>$1,200</td>
                            </tr>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Product Overview Section -->
                <h2>Product Overview</h2>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Diamond Rings</h5>
                                <p class="card-text">20 in Stock</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-info mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Necklaces</h5>
                                <p class="card-text">15 in Stock</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Earrings</h5>
                                <p class="card-text">30 in Stock</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-info mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Bracelets</h5>
                                <p class="card-text">7 in Stock</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

    
    <?php
} else {
    echo "Not valid admin";
}
?>

