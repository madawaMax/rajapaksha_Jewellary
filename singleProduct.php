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
        <title>Single Product Page</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="resource/logo.png" />
        <!-- Custom CSS -->
        <style>
            .product-title {
                font-size: 2rem;
                font-weight: bold;
            }

            .product-price {
                font-size: 1.5rem;
                color: #dc3545;
                font-weight: bold;
            }

            .product-description {
                margin-top: 20px;
            }

            .product-image {
                max-width: 100%;
                height: auto;
                border-radius: 10px;
            }

            .quantity-input {
                width: 100px;
            }

            .add-to-cart-btn {
                margin-top: 20px;
            }

            .product-details {
                margin-top: 40px;
            }

            .tabs-section {
                margin-top: 40px;
            }

            .nav-tabs .nav-link {
                color: #000;
            }

            .nav-tabs .nav-link.active {
                color: #fff;
                background-color: #0d6efd;
            }

            .review-section {
                margin-top: 20px;
            }
        </style>
    </head>

    <body>

        <!-- Product Page Section -->
        <div class="container my-5">
            <div class="row">
                <?php include "header.php"; ?>

                <hr />

                <div class="row">
                    <!-- Product Image -->
                    <div class="col-lg-6 col-md-6">
                        <img src="https://via.placeholder.com/500" class="product-image" alt="Product Image">
                    </div>

                    <!-- Product Details -->
                    <div class="col-lg-6 col-md-6">
                        <h1 class="product-title">Product Name</h1>
                        <p class="product-price">$120.00</p>

                        <p><strong>Availability:</strong> In Stock</p>
                        <p><strong>Category:</strong> Electronics</p>

                        <div class="product-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel malesuada nunc. Praesent sit amet
                                turpis ac quam fermentum posuere et ac risus.</p>
                        </div>

                        <div class="quantity">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" id="quantity" class="form-control quantity-input" value="1" min="1">
                        </div>

                        <button class="btn btn-primary add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>

                <!-- Additional Product Details -->
                <div class="product-details">
                    <ul class="nav nav-tabs" id="productDetailsTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab" aria-controls="specs" aria-selected="false">Specifications</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="productDetailsTabContent">
                        <!-- Description Tab -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="p-4">
                                <h4>Product Description</h4>
                                <p>This product is perfect for anyone who needs the best in technology and convenience. With
                                    cutting-edge features, you won't be disappointed!</p>
                            </div>
                        </div>
                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="p-4">
                                <h4>Customer Reviews</h4>
                                <div class="review-section">
                                    <p><strong>John Doe</strong> <span>★★★★☆</span></p>
                                    <p>"Great product! Highly recommend."</p>
                                </div>
                                <div class="review-section">
                                    <p><strong>Jane Smith</strong> <span>★★★☆☆</span></p>
                                    <p>"Good, but could be improved."</p>
                                </div>
                            </div>
                        </div>
                        <!-- Specifications Tab -->
                        <div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                            <div class="p-4">
                                <h4>Specifications</h4>
                                <ul>
                                    <li>Weight: 1.5kg</li>
                                    <li>Dimensions: 25cm x 15cm x 10cm</li>
                                    <li>Color: Black</li>
                                    <li>Battery Life: 10 hours</li>
                                </ul>
                            </div>
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