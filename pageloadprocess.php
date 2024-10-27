<?php


include "connection.php";

$pageno = 0;
$page = $_POST["p"];

//echo($page);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}


$q = "SELECT * FROM `stock`
 INNER JOIN `product` ON `stock`.product_id = `product`.p_id
INNER JOIN `product_image` ON `product`.p_id = `product_image`.product_p_id
 WHERE `product`.p_id = `product_image`.product_p_id";

$rs = Database::search($q);





$n = $rs->num_rows;

// echo($n);



$result_per_page = 8;
$num_of_pages = ceil($n / $result_per_page);
//echo($numberofpages);

$pageresult = ($pageno - 1) * $result_per_page;
//echo ($pageresult);

$q2 = $q . " LIMIT $result_per_page OFFSET $pageresult";
$rs2 = Database::search($q2);
$n2 = $rs2->num_rows;
//echo ($n2);

if ($n2 == 0) {
    echo ("no product here");
} else {

    for ($i = 0; $i < $n2; $i++) {
        # code...

        $d = $rs2->fetch_assoc();

?>

        <!-- card -->

    <div class="card col-6 col-lg-2 mt-2 mb-2 " style="width: 15rem;">
        <a href="singleProduct.php">
        <img src="<?php echo $d["code"] ?>"  class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
        </a>
           
            <div class="card-body ms-0 m-0 text-center">
                <h5 class="card-title fs-6 fw-bold"> <span class="badge bg-info"><?php echo $d["p_name"] ?></span></h5>
                <span class="card-text text-primary">Rs. <?php echo $d["price"] ?></span> <br />
                <span class="card-text text-warning fw-bold">In Stock</span> <br />
                <span class="card-text text-success fw-bold"> Items Available</span><br /><br />
                <button class="col-12 btn btn-outline-info mt-2 border border-info" onclick=''>
                    <i class="bi bi-heart-fill text-dark fs-5" id="heart"></i>
                </button>
                <button class="col-12 btn btn-outline-info mt-2" onclick="">Add to Cart</button>
                <a href='' class="btn btn-outline-dark mt-2">Buy Now</a>


            </div>
            </div>




            <!-- card -->

        <?php
        }
        ?>




        <!-- pageination -->

        <div class="mt-5 d-flex justify-content-end ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" <?php
                                                                if ($pageno <= 1) {
                                                                    echo ("bbbbbbbbb");
                                                                } else {

                                                                ?> onclick="loadproduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Previous</a></li>



                    <?php
                    for ($y = 1; $y <= $num_of_pages; $y++) {


                        if ($y == $pageno) {

                    ?>
                            <li class="page-item active">
                                <a class="page-link" onclick="loadproduct(<?php echo $y ?>);"><?php echo ($y) ?></a>
                            </li>

                        <?php
                        } else {

                        ?>

                            <li class="page-item ">
                                <a class="page-link" onclick="loadproduct(<?php echo $y ?>);"><?php echo ($y) ?></a>
                            </li>

                    <?php

                        }
                    }

                    ?>


                    <li class="page-item"><a class="page-link" <?php
                                                                if ($pageno >= $num_of_pages) {
                                                                    echo ("aaaaaaaa");
                                                                } else {
                                                                ?> onclick="loadproduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Next</a></li>
                </ul>
            </nav>
        </div>
   
        <!-- pageination -->

    <?php
}
    ?>