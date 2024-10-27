<?php 

include "connection.php";
session_start();

$user = $_SESSION["u"];

$fname =  $_POST["f"];
$mobile =  $_POST["m"];
$address =  $_POST["a"];
$city =  $_POST["c"];
$zipcode =  $_POST["z"];


if(empty($fname)){
    echo("please enter your name");
}else if(preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$fname)){
    echo("please only type letters");
}else if(($fname) == [0-9]){
    echo("please only type letters");
}else if(empty($mobile)){
    echo("please enter mobile");
}else if(strlen($mobile) != 10){
    echo("Mobile Number Must Contain 10 characters.");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo ("Invalid Mobile Number.");
}else if(empty($address)){
    echo("please enter address line");
}else if(empty($city)){
    echo("please enter city");
}else if(empty($zipcode)){
    echo("empty zipcode");
}else{

    Database::iud("UPDATE `user` SET `name`='" . $fname . "',`mobile`='" . $mobile . "',
    `address`='" . $address . "',`zipcode`='" . $zipcode . "',`city`='" . $city . "'WHERE `email` = '".$user["email"]."'");

   $rs =  Database::search("SELECT * FROM `user` WHERE `email`='".$user["email"]."'");
   $d = $rs->fetch_assoc();
   $_SESSION["u"] = $d;

   echo("update success");
   

}


