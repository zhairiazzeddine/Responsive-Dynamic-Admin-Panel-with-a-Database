<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<?php

    /* in your Google Account
Turn on less secure apps in https://www.google.com/settings/security/lesssecureapps 72
And allow access in https://accounts.google.com/b/0/DisplayUnlockCaptcha 
*/

require ('../include/db.php');
require ('includes/PHPMailer.php');
require ('includes/SMTP.php');
require ('includes/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeption;

function generateRandomString($length = 10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
            for ($i = 0; $i < $length; $i++) 
                {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                    return $randomString;
    }

if(isset($_POST['generatepassword']))
    {
        $email = $_POST['email'];
        $query = "SELECT * FROM admin WHERE email='$email'";
        $run = mysqli_query($db,$query);
        $data = mysqli_fetch_array($run);

            if(count($data)>0)
                {
                    session_start();
                    $_SESSION['message']=null;
                    $_SESSION['isAdminEmail'] = true;
                    $_SESSION['emailId'] = $_POST['email'];
                    $RandomCode=generateRandomString();
                    $mail =new PHPMailer();
                    $mail->isSMTP();
                    $smtp_debug = true;
                    $mail->Host="smtp.gmail.com";
                    $mail->SMTPAuth="true";
                    $mail->SMTPSecure = "tls";
                    $mail->Port= "587";
                    $mail->Username= "*****";
                    $mail->Password= "*****";  
                    $mail->Subject="Password Reset";
                    $mail->setFrom("********","ZHAIRI-AZZEDDINE Support");
                    $mail->isHTML(true); 
                    $mail->Body = "
                                    <!doctype html>
                                    <html lang='en-US'>

                                    <head>
                                        <meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
                                        <title>Reset Password Email</title>
                                        <meta name='description' content='Reset Password Email Template.'>
                                        <style type='text/css'>
                                            a:hover {text-decoration: underline !important;}
                                        </style>
                                        <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css' integrity='sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p' crossorigin='anonymous'/>
                                        <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css' integrity='sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ' crossorigin='anonymous'/>
                                        <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css' integrity='sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l' crossorigin='anonymous'/>
                                    </head>

                                    <body marginheight='0' topmargin='0' marginwidth='0' style='margin: 0px; background-color: #f2f3f8;' leftmargin='0'>
                                        <!--100% body table-->
                                        <table cellspacing='0' border='0' cellpadding='0' width='100%' bgcolor='#f2f3f8'
                                            style='@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;'>
                                            <tr>
                                                <td>
                                                    <table style='background-color: #f2f3f8; max-width:670px;  margin:0 auto;' width='100%' border='0'
                                                        align='center' cellpadding='0' cellspacing='0'>
                                                        <tr>
                                                            <td style='height:80px;'>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style='text-align:center;'>
                                                            
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style='height:20px;'>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table width='95%' border='0' align='center' cellpadding='0' cellspacing='0'
                                                                    style='max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);'>
                                                                    <tr>
                                                                        <td style='height:40px;'>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style='padding:0 35px;'>
                                                                        <div style='font-size: 37px;'><CENTER><i class='fas fa-unlock-alt'></i></CENTER> </div><br/>
                                                                            <h1 style='color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;'>You have
                                                                                requested to reset your password</h1>
                                                                            <span
                                                                                style='display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;'></span>
                                                                            <p style='color:#455056; font-size:15px;line-height:24px; margin:0;'>
                                                                                We cannot simply send you your old password. A unique Code to reset your
                                                                                password has been generated for you. To reset your password
                                                                            </p>
                                                                            <a
                                                                                style='background:#18d26e;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;'>YOUR CODE IS :               <strong>$RandomCode</strong> </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style='height:40px;'>&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        <tr>
                                                            <td style='height:20px;'>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style='text-align:center;'>
                                                                <p style='font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;'>&copy; <strong>http://zhairi-azzeddine.rf.gd/</strong></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style='height:80px;'>&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--/100% body table-->
                                    </body>

                                    </html>";
                                        $mail->addAddress($email);

                        if(!$mail->send()) 
                            {
                                echo 'Message could not be sent.<br/>';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            } 
                        else 
                            {
                               
                                $mail->smtpClose();
                                $options = ['cost' => 12,];
                                $RandCodeHashed=password_hash($RandomCode, PASSWORD_BCRYPT, $options);
                                $query = "UPDATE reset_codes SET OTP='$RandCodeHashed'";
                                $run=mysqli_query($db,$query);
                                echo "<script>window.location.href='ResetPassword';</script>";
                            }
    
                } 
            else
                {
                    
                     $_SESSION['message']= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         incorrect Adresse Mail !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';  
                    //echo "<script>window.location.href='ForgetPassword.php';</script>";
                    Header( 'Location: ForgetPassword.php');
                   
                    
                }
    }


?>