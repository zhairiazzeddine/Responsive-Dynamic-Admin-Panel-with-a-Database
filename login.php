<?php
require('../include/db.php');
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT * FROM admin WHERE email='$email'";
  $query2 = "SELECT password as pass FROM admin WHERE id=1";
  $run2=mysqli_query($db,$query2);
  $data2 = mysqli_fetch_array($run2);
  $run = mysqli_query($db,$query);
  $hash=$data2['pass'];
  $data = mysqli_fetch_array($run);
  if(count($data)>0 and password_verify($password, $hash) ){
      if($data['is_verified']==0){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         Your Email Adresse is Not Verified Please Check Your inbox !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
      }else{
    $_SESSION['isUserLoggedIn']=true;
    $_SESSION['emailId'] = $_POST['email'];
    $_SESSION['last_login_timestamp'] = time();
    echo "<script>window.location.href = 'index.php';</script>";
    }
  }else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         Adresse Email Or Password incorrect !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
  }
}
?>
<!DOCTYPE html>
<html>
<script lang="javascript">
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>
<head>
<link href="admin.png" rel="icon">
  <link href="admin.png" rel="apple-touch-icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | ZHAIRI AZZEDDINE</title>
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
      <p class="login-box-msg">Admin Panel</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="E-mail Address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
              </div>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div><br>
            <a target="_blank" href="../admin/ForgetPassword">Forgot Password ?</a>
          </div>

          
          <!-- /.col -->
          <div class="col-4">
             <button type="submit" name="login" class="btn btn-outline-dark"><span class="glyphicon glyphicon-log-in"></span> <i class="fas fa-sign-in-alt"></i> Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        
      </form>

     
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
          
          <button onclick="window.location.href='http://zhairi-azzeddine.rf.gd/index'" type="button" class="btn btn-outline-secondary">
          <i class="fas fa-home" ></i>
           HOME 
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
