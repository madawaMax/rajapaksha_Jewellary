<?php include "connection.php"; ?>
<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>sign-in </title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="icon" href="resource/logo.png" />
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body class="signinbody">
    <!-- signinbox -->
    <div class="signinbox mt-2 " id="signin">

        <div class="row">
            <div class="  imgdiv">
                <img src="resource/logo.png" class="img">
                <h5 class="mt-5 20">Rajapaksha Jewellery</h5>
            </div>
        </div>
        <div>
            <h1 class="text-center">Sign In</h1>
        </div>



        <div class="mt-2">
            <label for="form-label" class="text-light">email</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="mt-2">
            <label for="form-label" class="text-light">password</label>
            <input type="text" class="form-control" id="password">
        </div>
        <div class="row col-12">
            <div class="mt-2 col-6">

                <input type="checkbox" class="form-check-input" id="remember">
                <label for="form-label" class="text-light">remember me</label>
            </div>
            <div class="col-6 mt-2">
                <a href="#" class="link-light" onclick="forgotPassword();">Forgot Password</a>
            </div>

        </div>

        <div class="mt-2 ">
            <button class="btn btn-outline-light col-12" onclick="signin();">signin</button>
        </div>
        <div class="mt-2 d-none" id="msgdiv2">
            <div class="alert alert-danger" id="msg2">

            </div>
        </div>
        <!-- <div class="mt-2 ">
            <button class="btn btn-secondary col-12" onclick="viewchange();">all ready signup</button>
        </div> -->

        <div class="row col-12 justify-content-center gap-2">
            <div class="row d-flex col-6 mt-4 justify-content-end">
                <button type="button" class="btn btn-info text-light" onclick="changeView();">signup Page</button>


            </div>

            <div class="row d-flex col-6 mt-4 justify-content-end">
                <!-- <button type="button" class="btn btn-info text-light" onclick="changeView();">Admin Page</button> -->
                <a type="button" class="btn btn-info text-light" href="adminlogin2.php">Admin Page</a>

            </div>
        </div>
    </div>


    <!-- signinbox -->

    <!-- signupbox -->

    <div class="signupbox d-none" id="signup">

        <div class="row">
            <div class="  imgdiv">
                <img src="resource/logo.png" class="img">
                <h5 class="mt-5 20">Rajapaksha Jewellery</h5>
            </div>
        </div>
        <div>
            <h2 class="text-center">sign up</h2>
        </div>
       

        <div class="mt-2">
            <label for="form-label" class="text-light">email</label>
            <input type="email" class="form-control" id="address">
        </div>

        <div class="mt-2">
            <label for="form-label"class="text-light">user name</label>
            <input type="text" class="form-control" id="username">
        </div>

        <div class="mt-2 ">
            <label for="form-label"class="text-light">password</label>
            <input type="password" class="form-control" id="pass">
        </div>

        <div class="mt-2 ">
            <label for="form-label"class="text-light">comferm password</label>
            <input type="password" class="form-control" id="Confirm password">
        </div>
       
        
        <div class="mt-2 mb-2">
            <button class="btn btn-outline-info text-light col-12" onclick="signup();">signup</button>
        </div>
        <div class=" d-none" id="msgdiv1">
            <div class="alert alert-danger" role="alert" id="msg1"> </div>


        </div>
        <div class="mt-2 ">
            <button class="btn btn-primary col-12" onclick="changeView();">all ready signin</button>
        </div>

    </div>
    <!-- signupbox -->

    <!-- model -->

    <div class="modal" tabindex="-1" id="fpModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="clo-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="np">
                                <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();"><i id="e1" class="bi bi-eye-slash-fill">show</i></button>
                            </div>

                        </div>
                        <div class="col-6">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="nnp">
                                <button class="btn btn-outline-secondary" type="button" id="nnpb" onclick="showPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i>show</button>
                            </div>

                        </div>
                        <div class="col-12">
                            <label class="form-label">Verification Code</label>
                            <input type="text" class="form-control" id="vc" />

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                </div>
            </div>
        </div>
    </div>




    <!-- model -->

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>