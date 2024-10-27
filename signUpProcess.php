<?php

include "connection.php";

$username = $_POST["u"];
$email = $_POST["e"];
$password = $_POST["p"];
$cpassword = $_POST["c"];



if(empty($username)){
    echo ("Please Enter Your user Name.");
}else if(strlen($username)>50){
    echo ("user Name Must Contain LOWER THAN 50 characters.");
}else if(empty($email)){
    echo ("Please Enter Your Email Address.");
}else if(strlen($email) > 100){
    echo ("Email Address Must Contain LOWER THAN 100 characters.");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email Address.");
}else if(empty($password)){
    echo ("Please Enter Your Password.");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password Must Contain 5 to 20 Characters.");
}else if(empty($password)){
    echo ("Please Enter Your Password.");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password Must Contain 5 to 20 Characters.");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `user_name`='".$username."'");
    $n = $rs->num_rows;

    if($n > 0){
        echo ("User with the same Email Address or same Mobile Number already exists.");
    }else{
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user`
        (`email`,`password`,`join_date_time`,`user_name`,`c_password`,`action`) VALUES 
        ('".$email."','".$password."','".$date."','".$username."','".$cpassword."','1')");

        echo ("success");
    }
}
