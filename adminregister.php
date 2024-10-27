<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons (optional, from Bootstrap Icons) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="adminlogstyles.css">
    <link rel="icon" href="resource/logo.png" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 450px;
            margin: auto;
            padding: 2rem;
        }
        .logo {
            display: block;
            margin: auto;
            max-width: 150px;
        }
    </style>
</head>
<body class="profilebody">
    <div class="container register-container">
        <div class="text-center">
            <!-- Logo Placeholder -->
            <img src="resource/logo.png" alt="Company Logo" class="logo">
            <h1 class="h3 mt-4">Rajapaksha Jewelery Admin Register</h1>
        </div>
        
        <div class="card mt-4">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="adminusername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="adminusername" placeholder="Enter username">
                    </div>
                    <div class="mb-3">
                        <label for="adminemail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="adminemail" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label for="adminpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="adminpassword" placeholder="Enter password">
                    </div>
                    <div class="mb-3">
                        <label for="adminconfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="adminconfirmPassword" placeholder="Confirm password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100" onclick="adminregister();">Register</button>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-3">
            <p class="mb-0">Already have an account? <a href="adminlogin.php">Sign in</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
   
</body>
</html>
