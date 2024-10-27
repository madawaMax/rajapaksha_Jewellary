<?php 

include "connection.php";

$brand = $_POST["b"];
//echo($category)

if(empty($brand)){
    echo("please select brand");
}else{
  //  echo("success");

  $rs =  Database::search("SELECT * FROM `brand` WHERE `b_name`='".$brand."'");
  $n = $rs->num_rows;
 // echo($n);

 if($n>0){
    echo("this brand all ready used");
  }else{
    Database::iud("INSERT INTO `brand` (`b_name`) VALUES ('".$brand."')");
    echo("success");
  }
}



?>