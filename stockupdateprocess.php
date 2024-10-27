<?php 

include "connection.php";

$pname = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

//echo($pname);

if(empty($qty)){
    echo("plese enter qty");
}else if(!is_numeric($qty)){
    echo("only numbers");
}else if(empty($price)){
    echo("plese enter price");
}else if(!is_numeric($price)){
    echo("only numbers");
}else{



   $rs =  Database::search("SELECT * FROM `stock` WHERE `product_id`='".$pname."' AND `price`='".$price."'");
   $n = $rs->num_rows;
   $f = $rs->fetch_assoc();

   if($n == 1){
    //update
    $newqty = $f["qty"]+$qty;

    Database::iud("UPDATE `stock` SET `qty`='".$newqty."' WHERE `st_id`='".$f["st_id"]."'");
    echo("update success");
   }else{
    //insert
    Database::iud("INSERT INTO `stock` (`price`,`qty`,`product_id`,`product_status_id`) VALUES ('".$price."','".$qty."','".$pname."','1')");
    echo("new stock add success");
   }
}


?>