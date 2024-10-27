<?php 

include "connection.php";
session_start();

if (isset($_SESSION["u"])) {

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Cart Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="resource/logo.png" />
    <!-- Custom CSS -->
    <style>
        .cart-item {
            border-bottom: 1px solid #e1e1e1;
            padding: 15px 0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-summary {
            border: 1px solid #e1e1e1;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .remove-btn {
            cursor: pointer;
            color: #dc3545;
        }

        .remove-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Cart Section -->
    <div class="container my-5">
        <div class="row">

            <?php include "header.php"; ?>

            <hr />
            

            <h1 class="mb-4">Shopping Cart</h1>
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <div class="cart-item row align-items-center">
                        <div class="col-md-2">
                            <img src="https://via.placeholder.com/100" class="img-fluid" alt="Product 1">
                        </div>
                        <div class="col-md-4">
                            <h5>Product Name 1</h5>
                            <p>Size: Large</p>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" value="1" min="1">
                        </div>
                        <div class="col-md-2">
                            <h6>$50.00</h6>
                        </div>
                        <div class="col-md-2 text-end">
                            <span class="remove-btn">Remove</span>
                        </div>
                    </div>

                    <div class="cart-item row align-items-center">
                        <div class="col-md-2">
                            <img src="https://via.placeholder.com/100" class="img-fluid" alt="Product 2">
                        </div>
                        <div class="col-md-4">
                            <h5>Product Name 2</h5>
                            <p>Size: Medium</p>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" value="2" min="1">
                        </div>
                        <div class="col-md-2">
                            <h6>$30.00</h6>
                        </div>
                        <div class="col-md-2 text-end">
                            <span class="remove-btn">Remove</span>
                        </div>
                    </div>

                    <!-- Add more cart items as needed -->
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h4>Cart Summary</h4>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p>Subtotal</p>
                            <p>$110.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Shipping</p>
                            <p>$10.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>$120.00</h5>
                        </div>
                        <button class="btn btn-primary w-100 mt-3">Proceed to Checkout</button>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
} else {
    echo "Not valid admin";
}

?>

