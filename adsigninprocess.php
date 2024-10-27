<?php

session_start();

include "connection.php";

$ema = $_POST["e"];
$pass = $_POST["p"];
$rem = $_POST["r"];

//echo($ema);

if(empty($ema)){
    echo ("Please Enter Your email.");
}else if(strlen($ema) > 100){
    echo ("email Must Contain LOWER THAN 50 characters.");

}else if(empty($pass)){
    echo("please password enter");
}else if(strlen($pass)<5 || strlen($pass)>20){
    echo("password not valid");
}else{

    $rs = Database::search("SELECT * FROM `admin` WHERE `ad_username`='".$ema."' AND `ad_password`='".$pass."'");
    $n = $rs->num_rows;

    
    if($n == 1){

        //active user

        echo ("success");
         $d = $rs->fetch_assoc();
         $_SESSION["au"] = $d;

        if($rem == "true"){         //set cookies

            setcookie("ad_username",$ema,time()+(60*60*24));
            setcookie("ad_password",$pass,time()+(60*60*24));

        }else{   //delet cookies

            setcookie("ad_username","",-1);
            setcookie("ad_password","",-1);

        }

    }else{
        echo ("Invalid Username or Password.");
    }

}

?>