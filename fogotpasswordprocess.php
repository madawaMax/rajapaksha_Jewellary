<?php 

include "connection.php";

include "PHPMailer.php";
include "SMTP.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){

        $code = uniqid();
        Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rajapakshamadawa406@gmail.com';
        $mail->Password = 'hnpk nkxu cxef qphz';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('rajapakshamadawa406@gmail.com', 'Reset Password');
        $mail->addReplyTo('rajapakshamadawa406@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Forgot Password Verification Code';
        $bodyContent = '<h1 style="color:green">Your Verification code is '.$code.'</h1>';
        $mail->Body    = $bodyContent;

        if(!$mail -> send()){
            echo("email sending fail");
        }else{
            echo("success"); 
        }

    }else{
        echo("invalid email address");
    }
}else{
    echo("please enter your email");
}



?>