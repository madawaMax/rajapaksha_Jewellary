<?php

include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="adminlogstyles.css">
    <link rel="icon" href="resource/logo.png" />
</head>

<body class="profilebody d-flex justify-content-center align-items-center vh-100">

    <div class="container signin-container">
        <div class="row justify-content-center">
            <div class="text-center">
                <!-- Logo Placeholder -->
                <img src="resource/logo.png" alt="Company Logo" class="logo">
                <h1 class="h3 mt-4">Rajapaksha Jewelery</h1>
            </div>

            <?php
            $email = "";
            $password = "";

            if (isset($_COOKIE["ad_username"])) {
                $email = $_COOKIE["ad_username"];
            }

            if (isset($_COOKIE["ad_password"])) {
                $password = $_COOKIE["ad_password"];
            }
            ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="adminsigninbox p-4 bg-light shadow rounded">
                    <h2 class="text-center">Admin Login</h2>
                    <div class="mt-2">
                        <label for="email" class="form-label">user name</label>
                        <input type="email" class="form-control border-light bg-transparent" id="adusername" placeholder="Enter your email">
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control bg-transparent" id="adpassword" placeholder="Enter your password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="adrememberMe">
                        <label class="form-check-label" for="adrememberMe">Remember me</label>
                    </div>
                    <div class="mt-2 d-none" id="msgdiv3">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-outline-dark col-12" onclick="adsignin();">Sign In</button>
                    </div>

                    <div class="text-center mt-3">
                        <p class="mb-0">Don't have an account? <a href="adminregister.php">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap.js"></script>
    <script src="script.js"></script>

</body>

</html>