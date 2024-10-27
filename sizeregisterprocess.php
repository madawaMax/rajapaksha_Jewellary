<?php 

include "connection.php";

$size = $_POST["s"];
//echo($category)

if(empty($size)){
    echo("please select brand");
}else{
  //  echo("success");

  $rs =  Database::search("SELECT * FROM `size` WHERE `s_name`='".$size."'");
  $n = $rs->num_rows;
 // echo($n);

 if($n>0){
    echo("this size all ready used");
  }else{
    Database::iud("INSERT INTO `size` (`s_name`) VALUES ('".$size."')");
    echo("success");
  }
}



?>