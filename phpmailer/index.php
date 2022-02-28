<?php

/* in your Google Account
Turn on less secure apps in https://www.google.com/settings/security/lesssecureapps 72
And allow access in https://accounts.google.com/b/0/DisplayUnlockCaptcha 
*/
require ('includes/PHPMailer.php');
require ('includes/SMTP.php');
require ('includes/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeption;

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$RandomCode=generateRandomString();

$mail =new PHPMailer();

$mail->isSMTP();
$smtp_debug = true;
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth="true";
$mail->SMTPSecure = "tls";
$mail->Port= "587";
$mail->Username= "jihane.zhr33@gmail.com";
$mail->Password= "jihane098";  
$mail->Subject="Password Reset System";
$mail->setFrom("jihane.zhr33@gmail.com");
$mail->isHTML(true); 
$mail->Body = "your Verification Code is :<br/>  <b>$RandomCode</b> <br/> - enter this code in the Verification field in the Password change page ";
$mail->addAddress("zhairi.az@gmail.com");

if(!$mail->send()) {
    echo 'Message could not be sent.<br/>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

$mail->smtpClose();

?>