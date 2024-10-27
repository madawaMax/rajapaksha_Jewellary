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
        <title>Customer Management</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="resource/logo.png" />
    </head>

    <body onload="usermanage();">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-2 d-md-block bg-success  text-white bg-opacity-75 sidebar">
                    <div class="position-sticky">
                        <h2 class="text-center text-white py-3">Rajapaksha Jewellery Admin Admin</h2>
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
                                <a class="nav-link active text-white" href="#">
                                    <i class="bi bi-people-fill"></i> Customers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="product.php">
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
                        <h1 class="h2">Customers Management</h1>
                    </div>

                    <?php 
                    
                   $user =  Database::search("SELECT * FROM `user`");
                 $unum =  $user->num_rows;
                    ?>

                    <!-- Customer Metrics Section -->
                    <div class="row mb-4">
                        <div class="col-md-6 col-lg-6">
                            <div class="card bg-info mb-3">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Total Customers</h5>
                                    <p class="card-text"><?php echo $unum?></p>
                                </div>
                            </div>
                        </div>

                        <?php 
                    
                    $auser =  Database::search("SELECT * FROM `user` WHERE `action`='1'");
                  $aunum =  $auser->num_rows;
                     ?>
                        <div class="col-md-6 col-lg-6">
                            <div class="card bg-info mb-3">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Active Customers</h5>
                                    <p class="card-text"><?php echo $aunum  ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 col-lg-3">
                            <div class="card bg-light mb-3">
                                <div class="card-body text-center">
                                    <h5 class="card-title">New Customers</h5>
                                    <p class="card-text">25</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6 col-lg-3">
                            <div class="card bg-light mb-3">
                                <div class="card-body text-center">
                                    <h5 class="card-title">VIP Customers</h5>
                                    <p class="card-text">12</p>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Customer List Section -->
                    <h2>Customer List</h2>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-2 mb-md-0">
                            <input class="form-control" id="uname" onclick="reload();" placeholder="User name" />
                        </div>

                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <button class="btn btn-sm btn-primary" onclick="changestatus();">Change Action</button>
                        </div>

                        <div class="col-12 col-md-3 mb-2 mb-md-0">
                            <!-- <a href="custormerreportgenarate.php"></a> -->
                                  <button class="btn btn-sm btn-primary" onclick="window.print();">Custormer Report</button>
                            
                          
                        </div>
                    </div>


                    <div class="table-responsive mt-2">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Customer Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <!-- <th>Orders</th>
                                <th>Total Spend</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tb">
                               <?php include "loadcustormer.php"?>
                               
                                <!-- More rows as needed -->
                            </tbody>
                        </table>
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