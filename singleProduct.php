<?php

include "connection.php";
session_start();

if (isset($_SESSION["u"])) {

    if (isset($_GET['id'])) {


        $product_id = intval($_GET['id']);
        $query = "SELECT * FROM product
        INNER JOIN stock ON  stock.product_id = product.p_id
        INNER JOIN product_image ON product.p_id = product_image.product_p_id 
        INNER JOIN category ON category.c_id = product.category_id 
        INNER JOIN brand ON brand.b_id = product.brand_id
        INNER JOIN model ON model.m_id = product.model_id
        INNER JOIN size ON size.s_id = product.size_id
        WHERE p_id =  $product_id";
        $rs = Database::search($query);
        $n = $rs->num_rows;

        // Check if the product was found
        if ($n > 0) {
            // Fetch product data
            $product = $rs->fetch_assoc();
        } else {
            echo "Product not found.";
            exit;
        }
    } else {
        echo "No product ID specified.";
        exit;
    }

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
                        <img src="<?php echo htmlspecialchars($product['code']); ?>" class="product-image" alt="Product Image">
                    </div>

                    <!-- Product Details -->
                    <div class="col-lg-6 col-md-6">
                        <h1 class="product-title">Name:<?php echo htmlspecialchars($product['p_name']); ?></h1>
                        <p class="product-price">Price:<?php echo htmlspecialchars($product['price']); ?></p>

                        <p><strong>Availability:</strong> In Stock</p>
                        <p><strong>Category:</strong>Category:<?php echo htmlspecialchars($product['c_name']); ?></p>

                        <div class="product-description">
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                        </div>

                        <div class="quantity">
                            <label for="quantity" class="form-label">Quantity:<?php echo htmlspecialchars($product['qty']); ?></label>
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
                                    <li>Brand: <?php echo htmlspecialchars($product['b_name']); ?></li>
                                    <li>Model: <?php echo htmlspecialchars($product['m_name']); ?></li>
                                    <li>Size: <?php echo htmlspecialchars($product['s_name']); ?></li>
                                    <li></li>
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