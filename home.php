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
    <title>Home</title>

    <link href="bootstrap.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="resource/logo.png" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body onload="loadproduct(0);">

    <div class="container">
        <div class="row">
            <?php include "header.php"; ?>

            <hr />
            <hr />
            <hr />
            <hr />

            <div class="col-12 ">
                <div class="row justify-content-center mb-3">
                    <div class="col-12 col-lg-6">

                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-12  ">
                <div class="row">
                    <div class="  imgdiv">
                        <img src="resource/logo.png" class="img">
                        <h5 class="mt-5 20">Rajapaksha Jewellery</h5>
                    </div>
                </div>
            </div>

            <hr />


            <!-- //carosel -->

            <div class="col-12">
                <div class="row justify-content-center">
                    <div style="width: 820px; height: 480px;">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="resource/carosel/ai.jpg" class="d-block w-100" alt="...">

                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="resource/carosel/jewellery.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="resource/carosel/ruby.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- carosel -->

            <div class="col-12">
                <div class="row">
                    <div class="  imgdiv">
                        <h5 class="mt-5">featured Product
                       </h5>
                    </div>

                    <!-- card -->

                    <div class="col-12">

                        <div class="row justify-content-center gap-2" id="cartid">

     

                            

                           

                        </div>
                        <!-- card -->

                        <!-- category list -->

                        <hr />

                        <div class="  imgdiv">
                            <h2 class="mt-5"> Shop By Category</h2>

                        </div>

                        

                        <div class="col-12">

                            <div class="row justify-content-center gap-2">
                                <div class="card col-6 col-lg-2 mt-2 mb-2 " style="width: 12rem;">
                                    <img src="resource/product/jewellery_Bracelets.jpg" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                    <div class="card-body ms-0 m-0 text-center">

                                        <h5 class="card-title fs-6 fw-bold"> <span class="badge bg-info">New</span></h5>
                                        <span class="card-text text-success fw-bold"> Items Available</span><br /><br />

                                    </div>
                                </div>

                           

                           
                                <div class="card col-6 col-lg-2 mt-2 mb-2 " style="width: 12rem;">
                                    <img src="resource/product/gold-otunna.jpg" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                    <div class="card-body ms-0 m-0 text-center">

                                        <h5 class="card-title fs-6 fw-bold"> <span class="badge bg-info">New</span></h5>
                                        <span class="card-text text-success fw-bold"> Items Available</span><br /><br />

                                    </div>
                                </div>

                            

                           
                                <div class="card col-6 col-lg-2 mt-2 mb-2 " style="width: 12rem;">
                                    <img src="resource/product/rings1.png" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                    <div class="card-body ms-0 m-0 text-center">

                                        <h5 class="card-title fs-6 fw-bold"> <span class="badge bg-info">New</span></h5>
                                        <span class="card-text text-success fw-bold"> Items Available</span><br /><br />

                                    </div>
                                </div>

                           

                        
                                <div class="card col-6 col-lg-2 mt-2 mb-2 " style="width: 12rem;">
                                    <img src="resource/carosel/jewellery.jpg" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                    <div class="card-body ms-0 m-0 text-center">

                                        <h5 class="card-title fs-6 fw-bold"> <span class="badge bg-info">New</span></h5>
                                        <span class="card-text text-success fw-bold"> Items Available</span><br /><br />

                                    </div>
                                </div>

                           

                            
                                <div class="card col-6 col-lg-2 mt-2 mb-2 " style="width: 12rem;">
                                    <img src="resource/product/jewellery_Bracelets.jpg" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                    <div class="card-body ms-0 m-0 text-center">

                                        <h5 class="card-title fs-6 fw-bold"> <span class="badge bg-info">New</span></h5>
                                        <span class="card-text text-success fw-bold"> Items Available</span><br /><br />

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- category list -->

                    </div>
                </div>
                <hr />
                <?php include "footer.php"; ?>


            </div>

        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
    
    <?php
} else {
    echo "Not valid admin";
}

?>

