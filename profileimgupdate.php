<?php

include "connection.php";
session_start();

$user =  $_SESSION["u"];



if(empty($_FILES["i"])){
    echo("empty");
}else{

   
     $rs = Database::search("SELECT * FROM `user` WHERE `user`.`email` = '".$user["email"]."'");

    $d = $rs->fetch_assoc();

    if(!empty($d["img_path"])){
         unlink($d["img_path"]);
         }
         
         $path = "resource/prifile_pic//" . uniqid() . ".png";
         move_uploaded_file($_FILES["i"]["tmp_name"], $path);

         Database::iud("UPDATE `user` SET `img_path`= '".$path."' WHERE `user_name`='".$user["user_name"]."'");
       //  echo($path);
         echo("success");
    
}

