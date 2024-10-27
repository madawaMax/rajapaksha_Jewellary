<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="resource/logo.png" />
    <!-- Chart.js (for charts) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                            <a class="nav-link text-white" href="product.php">
                                <i class="bi bi-gem"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
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
                    <h1 class="h2">Analytics</h1>
                </div>

                <!-- Metrics Section -->
                <div class="row mb-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Sales</h5>
                                <p class="card-text">$45,300</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">New Customers</h5>
                                <p class="card-text">200</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Products Sold</h5>
                                <p class="card-text">500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Revenue</h5>
                                <p class="card-text">$95,000</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <h2>Sales Analytics</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                Monthly Sales
                            </div>
                            <div class="card-body">
                                <canvas id="monthlySalesChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                Top Selling Products
                            </div>
                            <div class="card-body">
                                <canvas id="topProductsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Customer Analytics</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                New vs Returning Customers
                            </div>
                            <div class="card-body">
                                <canvas id="customerChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                Customer Demographics
                            </div>
                            <div class="card-body">
                                <canvas id="demographicsChart"></canvas>
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

    <!-- Chart.js (for charts) -->
    <script>
        const ctxMonthlySales = document.getElementById('monthlySalesChart').getContext('2d');
        const ctxTopProducts = document.getElementById('topProductsChart').getContext('2d');
        const ctxCustomer = document.getElementById('customerChart').getContext('2d');
        const ctxDemographics = document.getElementById('demographicsChart').getContext('2d');

        // Sample data and configuration for charts
        const monthlySalesChart = new Chart(ctxMonthlySales, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                datasets: [{
                    label: 'Sales ($)',
                    data: [5000, 7000, 8000, 12000, 15000, 13000, 17000, 19000],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const topProductsChart = new Chart(ctxTopProducts, {
            type: 'bar',
            data: {
                labels: ['Rings', 'Necklaces', 'Earrings', 'Bracelets'],
                datasets: [{
                    label: 'Sales',
                    data: [200, 150, 300, 100],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const customerChart = new Chart(ctxCustomer, {
            type: 'pie',
            data: {
                labels: ['New Customers', 'Returning Customers'],
                datasets: [{
                    label: 'Customer Type',
                    data: [300, 200],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

        const demographicsChart = new Chart(ctxDemographics, {
            type: 'doughnut',
            data: {
                labels: ['18-24', '25-34', '35-44', '45-54', '55+'],
                datasets: [{
                    label: 'Age Group',
                    data: [50, 100, 150, 75, 25],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>
