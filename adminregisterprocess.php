<?php

include "connection.php";

$username = $_POST["ua"];
$email = $_POST["ea"];
$password = $_POST["pa"];
$cpassword = $_POST["ca"];



if (empty($username)) {
    echo ("Please Enter Your user Name.");
} else if (strlen($username) > 50) {
    echo ("user Name Must Contain LOWER THAN 50 characters.");
} else if (empty($email)) {
    echo ("Please Enter Your Email Address.");
} else if (strlen($email) > 100) {
    echo ("Email Address Must Contain LOWER THAN 100 characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} else if (empty($password)) {
    echo ("Please Enter Your Password.");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password Must Contain 5 to 20 Characters.");
} else if (empty($cpassword)) {
    echo ("Please Enter Your CPassword.");
} else if (strlen($cpassword) < 5 || strlen($cpassword) > 20) {
    echo ("Password Must Contain 5 to 20 Characters.");
} else {

    $rs = Database::search("SELECT * FROM `admin` WHERE `ad_email`='" . $email . "' OR `ad_username`='" . $username . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("User with the same Email Address or same Mobile Number already exists.");
        } else {


        Database::iud("INSERT INTO `admin`
        (`ad_email`,`ad_password`,`ad_username`,`ad_cpassword`,`ad_verification`) VALUES 
        ('" . $email . "','" . $password . "','" . $username . "','" . $cpassword . "','1')");

        echo ("success");
    }
}

?>
