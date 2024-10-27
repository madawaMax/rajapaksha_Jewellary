<?php 

include "connection.php";

$uid = $_POST["u"];

//echo($uid)

if(empty($uid)){
    echo("please enter Username");
}else{

   $rs =  Database::search("SELECT * FROM `user` WHERE `user_name`='".$uid."'");
  $n =  $rs->num_rows;

  if($n==1){
   // echo("success");
   $d = $rs->fetch_assoc();

   if($d["action"]==1){
    echo("deactive ");

   Database::iud("UPDATE `user` SET `action`='2' WHERE `user_name`='".$uid."'");
   }else{
    echo("active ");
    Database::iud("UPDATE `user` SET `action`='1' WHERE `user_name`='".$uid."'");
   }
  }else {
    echo("invalid");
  }
}
?>