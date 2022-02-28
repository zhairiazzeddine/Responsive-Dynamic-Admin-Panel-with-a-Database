<?php
require('../include/db.php');
session_start();
if(!isset($_SESSION['isAdminEmail']))
{
 echo "<script>window.location.href='ForgetPassword.php';</script>";
}

    if (isset($_POST['savepwd']))
    {

        $otp = $_POST['otp'];
        $newPwd= $_POST['newpassword'];
        $newPwdConfirm= $_POST['confirmnewpassword'];
        $query = "SELECT * FROM reset_codes";
        $run=mysqli_query($db,$query);
        $data = mysqli_fetch_array($run);
        $hashedOTP=$data['OTP'];


        
            if(password_verify($otp, $hashedOTP))
                {
                    $query = "UPDATE reset_codes SET OTP=null";
                     $run=mysqli_query($db,$query);

                    if ($newPwd!=$newPwdConfirm)
                        {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         <i class="fas fa-exclamation-circle"></i>&nbsp; The New Password in not like The Confirmation, Please Check Your Password !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                        }
                    else
                        {
                            $password = mysqli_real_escape_string($db,$_POST['confirmnewpassword']);
                            $options = ['cost' => 12,];
                            $pass=password_hash($password, PASSWORD_BCRYPT, $options);
                            $query1 = "UPDATE admin SET ";
                            $query1.="password='$pass' WHERE id=1";
                            $run = mysqli_query($db,$query1);

                                if($run)
                                    {
                                         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                         <i class="fas fa-check-circle"></i> &nbsp; Password Changed !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                                        header( "refresh:5;url=http://zhairi-azzeddine.rf.gd/admin/login.php" );
                                    }
                        }
                }
                        
            else
                {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         <i class="fas fa-exclamation-circle"></i>&nbsp; The OTP Code incorrect !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                }
    }

?>



<!DOCTYPE html>
<html>

<style>
    .alert-message
{
    margin: 20px 0;
    padding: 20px;
    border-left: 3px solid #eee;
}
.alert-message h4
{
    margin-top: 0;
    margin-bottom: 5px;
}
.alert-message p:last-child
{
    margin-bottom: 0;
}

.alert-message-warning
{
    background-color: #FF8A8A;
    border-color: #f0ad4e;
}
.alert-message-warning h4
{
    color: #f0ad4e;
}

.alert-message-danger
{
    background-color: #fdf7f7;
    border-color: #FF2E2E;
}
.alert-message-danger h4
{
    color: #FF2E2E;
}

</style>
<title>Reset Password</title>


<head>
<link href="admin.png" rel="icon">
  <link href="admin.png" rel="apple-touch-icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Password Reset</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" >

<div class="login-box">
  <div class="login-logo">
    <a href="http://zhairi-azzeddine.rf.gd/"><img src="LOGO.png" alt="ZHR PROD" style="width:150px;"></a><br/>
  </div>
  <!-- /.login-logo --><br>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Password Reset System</b></p>
      

      <div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Alerte !</h4>
  <p>
An Email has been sent to Your Mailbox :</p><b><?=$_SESSION['emailId']?></b><p>which contains the OTP Verification Code</p>
</div>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control"  id="otp" name="otp" placeholder="Enter Your OTP Code" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
          
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter New Password" required  >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-unlock-alt"></span>
            </div>
          </div>
          
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" id="confirmnewpassword" name="confirmnewpassword" placeholder="Confirm The New Password" required  >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-unlock-alt"></span>
            </div>
          </div>
          
        </div>
       
          <!-- /.col -->
          <div class="col-4">
             <button type="submit" name="savepwd" class="btn btn-outline-dark">Save Password</button>
          </div>
          <!-- /.col -->
        </div>
        
      </form>

     
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
  <button onclick="window.location.href='http://zhairi-azzeddine.rf.gd/index.php'" type="button" class="btn btn-outline-secondary">
          <i class="fas fa-home" ></i>
           HOME 
          </button><br>
           <button onclick="window.location.href='http://zhairi-azzeddine.rf.gd/admin/login.php'" type="button" class="btn btn-outline-secondary">
          <i class="fas fa-user-shield" ></i>
           ADMIN PANEL
          </button>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>

