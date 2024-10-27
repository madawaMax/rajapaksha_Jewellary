<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <div class="profile-userpic">
                        <img src="profile-pic.jpg" class="img-responsive img-circle" alt="User Profile Picture">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            John Doe
                        </div>
                        <div class="profile-usertitle-job">
                            john.doe@example.com
                        </div>
                    </div>
                    <div class="profile-usermenu">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="fas fa-home"></i> Overview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-shopping-cart"></i> My Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-user"></i> Account Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    <h2 class="mb-4">Profile Overview</h2>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Order History</h4>
                            <p class="card-text">You have 3 pending orders. View your order history and track your orders.</p>
                            <a href="#" class="btn btn-primary">View Orders</a>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Account Information</h4>
                            <p class="card-text">Update your account information, including email, phone number, and shipping address.</p>
                            <a href="#" class="btn btn-secondary">Edit Information</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Change Password</h4>
                            <p class="card-text">For security, it's recommended to update your password regularly.</p>
                            <a href="#" class="btn btn-danger">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
