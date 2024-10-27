<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {
    $rs = Database::search("SELECT * FROM `user` WHERE `user`.`email` = '" . $user["email"] . "'");
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="icon" href="resource/logo.png" />
    </head>


    <body class="profilebody">









        <div class="container mt-5">

            <div class="row">
                <div class="col-md-3 mt-5">
                    <div class="profile-sidebar">
                        <div class="profile-userpic">
                            <img src="<?php echo (!empty($d["img_path"])) ? $d["img_path"] : ""; ?>" class="img-responsive img-circle" alt="User Profile Picture">
                        </div>
                        <div class="profile-usertitle ">
                            <div class="profile-usertitle-name text-dark">
                                <?php echo $d["name"]; ?>
                            </div>
                            <div class="profile-usertitle-job text-dark">
                                <?php echo $d["email"]; ?>
                            </div>
                        </div>
                        <div class="profile-usermenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active text-light">
                                        <i class="fas fa-home"></i> Overview
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-light">
                                        <i class="fas fa-shopping-cart"></i> Change Profile Picture
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-light">
                                        <i class="fas fa-user"></i> Account Settings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="signout();" class="nav-link text-light">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 mt-5">
                    <div class="profile-content">
                        <h2 class="mb-4">Profile Overview</h2>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Change Profile Picture</h4>
                                <p class="card-text"></p>

                                <input type="file" class="" id="profileimg" accept="image/*" />
                                <!-- <a href="#" class="btn btn-outline-primary">View Orders</a> -->
                                <button class="btn btn-outline-primary" onclick="updateprofilepic();">Update Profile Picture</button>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Account Information</h4>
                                <p class="card-text">Update your account information, including email, phone number, and shipping address.</p>
                                <a href="accountinformation.php" class="btn btn-outline-secondary">Edit Information</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Change Password</h4>
                                <p class="card-text">For security, it's recommended to update your password regularly.</p>
                                <a href="#" class="btn btn-outline-danger">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="script.js"></script>
    </body>

    </html>


<?php
}

?>