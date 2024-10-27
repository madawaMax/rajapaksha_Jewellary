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
    <title>Account Information</title>
    <link rel="stylesheet" href="acstyles.css" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="resource/logo.png" />
</head>

<body class="profilebody">
    <div class="container mt-5">
    <div class="col-12  ">
                <div class="row justify-content-center">
                    <div class="  imgdiv">
                        <img src="resource/logo.png" class="img">
                        <h5 class="mt-5 20">Rajapaksha Jewellery</h5>
                    </div>
                </div>
            </div>
        <div class="row">
           
            <div class="col-md-8 offset-md-2">

                <h2 class="mb-4 mt-4">Account Information</h2>
                <form>
                    <div class="form-group">
                        <label for="inputName">Full Name</label>
                        <input type="text" class="form-control" id="inputName" value=" <?php echo $d["name"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName">User Name</label>
                        <input type="text" class="form-control" id="" disabled value=" <?php echo $d["user_name"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email Address</label>
                        <input type="email" class="form-control" id="inputEmail" disabled value="<?php echo $d["email"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Phone Number</label>
                        <input type="tel" class="form-control" id="inputPhone" value="<?php echo $d["mobile"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Shipping Address</label>
                        <textarea class="form-control" id="inputAddress" rows="3" value=" "><?php echo $d["address"]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" value="<?php echo $d["city"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputZip">Zip Code</label>
                        <input type="text" class="form-control" id="inputZip"  value="<?php echo $d["zipcode"]; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="updateProfile();">Update Information</button>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
    
    <?php

}

?>

