<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons (optional, from Bootstrap Icons) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                            <a class="nav-link text-white" href="#">
                                <i class="bi bi-house-door-fill"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
                                <i class="bi bi-bag-fill"></i> Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="bi bi-people-fill"></i> Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="bi bi-gem"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="bi bi-graph-up"></i> Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="bi bi-gear-fill"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Order Details</h1>
                </div>

                <!-- Order Details Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Order #O1001</h5>
                    </div>
                    <div class="card-body">
                        <!-- Order Information -->
                        <h6 class="card-subtitle mb-2 text-muted">Order Information</h6>
                        <dl class="row">
                            <dt class="col-sm-3">Customer</dt>
                            <dd class="col-sm-9">John Doe</dd>
                            <dt class="col-sm-3">Date</dt>
                            <dd class="col-sm-9">2024-08-05</dd>
                            <dt class="col-sm-3">Status</dt>
                            <dd class="col-sm-9"><span class="badge bg-warning">Pending</span></dd>
                            <dt class="col-sm-3">Total</dt>
                            <dd class="col-sm-9">$1,200</dd>
                        </dl>

                        <!-- Order Items -->
                        <h6 class="card-subtitle mb-2 text-muted">Order Items</h6>
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Diamond Ring</td>
                                    <td>1</td>
                                    <td>$1,200</td>
                                    <td>$1,200</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Customer Notes -->
                        <h6 class="card-subtitle mb-2 text-muted">Customer Notes</h6>
                        <p>This is a gift for a special occasion. Please handle with care.</p>

                        <!-- Action Buttons -->
                        <div class="mt-4">
                            <a href="#" class="btn btn-secondary">Back to Orders</a>
                            <button class="btn btn-primary">Mark as Completed</button>
                            <button class="btn btn-danger">Cancel Order</button>
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
