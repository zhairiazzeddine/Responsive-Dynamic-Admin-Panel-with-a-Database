<?php
require('../include/db.php');

if (isset($_POST['savepwd']))
    {

        $oldpwd = $_POST['oldpwd'];
        $newPwd= $_POST['newpwd'];
        $newPwdConfirm= $_POST['confirmnewpwd'];
        $query = "SELECT * FROM admin WHERE id=1";
        $run=mysqli_query($db,$query);
        $data = mysqli_fetch_array($run);
        $hash=$data['password'];
            if(count($data)>0 and password_verify($oldpwd, $hash))
                {
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
                            $password = mysqli_real_escape_string($db,$_POST['confirmnewpwd']);
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
                                    }
                        }
                }
                        
            else
                {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         <i class="fas fa-exclamation-circle"></i>&nbsp; The Old Password incorrect !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                }
    }
?>
<!DOCTYPE html>
<html>
<head>
<link href="admin.png" rel="icon">
  <link href="admin.png" rel="apple-touch-icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Change Password</title>
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
    
  </div>
  <!-- /.login-logo --><br>

  


  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Change Password</b></p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="oldpwd" id="oldpwd" placeholder="Enter Your Current Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


        <div class="input-group mb-3">
          <input type="password" class="form-control" name="newpwd" id="newpwd" placeholder="Enter New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


         <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirmnewpwd" id="confirmnewpwd" placeholder="Confirm Your New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
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
          
          <button onclick="window.location.href='http://zhairi-azzeddine.rf.gd/admin/index.php?accountsetting=true'" type="button" class="btn btn-outline-secondary">
           <i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back to  Account Setting
          </button><br>
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
