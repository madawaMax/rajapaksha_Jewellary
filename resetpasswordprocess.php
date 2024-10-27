<?php 

include "connection.php";

$email = $_POST["e"];
$npassword = $_POST["n"];
$rpassword = $_POST["r"];
$veri = $_POST["v"];


if(empty($email)){
    echo("please enter your email");
}else if(strlen($email) > 100){
    echo ("Email Address Must Contain LOWER THAN 100 characters.");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email Address.");
}else if(empty($npassword)){
    echo("please enter your new password");
}else if(strlen($npassword) < 5 || strlen($npassword) > 20){
    echo ("Password Must Contain 5 to 20 Characters.");
}else if(empty($rpassword)){
    echo("please enter your re-type password");
}else if(strlen($rpassword) < 5 || strlen($rpassword) > 20){
    echo ("Password Must Contain 5 to 20 Characters.");
}else if($npassword != $rpassword){
    echo("your password not matchers");
}else if(empty($veri)){
    echo("please enter your verification code");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `verification_code`='".$veri."'");
    $n = $rs->num_rows;

    if($n == 1){

        Database::iud("UPDATE `user` SET `password`='".$rpassword."',`c_password`='".$rpassword."' WHERE `email`='".$email."'");
        echo ("success");

    }else{

        echo ("Invalid Email or Verification Code");

    }
}



?>