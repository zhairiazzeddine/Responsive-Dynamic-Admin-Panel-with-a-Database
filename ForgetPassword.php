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
<title>Password recuperation systeme</title>



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
      <div class="container">
    <div class="row">
        
    </div>
</div>

      <div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading"> <i class="fas fa-question-circle"></i> Alerte !</h4>
  <p>
Please enter your e-mail address. You will receive an email with instructions on how to reset your password.</p>
  <hr>
  <p class="mb-0">The email address must be the same admin address. to Recover Password</p>
</div>

      <form method="post" action="sendLink.php">
      <?php session_start();
      if(isset($_SESSION['message']))
       echo $_SESSION['message'];
       unset($_SESSION['message']); ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="E-mail Address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
       
          <!-- /.col -->
          <div class="col-4">
             <button type="submit" name="generatepassword" class="btn btn-outline-dark">Generate Password</button>
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
