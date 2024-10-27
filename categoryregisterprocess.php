<?php 

include "connection.php";

$category = $_POST["c"];
//echo($category)

if(empty($category)){
    echo("please select category");
}else{
  //  echo("success");

  $rs =  Database::search("SELECT * FROM `category` WHERE `c_name`='".$category."'");
  $n = $rs->num_rows;
 // echo($n);

 if($n>0){
    echo("this brand all ready used");
  }else{
    Database::iud("INSERT INTO `category` (`c_name`) VALUES ('".$category."')");
    echo("success");
  }
}



?>